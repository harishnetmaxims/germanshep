<?php
session_start();
$aVar = include("db/connect.php");
$config = include("db/config.php");
include("include/header.php");
//Checking session is valid or not
if (empty($_SESSION['login'])) {
    $extra = "login.php";
    echo "<script>window.location.href='" . $extra . "'</script>";
    exit();
}

// for Inser Blog info
if (isset($_POST['video_upload'])) {
    $pd = mysqli_real_escape_string($aVar, $_POST['pd']);
    $title = mysqli_real_escape_string($aVar, $_POST['title']);
    $description = mysqli_real_escape_string($aVar, $_POST['description']);
    $tags = mysqli_real_escape_string($aVar, $_POST['tags']);
    $channel_id = mysqli_real_escape_string($aVar, $_POST['channel']);
    $sub_channel_id = mysqli_real_escape_string($aVar, $_POST['subchannel']);
    $uname = $_SESSION['login'];
    $u_id = $_SESSION['user_id'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $fileext = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $array = explode(".", $image);
    $ext = end($array);
    $uid = intval($_GET['uid']);
    move_uploaded_file($image_tmp, "uploads/$image");

    $que = "INSERT INTO " . $config['tb_prefix'] . "videos (user_id,pd, title, description, tags, channel_id, sub_channel_id, video_id, type, approved,date_uploaded) VALUES ('$u_id','$pd','$title','$description','$tags','$channel_id','$sub_channel_id','$fileext','$ext','pendingdelete','" . date('Y-m-d H:i:s') . "')";
    $query = mysqli_query($aVar, $que);
    $_SESSION['msg'] = "Video added successfully";
    $extra = "manage-videos.php";
    echo "<script>window.location.href='" . $extra . "'</script>";
}
?>

    <section class="headinner">
        <div class="container">
            <h3>Video</h3>
            <div class="breadcom">
                <a href="">Home</a><span> > </span> <a href="">Add Video</a>
            </div>
        </div>
    </section>

    <section class="addpadigry padding">
        <div class="container">
            <div class="form">

                <form name="form_upload" action="" method="post" enctype="multipart/form-data">
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
                                        <option value="<?php echo $rowpd["reg1"] ?>">
                                            <?php echo utf8_decode($rowpd["name"]); ?><?php echo utf8_decode($rowpd["lastname"]); ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </li>

                        <li><strong>Title:</strong>
                            <br>
                            <input class="input form-control" name="title" type="text" value=" ">
                        </li>

                        <li><strong>Description:</strong>
                            <br>
                            <textarea class="input form-control" name="description" value=""></textarea>
                        </li>

                        <li><strong>Tags:</strong>
                            <br>
                            <input class="input form-control" name="tags" type="text" value=" ">
                            <div class="upload-video-tags">Enter tag words - more than 1 word, separated by spaces - (NO
                                COMMAS).
                                <br> Tags are keywords used to describe your media.
                            </div>
                        </li>

                        <li><strong>Select Category:</strong>
                            <br>
                            <select id="category" class="input form-control" size="1" name="channel">
                                <option value="">Select Category</option>
                                <?php
                                $sqlc = "Select * from " . $config['tb_prefix'] . "channels";
                                $resultc = mysqli_query($aVar, $sqlc);
                                if (mysqli_num_rows($resultc) > 0) {
                                    while ($rowcat = mysqli_fetch_assoc($resultc)) {
                                        ?>
                                        <option value="<?php echo $rowcat["channel_id"] ?>"><?php echo $rowcat["channel_name"] ?></option>
                                    <?php }
                                } ?>
                            </select></li>

                        <li><strong>Select SubCategory:</strong>
                            <br>
                            <select id="sub_category" class="input form-control" value="" size="1" name="subchannel">
                                <?php
                                $sqlcs = "Select * from " . $config['tb_prefix'] . "sub_channels";
                                $resultcs = mysqli_query($aVar, $sqlcs);
                                if (mysqli_num_rows($resultcs) > 0) {
                                    while ($rowcats = mysqli_fetch_assoc($resultcs)) {
                                        ?>
                                        <option value="<?php echo $rowcats["sub_channel_id"]; ?>"><?php echo $rowcats["sub_channel_name"]; ?></option>
                                    <?php }
                                } ?>
                            </select></li>

                        <li><strong>Video:</strong><br><input type="file" name="image" value=""/><br>
                        </li>
                        <li>
                            <!--<div id="options"><a style="cursor:pointer;">Show Optional Info</a>, or</div>-->
                            <!--<br>-->
                            <div class="submit">
                                <input type="submit" class="yelsubmit" value="Continue to Upload >>"
                                       name="video_upload">
                            </div>
                        </li>


                    </ul>
                </form>
            </div>
        </div>
    </section>

    <section>
        <div class="newesletter">
            <?php include_once("newsletter_form.php"); ?>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#category').on('change', function () {
          var category_id = this.value;
          $.ajax({
            url: "function/get_subcat.php",
            type: "POST",
            data: {
              category_id: category_id
            },
            cache: false,
            success: function (dataResult) {
              $("#sub_category").html(dataResult);
            }
          });
        });
      });
    </script>
<?php include("include/footer.php"); ?>
