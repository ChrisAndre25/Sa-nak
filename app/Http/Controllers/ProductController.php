<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\HeaderTransaction;
use App\DetailTransaction;

class ProductController extends Controller
{
    public function createCart(Request $request){

        $productStock = Product::where('id', $request->product_id)->value('stock');

        $request->validate([
            'quantity' => 'required|integer|min:1|max:'.$productStock
        ]);

        $cart = Cart::where('user_id', Auth()->user()->id)->get();

        if(count($cart) <= 0){
            if($request->status == 1){
                Cart::create([
                    'user_id' => Auth()->user()->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'status' => $request->status,
                ]);
            }else if($request->status == 2){
                Cart::create([
                    'user_id' => Auth()->user()->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'duration' => $request->duration,
                    'status' => $request->status,
                ]);
            }
            return redirect(route('view-cart'))->with('success', 'Ditambahkan ke Keranjang');     
        }else if(count($cart) > 0){
            foreach($cart as $item){
                if($item->product->seller_id == $request->seller_id){
                    if($item->product_id == $request->product_id){
                        if($request->status == 1){
                            $item->update([
                                'quantity' => $item->quantity + $request->quantity
                            ]);
                        }else if($request->status == 2){
                            $item->update([
                                'quantity' => $item->quantity + $request->quantity,
                                'duration' => $request->duration
                            ]);
                        }
                    }else if($item->product_id != $request->product_id){
                        if($request->status == 1){
                            Cart::create([
                                'user_id' => Auth()->user()->id,
                                'product_id' => $request->product_id,
                                'quantity' => $request->quantity,
                                'status' => $request->status,
                            ]);
                        }else if($request->status == 2){
                            Cart::create([
                                'user_id' => Auth()->user()->id,
                                'product_id' => $request->product_id,
                                'quantity' => $request->quantity,
                                'duration' => $request->duration,
                                'status' => $request->status,
                            ]);
                        }
                    }
                    return redirect(route('view-cart'))->with('success', 'Ditambahkan ke Keranjang');     
                }else{
                    return redirect(route('view-cart'))->with('error', 'Selesaikan transaksi barang terlebih dahulu');     
                }
            }
        }
    }

    public function viewCart(){

        return view('user.cart', [
            'cart' => Cart::where('user_id', Auth()->user()->id)->get(),
        ]);
    }

    public function editCart(Cart $cart){

        return view('user.update-cart', [
            'cart' => $cart
        ]);
    }

    public function updateCart(Cart $cart, Request $request){
        $productStock = Product::where('id', $cart->product_id)->value('stock');

        $request->validate([
            'quantity' => 'required|integer|min:1|max:'.$productStock
        ]);

        if($request->status == 1){
            $cart->update([
                'quantity' => $request->quantity
            ]);
        }else if($request->status == 2){
            $cart->update([
                'quantity' => $request->quantity,
                'duration' => $request->duration
            ]);
        }

        return redirect(route('view-cart'))->with('success', 'Item dari Keranjang diperbaharui'); 
    }
    
    public function deleteCart(Cart $cart){
        
        $cart->delete();

        return redirect('/')->with('success', 'Item dari Keranjang dihapus');
    }

    public function viewPayment(){

        $cart = Cart::where('user_id', Auth()->user()->id)->get();

        $totalPrice = 0;
        foreach($cart as $item){
            if($item->status == 1){
                $totalPrice += $item->product->sell_price*$item->quantity;
            }elseif($item->status == 2){
                $totalPrice += $item->product->rent_price*$item->quantity*$item->duration;
            }
        }
        return view('user.payment', [
            'totalPrice' => $totalPrice
        ]);
    }
    public function checkOut(Request $request){

        $headerTransaction = new HeaderTransaction;
        $headerTransaction->user_id = Auth()->user()->id;
        $headerTransaction->payment_type = $request->payment_type;
        $headerTransaction->save();

        $cart = Cart::where('user_id', Auth()->user()->id)->get();

        foreach($cart as $item){
            $detailTransaction = new DetailTransaction;
            $detailTransaction->transaction_id = $headerTransaction->id;
            $detailTransaction->product_id = $item->product_id;
            $detailTransaction->quantity = $item->quantity;
            $detailTransaction->status = $item->status;
            if($detailTransaction->status == 2){
                $detailTransaction->duration = $item->duration;
            }
            $detailTransaction->save();

            $product = Product::where('id', $item->product_id)->first();
            $product->stock -= $item->quantity;
            $product->save();

            $item->delete();
        }

        return redirect(route('view-cart'))->with('success', 'Transaksi berhasil');

    }

    public function transactionHistory(){

        return view('user.history', [
            'histories' => HeaderTransaction::where('user_id', Auth()->user()->id)->get()
        ]);

    }

    public function returnRentConfirmation($id){
        return view('user.return-rent', [
            'detailTransaction' => DetailTransaction::where('id', $id)->first()
        ]);
    }

    public function returnRent($id){
        $detailTransaction = DetailTransaction::where('id', $id)->first();

        $detailTransaction->update([
            'status' => 3
        ]);

        return redirect('/')->with('success', 'Barang dalam proses pengembalian');
    }
}
