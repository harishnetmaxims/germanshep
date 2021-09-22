@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>All Video</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span><a href="">
                @if(!empty($sgaldet->channel_name)) 
                    {{ $sgaldet->channel_name }}
                @endif    
                </a>
        </div>
    </div>
</section>


<div class="blogsecton">
    <div class="container">
        <div class="blogitemdetail">
            @if(!empty($sgaldet->channel_name)) 
            <p>{{ $sgaldet->channel_description }}</p>
            @endif
        </div>
        <div class="blogitemdetail">

            @foreach($resultcc as $rowcat)
            <a href="{{asset('playvideo/'.$rowcat->indexer)}}">
                <p>{{ $rowcat->title }}</p>
                <div class="imageset">
                    <img class="height165" src="{{asset('uploads/player_thumbs/'.$rowcat->video_id.'.jpg')}}"
                         style="width:100%">
                </div>
                <p class="letright"><span>{{ $rowcat->channel }}</span></p>
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

