<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function addSellerData(Request $request){ //register
        $this->validate($request,[
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:100',
            'password' => 'required|alpha_num|min:8|confirmed',
            'shop_name' => 'required|min:5|max:100',
            'shop_address' => 'required|string|max:100'
        ]);

        $seller = new User();
        $seller->name = $request->name;
        $seller->role = 'SELLER';
        $seller->email = $request->email;
        $seller->phone_number = $request->phone_number;
        $seller->address = $request->address;
        $seller->password = bcrypt($request->password);
        $seller->shop_name = $request->shop_name;
        $seller->shop_address = $request->shop_address;
        $seller->save();
    }

    public function addProductType(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:product_categories|min:5',
        ]);
        
        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->save();
      
    }

    public function updateProductType(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:product_categories|min:5',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
    }

    public function deleteProductType($id){
        $category = Category::find($id);
        $category->delete();
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

        return redirect()->back()->with('success', 'New Product Added');
    }

    public function editProduct(Product $product){

        return view('admin.edit_product', [
            'product' => $product
        ]);
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

        return redirect()->back()->with('success', 'Product Updated');
    }

    public function deleteProduct($id){
        $productDetail = Product::find($id);
        $productDetail->delete();

        return redirect('/')->with('success', 'Product Deleted');
    }
}
