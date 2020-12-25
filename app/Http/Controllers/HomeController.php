<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\Rating;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'catalog', 'viewCategory', 'searchProduct']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'firstItems' => Product::select('id', 'name', 'sell_price', 'rent_price', 'image')->orderBy('created_at')->limit(4)->get(),
            'secondItems' => Product::select('id', 'name', 'sell_price', 'rent_price', 'image')->orderByDesc('created_at')->limit(4)->get()
        ]);
    }


    public function catalog(){

        return view('katalog', [
            'categories' => ProductCategory::all()
        ]);
    }

    public function viewCategory($id){

        return view('type-based', [
            'category' => ProductCategory::where('id', $id)->first()
        ]);
    }

    public function viewProduct(Product $product){
        
        return view('user.view-product', [
            'product' => $product,
            'overallRating' => Rating::where('product_id', $product->id)->get()->avg('rating'),
            'rating' => Rating::where([['product_id', $product->id], ['user_id', Auth()->user()->id]])->first(), 
            'countRating' => Rating::where('product_id', $product->id)->count()
        ]);
    }

    public function addRating(Request $request){

        request()->validate([
            'rating' => 'required|min:1|max:5'
        ]);

        Rating::create([
            'user_id' => Auth()->user()->id,
            'product_id' => $request->product_id,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('success', 'Rating Added');
    }

    public function updateRating(Rating $rating){

        request()->validate([
            'rating' => 'required|min:1|max:5'
        ]);

        $rating->update([
            'rating' => request('rating')
        ]);

        return redirect()->back()->with('success', 'Rating Updated');
    }

    public function searchProduct(Request $request){

        if($request->product != NULL){
            return view('view-search', [
                'products' => Product::where('name', 'like', '%'.$request->product.'%')->select('id', 'name', 'sell_price', 'rent_price', 'image')->paginate(6)
            ]);
        }else{
            return redirect(route('catalog'));
        }
    }
}
