
@extends('layouts/nav')

@section('css')
<link rel="stylesheet" href="./resources/css/cart_style>

@endsection


@section('content')

<section class="features3 cid-rRF3umTBWU" id="features3-7">

    <div class="container">

        <div class="Cart">
            <div class="Cart__header">
              <div class="Cart__headerGrid">商品</div>
              <div class="Cart__headerGrid">單價</div>
              <div class="Cart__headerGrid">數量</div>
              <div class="Cart__headerGrid">小計</div>
              <div class="Cart__headerGrid">刪除</div>
            </div>
            <div class="Cart__product">
              <div class="Cart__productGrid Cart__productImg"></div>
              <div class="Cart__productGrid Cart__productTitle">
                DELL 戴爾 U3417W 34型 21:9 WQHD IPS曲面液晶螢幕《原廠三年保固》
              </div>
              <div class="Cart__productGrid Cart__productPrice">$32,500</div>
              <div class="Cart__productGrid Cart__productQuantity">2</div>
              <div class="Cart__productGrid Cart__productTotal">$65,000</div>
              <div class="Cart__productGrid Cart__productDel">&times;</div>
            </div>
            <div class="Cart__product">
              <div class="Cart__productGrid Cart__productImg"></div>
              <div class="Cart__productGrid Cart__productTitle">
                【日本原裝 AS 快眠枕】空運 日本 樂天寢具纇 10周銷售第一 枕邊人 睡眠
                安眠 舒眠 人體工學 枕頭 【水貨碼頭】
              </div>
              <div class="Cart__productGrid Cart__productPrice">$2,680</div>
              <div class="Cart__productGrid Cart__productQuantity">1</div>
              <div class="Cart__productGrid Cart__productTotal">$2,680</div>
              <div class="Cart__productGrid Cart__productDel">&times;</div>
            </div>
          </div>

    </div>

</section>
@endsection

@section('js')
<script>

</script>

@endsection
