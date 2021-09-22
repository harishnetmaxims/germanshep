@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images/82.jpg')}}) 50% 0;">
    <div class="container">
            <div align="center" style="padding-bottom:10px;"></div>
        <h3>Video Gallery</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Video</a>
        </div>
    </div>
</section>
<div class="blogsecton">
    <div class="container">

        <div class="blogitem">
            @foreach($video as $row)    
            <a href="video-subgallery/{{ $row->channel_id }}">
                <div class="imageset">
                    @if (empty($row->channel_picture)) 
                        <img style="" src="{{asset('images/8.png')}}">
                    @else
                        <img style="" src="addons/albums/thumbs/{{ $row->channel_picture}}">
                    @endif
                </div>
                <p>{{ $row->channel_name }}</p>
            </a>
            @endforeach
            <ul class="pagination">
                {{ $video->links() }}
            </ul>
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