@extends('FrontEnd.layouts.layouts')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Blog</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href={{route('Home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">

    <div class="container">

        <div class="row">

            @foreach($blogs as $blog)
            <div class="col-md-4 ftco-animate">

                <div class="blog-entry">

                    <a href="blog-single.html" class="block-20" ><img class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" src="{{asset("storage/".$blog->image)}}"
                                                                      class="img-responsive img-circle" alt="No Image Found" style="width:480px" >
                    </a>
                    <div class="text pt-3 pb-4 px-4">
                        <div class="meta">
                            <div><a href="#">{{$blog->created_at}}</a></div>
                        </div>
                        <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
                        <p class="clearfix">
                            <a href="{{route('Home')}}" class="float-left read">Read more</a>
                            <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                        </p>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
        {{$blogs->links()}}
{{--        <div class="row no-gutters my-5">--}}
{{--            <div class="col text-center">--}}
{{--                <div class="block-27">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">&lt;</a></li>--}}
{{--                        <li class="active"><span>1</span></li>--}}
{{--                        <li><a href="#">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li><a href="#">4</a></li>--}}
{{--                        <li><a href="#">5</a></li>--}}
{{--                        <li><a href="#">&gt;</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</section>

@endsection
