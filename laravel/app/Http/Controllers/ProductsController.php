<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

    public function index()
    {
        $product = Products::all();
// dd($product);
        return view('/admin/products/index',compact('product'));

    }

    public function create()
    {
        $product_type = ProductTypes::all();
        // dd($product_type );


        return view('/admin/products/create',compact('product_type'));
    }

    public function edit($id)
    {
        // 呼叫需要修改指定的那筆資料
        // 呼叫需要修改指定
        // $news = News::with('img_data')->find($id);
        // $products_type = ProductTypes::all();

        $product_types = ProductTypes::all();
        // dd($product_types);



        $products = Products::find($id);

                // dd($product);


        // 回傳資料
        return view('/admin/products/edit',compact('products'),compact('product_types'));
        // compactv攜帶news到(admin/news/edit)網址
    }



    public function store(Request $request)
    {

        // all()是取出title content img multipleimg
        $news_data = $request->all();
        // dd($request);

        // dd( $news_data);
        // $file_name指向封包圖片
        // $file_name = $request->file('img')->store('','public');
        // dd($file_name);
        // $file_name覆蓋 $news_data的圖片
        // $news_data['img'] = $file_name;

        // 檢查是否有檔案
        if ($request->hasFile('img')) {

            $file = $request->file('img');

            // dd( $file);
            // product上傳資料夾名稱
            $path = $this->fileUpload($file, 'product');


            $news_data['img'] = $path;
        }

        $new = Products::create($news_data);

        // if ($request->hasFile('multipleimg')) {
        //     $files = $request->file('multipleimg');

        //     foreach ($files as $file) {

        //         //上傳圖片
        //         $path = $this->fileUpload($file, 'product');
        //         //新增資料進DB
        //         //  $XXX = new ABC  這個變數"使用"ABC model
        //         $images = new News_img;
        //         $images->img_url = $path;
        //         $images->newid = $new->id;

        //         $images->save();

        //     }
        // }


        return redirect('/home/products');
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        // 方法一
        // find($id)找到id的資料
        // $news = News::find($id);
        // 針對單筆資料進行附值
        // $news->img = $request->img;
        // $news->title = $request->title;
        // $news->content = $request->content;
        // 儲存
        // $news->save();
        // 方法二
        //  $table = News::find($id);
        // //  update($request->all());
        // $requsetData=$request->all();
        // $news->update($requsetData);
        // News::find($id)->update($request->all());
        // return redirect('/home/news');
        // redirect跑完之後回到首頁(home/news)

        Products::find($id)->update($request->all());

        // 將請求來的資料做更新動作
        // 檢查是否有上傳新圖片  如果有找到舊有圖片並刪除
        // 在上新圖片
        // 再把更新過的資料 UPDATE

        // 請求來的資料

        // 取出舊有資料
        $old_product = Products::find($id);
        // dd( $old_product);
        $requsetData = $request->all();


        // 檢查是否有上傳主要圖片
        if ($request->hasFile('img')) {
            $old_image = $old_product->img;
            // 把新存的檔案路近 存進file      file()顯示檔案資訊
            $file = $request->file('img');
            // dd($file);
            //             fileUploda('新存檔案路徑',' 資料夾名稱')
            $path = $this->fileUpload($file, 'product');
            $requsetData['img'] = $path;
            File::delete(public_path() . $old_image);

            $old_product->img =   $requsetData['img'];
            $old_product->content =  $requsetData['content'];
            $old_product->sort =  $requsetData['sort'];
            $old_product->save();
        }

        // 更新資料  :先把舊資料拿出來 再把新資料塞進去
        // $old_news->update($requsetData);一次完成版



        return redirect('/home/products');
    }

    public function delete(Request $request, $id)
    {
        $products = Products::find($id);
        $old_img = $products->img;
        // dd($products);

        File::delete(public_path() . $old_img);

        $products->delete();

        // redirect帶值回route再回去ProductsController拿值回來
        return redirect('/home/products');

        // view直接顯示網址不帶值
        // return view('/home/products');
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
}
