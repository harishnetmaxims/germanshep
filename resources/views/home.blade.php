@extends('include.master')
@section('content')
<div class="mainslider">
    <div id="homeslider" class="owl-carousel">
        <!--Carousel Wrapper-->
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>

            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                        <img class="d-block w-100" src="{{asset('images/banner.png')}}"
                             alt="First slide">
                        <div class="mask rgba-black-light"></div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="view">
                        <img class="d-block w-100" src="{{asset('images/banner2.png')}}"
                             alt="First slide">
                        <div class="mask rgba-black-light"></div>
                    </div>

                </div>

            </div>


            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->
    </div>
</div>

<section class="dg-back"
         style="background-image: url({{asset('images/bg-img.jpg')}}); background-repeat: no-repeat; background-size: cover;margin-top: -180px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 abt-manag">
                <div class="empty"></div>
                <h1>About home</h1>
                <p>German Shepherd breeders for your German shepherd puppies selection, German shepherd puppies for sale and German shepherd dogs for sale magazine, exclusively for the German shepherd breeders, German shepherd kennel and the German shepherd enthusiasts. If you are looking for German Shepherd puppies, German Shepherd Puppies For Sale, German Shepherd Puppy For Sale and naturally German shepherd dogs for sale we have it right here from top German Shepherd dog breeders around the world.</p>

                <a href="page.php?page=1">
                    <button>Read More</button>
                </a>
            </div>
            <div class="col-md-6 dg-pad">
                <img src="{{asset('images/dg-image.png')}}" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="Breed">
            <h2>Breeders</h2>
            <p>German Shepherd breeders for your German shepherd puppies selection, German shepherd puppies for sale and German shepherd dogs for sale magazine, exclusively for the German shepherd breeders, German shepherd kennel and the German shepherd.</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section class="customer-logos slider">

                    @foreach ($todoArr as $todo)
                    @if ($todo->gallery_id=='1')
                        <div class="slide">
                            <div class="dogslide">
                                <a href="{{$todo->indexer}}">
                                    <img style="height:200px;"
                                        src="public/addons/albums/images/{{$todo->image_id}}">
                                </a>
                                    {{-- <h4 class="text-light">{{$todo->image_id}}</h4> --}}
                            <div class="hovershow">
                                    <span>{{$todo->description}}</span>
                        </div>
            </div>
        </div>
                    @endif
                    @endforeach


                </section>
            </div>
        </div>
    </div>

    <div class="wrapperclass">
        <div class="row m-0">
            <div class="col-md-6 pdn">
                <a href="gallery.php">
                    <div class="middleboard" style="background-image: url({{asset('images/dog-6-bg1.jpg')}});">
                        <div class="textmidle">
                            <h2>Check Our Gallery</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 pdn">
                <a href="video-gallery.php">
                    <div class="middleboard" style="background-image: url({{asset('images/dog-6-bg2.jpg')}});">
                        <div class="textmidle">
                            <h2>Check Our Videos</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="breeders">
        <div class="row m-0">
            <div class="col-md-6 col-sm-6 col-xs-12 pdn">
                <div class="leftdog" style="background-image:url({{asset('images/german-shepherd.png')}});">

                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="breader abt-manag">
                    <div class="empty"></div>
                    <h1>Prefereed Dog Breeder</h1>
                    <p>Our well established, high traffic German shepherd dogs and German Shepherd puppies online classifieds are the perfect place to advertise your German Shepherd puppies and German Shepherd dogs for sale. We receive over 1,000.000 (1 Million) hits per month and literally hundreds of people reply to the German shepherd puppies for sale classifieds. If you are a German Shepherd breeder and would like to generate sales, leads or simply recognized on the German Shepherd dogs online magazine</p>

                    <button><a href="breeders.php" style="color:#fff">Read More</a></button>
                </div>
            </div>
        </div>
    </div>

    <div class="galmaster">
        <div class="container">
            <div class="imgcenterdor">
                <img src="public/images_1/blacktend.png">
            </div>
            <div class="galmaster">


                <a href="pdgdetail.php?pdgid=&pdgcat=">

                        <img src="addons/albums/thumbs/none.gif" style="max-height:175px;">
                    <p></p>
                </a>


        </div>
            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>

        </div>
    </div>

</section>
@include('include.newsletter-form')
@endsection
