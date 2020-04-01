
@extends('layouts/nav')

@section('css')
<style>

    .pt{
        padding-top: 100px
    }
</style>

@endsection
@section('content')
<section class="engine"><a href="https://mobirise.info/x">css templates</a></section><section class="features3 cid-rRF3umTBWU" id="features3-7">




    <div class="container pt" style="padding-top:200px">
        <div class="media-container-row ">

            @foreach ($news_data as $item)
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="{{$item->img}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            {{$item->title}}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {!!$item->content!!}
                        </p>
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a href="front/news_inner/{{$item->id}}" class="btn btn-primary display-4">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
@endsection

@section('js')

<script>
    $('.card-box *').attr('style','');

</script>

@endsection

