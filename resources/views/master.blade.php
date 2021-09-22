<!DOCTYPE html>
<html>
<head>
    <META HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
    <title>German Shepherd</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/blueimp-gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/blueimp-gallery-indicator.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Including our scripting file. -->
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <link rel="stylesheet"
          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css"/>

</head>
<body>
<header class="headertop">
    <div class="container">
        <div class="toban">
            <a href="pedigree">PEDIGREE</a><span>|</span>
            <a href="video-gallery">VIDEO</a><span>|</span>
            <a href="people">MEMBER</a><span>|</span>
            <a href="breeders">BREEDER</a><span>|</span>
            <a href="gallery">IMAGES</a>
        </div>
        <div class="upload dropdown">
            <a href="#"><i class="fa fa-upload" aria-hidden="true"></i> UPLOAD</a>
            <div class="dropdown-content">
                <a href="addblog">ADD BLOG</a>
                <a href="uploadimg">ADD IMAGES</a>
                <a href="addpedigry">ADD PADEGREE</a>
                <a href="addvideo">ADD VIDEO</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">



            <a class="navbar-brand" href="index">
                    German Shepherd Kennel Club

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="advertise">Advertise</a>
                    </li>
                    @if(session()->has('name'))
                        <li class="nav-item logout">
                            <a class="" href="userdetail"> {{ session()->get('name') }} </a>  <span class="text-light">|</span>  <a class="" href="logout">Logout</a>  <span class="text-light">|</span>  <a class="" href="manage-pedigree">Manage</a>
                        </li>
                    @else
                    <li class="nav-item logout">
                        <a class="" href="login">Login</a><span>|</span><a href="signup">SignUp</a>
                    </li>
                    @endif


                    <li class="nav-item">
                        <a class="nav-link togglesearch" href="#"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
            </div>

            <div class="searchmore">
                <form action="{{asset('search')}}" method="post">
                    <span>
                        <select class="form-control selui" name="cat" id="cars" value="">
                          <option value="pedigree">Pedigree</option>
                          <option value="breeders">Breeders</option>
                          <option value="members">Members</option>
                           <option value="images">Images</option>
                          <option value="blogs">Blogs</option>
                           <option value="videos">Videos</option>
                        </select>
                    </span>
                    <input type="text" id="search" placeholder="Search Here..." name="search" value="">
                    <button class="btn "><i class="fa fa-search" aria-hidden="true"></i></button>
                    <div class="container d-xs-none">
                        <div id="display"></div>
                    </div>
                </form>

            </div>

        </div>
    </nav>
</header>
@if(session('msg'))

     {{session('msg')}}

@endif
@yield('content')

<footer class="">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col1 col-lg-4 col-sm-5 col-xs-12 col-footer">
                    <div class="footer-content">
                        <a class="logo-footer" href="index">German Shepherd Kennel Club</a>
                        <p class="des">

                        </p>

                        <ul class="footer-contact">

                            <li class="address"><p style="margin:0in;margin-bottom:.0001pt"><span style="font-size: 10pt; font-family: Arial, sans-serif;">Please contact us VIA Telephone:
<b>(720) 733-0222</b><o:p></o:p></span></p>

<p style="margin: 0in 0in 0.0001pt;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">590
Highway 105, Suite 120<o:p></o:p></span></p>

<p style="margin: 0in 0in 0.0001pt;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">Monument,
Colorado. 80132. USA<o:p></o:p></span></p></li>


                        </ul>
                        <div class="follow">
                            <label>Follow Us On Social:</label>
                            <ul class="link-follow">
                                <li class="first">
                                    <a class="fa fa-facebook" data-toggle="tooltip" data-placement="bottom"
                                       href="#" title=""
                                       data-original-title="mirora-theme on Facebook"></a>
                                </li>
                                <li>
                                    <a class="fa fa-twitter" data-toggle="tooltip" data-placement="bottom"
                                       href="#" title="#"
                                       data-original-title="mirora-theme on Twitter"></a>
                                </li>
                                <li>
                                    <a class="fa fa-pinterest-square" data-toggle="tooltip" data-placement="bottom"
                                       href="#" title=""
                                       data-original-title="mirora-theme on Pinterest"></a></li>
                                <li>
                                    <a class="fa fa-google-plus" data-toggle="tooltip" data-placement="bottom"
                                       href="#" title="" rel="publisher"
                                       data-original-title="mirora-theme on Google"></a>
                                </li>
                                <li>
                                    <a class="fa fa-instagram" data-toggle="tooltip" data-placement="bottom"
                                       href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12 col-footer">
                    <div class="footer-title">
                        <h5>Important Links</h5>
                    </div>
                    <div class="footer-content">
                        <ul class="list-unstyled text-content">


                            <li><a href="about">About</a></li>

                            <li><a href="site-news">Site News</a></li>

                            <li><a href="faq">FAQ</a></li>

                            <li><a href="contact">Contact</a></li>

                            <li><a href="advertise">Advertise</a></li>

                            <li><a href="privacy-policy">Privacy Policy</a></li>

                            <li><a href="terms-of-use">Terms of Use</a></li>

                            <li><a href="copyright-info">Copyright Info</a></li>

                        </ul>
                    </div>
                </div>
                <div class=" col-lg-5 col-sm-4 col-xs-12 col-footer">
                    <div class="footer-title">
                        <h5>About Club</h5>
                    </div>
                    <div class="footer-content">
                        <p>Thank you for using our services at German Shepherd Kennel Club. Our website is dedicated exclusively for the German Shepherd Dog. We are proud GSD breeders, dog trainers, and everything else that is associated with the German Shepherd breed. </p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="container-inner">
                        <div class="footer-copyright">
                            <p>Copyright &copy; {{ date('Y') }} German Shepherd Kennel Club, All Rights Reserved.</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/blueimp-gallery.min.js')}}"></script>
<script src="{{asset('js/blueimp-gallery-fullscreen.js')}}"></script>
<script src="{{asset('js/blueimp-gallery-indicator.js')}}"></script>
<!--<script type="text/javascript"  src="js/jquery.shorten.1.0.js"></script>-->
<script type="text/javascript">
  $(document).ready(function () {
    $(".searchmore").hide();
    $(".togglesearch").click(function () {
      $(".searchmore").slideToggle();
      $(".searchmore input[type='text']").focus();
    });
    $('.customer-logos').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1500,
      arrows: true,
      dots: false,
      pauseOnHover: false,
      responsive: [{
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      }, {
        breakpoint: 520,
        settings: {
          slidesToShow: 1
        }
      }]
    });

  });
  $(function () {
    var navbar = $('.navbar');

    $(window).scroll(function () {
      if ($(window).scrollTop() <= 40) {
        navbar.removeClass('navbar-scroll');
      } else {

        navbar.addClass('navbar-scroll');
      }
    });
  });
</script>
<script>
  document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
      link = target.src ? target.parentNode : target,
      options = {index: link, event: event},
      links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
  };
</script>

</body>
</html>
