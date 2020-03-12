@extends('/layouts/app');

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection


@section('content')



<div class="container">

    {{-- enctype="multipart/form-data"一種編碼方式for img --}}

    <form method="POST" action="/home/product_type/store"  enctype="multipart/form-data">
        @csrf
        <h1>飲品類型管理</h1>


        <div class="form-group">
          <label for="types">類型名稱</label>
          <input type="text" class="form-control" id="types" name="types" required>
        </div>

        <div class="form-group">
            <label for="sort">權重</label>
            <input type="text" class="form-control" id="sort" name="sort" required >
          </div>


        <button type="submit" class="btn btn-primary">新增</button>
      </form>

  </div>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

<script>

// $(document).ready(function() {
//                 $('#content').summernote({
//                     lang: 'ko-KR' // default: 'en-US'
//                 });
//                 });
</script>
@endsection
