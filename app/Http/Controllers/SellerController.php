<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{

    public function showSellerRegister(){
        
        return view('auth.seller_register');
    }

    public function addSellerData(Request $request){ 
        $this->validate($request,[
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:100',
            'password' => 'required|alpha_num|min:8|confirmed',
        ]);

        $seller = new User;
        $seller->name = $request->name;
        $seller->role = 'SELLER';
        $seller->email = $request->email;
        $seller->phone_number = $request->phone_number;
        $seller->address = $request->address;
        $seller->password = Hash::make($request->password);
        $seller->save();

        return redirect('/')->with('success', 'Registrasi Akun Berhasil');
    }

    public function createType(){
        
        return view('admin.add_category', [
            'categories' => Category::select('id', 'name')->get(),
        ]);
    }

    public function addType(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:product_categories|min:5',
        ]);
        
        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->save();

        return redirect()->back()->with('success', 'Kategori ditambahkan');
      
    }

    public function editType($id){

        return view('admin.edit_category', [
            'category' => Category::find($id)
        ]);
    }

    public function updateType(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:product_categories|min:5',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();

        return redirect()->back()->with('success', 'Data Kategori diperbaharui');
    }

    public function deleteType($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori dihapus');
    }

    public function createProduct(){

        return view('admin.add_product', [
            'categories' => Category::all(),
        ]);
    }

    public function addProduct(Request $request){
        $sellerId = Auth::id();

        $this->validate($request,[
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:10',
            'category_id' => 'required',
            'sell_price' => 'nullable|integer|min:5001',
            'rent_price' => 'nullable|integer|min:5001',
            'stock' => 'required|integer|min:1',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = str_replace(" ", "_", strtolower($request->name)).'.'.$extension;
            $path = $request->file('image')->storeAs('/public/products/', $fileName);
        }else{
            $fileName = NULL;
        }

        $newProduct = new Product();
        $newProduct->seller_id = Auth()->user()->id;
        $newProduct->category_id = $request->category_id;
        $newProduct->name = $request->name;
        $newProduct->image = $fileName;
        $newProduct->stock = $request->stock;
        $newProduct->description = $request->description;

        if($request->sell_price != NULL){
            $newProduct->sell_price = $request->sell_price;
            $newProduct->is_sold = 1;
        }else if($request->rent_price != NULL){
            $newProduct->rent_price = $request->rent_price;
            $newProduct->is_rented = 1;
        }

        $newProduct->save();

        return redirect()->back()->with('success', 'Produk baru ditambahkan');
    }

    public function editProduct($id){
        $products = DB::table('products')->find($id);
        return view('edit_product', ['products' => $products]);
    }

    public function updateProduct(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'sell_price' => 'nullable|integer|min:5001',
            'rent_price' => 'nullable|integer|min:5001',
            'stock' => 'required|integer|min:1'
        ]);

        $productDetail = Product::find($id);
        $productDetail->name = $request->name;
        $productDetail->description = $request->description;
        $productDetail->sell_price = $request->sell_price;
        $productDetail->rent_price = $request->rent_price;
        $productDetail->stock = $request->stock;
        $productDetail->update();

        return redirect()->back()->with('success', 'Data Produk diperbaharui');
    }

    public function deleteProduct($id){
        $productDetail = Product::find($id);
        $productDetail->delete();

        return redirect('/')->with('success', 'Data Produk dihapus');
    }
}
