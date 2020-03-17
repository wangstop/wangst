<?php

namespace App\Http\Controllers;

// 匯入資料庫
use DB;

use App\News;
use App\News_img;
use App\Products;
use App\contactUs;

use App\Mail\OrderShipped;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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





    public function product_detail($product_id){

        $Product = Products::find($product_id);

        return view('front/product_detail',compact('Product'));
    }


    public function add_cart($product_id){
        // 產品id
        $Product = Products::find($product_id); // assuming you have a Product model with id, name, description & price
        // dd($Product);
        $rowId = $product_id; // generate a unique() row ID


        // add the product to cart
        \Cart::add(array(
            'id' => $rowId,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => 3,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        return redirect('cart');
    }

    public function cart_total(){

        $items = \Cart::getContent();
        // dd($items);

        return view('/front/cart',compact('items'));

    }

    public function contactUs(){


        return view('/front/contactUs');

    }



    public function contactUs_store(Request $request){

        $contact_data = $request->all();
        dd($contact_data);

        $contact = contactUs::create($contact_data);

        // 寄信
        // 安裝指令
        // 1.php artisan make:mail OrderShipped //產生mail model
        // 2.Mail::to($request->user())->send(new OrderShipped($order));
        // 3.php artisan make:mail OrderShipped --markdown=emails.orders.shipped


        // to('寄往的信箱')

        // send(new OrderShipped($contact)
        // 把contact送到OrderShipped

        // 寄信user
        Mail::to($contact_data['email'])->send(new OrderShipped($contact));

        // 寄信mail
        Mail::to('m10612071@gemail.yuntech.edu.tw')->send(new OrderShipped($contact));


        return redirect('/contactUs');

    }

}
