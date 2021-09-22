<?php
session_start();
include'include/dbconnection.php';
$con = getConnection();
// checking session is valid for not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting pages
if(isset($_GET['id']))
{
	$pageid=mysqli_real_escape_string($con, $_GET['id']);
	$msg=mysqli_query($con,"delete from blog_categories where category_id='$pageid'");
	if($msg)
	{
		echo "<script>alert('Data deleted');</script>";
	}
}



?><!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Blog Category</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
  </head>

  <body>

  <section id="container" >
       <?php
	  include'include/header.php';
	  include'include/side.php';
	  ?>
      <section id="main-content">
          <section class="wrapper">
          	<div style="float:left;"><h3><i class="fa fa-angle-right"></i> Manage Blog Category</h3></div><div class="logout" style="float:right;"> <a href="add-blogcat.php" ><button class="btn logout"><i class="fa fa-plus">Add</i></button></a></div>
				<div class="row">



                  <div class="col-md-12">
                      <div class="content-panel">
					  <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?></p>
                          <table class="table table-striped table-advance table-hover">
	                  	  	 <div class="col-md-12" style="padding:0px;">
                              	<div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All Blog Category Details </h4></div>
                                  <div class="col-md-6">
                                     <div class="openinput"> <input type="text" class="form-control" id="sblogcat" placeholder="Search Here..." name="sblogcat" value=""></div>
                                  </div>


                                <div class="container d-xs-none"><div id="displayblogcat"></div></div>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>Name</th>
                                  <th>Added By</th>
                                  <th>Date of Upload</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if (isset($_GET['pageno'])) {
                                    $pageno = mysqli_real_escape_string($con, $_GET['pageno']);
                                } else {
                                    $pageno = 1;
                                }
                              $no_of_records_per_page = 10;
                              $offset = ($pageno-1) * $no_of_records_per_page;

                                $total_pages_sql = "SELECT COUNT(*) FROM blog_categories ";
                                $result = mysqli_query($con,$total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);

                              $ret=mysqli_query($con,"select * from blog_categories ORDER BY category_name ASC  LIMIT $offset, $no_of_records_per_page");

							  $i= $offset;

							  while($row=mysqli_fetch_array($ret))
							  {
							   ?>
                              <tr>
                                    <td width="5%"><?php echo ++$i;?></td>
                                    <td width="20%"><?php echo $row['category_name'];?></td>
                                    <td width="10%"><?php echo $row['added_by'];?></td>
                                    <td width="10%"><?php if($row['date_created']){echo date('m/d/Y H:i:s',strtotime($row['date_created']));}?></td>
                                    <td width="10%">
                                    <a href="update-blogcat.php?uid=<?php echo $row['category_id'];?>">
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <a href="manage-blogcat.php?id=<?php echo $row['category_id'];?>">
                                    <button class="btn btn-danger btn-xs"  onClick="return confirm('Are you sure you want to delete title <?php echo $row['category_name'];?>');"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>

                              </tbody>
                          </table>
                      </div>
                      <ul class="pagination">
                                <li><a href="?pageno=1">First</a></li>
                                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                                </li>
                                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                                </li>
                                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                            </ul>
                  </div>
              </div>
		</section>
      </section>
	  </section>

<?php
include'include/footer.php';
?>
  </body>
</html>
<?php } ?>
