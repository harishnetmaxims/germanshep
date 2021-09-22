<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | DashBoard</title>
    <link href="{{asset('webpanel/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('webpanel/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('webpanel/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('webpanel/assets/css/style-responsive.css')}}" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
    <header class="header black-bg">
          <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
          </div>
        <a href="#" class="logo"><b>Admin Dashboard</b></a>
        <div class="nav notify-row" id="top_menu">
        </div>
        <div class="top-menu">
        	<ul class="nav pull-right top-menu">
                <li><a class="logout" href="logout">Logout</a></li>
        	</ul>
        </div>
    </header>
    <style>
    .bordertag{
        border:1px solid #ddd;
        margin-top: 30px;
    }
    .bordertag h4{
        padding: 0px 10px;
    color: #000;
    font-weight: bold;
    }
    </style>
     <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="#"><img src="{{asset('webpanel/assets/img/ui-sam.jpg')}}" class="img-circle" width="60"></a></p>
                  <h5 class="centered"></h5>
                    
                  <li class="mt">
                      <a href="home">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a href="manage-logo">
                          <i class="fa fa-dashboard"></i>
                          <span>Logo</span>
                      </a>
                  </li>
                  
                     <li class="mt">
                      <a href="manage-social-profiles">
                          <i class="fa fa-dashboard"></i>
                          <span>Social Profile</span>
                      </a>
                  </li>
                  
                   <li class="mt">
                      <a href="manage-subscriber">
                          <i class="fa fa-dashboard"></i>
                          <span>Newsletter Subscribers</span>
                      </a>
                  </li>
                  
                   <li class="mt">
                      <a href="change-password">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
                <li class="dropdown">
                <a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Manage Blog </a>
                <ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
                <li><a href="manage-blogcat" >Manage Blog Categories</a></li>
                <li><a href="add-blogcat" >&nbsp;&raquo;Add Blog Categories</a></li>
                <li><a href="manage-blog" >Manage Blog</a></li>
                <li><a href="add-blog" >&nbsp;&raquo;Add Blog</a></li>
                </ul>
                </li>
                
                <li class="dropdown">
                <a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Manage Breeder </a>
                <ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
                <li><a href="manage-breeder" >Manage Breeder</a></li>
                <li><a href="add-breeder" >&nbsp;&raquo;Add Breeder</a></li>
                </ul>
                </li>
                
                <li class="dropdown">
                <a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Manage Owner </a>
                <ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
                <li><a href="manage-owner" >Manage Owner</a></li>
                <li><a href="add-owner" >&nbsp;&raquo;Add Owner</a></li>
                </ul>
                </li>

                  
                  
        <li class="dropdown">
        <a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Manage Category/Title </a>
        <ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
          <li><a href="manage-category" >Manage Categories</a></li>
          <li><a href="manage-title" >Manage Title</a></li>
                    <li><a href="manage-koer" >Manage Koer</a></li>
                    <li><a href="manage-registry" >Manage Registry</a></li>
                    <li><a href="manage-hips" >Manage Hips</a></li>
                    <li><a href="manage-elbows" >Manage Elbows</a></li>
        </ul>
        </li>
                  
        <li class="dropdown">
        <a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users"></i>Users </a>
        <ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
          <li><a href="manage-users" >Manage Users</a></li>
          <li><a href="add-user" >Add User</a></li>
        </ul>
        </li>
                 
        <li class="">
                      <a href="manage-pages">
                          <i class="fa fa-dashboard"></i>
                          <span>Pages</span>
                      </a>
                </li>
        
        
        <li class="dropdown">
        <a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Media </a>
        <ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
          <!--<li><a href="manage-pedigree" >Audio</a></li>
          <li><a href="manage-blog" >Blog</a></li>-->
          <li><a href="manage-pedigree" >Pedigree</a></li>
          <li><a href="manage-picture" >Picture</a></li>
          <li><a href="manage-video" >Video</a></li>
        </ul>
        </li>
        
        
               </ul>
          </div>
      </aside>
    @yield('content') 

    <script src="{{asset('webpanel/assets/editor/js/jquery.js')}}"></script>
    <script src="{{asset('webpanel/assets/editor/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('webpanel/assets/editor/js/summernote.js')}}"></script>

    <script type="text/javascript">               

    $(document).ready(function() {

      $('.summernote').summernote({
        height: 200
      });

      $('#submitBtn').click(function() {
        var summernoteContent = $('.summernote').summernote('code');
        $('#result').val(summernoteContent);
      });

    });
    </script> 

    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('webpanel/assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('webpanel/assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('webpanel/assets/js/common-scripts.js')}}"></script>
    <script>
    $(function(){
      $('select.styled').customSelect();
    });

    </script>

  </body>
</html>