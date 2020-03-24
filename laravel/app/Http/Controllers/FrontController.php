<?php

namespace App\Http\Controllers;

// 匯入資料庫
use DB;

use App\News;
use App\Order;
use App\News_img;
use App\Products;

use App\contactUs;
use Carbon\Carbon;
use App\OrderDetail;
use App\Mail\OrderShipped;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use TsaiYiHua\ECPay\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    protected $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

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



    public function proucts_Types(){

        $product_data = DB::table('product_types')->orderBy('sort','desc')->get();

        return view('front/product_type',compact('product_data'));
    }

    public function proucts($products_id){

        // $products_detail = DB::table('products')->orderBy('sort','desc')->get();

        $products = Products::where('type_id', $products_id)->get();

        // $products = Products::find($products_id);
        // dd( $items);



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
        // $userID = Auth::user()->id;


        // add the product to cart
        \Cart::add(array(
            'id' => $rowId,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => 1,
        ));


        return redirect('cart');
    }

    public function update_cart(Request $request ,$product_id){

        $quantity = $request->quantity;

        // Cart::update(點擊的id, array(
        //     'quantity' => $quantity,
        //   ));

        \Cart::update($product_id, array(

            // 'quantity' => $quantity,會將目前的數量做+-1的動作
            'quantity' => $quantity, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
          ));

        return 'success';

    }

    public function delete_cart(Request $request ,$product_id){

        \Cart::remove($product_id);


        return 'success';

    }

    public function cart_total(){

        // $userID = Auth::user()->id;
        // 加sort()會使產品順序不會隨意互換
        $items = \Cart::getContent()->sort();
        // dd($items);

        return view('/front/cart',compact('items'));

    }

    public function cart_checkout(){

        $items = \Cart::getContent()->sort();

        return view('/front/cart_checkout',compact('items'));

    }


    public function cart_checkout_end(Request $request){

        // 建立訂單
        $Recipient_name = $request->Recipient_name;
        $Recipient_phone = $request->Recipient_phone;
        $Recipient_address = $request->Recipient_address;
        $shipment_time = $request->shipment_time;
        $total_price =  \Cart::getTotal();

        // 價錢超過1000免運費
        if( $total_price > 1000)
        $total_price = $total_price + 0;
        else
        $total_price = $total_price + 120;

        // 把請求過來的資料一筆一筆丟進去
        $order = new Order;

        $order->Recipient_name = $Recipient_name;
        $order->Recipient_phone = $Recipient_phone;
        $order->Recipient_address = $Recipient_address;
        $order->shipment_time = $shipment_time;
        $order->totalPrice = $total_price;
        $order->save();
        $order_id = $order->id;


        // dd( $order);
        // 建立訂單詳細
        $cart_contents = \Cart::getContent();
        // dd($items);
        $items = [];
        foreach($cart_contents as $row) {
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $row->id;
            $order_detail->qty = $row->quantity;
            $order_detail->price = $row->price;
            $order_detail->save();

            // 多筆產品送出訂單要以二維陣列的方式送
            $product = Products::find($row->id);
            $product_name = $product->title;


            $item = [
                'name' => $product_name,
                'qty' => $row->quantity,
                'price' => $row->price,
                'unit' => '個'
            ];

                 array_push($items, $item);

            if($total_price>1000){
                    $total_price_item = [
                'name' => "運費",
                'qty' => 1,
                'price' => 120,
                'unit' => '個'
                ];

             array_push($items, $total_price_item);

            }
            else{
                $total_price_item = [
                    'name' => "運費",
                    'qty' => 1,
                    'price' => 120,
                    'unit' => '個'
                    ];

                 array_push($items, $total_price_item);

            }
        }
        // dd($items);
        // 建立訂單編號
        // Carbon::now()為時間模組套件
        // format('內容')可以讓內容改為各式各樣的格式 下面Ymd是數字的格式
        // $order->order_no = '自行定義名稱'.Carbon::now()->format('Ymd').$order->id;

        // 訂單編號 = apk+時間模組套件+數字+流水號;
        $order->order_no='apk'.Carbon::now()->format('Ymd').$order->id;
        dd($order);
        $order->save();

         //第三方支付
         $formData = [
            'UserId' => '', // 用戶ID , Optional
            'ItemDescription' => '產品簡介',
            // 'Items' => 二維陣列,
            'Items' => $items,
            // 'OrderId' => 'hk'.Carbon::now()->format('Ymd').$new_order->id,
             // 'ItemName' => 'Product Name',
             // 'TotalAmount' => \Cart::getTotal(),
             'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
         ];
        //清空購物車
        \Cart::clear();
        // 送到vendor/tsaiyhua/src/Checkout/setPostData()
        return $this->checkout->setNotifyUrl(route('notify'))->setReturnUrl(route('return'))->setPostData($formData)->send();

    }

    public function order(){

       $order = Order::with('order_detail')->get();
    //    dd($order);


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

    public function text_checkout()
    {
        $formData = [
            'UserId' => 1, // 用戶ID , Optional
            'ItemDescription' => '產品簡介',
            'ItemName' => 'Product Name',
            'TotalAmount' => '2000',
            'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
        ];
        return $this->checkout->setPostData($formData)->send();
    }


}
