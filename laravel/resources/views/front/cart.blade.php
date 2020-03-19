
@extends('layouts/nav')

@section('css')

@endsection
<style>

    .Cart {
    max-width: 800px;
    margin: 100px auto;
  }

  .Cart__header {
    display: grid;
    grid-template-columns: 3fr 1fr 1fr 1fr 1fr;
    grid-gap: 2px;
    margin-bottom: 2px;
  }

  .Cart__headerGrid {
    text-align: center;
    background: #f3f3f3;
  }

  .Cart__product {
    display: grid;
    grid-template-columns: 2fr 7fr 3fr 3fr 3fr 3fr;
    grid-gap: 2px;
    margin-bottom: 2px;
    height: 70px;
  }

  .Cart__productGrid {
    padding: 5px;
  }

  .Cart__productImg {
    background-image: url(https://fakeimg.pl/640x480/c0cfe8/?text=Img);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
  }

  .Cart__productTitle {
    overflow: hidden;
    line-height: 25px;
  }

  .Cart__productPrice,
  .Cart__productQuantity,
  .Cart__productTotal,
  .Cart__productDel {
    text-align: center;
    line-height: 60px;
  }

  @media screen and (max-width: 820px) {
    .Cart__header {
      display: none;
    }

    .Cart__product {
      box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, 0.5);
      margin-bottom: 10px;
      grid-template-rows: 1fr 1fr;
      grid-template-columns: 2fr 2fr 2fr 2fr 2fr 2fr 1fr;
      grid-template-areas:
        "img title title title title title del"
        "img price price quantity total total del";
    }

    .Cart__productImg {
      grid-area: img;
    }

    .Cart__productTitle {
      grid-area: title;
    }

    .Cart__productPrice,
    .Cart__productQuantity,
    .Cart__productTotal,
    .Cart__productDel {
      line-height: initial;
    }

    .Cart__productPrice {
      grid-area: price;
      text-align: right;
    }

    .Cart__productQuantity {
      grid-area: quantity;
      text-align: left;
    }

    .Cart__productQuantity::before {
      content: "x";
    }

    .Cart__productTotal {
      grid-area: total;
      text-align: right;
      color: red;
    }

    .Cart__productDel {
      grid-area: del;
      line-height: 60px;
      background: #ffc0cb26;
    }
  }

</style>

@section('content')


<section class="engine"><a href="">css templates</a>
</section><section class="features3 cid-rRF3umTBWU" id="features3-7">




    <div class="container">

        <div class="media-container-row ">
            <div class="Cart">

                <div class="Cart__header">
                  <div class="Cart__headerGrid">商品</div>
                  <div class="Cart__headerGrid">單價</div>
                  <div class="Cart__headerGrid">數量</div>
                  <div class="Cart__headerGrid">小計</div>
                  <div class="Cart__headerGrid">刪除</div>
                </div>

                @foreach ($items as $item)
                        @csrf
                    <div class="Cart__product" data-itemid="{{$item->id}}">
                        <div class="Cart__productGrid Cart__productImg"></div>
                            <div class="Cart__productGrid Cart__productTitle">
                                {{$item->name}}
                            </div>
                            <div class="Cart__productGrid Cart__productPrice price" data-itemid="{{$item->id}}">{{$item->price}}
                            </div>

                            <div class="Cart__productGrid Cart__productQuantity d-flex">

                            <button class="btn btn-info btn-sm btn-minus" data-itemid="{{$item->id}}">-</button>
                            <span class="qty" data-itemid="{{$item->id}}">{{$item->quantity}}</span>
                            <button class="btn btn-info btn-sm btn-plus" data-itemid="{{$item->id}}">+</button>

                            </div>


                            <div class="Cart__productGrid Cart__productTotal total" data-itemid="{{$item->id}}">{{$item->price * $item->quantity}}</div>
                            <button class="Cart__productGrid Cart__productDel btn btn-info btn-sm btn-del" data-itemid="{{$item->id}}">&times;</button>
                        </div>

                    @endforeach
                    <div class="text-right mt-3">
                            <a href="/cart_checkout" class="btn btn-sm btn-primary">前往結帳</a>

                    </div>


              </div>



        </div>
    </div>
</section>
@endsection


@section('js')

<script>
         // 表單認證
        //  ajax檢查方式 到網頁檢查->Network
        $.ajaxSetup({
            headers: {

            // 記得在nav.blade.php加  <meta name="csrf-token" content="{{ csrf_token() }}">

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // +-案件事件
        // 1.設定屬性並抓取id data-itemid="{{$item->id}}
        // 2.getAttribute('data-itemid') 抓id
        //itemid是抓到的id

        $('.btn-minus').click(function(){

            var itemid = this.getAttribute('data-itemid');

            $.ajax({
                method: 'POST',
                url: '/update_cart/'+itemid,
                // 傳物件去''/update_cart'+itemid
                data: {
                    quantity:-1,
                },
                success: function (res) {
                    // 搜尋jquery get data attribute selector

                    //搜尋jquery change value
                    // old_value為字串
                    // .text()在=右邊 :取得裡面的數值
                    var old_value = $(`.qty[data-itemid="${itemid}"`).text();
                    var new_value = Math.max(parseInt(old_value) -1,0);
                    // .text(new_value):宣告新的數值給他
                    $(`.qty[data-itemid="${itemid}"`).text(new_value);

                    // 總計
                    var price = $(`.price[data-itemid="${itemid}"`).text();

                    var old_total = $(`.total[data-itemid="${itemid}"`).text();

                    var new_total = Math.max(parseInt(old_total) - parseInt(price),0);

                    $(`.total[data-itemid="${itemid}"`).text(new_total);
                },

                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
        });

    })
        $('.btn-plus').click(function(){

            var itemid = this.getAttribute('data-itemid');

            $.ajax({
                method: 'POST',
                url: '/update_cart/'+itemid,
                data: {
                    quantity:1,
                },
                success: function (res) {
                    // 搜尋jquery get data attribute selector

                    //搜尋jquery change value
                    // old_value為字串
                    // .text()在=右邊 :取得裡面的數值
                    var old_value = $(`.qty[data-itemid="${itemid}"`).text();
                    var new_value = parseInt(old_value) +1;
                    // .text(new_value):宣告新的數值給他
                    $(`.qty[data-itemid="${itemid}"`).text(new_value);
                    // console.log(new_value);

                    // 總計
                    var price = $(`.price[data-itemid="${itemid}"`).text();

                    var old_total = $(`.total[data-itemid="${itemid}"`).text();

                    var new_total = Math.max(parseInt(old_total) + parseInt(price),0);

                    $(`.total[data-itemid="${itemid}"`).text(new_total);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
        });


    })

        $('.btn-del').click(function(){

            var itemid = this.getAttribute('data-itemid');

            var r=confirm("確定要將商品移除嗎?")

            $.ajax({
                method: 'POST',
                url: '/delete_cart/'+itemid,
                data: {},
                success: function (res) {
                    $(`.Cart__product[data-itemid=${itemid}]`).remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });


    })



</script>

@endsection
