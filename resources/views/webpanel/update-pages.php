<?php
session_start();
include'include/dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for updating user info
if(isset($_POST['Submit']))
{
	$title=mysqli_real_escape_string($con, $_POST['title']);
	$text=addslashes($_POST['text']);
	$status=mysqli_real_escape_string($con, $_POST['status']);
	$uid=intval($_GET['uid']);
	$query=mysqli_query($con,"update mm_pages set title='$title' ,text='$text' , status='$status' where page_id='$uid'");
	$_SESSION['msg']="Page Updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Update Profile</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

     <link href="assets/editor/css/summernote.css" rel="stylesheet">
    <link href="assets/editor/css/font-awesome.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <?php
	  include'include/header.php';
	  include'include/side.php';
	  ?>

      <?php $ret=mysqli_query($con,"select * from mm_pages where page_id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))

	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['title'];?>'s Information</h3>

				<div class="row">



                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Page title </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>" >
                              </div>
                          </div>




                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Content </label>
                              <div class="col-sm-10">
                                  <textarea   class="form-control summernote"  name="text" value="<?php echo $row['text'];?>"><?php echo $row['text'];?></textarea>
                              </div>
                          </div>

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Created Date </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="pdate" value="<?php echo $row['date'];?>" readonly >
                              </div>
                          </div>

						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status </label>
                              <div class="col-sm-10">
                                 <select name="status" value="<?php echo $row['status'];?>" class="form-control">
									  <option value="active">Active</option>
									  <option value="deactive">Deactive</option>

								 </select>
                              </div>
                          </div>





                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>

<?php
include'include/footer.php';
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#froala-editor', {
      // Set the file upload URL.
      imageUploadURL: 'assets/img/page-edit/upload_image.php',

      imageUploadParams: {
        id: 'my_editor'
      }
    })
  </script>

  </body>
</html>
<?php } ?>
