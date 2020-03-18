
@extends('layouts/nav')

@section('css')

@endsection
<style>

    .Cart {
    width: 100%;
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

                            <span class="qty" data-itemid="{{$item->id}}">{{$item->quantity}}</span>
                            </div>

                            <div class="Cart__productGrid Cart__productTotal total" data-itemid="{{$item->id}}">{{$item->price * $item->quantity}}</div>

                        </div>

                        @endforeach

                        <div class="text-right">
                         {{-- {{加兩個大括弧可以寫PHP}} --}}
                        總計:{{\Cart::getTotal()}}<br />
                        運費:@if(\Cart::getTotal()>1000) 免運費 @else $120 @endif

                        </div>
                        <div class="container">
                            <form method="POST" action="/cart_checkout_end">
                                @csrf
                                <div class="form-group row">
                                    <label for="Recipient_name" class="col-sm-2 col-form-label">收件人名稱</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Recipient_name" name="Recipient_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Recipient_phone" class="col-sm-2 col-form-label">收件人電話</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Recipient_phone" name="Recipient_phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Recipient_address" class="col-sm-2 col-form-label">收件人地址</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Recipient_address" name="Recipient_address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipment_time" class="col-sm-2 col-form-label">送貨時間</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="shipment_time" name="shipment_time">
                                    </div>
                                </div>

                                <button class="btn btn-sm btn-primary">成立訂單，並前往付款</button>
                            </form>
                        </div>



              </div>

        </div>
    </div>
</section>
@endsection


@section('js')
<script>


</script>

@endsection
