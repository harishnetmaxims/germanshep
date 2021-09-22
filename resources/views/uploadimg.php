<?php
session_start();
$aVar = include("db/connect.php");
$config = include("db/config.php");
include("include/header.php");
if (empty($_SESSION['login'])) {
    $extra = "login.php";
    echo "<script>window.location.href='" . $extra . "'</script>";
    exit();
}

if (isset($_POST['upload_button'])) {
    if (isset($_FILES['file_array'])) {
        $pd = mysqli_real_escape_string($aVar, $_POST['pd']);
        $uname = mysqli_real_escape_string($aVar, $_POST['user']);
        $u_id = mysqli_real_escape_string($aVar, $_POST['uid']);
        $album_id = mysqli_real_escape_string($aVar, $_POST['album_id']);
        $n_array = $_FILES['file_array']['name'];
        $tmp_name_array = $_FILES['file_array']['tmp_name'];
        $type_array = $_FILES['file_array']['type'];
        $size_array = $_FILES['file_array']['size'];
        $error_array = $_FILES['file_array']['error'];

        $icat = "Select * from " . $config['tb_prefix'] . "image_galleries where gallery_id = '$album_id'";
        $icatresult = mysqli_query($aVar, $icat);
        $iatdetail = mysqli_fetch_assoc($icatresult);
        $iatname = $iatdetail["gallery_name"];
        $iatdesc = $iatdetail["gallery_description"];
        $iattag = $iatdetail["gallery_tags"];

        //print_r($query);
        //exit();

        for ($i = 0; $i < count($tmp_name_array); $i++) {
            if (move_uploaded_file($tmp_name_array[$i], "addons/albums/images/" . $n_array[$i])) {
                $query = mysqli_query($aVar, "INSERT INTO " . $config['tb_prefix'] . "images (user_id,pd, gallery_id, gallery_name, image_id, description, tags) VALUES ('$u_id','$pd', '$album_id', '$iatname', '$n_array[$i]', '$iatdesc', '$iattag')");


                echo '<div class="form_message_box">' . $n_array[$i] . '   ' . 'Uploaded Successfully' . '</div>' . '<br>';
                if ($query) {
                    $_SESSION['msg'] = "Image added successfully";
                    $extra = "uploadimg.php";
                    echo "<script>window.location.href='" . $extra . "'</script>";
                } else {
                    echo 'failed!' . '<br>';
                }
            }
        }
    }
}
?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></script>
<section class="headinner">
    <div class="container">
        <h3>Images</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Add Images</a>
        </div>
    </div>
</section>

<section class="addpadigry padding">
    <div align="center"><?= $_SESSION['msg'] ?></div>
    <div class="container">
        <div class="form">

            <form method="post" action="" enctype="multipart/form-data">
                <ul>

                    <li><strong>Pedigree:</strong>
                        <br>
                        <select id="pd" class="input form-control" size="1" name="pd">
                            <option value="">Select Pedigree</option>
                            <?php
                            $sqlpd = "Select * from  pd_entries WHERE added_by = '" . $_SESSION['login'] . "'";
                            $resultpd = mysqli_query($aVar, $sqlpd);
                            if (mysqli_num_rows($resultpd) > 0) {
                                while ($rowpd = mysqli_fetch_assoc($resultpd)) {
                                    ?>
                                    <option value="<?php echo $rowpd["reg1"] ?>" <?php if ($imgdet["pd"] == $rowpd["reg1"]) { ?> selected="selected" <?php } ?>>
                                        <?php echo utf8_decode($rowpd["name"]); ?><?php echo utf8_decode($rowpd["lastname"]); ?></option>
                                <?php }
                            } ?>
                        </select>
                    </li>

                    <li><h2>Step 1: Select or create a photo album</h2></li>
                    <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                    <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>
                    <li><strong>Your Albums:</strong> <em>Select from one of your albums.</em><br>
                        <select name="album_id" size="1" tabindex="1" class="input form-control" value="">
                            <?php
                            $sqlcc = "Select * from " . $config['tb_prefix'] . "image_galleries  WHERE user_id = '" . $_SESSION['user_id'] . "' group by gallery_name";
                            $resultcc = mysqli_query($aVar, $sqlcc);
                            if (mysqli_num_rows($resultcc) > 0) {
                                while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                                    ?>
                                    <option value="<?php echo $rowcat["gallery_id"] ?>"><?php echo utf8_decode($rowcat["gallery_name"]) ?></option>
                                <?php }
                            } ?>
                        </select><br>
                    </li>

                    <li style="margin-bottom:2px;">
                        <div id="photoalbum">
                            <a href="#myModal" role="button" class="btn" data-toggle="modal">Create New Album</a>
                        </div>
                    </li>


                    <!-- form for create category
                   <form id="myForm" method="post">

                    <span id="myDIV" style="display:none">
                    <li style="margin-top: 0;"><strong>New Album Name:</strong><br>
                        <input  type="text" name="new_photo_album" size="1" tabindex="2" class="input form-control">
                    </li>

                    <li><strong>Description:</strong><br>
                        <textarea name="photo_album_desc" tabindex="3" class="input form-control"></textarea>
                        <br><font size="1">&nbsp;&nbsp;(BBC or HTML code is not allowed)</font>
                    </li>

                    <li><strong>Tags:</strong><br>
                        <input type="text" name="album_tags" value="" class="input form-control" tabindex="4"><br>
                        <div class="upload-video-tags">Enter tag words - more than 1 word, separated by spaces - (NO COMMAS).<br>
                    Tags are keywords used to describe your media.</div>
                    </li>

                    <li><strong>Album Type:</strong><br><br>
                        <input type="radio" name="albumtype" value="public" id="album_public" checked="checked" tabindex="5" class="input"  style="margin:0px 5px;">Public
                          <br>
                        <input type="radio" name="albumtype" value="private" id="album_private" class="input"  tabindex="6" style="margin:0px 5px;">
                          Private - <font size="1">Only visible to friends and moderators</font>
                    </li>

                    <li><strong>Allow ratings:</strong><br><br>
                        <input type="radio" name="album_ratings" value="public" checked="checked" class="input"  tabindex="7" style="margin:0px 5px;">Yes
                          <br>
                        <input type="radio" name="album_ratings" value="private" tabindex="8" class="input"  style="margin:0px 5px;">
                          No - <font size="1">Only visible to friends and moderators</font>
                    </li>

                    <li><strong>Allow comments:</strong><br><br>
                        <input type="radio" name="album_cmts" value="public" checked="checked" class="input"  tabindex="9" style="margin:0px 5px;">Public
                          <br>
                        <input type="radio" name="album_cmts" value="private" tabindex="10" class="input"  style="margin:0px 5px;">
                          Private - <font size="1">Only visible to friends and moderators</font>
                    </li>

                    </span>
                    </form>
                   form for create category -->


                    <span id="hidenewalbum"><li></li></span>

                    <li><h2>Step 2: Select your image files</h2></li>

                    <li><strong>Please Note: Image files must be jpg, gif, or png - Min Image Size: 5kb - Max Image
                            Size: 2000kb's.</strong></li>

                    <li><input type="file" name="file_array[]" size="50" tabindex="11" class="special_file"
                               multiple></li>


                    <div id="show_upload" style="visibility:hidden">
                        <p align="center">Please Wait...&nbsp;&nbsp;
                            <img src="themes/eclipse/images/icons/images_loading.gif"></p>
                    </div>

                    <li class="submit" style="width:98%;">
                        <input type="button" name="reset_button" value="Reset" tabindex="14" class="button-form">
                        &nbsp;&nbsp;&nbsp;
                        <input type="submit" name="upload_button" value="Upload New Image" class="button-form">
                    </li>


                </ul>
            </form>

        </div>
    </div>
</section>
<!-- form for create category -->

<!-- form for create category -->

<section>
    <div class="newesletter">
        <?php include_once("newsletter_form.php"); ?>
    </div>
</section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="z-index: 999999;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <form id="myForm" method="post" action="function/create_category.php" enctype="multipart/form-data">

                <span>
                <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>
                <div style="margin-top: 0;"><strong>New Album Name:</strong><br>
                    <input type="text" name="new_photo_album" value="" size="1" tabindex="2" class="input form-control">
                </div>

                <div><strong>Description:</strong><br>
                    <textarea name="photo_album_desc" tabindex="3" value="" class="input form-control"></textarea>
                    <br><font size="1">&nbsp;&nbsp;(BBC or HTML code is not allowed)</font>
                </div>

                <div><strong>Tags:</strong><br>
                    <input type="text" name="album_tags" value="" class="input form-control" tabindex="4"><br>
                    <div class="upload-video-tags">Enter tag words - more than 1 word, separated by spaces - (NO COMMAS).<br>
                Tags are keywords used to describe your media.</div>
                </div>

                <div><strong>Album Type:</strong><br><br>
                    <input type="radio" name="albumtype" value="public" id="album_public" checked="checked" tabindex="5"
                           class="input" style="margin:0px 5px;">Public
                      <br>
                    <input type="radio" name="albumtype" value="private" id="album_private" class="input" tabindex="6"
                           style="margin:0px 5px;">
                      Private - <font size="1">Only visible to friends and moderators</font>
                </div>

                <div><strong>Allow ratings:</strong><br><br>
                    <input type="radio" name="album_ratings" value="public" checked="checked" class="input" tabindex="7"
                           style="margin:0px 5px;">Yes
                      <br>
                    <input type="radio" name="album_ratings" value="private" tabindex="8" class="input"
                           style="margin:0px 5px;">
                      No - <font size="1">Only visible to friends and moderators</font>
                </div>

                <div><strong>Allow comments:</strong><br><br>
                    <input type="radio" name="album_cmts" value="public" checked="checked" class="input" tabindex="9"
                           style="margin:0px 5px;">Public
                      <br>
                    <input type="radio" name="album_cmts" value="private" tabindex="10" class="input"
                           style="margin:0px 5px;">
                      Private - <font size="1">Only visible to friends and moderators</font>
                </div>

                <div><strong>Blog Image:</strong><br>
    <input type="file" name="catimage" value="" id="cat-img" required/><br>
    <img src="" id="cat-img-tag" width="100px"/>


                                    <script type="text/javascript">
                                        function readURL(input) {
                                          if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                              $('#cat-img-tag').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                          }
                                        }

                                        $("#cat-img").change(function () {
                                          readURL(this);
                                        });
                                    </script>
                 </div>
                <div>
                 <input type="button" data-dismiss="modal" value="Close" tabindex="14" class="button-form close">

                    <input type="submit" name="create_category" value="Create Album" class="button-form">
                    </div>
                </span>


                </form>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">

  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>

<?php include("include/footer.php"); ?>
