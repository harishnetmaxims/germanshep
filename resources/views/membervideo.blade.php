@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>Member Videos</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a
                    href="memberdetail/{{ $vgalid }}">{{ $userdet->first_name }}</a>
        </div>
    </div>
</section>

<div class="blogsecton">
    <div class="container">
        <div class="blogitemdetail">
            <p></p>
        </div>
        <div class="blogitemdetail">
            @if($iNumVideos>0)
            <a href="playvideo/{{ $rowcat->indexer}}">
                <p>{{ $rowcat->title }} </p>
                <div class="imageset">
                    <img src="uploads/player_thumbs/{{ $rowcat->video_id }}.jpg" style="width:100%">
                </div>
                <p class="letright"><span>{{ $rowcat->channel }}</span></p>
            </a>
            @else
                <p>Video By This Member Not Found</p>
            @endif        
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