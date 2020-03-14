@extends('/layouts/app');

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

<style>

.box{
    position: absolute;
    right: 0px;
    top: 0px;
}

</style>

@endsection


@section('content')


<div class="container">

    <form method="POST" action="/admin/products/update/{{$products->id}}" enctype="multipart/form-data">

        <h1>編輯訊息</h1>

        @csrf
        <div class="form-group" >
          <label for="img">現有圖片</label>
        <img src="{{$products->img}}" alt="" srcset="" class="img-fluid" width="100px" >
        <input type="file" class="form-control" id="img" name="img" >
        </div>



        <div class="form-group">
            <label for="type_id">Title</label>
            <select name="type_id">
                @foreach ($product_types as $items)
                    @if($items->id == $products->type_id)
            　<option value="{{$items->id}}" selected>{{$items->types}}</option>

                    @else

                    　<option value="{{$items->id}}" >{{$items->types}}</option>

                    @endif

                @endforeach

                </select>
        </div>

        <div class="form-group">
            <label for="price">價錢</label>
            <input type="text" class="form-control" id="price" name="price" value="{{$products->price}}">
          </div>

          <div class="form-group">
            <label for="sort">權重(數字越大越前面)</label>
            <input type="number" class="form-control" id="sort" name="sort" value="{{$products->sort}}">
          </div>


          <div class="form-group">
            <label for="content">Content</label>
          <input type="text" class="form-control" id="content" name="content" value="{{$products->content}}">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

  </div>


@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

<script>

        //     // 表單認證
        //     $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });


        // $('.card-img .btn-danger').click(function(){

        //     // 點擊的id
        //     var nameid=this.getAttribute('datanewingid');


        //     $.ajax({

        //         // 送出的路徑
        //           url: "/admin/news/ajax",
        //         //   方法 預設get
        //           method: 'post',

        //         //  點擊抓到的id
        //           data: {
        //             nameid:nameid,
        //           },

        //           success: function(result){
        //             $(`.col-2[datanewingid=${nameid}]`).remove();

        //             // console.log(result);

        //           }});

        //     });


        //     function ajax_post_sort(element,img_id){

        //         // console.log(element.value);
        //         var sort = element.value;

        //         $.ajax({

        //             // 送出的路徑
        //             url: "/home/ajax_post_sort",
        //             //   方法 預設get
        //             method: 'post',

        //             //  點擊抓到的id
        //             data: {
        //                 id:img_id,
        //                 sort:sort,
        //             },

        //             success: function(result){
        //                 console.log(result);

        //             }

        //         });


        //     }

            // $(document).ready(function() {
            //     $('#content').summernote({
            //         lang: 'ko-KR' // default: 'en-US'
            //     });
            //     });

</script>

@endsection
