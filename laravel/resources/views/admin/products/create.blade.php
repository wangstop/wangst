@extends('/layouts/app');

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection


@section('content')



<div class="container">

    {{-- enctype="multipart/form-data"一種編碼方式for img --}}

    <form method="POST" action="/home/products/store"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="img">單張圖片上傳</label>
          <input type="file" class="form-control" id="img" name="img" required>
        </div>

        <div class="form-group">
            <label for="type_id">種類</label>
            <select name="type_id">
                @foreach ($product_type as $item)
            　<option value="{{$item->id}}">{{$item->types}}</option>

                @endforeach

                </select>
          </div>

        <div class="form-group">
            <label for="price">價錢</label>
            <input type="text" class="form-control" id="price" name="price" required>
          </div>

          <div class="form-group">
            <label for="title">名稱</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>


          <div class="form-group">
            <label for="content">內容</label>

            <input type="text" class="form-control" id="content" name="content" required>
          </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


  </div>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

<script>
            // $(document).ready(function() {
            //     $('#content').summernote({
            //         lang: 'ko-KR' // default: 'en-US'
            //     });
            //     });
</script>
@endsection
