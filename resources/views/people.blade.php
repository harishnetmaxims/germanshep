@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images/83.jpg')}}) 50% 0;">
    <div class="container">
        <h3>People</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Sign Up</a>
        </div>
    </div>
</section>

<section class="people padding">
    <div class="container">
        <div class="searchmem">
            <h3>Browse All Members</h3>

            <div class="row">
                
                <div class="col-lg-12 col-xs-12">
                    <div class="peoplephp row">
                      @foreach($people as $row)
                      <div class="useradminpeople col-lg-2 col-sm-3 col-xs-12">
                          <div class="imageset">
                              <a href="{{asset('memberdetail/'.$row->user_id)}}"
                                 title="{{ $row->first_name }} {{ $row->last_name }}">
                                  @if (empty($row->image_pro))
                                      <img src="{{asset('addons/albums/images/User_Circle.png')}}"
                                           alt="{{ $row->first_name }} {{ $row->last_name }}">
                                  @else
                                      <img src="{{asset('images/'.$row->image_pro)}}"
                                           alt="{{ $row->first_name }} {{ $row->last_name }}">
                                  @endif
                              </a>
                          </div>

                          <div class="admintile">
                              <a href="{{asset('memberdetail/'.$row->user_id)}}"> {{ $row->first_name }} {{ $row->last_name }} </a><a
                                      href="{{asset('membervideo/'.$row->user_id)}}" style="">Video--></a>
                          </div>
                      </div>
                      @endforeach  
                        <ul class="pagination">
                          {{ $people->links() }}
                        </ul>

                    </div>
                </div>


            </div>

        </div>
    </div>
</section>

@include('include.newsletter-form')
@endsection
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