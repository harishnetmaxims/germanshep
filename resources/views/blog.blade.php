@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images/80.jpg')}}) 50% 0;">
    <div class="container">
        <h3>Blog</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Blog</a>
        </div>
    </div>
</section>
<div class="blogsecton">
    <div class="container">

        <div class="blogitem">



                    <a href="blogcat.php?blogcat_id=">
                        <div class="imageset">
                                <img src="{{asset('images/8.png')}}" style="height:300px;width:300px;">
                        </div>
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

@include('include.newsletter-form')
@endsection