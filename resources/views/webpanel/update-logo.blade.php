<?php
session_start();
include('include/dbconnection.php');
$con = getConnection();
$img_id = mysqli_real_escape_string($con, $_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['upload_button'])) {

    $uname = mysqli_real_escape_string($con, $_POST['user']);
    $u_id = mysqli_real_escape_string($con, $_POST['uid']);
    $logo_active = mysqli_real_escape_string($con, $_POST['logo_active']);
    $logo_text = mysqli_real_escape_string($con, $_POST['logo_text']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['logo_image']['tmp_name'];
    move_uploaded_file($image_tmp, "../addons/albums/images/$image");

    if ((!($_FILES['image']['name']))) /* If there Is No file Selected*/ {
        $quel = "update dp_logo set user_id=1, active_type='$logo_active', logo_text='$logo_text' where id = 1";
    } else /* If file is Selected*/ {
        $quel = "update dp_logo set user_id=1, active_type='$logo_active', logo_text='$logo_text', logo_image='$image' where id = 1";
    }

//print_r($quel);
//exit();
    $query = mysqli_query($con, $quel);
    $_SESSION['msg'] = "Page Updated successfully";
    $extra = "manage-logo.php";
    echo "<script>window.location.href='" . $extra . "'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Update Logo</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/css/froala_editor.pkgd.min.css" rel="stylesheet"
          type="text/css"/>
</head>

<body>

<section id="container">
    <?php
    include 'include/header.php';
    include 'include/side.php';
    ?>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Logo's Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>

                        <?php
                        $sqlimg = "Select * from dp_logo where id = '$img_id'";
                        $resultimg = mysqli_query($con, $sqlimg);
                        $imgdet = mysqli_fetch_assoc($resultimg);
                        ?>


                        <form method="post" action="" enctype="multipart/form-data">
                            <ul>
                                <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                                <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>
                                <li><strong>Active Type:</strong><br>
                                    <select name="logo_active" size="1" tabindex="1" class="input form-control"
                                            value="">

                                        <option value="Image" <?php if ($imgdet["active_type"] == 'Image') { ?> selected="selected" <?php } ?>>
                                            Image
                                        </option>
                                        <option value="Text" <?php if ($imgdet["active_type"] == 'Text') { ?> selected="selected" <?php } ?>>
                                            Text
                                        </option>

                                    </select><br>
                                </li>

                                <li><strong>Logo Text:</strong><br>
                                    <input type="text" name="logo_text" size="1" tabindex="1" class="input form-control"
                                           value="<?php echo $imgdet["logo_text"] ?>">

                                </li>


                                <span id="hidenewalbum"><li></li></span>

                                <li><h2>Select your image Logo (232*72px)</h2></li>

                                <input type="file" name="image" id="profile-img"/><br>
                                <img src="../addons/albums/images/<?php echo $imgdet["logo_image"] ?>"
                                     id="profile-img-tag" width="100px" value="<?php echo $imgdet["logo_image"] ?>"/>

                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                <script type="text/javascript">
                                  function readURL(input) {
                                    if (input.files && input.files[0]) {
                                      var reader = new FileReader();

                                      reader.onload = function (e) {
                                        $('#profile-img-tag').attr('src', e.target.result);
                                      }
                                      reader.readAsDataURL(input.files[0]);
                                    }
                                  }

                                  $("#profile-img").change(function () {
                                    readURL(this);
                                  });
                                </script>
                                </li>

                                <li class="submit">
                                    <div style="margin-left:100px;">
                                        <input type="submit" name="upload_button" value="Upload Logo"
                                               class="btn btn-theme"></div>

                                </li>


                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </section>
</section>

<?php
include 'include/footer.php';
?>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>

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

