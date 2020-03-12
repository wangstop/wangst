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

    <form method="POST" action="/admin/product_type/update/{{$products->id}}" enctype="multipart/form-data">

        <h1>編輯訊息</h1>

        @csrf
        {{-- <div class="form-group" >
          <label for="img">現有圖片</label>
        <img src="{{$news->img}}" alt="" srcset="" class="img-fluid" width="100px" >
        <input type="file" class="form-control" id="img" name="img" >
        </div>


        <div class="form-group">

            <label for="img">多張圖片修改</label>
            <input type="file" class="form-control" id="multipleimg" name="multipleimg[]"  multiple>

            <div class="row ">

                 @foreach ($news->img_data as $item)

                    <div class="col-2 " datanewingid="{{$item->id}}">
                        <div class="card-img " >
                            <button type="button" class="box btn btn-danger" datanewingid="{{$item->id}}">X</button>

                            <img src="{{$item->img_url}}" alt="" class="img-fluid" width="100%">
                            <input type="number" class="form-control " id="sort" name="sort" value="{{$item->sort}}" onchange ="ajax_post_sort(this,{{$item->id}})">
                        </div>
                     </div>

                    @endforeach
              </div>
       </div> --}}



        <div class="form-group">
            <label for="title">飲品類型</label>
            <input type="text" class="form-control" id="types" name="types" value="{{$products->types}}">
          </div>

          <div class="form-group">
            <label for="sort">權重(數字越大越前面)</label>
            <input type="number" class="form-control" id="sort" name="sort" value="{{$products->sort}}">
          </div>


          {{-- <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" class="form-control" id="content" name="content" value="{{$news->title}}"></textarea>
          </div> --}}

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

  </div>


@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

<script>

            // 表單認證
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.card-img .btn-danger').click(function(){

            // 點擊的id
            var nameid=this.getAttribute('datanewingid');


            $.ajax({

                // 送出的路徑
                  url: "/admin/news/ajax",
                //   方法 預設get
                  method: 'post',

                //  點擊抓到的id
                  data: {
                    nameid:nameid,
                  },

                  success: function(result){
                    $(`.col-2[datanewingid=${nameid}]`).remove();

                    // console.log(result);

                  }});

            });


            function ajax_post_sort(element,img_id){

                // console.log(element.value);
                var sort = element.value;

                $.ajax({

                    // 送出的路徑
                    url: "/home/ajax_post_sort",
                    //   方法 預設get
                    method: 'post',

                    //  點擊抓到的id
                    data: {
                        id:img_id,
                        sort:sort,
                    },

                    success: function(result){
                        console.log(result);

                    }

                });


            }

            $(document).ready(function() {
                $('#content').summernote({
                    lang: 'ko-KR' // default: 'en-US'
                });
                });

</script>

@endsection
