<aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="home.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a href="manage-logo.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Logo</span>
                      </a>
                  </li>
                  
                     <li class="mt">
                      <a href="manage-social-profiles.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Social Profile</span>
                      </a>
                  </li>
                  
                   <li class="mt">
                      <a href="manage-subscriber.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Newsletter Subscribers</span>
                      </a>
                  </li>
                  
                   <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
                  <li class="dropdown">
				<a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Manage Blog </a>
				<ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
					<li><a href="manage-blogcat.php" >Manage Blog Categories</a></li>
                    <li><a href="add-blogcat.php" >&nbsp;&raquo;Add Blog Categories</a></li>
					<li><a href="manage-blog.php" >Manage Blog</a></li>
                    <li><a href="add-blog.php" >&nbsp;&raquo;Add Blog</a></li>
				</ul>
				</li>
                  
                  
				<li class="dropdown">
				<a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Manage Category/Title </a>
				<ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
					<li><a href="manage-category.php" >Manage Categories</a></li>
					<li><a href="manage-title.php" >Manage Title</a></li>
                    <li><a href="manage-koer.php" >Manage Koer</a></li>
                    <li><a href="manage-registry.php" >Manage Registry</a></li>
				</ul>
				</li>
                  
				<li class="dropdown">
				<a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users"></i>Users </a>
				<ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
					<li><a href="manage-users.php" >Manage Users</a></li>
					<li><a href="add-user.php" >Add User</a></li>
				</ul>
				</li>
                 
				<li class="">
                      <a href="manage-pages.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Pages</span>
                      </a>
                </li>
				
				
				<li class="dropdown">
				<a href="#" class="sub-menu dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i></i>Media </a>
				<ul class="dropdown-menu" role="menu" style="float: inherit;position: inherit;">
					<!--<li><a href="manage-pedigree.php" >Audio</a></li>
					<li><a href="manage-blog.php" >Blog</a></li>-->
					<li><a href="manage-pedigree.php" >Pedigree</a></li>
					<li><a href="manage-picture.php" >Picture</a></li>
					<li><a href="manage-video.php" >Video</a></li>
				</ul>
				</li>
				
				
               </ul>
          </div>
      </aside>