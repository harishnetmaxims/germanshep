@extends('include.master')
@section('content')
<section class="headinner">
  <div class="container">
  <h3>{{ $sgaldet->channel_name }}</h3>
  <div class="breadcom">
    <a href="">Home</a><span> > </span> <a href="">{{ $sgaldet->channel_name }}</a>
  </div>
  </div>
</section>


<div class="blogsecton">
  <div class="container">
       <div class="blogitemdetail">
    <p>{{ $sgaldet->channel_description }}</p>
    </div>
    <div class="blogitemdetail">
  @foreach($resultcc as $rowcat)
  <a href="{{asset('videopage/'.$vgalid.'/'.$rowcat->sub_channel_id)}}">
  <p>{{ $rowcat->sub_channel_name }}</p>
  <div class="imageset">
		<img src="{{asset('addons/albums/thumbs/'.$rowcat->sub_channel_picture)}}" style="width:100%">
		</div>
   <p  class="letright"><span>{{ $rowcat->sub_channel_description }}</span></p>

  </a>
  @endforeach


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