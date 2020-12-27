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

    public  function validateLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6'
        ]);

        $loginData = $request->only('email','password');

        if(Auth::attempt($loginData)){
            // return redirect('/home')
        }
        else{
            return back()->with('error','Wrong Login Datas');
        }
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

    public function addProduct(Request $request){
        $sellerId = Auth::id();

        $this->validate($request,[
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:10',
            'category' => 'required',
            'price' => 'required|integer|min:5001',
            'stock' => 'required|integer|min:1',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        $image_path = $request->file('image')->store('Image','public');
        $category_id = Category::select('id')->where('name',$request->category)->get();

        $newProduct = new Product();
        $newProduct->seller_id = $sellerId;
        $newProduct->category_id = $category_id;
        $newProduct->name = $request->name;
        $newProduct->image = $image_path;
        $newProduct->stock = $request->stock;
        $newProduct->description = $request->description;
        $newProduct->sell_price = $request->price;
        $newProduct->save();
    }

    public function updateProduct(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:10',
            'price' => 'required|integer|min:5001',
            'stock' => 'required|integer|min:1'
        ]);

        $productDetail = Product::find($id);
        $productDetail->name = $request->name;
        $productDetail->description = $request->description;
        $productDetail->price = $request->price;
        $productDetail->stock = $request->stock;
        $productDetail->update();
    }

    public function deleteProduct($id){
        $productDetail = Category::find($id);
        $productDetail->delete();
    }
}
