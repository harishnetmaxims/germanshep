@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images/85.jpg')}}) 50% 0;">
    <div class="container">
        <h3> {{ $gal->gallery_name }} Detail</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">
               {{ $gal->gallery_name }} Detail</a>
        </div>
    </div>
</section>

<section class="showdetail">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-6 col-xs-12 ">
                <div class="leftconta">
                    <div class="carousel-container">

                        <!-- Sorry! Lightbox doesn't work - yet. -->

                        <div id="" class="slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="toheadimg">
                                    
                                    @if (empty($imgdetail->image_id))
                                        <img src="{{asset('addons/albums/images/'. $sinimgdet->image_id)}}"
                                         class="d-block w-100" alt="..."
                                         data-remote="{{asset('addons/albums/thumbs/'. $sinimgdet->image_id)}}"
                                         data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                    @else
                                        <img src="{{asset('addons/albums/images/'.$imgdetail->image_id)}}"
                                             class="d-block w-100" alt="..."
                                             data-remote="{{asset('addons/albums/thumbs/'.$imgdetail->image_id)}}"
                                             data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                    @endif
                                </div>


                            </div>
                        </div>

                        <!-- Carousel Navigation -->
                        <div id="" class="topthumbs slide">
                             @foreach($resultcc as $rowcat)   
                            <div class="thumb" data-slide-to="0">
                                <a href="{{asset('galdetail/'.$gal->gallery_id.'/'.$rowcat->indexer)}}">
                                    <img style="height:44px;" src="{{asset('addons/albums/images/'.$rowcat->image_id)}}" class="img-fluid" alt="..."></a>
                            </div>
                            @endforeach
                        </div>


                    </div> <!-- /row -->
                    <div class="optionset">

                        <div id="comments" class="comments-area xs-comments-area">
                            <h4 class="comments-title">Comments</h4>
                            <ul class="comments-list">


                                        <li class="comment" style="min-height:150px;">
                                            <span class="comment-date"
                                                  style="font-size:11px;font-style:italic;"></span><br/>

                                        </li>

                            </ul>
                        </div>

                        <div id="respond" class="comment-respond">
                            <form action="function/img-comment.php" method="POST" class="xs-form" id="comment-form">

                                <h4 class="comment-reply-title">Leave a comment</h4>
                                <div class="row">

                                </div>
                                <textarea name="comments" placeholder="Comments" class="form-control message-box"
                                          cols="30" rows="10"></textarea>
                                <p class="form-submit">
                                    <input name="post-comment" type="submit" class="xs-btn" value="LEAVE COMMENT">
                                </p>

                            </form>
                        </div>
                    </div>

                </div> <!-- /container -->
            </div>

            <div class="col-lg-4 col-xs-12">
                <div class="rightshow">
                    <h3>Browse Images</h3>
                    <ul>
                        <li>
                            <a href="{{asset('gallery')}}">All Gallery</a>
                        </li>
                        <li>
                            <a href="{{asset('manage-images')}}">Your Images</a>
                        </li>
                    </ul>
                </div>
                <div class="rightshow overflow">
                    <h3>Gallery</h3>
                    <ul class="overhid">
                        @foreach($gallery as $row)
                        <li><a href="{{asset('galdetail/'.$row->gallery_id)}}">{{ $row->gallery_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
    </div>
</section>
@include('include.newsletter-form')
@endsection
