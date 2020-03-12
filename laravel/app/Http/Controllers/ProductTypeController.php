<?php

namespace App\Http\Controllers;
use App\Products;
use App\ProductTypes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductTypeController extends Controller
{

    public function index()
    {
        $products = ProductTypes::all();
        return view('/admin/product_type/index',compact('products'));

    }

    public function create()
    {
        // $product = ProductTypes::all();

        return view('/admin/product_type/create');

    }



    public function store(Request $request)
    {

        $product_data = $request->all();


        $product = ProductTypes::create($product_data);
        $product->save();


        return redirect('/home/product_types');
    }

    public function update(Request $request, $id)
    {


        ProductTypes::find($id)->update($request->all());



        return redirect('/home/product_types');
    }

    public function edit($id)

    {
        // 呼叫需要修改指定的那筆資料
        // 呼叫需要修改指定
        $products = ProductTypes::find($id);
        // dd($products );
        // $product = Products::where('type_id', $id)->get();
        // $product->


// dd($product);



        // 回傳資料
        // dd($news);
        return view('/admin/product_type/edit',compact('products'));
        // compact攜帶news到(admin/news/edit)網址
    }



    public function delete(Request $request, $id)
    {


        $products = ProductTypes::find($id);
        $products->delete();

        //   dd($news);
        // $old_img = $news['img'];

        // // 先刪除laravel裡面圖片的資料
        // File::delete(public_path() . $old_img);

        // // 再刪除資料庫的資料

        // // 找到News的id並對News_img的id做刪除

        // // 獲得News_img符合id的newid欄位
        // $items = News_img::where('newid', $id)->get();

        // // dd($items);


        // foreach ($items as $item) {

        //     $old_item = $item->img_url;
        //     // dd($old_item);
        //     File::delete(public_path() . $old_item);
        //     $item->delete();
        // }






        return redirect('home/product_types');
    }
    private function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }
    public function ajax(Request $request){

        $nameid=$request->nameid;

        $item = News_img::find($nameid);

        $old_img = $item->img_url;

        File::delete(public_path() . $old_img);

        $item->delete();


        return $item;

    }

}

