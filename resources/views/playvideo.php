<?php
include("include/header.php");
$aVar = include("db/connect.php");
$config = include("db/config.php");
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$vid = mysqli_real_escape_string($_GET['video_id']);

$sgaldetail = "Select * from " . $config['tb_prefix'] . "videos where indexer = $vid";
$sgalresultdetail = mysqli_query($aVar, $sgaldetail);
$sgaldet = mysqli_fetch_assoc($sgalresultdetail);


?>
<!--<script type="text/javascript" src="http://databasepedigree.com/addons/mw_eclipse/players/flowplayer/flowplayer-javascript.min.js">
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
<section class="headinner">
    <div class="container">
        <h3>Video</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href=""><?php echo utf8_encode($sgaldet["title"]); ?></a>
        </div>
    </div>
</section>


<section class="showdetail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 ">
                <div class="leftconta">
                    <div class="carousel-container">

                        <!-- Sorry! Lightbox doesn't work - yet. -->

                        <div id="" class="slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php /*?>    <script type="text/javascript" src="http://www.webestools.com/page/js/flashobject.js"></script>
<div id="player_1547" class="borderpx" style="display:inline-block;">
	<a href="http://get.adobe.com/flashplayer/">You need to install the Flash plugin</a> - <a href="http://www.webestools.com/">http://www.webestools.com/</a>
</div>
<script type="text/javascript">
	var flashvars_1547 = {};
	var params_1547 = {
		quality: "high",
		wmode: "transparent",
		bgcolor: "#ffffff",
		allowScriptAccess: "always",
		allowFullScreen: "true",
		flashvars: "fichier=https://germanshepherdkennelclub.com/uploads/<?php echo $sgaldet["video_id"]; ?>.<?php echo $sgaldet["type"]; ?>&auto_play=true&apercu="
	};
	var attributes_1547 = {};
	flashObject("http://flash.webestools.com/flv_player/v1_1.swf", "player_1547", "720", "405", "8", false, flashvars_1547, params_1547, attributes_1547);
</script>
<?php */ ?>


                                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0"
                                        width="720" height="405" id="fullscreen" align="middle">
                                    <param name="allowScriptAccess" value="sameDomain"/>
                                    <param name="movie" value="flvplayer.swf"/>
                                    <param name="image"
                                           value="uploads/player_thumbs/<?php echo $sgaldet["video_id"]; ?>.jpg"/>
                                    <param name="quality" value="high"/>
                                    <param name="salign" value="tl"/>
                                    <param name="bgcolor" value="#ffffff"/>
                                    <param NAME=FlashVars
                                           VALUE="file=uploads/<?php echo $sgaldet["video_id"]; ?>.<?php echo $sgaldet["type"]; ?>&image=uploads/player_thumbs/<?php echo $sgaldet["video_id"]; ?>.jpg">
                                    <embed src="flvplayer.swf"
                                           FlashVars="file=uploads/<?php echo $sgaldet["video_id"]; ?>.<?php echo $sgaldet["type"]; ?>&image=uploads/player_thumbs/<?php echo $sgaldet["video_id"]; ?>.jpg"
                                           quality="high" salign="tl" bgcolor="#ffffff" width="720" height="405"
                                           name="fullscreen" align="middle" allowScriptAccess="always"
                                           allowFullScreen="true" type="application/x-shockwave-flash"
                                           pluginspage="http://www.macromedia.com/go/getflashplayer"/>
                                </object>


                                <div class="descript">
                                    <h3><?php echo utf8_encode($sgaldet["title"]); ?></h3>
                                    <p><?php echo utf8_encode($sgaldet["description"]); ?></p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /row -->
                    <div class="optionset">
                        <!--<div class="author-info">-->
                        <!--                        <img src="images/post-author.jpg" alt="">-->
                        <!--                        <h4><?php //echo $ccdetail["gallery_name"]; ?></h4>-->
                        <!--                        <p><?php //echo $ccdetail["gallery_description"]; ?></p>-->
                        <!--                             <div class="author-social">-->
                        <!--                                <a href="#"><i class="fa fa-twitter"></i></a>-->
                        <!--                                <a href="#"><i class="fa fa-facebook"></i></a>-->
                        <!--                                <a href="#"><i class="fa fa-google-plus"></i></a>-->
                        <!--                                <a href="#"><i class="fa fa-instagram"></i></a>-->
                        <!--                             </div>-->
                        <!--                    </div>-->


                        <div id="comments" class="comments-area xs-comments-area">
                            <? if ($_SESSION['msg']) { ?>
                                <div align="center" style="color:#FF0000"><?= $_SESSION['msg'] ?></div><? } ?>
                            <h4 class="comments-title">Comments</h4>
                            <ul class="comments-list">
                                <?php
                                $sqlcom = "Select * from " . $config['tb_prefix'] . "videocomments where video_id = $vid ORDER BY indexer DESC";
                                $resultcom = mysqli_query($aVar, $sqlcom);

                                if (mysqli_num_rows($resultcom) > 0) {
                                    while ($rowcom = mysqli_fetch_assoc($resultcom)) {

                                        $userdetail = "Select * from member_profile where user_name = '" . $rowcom["by_username"] . "'";
                                        $uresultdetail = mysqli_query($aVar, $userdetail);
                                        $userdet = mysqli_fetch_assoc($uresultdetail);
                                        ?>
                                        <li class="comment" style="min-height:150px;">
                                            <a href="memberdetail.php?mem_id=<?= $userdet['user_id'] ?>">
                                                <? if ($userdet['image_pro']) { ?>
                                                    <img src="images/<?= $userdet['image_pro'] ?>"
                                                         alt="commentor avatar image" draggable="false" align="left"
                                                         style="margin-right:10px;width:120px;border:solid 1px #CCCCCC">
                                                <? } else { ?>
                                                    <img src="webpanel/assets/img/ui-sam.jpg"
                                                         alt="commentor avatar image" draggable="false" align="left"
                                                         style="margin-right:10px;width:120px;border:solid 1px #CCCCCC"><? } ?>
                                            </a>
                                            <a href="memberdetail.php?mem_id=<?= $userdet['user_id'] ?>"><?php echo $rowcom["by_username"]; ?></a><br/>
                                            <span class="comment-date"
                                                  style="font-size:11px;font-style:italic;"><?php echo $rowcom["todays_date"]; ?></span><br/>

                                            <?php echo $rowcom["comments"]; ?>



                                            <?php /*?> <div class="comment-body">

                                    <div class="meta-data">

                                        <div class="comment-author">


                                        </div>

                                        <div class="comment-content">

                                        </div>

                                    </div>
                                </div>
                                <div style="clear:both"></div><?php */ ?>
                                        </li>

                                        <?php
                                    }
                                }
                                ?>

                            </ul>
                        </div>

                        <div id="respond" class="comment-respond">
                            <form action="function/vid-comment.php" method="POST" class="xs-form" id="comment-form">

                                <h4 class="comment-reply-title">Leave a comment</h4>
                                <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                                <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>
                                <input type="hidden" name="vid" value='<?php echo $sgaldet["indexer"]; ?>'>
                                <input type="hidden" name="actual_link" value='<?php echo $actual_link; ?>'>
                                <div class="row">

                                </div>
                                <textarea name="comments" placeholder="Comments" class="form-control message-box"
                                          cols="30" rows="10"></textarea>
                                <p class="form-submit">
                                    <input name="post-comment" type="submit" class="xs-btn" value="LEAVE COMMENT">
                                </p>

                            </form>
                        </div>
                    </div>

                </div> <!-- /container -->
            </div>

            <div class="col-lg-4 col-xs-12">
                <div class="rightshow">
                    <h3>Browse Video</h3>
                    <ul>
                        <li>
                            <a href="video-gallery.php">All Video</a>
                        </li>
                        <li>
                            <a href="manage-videos.php">Your Videos</a>
                        </li>

                    </ul>
                </div>
            </div>


        </div>
    </div>
</section>


<section>
    <div class="newesletter">
        <?php include_once("newsletter_form.php"); ?>
    </div>
</section>
<script type="text/javascript">
  //   $('#myCarousel').carousel({
  //   interval: false
  // });
  // $('#carousel-thumbs').carousel({
  //   interval: false
  // });

  // handles the carousel thumbnails
  // https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
  // $('[id^=carousel-selector-]').click(function() {
  //   var id_selector = $(this).attr('id');
  //   var id = parseInt( id_selector.substr(id_selector.lastIndexOf('-') + 1) );
  //   $('#myCarousel').carousel(id);
  // });
  // when the carousel slides, auto update
  // $('#myCarousel').on('slide.bs.carousel', function(e) {
  //   var id = parseInt( $(e.relatedTarget).attr('data-slide-number') );
  //   $('[id^=carousel-selector-]').removeClass('selected');
  //   $('[id=carousel-selector-'+id+']').addClass('selected');
  // });
  // when user swipes, go next or previous
  // $('#myCarousel').swipe({
  //   fallbackToMouseEvents: true,
  //   swipeLeft: function(e) {
  //     $('#myCarousel').carousel('next');
  //   },
  //   swipeRight: function(e) {
  //     $('#myCarousel').carousel('prev');
  //   },
  //   allowPageScroll: 'vertical',
  //   preventDefaultEvents: false,
  //   threshold: 75
  // });
  /*
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
  */

  // $('#myCarousel .carousel-item img').on('click', function(e) {
  //   var src = $(e.target).attr('data-remote');
  //   if (src) $(this).ekkoLightbox();
  // });
</script>
<?php include("include/footer.php"); ?>

