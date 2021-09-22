@extends('include.master')
@section('content')

<section class="headinner">
    <div class="container">
        <h3>Video</h3>
        <div class="breadcom">
            <a href="">Home</a><span> >  {{ $userdet->first_name }}</span>
        </div>
    </div>
</section>


<section class="showdetail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <div class="leftconta">
                    <div class="carousel-container">

                        <!-- Sorry! Lightbox doesn't work - yet. -->

                        <div id="" class="slide" data-ride="carousel">
                            <div class="carousel-inner">


                                <div class="videadimg">
                                   
                                    
                                </div>
                                <div class="descript">
                                    @if(!empty($sgaldet->title))
                                    <h3>{{ $sgaldet->title }}</h3>
                                    @endif
                                    @if(!empty($sgaldet->description))
                                    <p>{{ $sgaldet->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div> <!-- /row -->
                    <form action="" method="post">
                        <div class="member_info">
                            <div>
                                <h4 class="display_name">{{ $userdet->first_name }}{{ $userdet->last_name }}</h4>
                            </div>
                            <div id="Ajax-Aboutme">
                                <ul>
                                    <li><strong>Address:</strong> <span>{{ $userdet->address }}</span></li>
                                    <li><strong>Directions:</strong> <span>{{ $userdet->directions }}</span>
                                    </li>
                                    <li><strong>City:</strong> <span>{{ $userdet->current_city }}</span></li>
                                    <li><strong>State:</strong> <span>{{ $userdet->state }}</span></li>
                                    <li><strong>Zip Code:</strong> <span>{{ $userdet->zip_code }}</span></li>
                                    <li><strong>Country:</strong> <span>{{ $userdet->country }}</span></li>
                                </ul>

                                <ul style="border-right: none;">
                                    <li><strong>Established Date:</strong>
                                        <span>{{ $userdet->established }}</span></li>
                                    <li><strong>Operating Hours:</strong> <span>{{ $userdet->hours }}</span>
                                    </li>
                                    <li><strong>Work Telephone:</strong>
                                        <span>{{ $userdet->work_tel }}</span></li>
                                    <li><strong>Cell Telephone:</strong>
                                        <span>{{ $userdet->cell_tel }}</span></li>
                                    <li><strong>Our Website:</strong> <span><a
                                                    href="{{ $userdet->personal_website }}" target="_blank">Click here</a></span>
                                    </li>
                                    <li><strong>Email:</strong> <span>{{ $userdet->email_address }}</span>
                                    </li>
                                    <li><strong>Title:</strong> <span>{{ $userdet->account_type }}</span>
                                    </li>
                                </ul>
                            </div>


                        </div>


                        <div class="member_info">
                            <div><h4 class="display_name">About us</h4></div>
                            <div id="Ajax-Aboutme">
                                {{ $userdet->about_me }}
                            </div>


                        </div>
                    </form>
                </div> <!-- /container -->
            </div>

            <div class="col-lg-4 col-xs-12">
                <div class="userright">
                    <div class="rigtshap">
                        <h3>Upload</h3>
                        <a href="{{asset('membervideo/'.$id)}}">Videos ({{ $iNumVideos }}) </a><span>|</span> <a
                                href="{{asset('gallery')}}">Pictures ({{ $iNumImg }})</a>
                    </div>
                    <div class="related_media">


                        <div id="Ajax-Media">
                            <div style="float:left;">

                                


                            </div>

                        </div>

                        <div class="clear-fix"></div>

                    </div>

                </div>
            </div>


        </div>
    </div>
</section>

<script type="text/javascript">
  $('#myCarousel').carousel({
    interval: false
  });
  $('#carousel-thumbs').carousel({
    interval: false
  });

  // handles the carousel thumbnails
  // https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
  $('[id^=carousel-selector-]').click(function () {
    var id_selector = $(this).attr('id');
    var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
    $('#myCarousel').carousel(id);
  });
  // when the carousel slides, auto update
  $('#myCarousel').on('slide.bs.carousel', function (e) {
    var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-' + id + ']').addClass('selected');
  });
  // when user swipes, go next or previous
  $('#myCarousel').swipe({
    fallbackToMouseEvents: true,
    swipeLeft: function (e) {
      $('#myCarousel').carousel('next');
    },
    swipeRight: function (e) {
      $('#myCarousel').carousel('prev');
    },
    allowPageScroll: 'vertical',
    preventDefaultEvents: false,
    threshold: 75
  });
  /*
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
  */

  $('#myCarousel .carousel-item img').on('click', function (e) {
    var src = $(e.target).attr('data-remote');
    if (src) $(this).ekkoLightbox();
  });
</script>
@include('include.newsletter-form')
@endsection

