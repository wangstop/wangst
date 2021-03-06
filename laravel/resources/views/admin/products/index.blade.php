@extends('/layouts/app');


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection






@section('content')

<div class="container ">
<a href="/admin/products/create" class="btn btn-success">新增飲品</a>

<br />

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>圖片</th>
                <th>飲品類型</th>
                <th>飲品名稱</th>
                <th>價錢</th>
                <th>權重</th>
                <th>內容</th>
                <th>功能</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($product as $item)
            <tr>
                <td>
                    <img width="200" src="{{($item->img)}}" alt="">
                </td>
                <td>{{$item->drink->types}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->sort}}</td>
                <td>{{$item->content}}</td>

                <td>
                <a href="/admin/products/edit/{{$item->id}}" class="btn btn-success ">修改</a>
                    <button class="btn btn-danger "onclick="disp_confirm({{$item->id}})">刪除</button>
                    <form id="logout-form-{{$item->id}}" action="/admin/products/delete/{{$item->id}}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

   </table>



  </div>



@endsection


@section('js')


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">


</script>

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">


</script>

<script>


$(document).ready(function() {
    $('#example').DataTable({
    "order": [[ 3, 'desc' ]]
    // 權重排序0是針對誰去調desc大排到小
} );
} );


function disp_confirm(id)
  {
      console.log(id);
  var r=confirm("你確定要刪除嗎")
  if (r==true)
    {
    document.getElementById(`logout-form-${id}`).submit();
    }

  }

</script>

@endsection
