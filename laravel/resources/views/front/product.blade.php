

@extends('/layouts/nav')
@section('css')
<style>

.padding-top{
        padding-top: 100px
    }

</style>

@endsection

@section('content')

  <section class="services1 cid-rSHipPxh3m" id="services1-5">
    <!---->

    <!---->
    <!--Overlay-->

    <!--Container-->
    <div class="container">
        <div class="row justify-content-center padding-top">



                @foreach ($products as $item)

                <div class="card col-12 col-md-6 p-3 col-lg-4 ">

                    <div class="card-wrapper">
                        <div class="card-img">
                            <img src="{{$item->img}}" alt="Mobirise">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-5">
                                {{$item->title}}
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                {{$item->content}}
                            </p>
                            <!--Btn-->
                            <div class="mbr-section-btn align-left">
                                <a href="https://mobirise.co" class="btn btn-warning-outline display-4">
                                    $ 790
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


