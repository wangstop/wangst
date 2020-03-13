<?php

namespace App\Http\Controllers;

// 匯入資料庫
use DB;

use App\News;
use App\News_img;
use App\Products;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        return view('front/index');
    }





    public function news_inner($id){

        // 方法一
        // $img = News::find($id)->img_data;
        // dd($img);

        // 方法二
        // $img = News::with('img_data')->find($id);
        $items = News_img::where('newid', $id)->get();

//  dd($items);

        return view('front/news_inner',compact('items'));
    }

    public function news(){

        // 取得資料庫的東西(news)
        // orderBy('sort','desc')根據sort去做排序
        $news_data = DB::table('news')->orderBy('sort','desc')->get();

        return view('front/news',compact('news_data'));
    }


    // public function proucts(){

    //     $product = DB::table('products')->orderBy('sort','desc')->get();

    //     return view('front/product');
    // }


    public function proucts_Types(){

        $product_data = DB::table('product_types')->orderBy('sort','desc')->get();

        return view('front/product_type',compact('product_data'));
    }


    public function proucts(){

        $products = DB::table('products')->orderBy('sort','desc')->get();

        return view('front/product',compact('products'));
    }

    public function product_detail(){

        // $products = DB::table('products')->orderBy('sort','desc')->get();

        return view('front/product_detail');
    }


    public function add_cart(){
        // 產品id
        $product_id=2;
        $Product = Products::find($product_id); // assuming you have a Product model with id, name, description & price
        $rowId = 456; // generate a unique() row ID

        // 每一台購物車的id
        $userID = Auth::user()->id; // the user ID to bind the cart contents

        // dd( $userID);


        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $Product
        ));

    }

    public function cart_total(){

        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent();
        // dd($items);

        return view('/front/cart')

    }



}
