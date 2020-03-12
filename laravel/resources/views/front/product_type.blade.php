@extends('/layouts/nav')


@section('content')

  <section class="services1 cid-rSHipPxh3m" id="services1-5">
    <!---->

    <!---->
    <!--Overlay-->

    <!--Container-->
    <div class="container">
        <div class="row justify-content-center padding-top">
                @foreach ($product_data as $item)

            <div class="card col-12 col-md-6 p-3 col-lg-4  ">

                <div class="card-wrapper">
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-5">
                           {{$item->types}}
                        </h4>

                        <!--Btn-->
                        <div class="mbr-section-btn align-left">
                            <a href="/products" class="btn btn-warning-outline display-4">
                                $ 690
                            </a>
                        </div>
                    </div>
                </div>


            </div>
             @endforeach

        </div>
    </div>
</section>
@endsection


