@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images/86.jpg')}}) 50% 0;">
    <div class="container">
        <h3>Image Gallery</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Gallery</a>
        </div>
    </div>
</section>
<div class="blogsecton">
    <div class="container">
        <div class="blogitem">
            @foreach($gallery as $row)    
            <a href="galdetail/{{ $row->gallery_id }}">
                <div class="imageset">
                @if (empty($row->gallery_picture))
                    <img style="" class="height165" src="{{asset('images/8.png')}}">
                @else
                    <img class="height165" src="{{asset('addons/albums/images').'/'.$row->gallery_picture}}"
                         style="width:100%;">
                @endif
                    
                </div>
                <p>{{ $row->gallery_name }}</p>
            </a>
            @endforeach
            <ul class="pagination">
                {{ $gallery->links() }}
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
