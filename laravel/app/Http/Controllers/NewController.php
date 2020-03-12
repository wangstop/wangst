<?php

namespace App\Http\Controllers;

use App\News;
use App\News_img;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class NewController extends Controller
{
    public function index()
    {

        $all_news = News::all();
        // dd($all_news);
        return view('/admin/news/index', compact('all_news'));
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
            $path = $this->fileUpload($file, 'news');


            $news_data['img'] = $path;
        }

        $new = News::create($news_data);

        if ($request->hasFile('multipleimg')) {
            $files = $request->file('multipleimg');

            foreach ($files as $file) {

                //上傳圖片
                $path = $this->fileUpload($file, 'news');
                //新增資料進DB
                //  $XXX = new ABC  這個變數"使用"ABC model
                $images = new News_img;
                $images->img_url = $path;
                $images->newid = $new->id;

                $images->save();

                // $product_img = new ProductImg;
                // $product_img->product_id = $new_product_id;
                // $product_img->img = $path;
                // $product_img->save();
            }
        }



        // 把NEWS的ID取得 使用foreach 判斷要存幾張圖片 再把newid存成NES的ID




        // if($request->hasFile('multipleimg'))
        // {
        //     $files = $request->file('multipleimg');

        //     foreach ($files as $file) {
        //         //上傳圖片
        //         $path = $this->fileUpload($file,'product_imgs');
        //         //新增資料進DB
        //         $product_img = new News_img;
        //         $product_img->product_id = $new_product_id;
        //         $product_img->img = $path;
        //         $product_img->save();
        //     }
        // }


        return redirect('/home/news');
    }


    public function create()
    {
        return view('/admin/news/create');
    }



    public function edit($id)
    {
        // 呼叫需要修改指定的那筆資料
        // 呼叫需要修改指定
        $news = News::with('img_data')->find($id);



        // 回傳資料
        // dd($news);
        return view('/admin/news/edit', compact('news'));
        // compactv攜帶news到(admin/news/edit)網址
    }



    // $request提交的所有資料
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

        News::find($id)->update($request->all());

        // 將請求來的資料做更新動作
        // 檢查是否有上傳新圖片  如果有找到舊有圖片並刪除
        // 在上新圖片
        // 再把更新過的資料 UPDATE

        // 請求來的資料

        // 取出舊有資料
        $old_news = News::find($id);
        // dd( $old_news);
        $requsetData = $request->all();

        // dd($requsetData);

        // 當收到內文照片時， 將照片存回資料庫
        if ($request->hasFile('multipleimg')) {
            $files = $request->file('multipleimg');
            // dd($files);

            foreach ($files as $file) {

                //上傳圖片
                $path = $this->fileUpload($file, 'news');
                // dd($path);
                //新增資料進DB

                // 用$images代表使用 News_img這個model
                $images = new News_img;
                // dd($images);
                $images->img_url = $path;
                $images->newid =  $old_news['id'];
                $images->save();

                // $product_img = new ProductImg;
                // $product_img->product_id = $new_product_id;
                // $product_img->img = $path;
                // $product_img->save();

                // view:顯示畫面 controller model
            }
        }

        // 檢查是否有上傳主要圖片
        if ($request->hasFile('img')) {
            $old_image = $old_news->img;
            // 把新存的檔案路近 存進file      file()顯示檔案資訊
            $file = $request->file('img');
            // dd($file);
            //             fileUploda('新存檔案路徑',' 資料夾名稱')
            $path = $this->fileUpload($file, 'news');
            $requsetData['img'] = $path;
            File::delete(public_path() . $old_image);

            $old_news->img =   $requsetData['img'];
            $old_news->title =  $requsetData['title'];
            $old_news->content =  $requsetData['content'];
            $old_news->sort =  $requsetData['sort'];
            $old_news->save();
        }

        // 更新資料  :先把舊資料拿出來 再把新資料塞進去
        // $old_news->update($requsetData);一次完成版




        return redirect('/home/news');
    }


    public function delete(Request $request, $id)
    {


        $news = News::find($id);

        //   dd($news);
        $old_img = $news['img'];

        // 先刪除laravel裡面圖片的資料
        File::delete(public_path() . $old_img);

        // 再刪除資料庫的資料
        $news->delete();

        // 找到News的id並對News_img的id做刪除

        // 獲得News_img符合id的newid欄位
        $items = News_img::where('newid', $id)->get();

        // dd($items);


        foreach ($items as $item) {

            $old_item = $item->img_url;
            // dd($old_item);
            File::delete(public_path() . $old_item);
            $item->delete();
        }






        return redirect('/home/news');
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

    public function ajax_post_sort(Request $request){
    //     // 請求過來的東西是物件

        $new_id = $request->id;

        $new_sort = $request->sort;
        // dd($new_sort);
        $img = News_img::find($new_id);

        $img->sort =  $new_sort;

        $img->save();

        return ;
    }

}
