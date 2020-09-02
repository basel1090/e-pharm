@extends('FrontEnd.layouts.layouts')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('Home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="ftco-search">
            <div class="row">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php $i=0; ?>
                        @foreach($categories as $category)
                            <a class="nav-link ftco-animate {{$i++==0?'active':''}}" id="v-pills-{{$category->id}}-tab" data-toggle="pill" href="#v-pills-{{$category->id}}" role="tab" aria-controls="v-pills-{{$category->id}}" aria-selected="true">{{$category->title}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">
                    <?php $i=0; ?>
                    @foreach($categories as $category)
                        <div class="tab-pane fade {{$i++==0?' show active':''}}" id="v-pills-{{$category->id}}" role="tabpanel" aria-labelledby="day-{{$category->id}}-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                @foreach($category->product as $product)
                                <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                    <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                        <div class="menu-img img">
                                            <img class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" src="{{asset("storage/".$product->image)}}"
                                                 class="img-responsive img-circle" alt="No Image Found"  >
                                        </div>
                                        <div class="text d-flex align-items-center">
                                            <div>
                                                <div class="d-flex">
                                                    <div class="one-half">
                                                        <h3>{{$product->title}}</h3>
                                                    </div>
                                                    <div class="one-forth">
                                                        <span class="price">{{$product->new_price}}</span>
                                                    </div>
                                                </div>
                                                <p><span>{{$product->description}}</span></p>
                                                <p><a href="{{route('Home')}}" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
