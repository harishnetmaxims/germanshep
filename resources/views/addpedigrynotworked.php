<?php
session_start();
$aVar = include("db/connect.php");
$config = include("db/config.php");
include("include/header.php");
//Checking session is valid or not
if (empty($_SESSION['user_id'])) {
    $extra = "login.php";
    echo "<script>window.location.href='" . $extra . "'</script>";
    exit();
}

if ($_POST['pedigree']) {
    $cid = mysqli_real_escape_string($aVar, $_POST['cat']);
    $breeder = mysqli_real_escape_string($aVar, $_POST['breeder']);
    $owner = mysqli_real_escape_string($aVar, $_POST['owner']);
    $reg1 = mysqli_real_escape_string($aVar, $_POST['reg1']);
    $c1 = mysqli_real_escape_string($aVar, $_POST['c1']);
    $reg2 = mysqli_real_escape_string($aVar, $_POST['reg2']);
    $c2 = mysqli_real_escape_string($aVar, $_POST['c2']);
    $dname = mysqli_real_escape_string($aVar, $_POST['dname']);
    $dlastname = mysqli_real_escape_string($aVar, $_POST['dlastname']);
    $father_id = mysqli_real_escape_string($aVar, $_POST['father_id']);
    $mother_id = mysqli_real_escape_string($aVar, $_POST['mother_id']);
    $gender = mysqli_real_escape_string($aVar, $_POST['gender']);
    $kz = mysqli_real_escape_string($aVar, $_POST['kz']);
    $kork = mysqli_real_escape_string($aVar, $_POST['kork']);
    $tattoo = mysqli_real_escape_string($aVar, $_POST['tattoo']);
    $hdzw = mysqli_real_escape_string($aVar, $_POST['hdzw']);
    $title = mysqli_real_escape_string($aVar, $_POST['title']);
    $elbow = mysqli_real_escape_string($aVar, $_POST['elbow']);
    $dob = mysqli_real_escape_string($aVar, $_POST['dob']);
    $micro_chip = mysqli_real_escape_string($aVar, $_POST['micro_chip']);
    $dna = mysqli_real_escape_string($aVar, $_POST['dna']);
    $dm = mysqli_real_escape_string($aVar, $_POST['dm']);
    $color = mysqli_real_escape_string($aVar, $_POST['color']);
    $class = mysqli_real_escape_string($aVar, _POST['class']);
    $coat = mysqli_real_escape_string($aVar, $_POST['coat']);
    $breast_depth = mysqli_real_escape_string($aVar, $_POST['breast_depth']);
    $breast_width = mysqli_real_escape_string($aVar, $_POST['breast_width']);
    $height_withers = mysqli_real_escape_string($aVar, $_POST['height_withers']);
    $weight = mysqli_real_escape_string($aVar, $_POST['weight']);
    $breeding = mysqli_real_escape_string($aVar, $_POST['breeding']);
    $height = mysqli_real_escape_string($aVar, $_POST['height']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $uid = intval($_GET['uid']);
    move_uploaded_file($image_tmp, "pictures/$image");

    $added_by = $_SESSION["login"];
    $added_date = date('Y-m-d');


    $que = "INSERT INTO " . $config['tb_prefix'] . "pd_entries(cid, breeder, owner, reg1, c1, reg2, c2, name, lastname, father_id, mother_id, gender, kz, kork, tattoo_nr, hdzw, title, elbow, dob, micro_chip, dna, dm, color, class, coat, breast_depth, breast_width, height_withers, weight, breeding, height, picture,added_by,added_date)
VALUES('$cid','$breeder','$owner','$reg1','$c1','$reg2','$c2','$dname','$dlastname','$father_id','$mother_id','$gender','$kz','$kork','$tattoo','$hdzw','$title','$elbow','$dob','$micro_chip','$dna','$dm','$color','$class','$coat','$breast_depth','$breast_width','$height_withers','$weight','$breeding','$height','$image','$added_by','$added_date')";

    $query = mysqli_query($aVar, $que);

    $last_insert_id = mysqli_insert_id($aVar);

    if ($last_insert_id > 0) {
        $pd = mysqli_real_escape_string($aVar, $_POST['reg1']);

        // For Health Matters
        $iHMData = count($_POST['insert_date_hm']);
        if ($iHMData > 0) {
            for ($hm = 0; $hm < 5; $hm++) {
                $insert_date_hm = mysqli_real_escape_string($aVar, $_POST['insert_date_hm'][$hm]);
                $name_hm = mysqli_real_escape_string($aVar, $_POST['name_hm'][$hm]);
                $dosage_hm = mysqli_real_escape_string($aVar, $_POST['dosage_hm'][$hm]);
                $due_date_hm = mysqli_real_escape_string($aVar, $_POST['due_date_hm'][$hm]);

                if ($insert_date_hm != '' and $name_hm != '') {
                    $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                    $query_que_deworming = mysqli_query($aVar, $que_deworming);
                }
            }
        }//if


        // For Vaccines
        $iVCData = count($_POST['insert_date_vaccines']);
        if ($iVCData > 0) {
            for ($va = 0; $va < $iVCData; $va++) {
                $insert_date_vaccines = mysqli_real_escape_string($aVar, $_POST['insert_date_vaccines'][$va]);
                $name_vaccines = mysqli_real_escape_string($aVar, $_POST['name_vaccines'][$va]);
                $dosage_vaccines = mysqli_real_escape_string($aVar, $_POST['dosage_vaccines'][$va]);
                $due_date_vaccines = mysqli_real_escape_string($aVar, $_POST['due_date_vaccines'][$va]);

                if ($insert_date_vaccines != '' and $name_vaccines != '') {
                    $que_va = "INSERT INTO dp_vaccines(pd, insert_date, due_date, name, dosage)    VALUES('$pd','$insert_date_vaccines','$due_date_vaccines','$name_vaccines','$dosage_vaccines')";
                    $query_que_va = mysqli_query($aVar, $que_va);
                }
            }
        }// if

        // For Rabies
        $iRBData = count($_POST['insert_date_rabies']);
        if ($iRBData > 0) {
            for ($ra = 0; $ra < $iRBData; $ra++) {
                $insert_date_rabies = mysqli_real_escape_string($aVar, $_POST['insert_date_rabies'][$ra]);
                $name_rabies = mysqli_real_escape_string($aVar, $_POST['name_rabies'][$ra]);
                $dosage_rabies = mysqli_real_escape_string($aVar, $_POST['dosage_rabies'][$ra]);
                $due_date_rabies = mysqli_real_escape_string($aVar, $_POST['due_date_rabies'][$ra]);

                if ($insert_date_rabies != '' and $name_rabies != '') {
                    $que_rab = "INSERT INTO dp_rabies(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_rabies','$due_date_rabies','$name_rabies','$dosage_rabies')";
                    $query_que_rab = mysqli_query($aVar, $que_rab);
                }
            }
        }//if

        // For Deworming
        $iDEData = count($_POST['insert_date_deworming']);
        if ($iDEData > 0) {
            for ($de = 0; $de < $iDEData; $de++) {
                $insert_date_deworming = mysqli_real_escape_string($aVar, $_POST['insert_date_deworming'][$de]);
                $name_deworming = mysqli_real_escape_string($aVar, $_POST['name_deworming'][$de]);
                $dosage_deworming = mysqli_real_escape_string($aVar, $_POST['dosage_deworming'][$de]);
                $due_date_deworming = mysqli_real_escape_string($aVar, $_POST['due_date_deworming'][$de]);
                $weight_deworming = mysqli_real_escape_string($aVar, $_POST['weight_deworming'][$de]);

               if ($insert_date_deworming != '' and $name_deworming != '') {
                    $que_deworming = "INSERT INTO dp_deworming(pd, insert_date, due_date, name, dosage, weight)
						VALUES('$pd','$insert_date_deworming','$due_date_deworming','$name_deworming','$dosage_deworming','$weight_deworming')";

                    $query_que_deworming = mysqli_query($aVar, $que_deworming);
                }
            }
        }

        // For Litters Information
        $iLIData = count($_POST['dateofbirth']);
        if ($iLIData > 0) {
            for ($li = 0; $li < $iLIData; $li++) {
                $dateofbirth = mysqli_real_escape_string($aVar, $_POST['dateofbirth'][$li]);
                $breeding_partner = mysqli_real_escape_string($aVar, _POST['breeding_partner'][$li]);
                $breed_bookno = mysqli_real_escape_string($aVar, $_POST['breed_bookno'][$li]);
                $letter = mysqli_real_escape_string($aVar, $_POST['letter'][$li]);
                $males_total = mysqli_real_escape_string($aVar, $_POST['males_total'][$li]);
                $breederinfo = mysqli_real_escape_string($aVar, $_POST['breederinfo'][$li]);

                if ($dateofbirth != '' and $breeding_partner != '') {
                    $que_litter = "INSERT INTO dp_litters(pd, dateofbirth, breeding_partner, breed_bookno, breeder,letter,males_total) VALUES('$pd','$dateofbirth','$breeding_partner','$breed_bookno','$breederinfo','$letter','$males_total')";
                    $query_que_litter = mysqli_query($aVar, $que_litter);
                }
            }
        }//if

        // For Shows Detail
        // For Litters Information
        $iSDData = count($_POST['show']);
        if ($iSDData > 0) {
            for ($sd = 0; $sd < $iSDData; $sd++) {
                $show = mysqli_real_escape_string($aVar, $_POST['show'][$sd]);
                $judge = mysqli_real_escape_string($aVar, $_POST['judge'][$sd]);
                $place = mysqli_real_escape_string($aVar, $_POST['place'][$sd]);
                $rank = mysqli_real_escape_string($aVar, $_POST['rank'][$sd]);
                $country = mysqli_real_escape_string($aVar, $_POST['country'][$sd]);


                $ov = $sd + 1;

                $override = mysqli_real_escape_string($aVar, $_POST['override'][$sd]);

                if (isset($_POST['override']) && $_POST['override'] == $ov) {
                    $override = mysqli_real_escape_string($aVar, $_POST['override']);
                } else {
                    $override = 0;
                }

                if ($show != '') {
                    //$que_sd = "INSERT INTO pd_show(sz, name, place, judge, rank,country) VALUES('$pd','$show','$place','$judge','$rank','$country')";
                    $que_sd = "INSERT INTO pd_show(sz, cat, place, judge, rank,country,override,name,kennel) VALUES('$pd','$show','$place','$judge','$rank','$country','$override','$dname','$dlastname')";
                    $query_que_sd = mysqli_query($aVar, $que_sd);
                }
            }
        }//if


        $_SESSION['msg'] = "Page Updated successfully";
        $extra = "pdgdetail.php?pdgid=$pd&pdgcat=$c1";
        echo "<script>window.location.href='" . $extra . "'</script>";

    }


}
$country_select = '<option value="ABW">ABW</option><option value="AFG">AFG</option><option value="AGO">AGO</option><option value="AIA">AIA</option><option value="ALA">ALA</option><option value="ALB">ALB</option><option value="AND">AND</option><option value="ARE">ARE</option><option value="ARG">ARG</option><option value="ARM">ARM</option><option value="ASM">ASM</option><option value="ATA">ATA</option><option value="ATF">ATF</option><option value="ATG">ATG</option><option value="AUS">AUS</option><option value="AUT">AUT</option><option value="AZE">AZE</option><option value="BDI">BDI</option><option value="BEL">BEL</option><option value="BEN">BEN</option><option value="BFA">BFA</option><option value="BGD">BGD</option><option value="BGR">BGR</option><option value="BHR">BHR</option><option value="BHS">BHS</option><option value="BIH">BIH</option><option value="BLM">BLM</option><option value="BLR">BLR</option><option value="BLZ">BLZ</option><option value="BMU">BMU</option><option value="BOL">BOL</option><option value="BRA">BRA</option><option value="BRB">BRB</option><option value="BRN">BRN</option><option value="BTN">BTN</option><option value="BVT">BVT</option><option value="BWA">BWA</option><option value="BES">BES</option><option value="CAF">CAF</option><option value="CAN">CAN</option><option value="CCK">CCK</option><option value="CHE">CHE</option><option value="CHL">CHL</option><option value="CHN">CHN</option><option value="CIV">CIV</option><option value="CMR">CMR</option><option value="COD">COD</option><option value="COG">COG</option><option value="COK">COK</option><option value="COL">COL</option><option value="COM">COM</option><option value="CPV">CPV</option><option value="CRI">CRI</option><option value="CUB">CUB</option><option value="CUW">CUW</option><option value="CXR">CXR</option><option value="CYM">CYM</option><option value="CYP">CYP</option><option value="CZE">CZE</option><option value="DEU">DEU</option><option value="DJI">DJI</option><option value="DMA">DMA</option><option value="DNK">DNK</option><option value="DOM">DOM</option><option value="DZA">DZA</option><option value="ECU">ECU</option><option value="EGY">EGY</option><option value="ERI">ERI</option><option value="ESH">ESH</option><option value="ESP">ESP</option><option value="EST">EST</option><option value="ETH">ETH</option><option value="FIN">FIN</option><option value="FJI">FJI</option><option value="FLK">FLK</option><option value="FRA">FRA</option><option value="FRO">FRO</option><option value="FSM">FSM</option><option value="GAB">GAB</option><option value="GBR">GBR</option><option value="GEO">GEO</option><option value="GGY">GGY</option><option value="GHA">GHA</option><option value="GIB">GIB</option><option value="GIN">GIN</option><option value="GLP">GLP</option><option value="GMB">GMB</option><option value="GNB">GNB</option><option value="GNQ">GNQ</option><option value="GRC">GRC</option><option value="GRD">GRD</option><option value="GRL">GRL</option><option value="GTM">GTM</option><option value="GUF">GUF</option><option value="GUM">GUM</option><option value="GUY">GUY</option><option value="HKG">HKG</option><option value="HMD">HMD</option><option value="HND">HND</option><option value="HRV">HRV</option><option value="HTI">HTI</option><option value="HUN">HUN</option><option value="IDN">IDN</option><option value="IMN">IMN</option><option value="IND">IND</option><option value="IOT">IOT</option><option value="IRL">IRL</option><option value="IRN">IRN</option><option value="IRQ">IRQ</option><option value="ISL">ISL</option><option value="ISR">ISR</option><option value="ITA">ITA</option><option value="JAM">JAM</option><option value="JEY">JEY</option><option value="JOR">JOR</option><option value="JPN">JPN</option><option value="KAZ">KAZ</option><option value="KEN">KEN</option><option value="KGZ">KGZ</option><option value="KHM">KHM</option><option value="KIR">KIR</option><option value="KNA">KNA</option><option value="KOR">KOR</option><option value="KWT">KWT</option><option value="LAO">LAO</option><option value="LBN">LBN</option><option value="LBR">LBR</option><option value="LBY">LBY</option><option value="LCA">LCA</option><option value="LIE">LIE</option><option value="LKA">LKA</option><option value="LSO">LSO</option><option value="LTU">LTU</option><option value="LUX">LUX</option><option value="LVA">LVA</option><option value="MAC">MAC</option><option value="MAF">MAF</option><option value="MAR">MAR</option><option value="MCO">MCO</option><option value="MDA">MDA</option><option value="MDG">MDG</option><option value="MDV">MDV</option><option value="MEX">MEX</option><option value="MHL">MHL</option><option value="MKD">MKD</option><option value="MLI">MLI</option><option value="MLT">MLT</option><option value="MMR">MMR</option><option value="MNE">MNE</option><option value="MNG">MNG</option><option value="MNP">MNP</option><option value="MOZ">MOZ</option><option value="MRT">MRT</option><option value="MSR">MSR</option><option value="MTQ">MTQ</option><option value="MUS">MUS</option><option value="MWI">MWI</option><option value="MYS">MYS</option><option value="MYT">MYT</option><option value="NAM">NAM</option><option value="NCL">NCL</option><option value="NER">NER</option><option value="NFK">NFK</option><option value="NGA">NGA</option><option value="NIC">NIC</option><option value="NIU">NIU</option><option value="NLD">NLD</option><option value="NOR">NOR</option><option value="NPL">NPL</option><option value="NRU">NRU</option><option value="NZL">NZL</option><option value="OMN">OMN</option><option value="PAK">PAK</option><option value="PAN">PAN</option><option value="PCN">PCN</option><option value="PER">PER</option><option value="PHL">PHL</option><option value="PLW">PLW</option><option value="PNG">PNG</option><option value="POL">POL</option><option value="PRI">PRI</option><option value="PRK">PRK</option><option value="PRT">PRT</option><option value="PRY">PRY</option><option value="PSE">PSE</option><option value="PYF">PYF</option><option value="QAT">QAT</option><option value="REU">REU</option><option value="ROU">ROU</option><option value="RUS">RUS</option><option value="RWA">RWA</option><option value="SAU">SAU</option><option value="SDN">SDN</option><option value="SEN">SEN</option><option value="SGP">SGP</option><option value="SGS">SGS</option><option value="SSD">SSD</option><option value="SHN">SHN</option><option value="SXM">SXM</option><option value="SJM">SJM</option><option value="SLB">SLB</option><option value="SLE">SLE</option><option value="SLV">SLV</option><option value="SMR">SMR</option><option value="SOM">SOM</option><option value="SPM">SPM</option><option value="SRB">SRB</option><option value="STP">STP</option><option value="SUR">SUR</option><option value="SVK">SVK</option><option value="SVN">SVN</option><option value="SWE">SWE</option><option value="SWZ">SWZ</option><option value="SYC">SYC</option><option value="SYR">SYR</option><option value="TCA">TCA</option><option value="TCD">TCD</option><option value="TGO">TGO</option><option value="THA">THA</option><option value="TJK">TJK</option><option value="TKL">TKL</option><option value="TKM">TKM</option><option value="TLS">TLS</option><option value="TON">TON</option><option value="TTO">TTO</option><option value="TUN">TUN</option><option value="TUR">TUR</option><option value="TUV">TUV</option><option value="TWN">TWN</option><option value="TZA">TZA</option><option value="UGA">UGA</option><option value="UKR">UKR</option><option value="UMI">UMI</option><option value="URY">URY</option><option value="USA">USA</option><option value="UZB">UZB</option><option value="VAT">VAT</option><option value="VCT">VCT</option><option value="VEN">VEN</option><option value="VGB">VGB</option><option value="VIR">VIR</option><option value="VNM">VNM</option><option value="VUT">VUT</option><option value="WLF">WLF</option><option value="WSM">WSM</option><option value="YEM">YEM</option><option value="ZAF">ZAF</option><option value="ZMB">ZMB</option><option value="ZWE">ZWE</option>';

?>
<link href="webpanel/assets/editor/css/summernote.css" rel="stylesheet">
<!--<link href="webpanel/assets/editor/css/font-awesome.css" rel="stylesheet">-->

<section class="headinner">
    <div class="container">
        <h3>Add Pedigree</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Add Pedigree</a>
        </div>
    </div>
</section>

<section class="addpadigry padding">
    <div class="container">
        <div class="form">

            <form name="add" action="" method="post" enctype="multipart/form-data">
                <ul>

                    <li>
                        <h3>Basic Information</h3>
                        <hr>
                    </li>
                    <li class="span3">
                        <div class="row">
                            <div class="col-lg-4">
                            <span>
            <label>Category:</label><br>

<select class="form-control" value="" name="cat">
    <option value="">Please Select a Category</option>
            <?php
            $sqlcc = "Select * from " . $config['tb_prefix'] . "channels";
            $resultcc = mysqli_query($aVar, $sqlcc);
            if (mysqli_num_rows($resultcc) > 0) {
                while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                    ?>
                    <option value="<?php echo $rowcat["channel_id"] ?>"><?php echo $rowcat["channel_name"] ?></option>
                <?php }
            } ?>

</select>
       </span>
                            </div>
                            <div class="col-lg-4">
        <span>
      <label>Breeder:</label><br>

<select class="form-control" value="" name="breeder">
    <option value="">Please Select a Breeder</option>
            <?php
            $sqlcc = "Select * from " . $config['tb_prefix'] . "member_profile WHERE breeder= 1 limit 100";
            $resultcc = mysqli_query($aVar, $sqlcc);
            if (mysqli_num_rows($resultcc) > 0) {
                while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                    ?>
                    <option value="<?php echo $rowcat["user_id"] ?>"><?php echo $rowcat["user_name"] ?></option>
                <?php }
            } ?>
</select>
          </span>
                            </div>
                            <div class="col-lg-4">
            <span>
            <label>Owner:</label><br>

<select class="form-control" value="" name="owner">
  <option value="">Please Select an Owner</option>
            <?php
            $sqlcc = "Select * from " . $config['tb_prefix'] . "member_profile WHERE owner = 1 limit 100";
            $resultcc = mysqli_query($aVar, $sqlcc);
            if (mysqli_num_rows($resultcc) > 0) {
                while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                    ?>
                    <option value="<?php echo $rowcat["user_id"] ?>"><?php echo $rowcat["user_name"] ?></option>
                <?php }
            } ?>
</select>

          </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Regcode #1:</label><br>
                        <div class="row">
                            <div class="col-lg-6">
           <span>

            <input class="input form-control" name="reg1" id="reg1" type="text" value="">
          </span>
                            </div>

                            <div class="col-lg-6">
          <span>

            <?php /*?><select class="form-control narrow" value="" name="c1" >

              <option value="">Please Select </option>
            <?php
		    $sqlc1 = "Select DISTINCT c1 from ".$tb_prefix."pd_entries";
            $resultc1 = mysqli_query($aVar, $sqlc1);
            if (mysqli_num_rows($resultc1) > 0) {
            while($rowc1 = mysqli_fetch_assoc($resultc1)) {
                    ?>
             <option value="<?php echo $rowc1["c1"] ?>"><?php echo $rowc1["c1"] ?></option>
            <?php } } ?>
            </select><?php */ ?>

             <select class="form-control narrow" name="c1">
            <option value="">Please Select an Option </option>
            <?php
            $sqlregistry1 = "Select * from dp_registry ORDER BY title ASC";
            $resultregistry1 = mysqli_query($aVar, $sqlregistry1);
            if (mysqli_num_rows($resultregistry1) > 0) {
                while ($rowregistry1 = mysqli_fetch_assoc($resultregistry1)) {
                    ?>
                    <option value="<?php echo $rowregistry1["title"] ?>"><?php echo $rowregistry1["title"] ?></option>
                <?php }
            } ?>

            </select>
          </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Regcode #2 (optional):</label><br>
                        <div class="row">
                            <div class="col-lg-6">
              <span>

            <input class="input form-control" name="reg2" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-6">
            <span>

            <?php /*?><select class="form-control narrow" name="c2" >
              <option value="">Please Select </option>
            <?php
		    $sqlc1 = "Select DISTINCT c1 from ".$tb_prefix."pd_entries";
            $resultc1 = mysqli_query($aVar, $sqlc1);
            if (mysqli_num_rows($resultc1) > 0) {
            while($rowc1 = mysqli_fetch_assoc($resultc1)) {
                    ?>
             <option value="<?php echo $rowc1["c1"] ?>"><?php echo $rowc1["c1"] ?></option>
            <?php } } ?>
            </select><?php */ ?>

             <select class="form-control narrow" name="c2">
            <option value="">Please Select an Option </option>
            <?php
            $sqlregistry1 = "Select * from dp_registry ORDER BY title ASC";
            $resultregistry1 = mysqli_query($aVar, $sqlregistry1);
            if (mysqli_num_rows($resultregistry1) > 0) {
                while ($rowregistry1 = mysqli_fetch_assoc($resultregistry1)) {
                    ?>
                    <option value="<?php echo $rowregistry1["title"] ?>"><?php echo $rowregistry1["title"] ?></option>
                <?php }
            } ?>

            </select>
          </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
             <span>
            <label>Dog Name:</label><br>
            <input class="input form-control" id="dname" name="dname" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-6">
            <span>
            <label>Kennel Name:</label><br>
            <input class="input form-control" id="lname" name="dlastname" type="text" value="">
          </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
              <span>
            <label>Father's Regcode:</label><br>
            <input class="input form-control" name="father_id" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-6">
              <span>
            <label>Mother's Regcode:</label><br>
            <input class="input form-control" name="mother_id" type="text" value="">
          </span>
                            </div>
                        </div>
                    </li>
                    <li class="span3">
                        <div class="row">
                            <div class="col-lg-4">
                            <span>
            <label>Gender:</label><br>
            <select class="form-control" name="gender">
              <option value="">Please Select an Option </option>
<option value="R">Male</option>
<option value="H">Female</option></select>
          </span>
                            </div>
                            <div class="col-lg-4">
             <span>
            <label>Title:</label><br>
            <select class="form-control" value="" name="kz">
              <option value="">Please Select an Option </option>
            <?php
            $sqlct = "Select * from " . $config['tb_prefix'] . "dp_kz";
            $resultct = mysqli_query($aVar, $sqlct);
            if (mysqli_num_rows($resultct) > 0) {
                while ($rowct = mysqli_fetch_assoc($resultct)) {
                    ?>
                    <option value="<?php echo $rowct["title"] ?>"><?php echo $rowct["title"] ?></option>
                <?php }
            } ?>
                    </select>
          </span>
                            </div>
                            <div class="col-lg-4">
           <span>
            <label>Koer:</label><br>
           <select class="form-control" name="kork">
            <option value="">Please Select an Option </option>
            <?php
            $sqlkoer = "Select * from dp_koer";
            $resultkoer = mysqli_query($aVar, $sqlkoer);
            if (mysqli_num_rows($resultkoer) > 0) {
                while ($rowkoer = mysqli_fetch_assoc($resultkoer)) {
                    ?>
                    <option value="<?php echo $rowkoer["title"] ?>"><?php echo $rowkoer["title"] ?></option>
                <?php }
            } ?>

            </select>
          </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
            <span>
            <label>Tattoo:</label><br>
            <input class="input form-control" name="tattoo" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-6">
              <span>
            <label>HDZW:</label><br>
            <input class="input form-control" name="hdzw" type="text" value="">
          </span>
                            </div>
                        </div>
                    </li>
                    <li class="span3">
                        <div class="row">
                            <div class="col-lg-6">
             <span>
            <label>Hips:</label><br>
            <select class="form-control" name="title">
              <option value="">Please Select an Option </option>
            <?php
            $sqlh = "Select * from " . $config['tb_prefix'] . "hips";
            $resulth = mysqli_query($aVar, $sqlh);
            if (mysqli_num_rows($resulth) > 0) {
                while ($rowch = mysqli_fetch_assoc($resulth)) {
                    ?>
                    <option value="<?php echo $rowch["hdb"] ?>"><?php echo $rowch["hips_desc"] ?></option>
                <?php }
            } ?>
            </select>
          </span>
                            </div>
                            <div class="col-lg-6">
           <span>
            <label>Elbow:</label>
            <br>
            <select class="form-control" name="elbow">
              <option value="">Please Select an Option </option>
            <?php
            $sqlel = "Select * from " . $config['tb_prefix'] . "hips_elbow";
            $resultel = mysqli_query($aVar, $sqlel);
            if (mysqli_num_rows($resultel) > 0) {
                while ($rowel = mysqli_fetch_assoc($resultel)) {
                    ?>
                    <option value="<?php echo $rowel["hdb"] ?>"><?php echo $rowel["hips_desc"] ?></option>
                <?php }
            } ?>
            </select>
          </span>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="sm">
                            <label>Date of Birth:</label>

                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                <input class="input form-control" name="dob" type="date" value="">
                            </div>


                        </div>
                    </li>
                    <li class="span3">
                        <div class="row">

                            <div class="col-lg-4">
              <span>
            <label>Micro Chip:</label><br>
            <input class="input form-control" name="micro_chip" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-4">
                            <span>
            <label>DNA:</label><br>
            <input class="input form-control" name="dna" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-4">
           <span>
            <label>Degenerative Myelopathy:</label>
            <br>
            <select class="form-control" name="dm">
              <option value="">Please Select an Option </option>
                <option value="1">Clear</option>
                <option value="2">Normal (N/N)</option>
                <option value="3">Carrier (A/N)</option>
                <option value="4">At-Risk (A/A)</option>
</select>
          </span>
                            </div>
                        </div>
                    </li>
                    <li class="span3">
                        <div class="row">

                            <div class="col-lg-4">
           <span>
            <label>Color:</label><br>
            <input class="input form-control" name="color" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-4">
          <span>
            <label>Class:</label><br>
            <select class="form-control" name="class"><option value=""> </option>
            <option value="VA">VA</option>
            <option value="V">V</option>
            <option value="SG">SG</option>
            <option value="G">G</option>
            </select>
          </span>
                            </div>
                            <div class="col-lg-4">
          <span>
            <label>Coat Type:</label><br>
            <select class="form-control" name="coat">
                <option value="">Please Select an Option </option>
                <option value="0">Stock Coat (Stockhaar)</option>
                <option value="1">Long Stock Coat (Langstockhaar)</option>
                <option value="2">Long Coat (Langhaar)</option></select>


              </select> </span>
                            </div>
                        </div>
                    </li>


                    <li><br>
                        <hr>
                        <h3>Koer Information</h3>
                        <hr>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
     <span>
     <label>Breast Depth:</label><br>
      <input class="input form-control" name="breast_depth" type="text" value="">
      </span>
                            </div>
                            <div class="col-lg-6">
        <span>
        <label>Breast width:</label><br>
            <input class="input form-control" name="breast_width" type="text" value="">
          </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
               <span>
            <label>Height/Withers:</label><br>
            <input class="input form-control" name="height_withers" type="text" value="">
          </span>
                            </div>
                            <div class="col-lg-6">
            <span>
            <label>Weight:</label><br>
            <input class="input form-control" name="weight" type="text" value="">
          </span>
                            </div>
                        </div>
                    </li>
                    <li class="textarea">
                        <label>Koer Report (breed certification report in English):</label>
                        <br>
                        <textarea class="input form-control summernote" row="30" style="height: 200px"
                                  name="breeding"></textarea>
                    </li>
                    <li>
                            <span>
           <label> Koer Date:</label><br>
            <input class="input form-control" name="height" type="text" value="">
          </span>
                        <span>
          </span>
                    </li>


                    <li><strong>Padigree Image:</strong><br>
                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Upload
                            Picture</label>
                        <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image"><br>
                        <img src="" id="profile-img-tag" width="100px"/>

                        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>-->
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

                          $("#imageUpload").change(function () {
                            readURL(this);
                          });
                        </script>
                    </li>


                    <?php #NEW CODE ?>


                    <li><br>
                        <h3>Health Matters</h3>
                        <hr>
                    <li>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                                <div class="col-lg-3"><span><label>Name:</label></span></div>
                                <div class="col-lg-2"><span><label>Dosage:</label></span></div>
                                <div class="col-lg-3"><span><label>Due Date:</label></span></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input_fields_wrap_hm">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group"><span><input class="input form-control"
                                                                             name="insert_date_hm[]"
                                                                             id="insert_date_hm" type="date"
                                                                             value=""></span></div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group"><span><input class="input form-control"
                                                                             name="name_hm[]" id="name_hm"
                                                                             type="text" value=""></span></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group"><span><input class="input form-control"
                                                                             name="dosage_hm[]" id="dosage_hm"
                                                                             type="text" value=""></span></div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group"><span><input class="input form-control"
                                                                             name="due_date_hm[]" id="due_date_hm"
                                                                             type="date" value=""></span></div>
                                    </div>
                                    <button style="background-color:green; height:37px;"
                                            class="add_field_button_hm btn btn-info active">+
                                    </button>
                                </div>


                            </div>
                        </div>


                    <li><br/>
                        <h3>Vaccines</h3>
                        <hr>
                    </li>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                            <div class="col-lg-3"><span><label>Name:</label></span></div>
                            <div class="col-lg-2"><span><label>Dosage:</label></span></div>
                            <div class="col-lg-3"><span><label>Due Date:</label></span></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input_fields_wrap_vc">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="insert_date_vaccines[]"
                                                                         id="name_vaccines" type="date"
                                                                         value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="name_vaccines[]" id="name_vaccines"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="dosage_vaccines[]"
                                                                         id="dosage_vaccines" type="text"
                                                                         value=""></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="due_date_vaccines[]"
                                                                         id="due_date_vaccines" type="date"
                                                                         value=""></span></div>
                                </div>
                                <button style="background-color:green; height:37px;"
                                        class="add_field_button_vc btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>


                    <li><br/>
                        <h3>Rabies</h3>
                        <hr>
                    </li>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                            <div class="col-lg-3"><span><label>Name:</label></span></div>
                            <div class="col-lg-2"><span><label>Dosage:</label></span></div>
                            <div class="col-lg-3"><span><label>Due Date:</label></span></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input_fields_wrap_rb">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="insert_date_rabies[]"
                                                                         id="insert_date_rabies" type="date"
                                                                         value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="name_rabies[]" id="name_rabies"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="dosage_rabies[]" id="dosage_rabies"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="due_date_rabies[]"
                                                                         id="due_date_rabies" type="date"
                                                                         value=""></span>
                                    </div>
                                </div>
                                <button style="background-color:green; height:37px;"
                                        class="add_field_button_rb btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>


                    <li><br/>
                        <h3>Deworming</h3>
                        <hr>
                    </li>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                            <div class="col-lg-3"><span><label>Name:</label></span></div>
                            <div class="col-lg-1"><span><label>Dosage:</label></span></div>
                            <div class="col-lg-1"><span><label>Weight:</label></span></div>
                            <div class="col-lg-3"><span><label>Due Date:</label></span></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input_fields_wrap_de">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="insert_date_deworming[]"
                                                                         id="insert_date_deworming" type="date"
                                                                         value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="name_deworming[]" id="name_deworming"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="dosage_deworming[]"
                                                                         id="dosage_deworming" type="text"
                                                                         value=""></span>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="weight_deworming[]"
                                                                         id="weight_deworming" type="text"
                                                                         value=""></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="due_date_deworming[]"
                                                                         id="due_date_deworming" type="date"
                                                                         value=""></span></div>
                                </div>

                                <button style="background-color:green; height:37px;"
                                        class="add_field_button_de btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>


                    <li><br/>
                        <h3>Litters Information</h3>
                        <hr>
                    </li>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label>Date of Birth:</label></span></div>
                            <div class="col-lg-3"><span><label>Breeding Partner:</label></span></div>
                            <div class="col-lg-2"><span><label>Breed Book No.:</label></span></div>
                            <div class="col-lg-1"><span><label>Breeder:</label></span></div>
                            <div class="col-lg-1"><span><label>Letter:</label></span></div>
                            <div class="col-lg-1"><span><label>Males Total:</label></span></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input_fields_wrap_lt">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="dateofbirth[]" id="dateofbirth"
                                                                         type="date" value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="breeding_partner[]"
                                                                         id="breeding_partner" type="text"
                                                                         value=""></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="breed_bookno[]" id="breed_bookno"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span> <input class="input form-control"
                                                                          name="breederinfo[]" id="breederinfo"
                                                                          type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control" name="letter[]"
                                                                         id="letter" type="text" value=""></span>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control"
                                                                         name="males_total[]" id="males_total"
                                                                         type="text" value=""></span></div>
                                </div>
                                <button style="background-color:green; height:37px;"
                                        class="add_field_button_lt btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>


                    <li><br/>
                        <h3 align="center">Shows Detail</h3>
                        <hr>
                    </li>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label>Show:</label></span></div>
                            <div class="col-lg-2"><span><label>Country Code:</label></span></div>
                            <div class="col-lg-2"><span><label>Judge.:</label></span></div>
                            <div class="col-lg-2"><span><label>Place:</label></span></div>
                            <div class="col-lg-1"><span><label>Rank:</label></span></div>
                            <div class="col-lg-1"><span><label>Override:</label></span></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input_fields_wrap_sd">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="show[]"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><select name="country[]"
                                                                          class="input form-control"><option
                                                        value="">Select</option><?php echo $country_select ?></select></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control" name="judge[]"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control" name="rank[]"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control" name="place[]"
                                                                         type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control" name="override"
                                                                         id="override1" type="radio"
                                                                         value="1"></span></div>
                                </div>
                                <button style="background-color:green; height:37px;"
                                        class="add_field_button_sd btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                      $(document).ready(function () {
                        var max_fields = 15; //maximum input boxes allowed
                        var wrapper = $(".input_fields_wrap_hm"); //Fields wrapper
                        var add_button = $(".add_field_button_hm"); //Add button ID
                        var x = 1; //initlal text box count
                        $(add_button).click(function (e) { //on add input button click
                          e.preventDefault();
                          if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_hm[]" id="insert_date_hm" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_hm[]" id="name_hm" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_hm[]" id="dosage_hm" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_hm[]" id="due_date_hm" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_hm btn btn-info">-</div></div>'); //add input box
                          }
                        });
                        $(wrapper).on("click", ".remove_field_hm", function (e) { //user click on remove text
                          e.preventDefault();
                          $(this).parent('div').remove();
                          x--;
                        })
                      });
                    </script>

                    <script>
                      $(document).ready(function () {
                        var max_fields = 15; //maximum input boxes allowed
                        var wrapper = $(".input_fields_wrap_vc"); //Fields wrapper
                        var add_button = $(".add_field_button_vc"); //Add button ID
                        var x = 1; //initlal text box count
                        $(add_button).click(function (e) { //on add input button click
                          e.preventDefault();
                          if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_vaccines[]" id="insert_date_vaccines" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_vaccines[]" id="name_vaccines" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_vaccines[]" id="dosage_vaccines" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_vaccines[]" id="due_date_vaccines" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_vc btn btn-info">-</div></div>'); //add input box
                          }
                        });
                        $(wrapper).on("click", ".remove_field_vc", function (e) { //user click on remove text
                          e.preventDefault();
                          $(this).parent('div').remove();
                          x--;
                        })
                      });
                    </script>


                    <script>
                      $(document).ready(function () {
                        var max_fields = 15; //maximum input boxes allowed
                        var wrapper = $(".input_fields_wrap_rb"); //Fields wrapper
                        var add_button = $(".add_field_button_rb"); //Add button ID
                        var x = 1; //initlal text box count
                        $(add_button).click(function (e) { //on add input button click
                          e.preventDefault();
                          if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_rabies[]" id="insert_date_rabies" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_rabies[]" id="name_rabies" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_rabies[]" id="dosage_rabies" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_rabies[]" id="due_date_rabies" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_rb btn btn-info">-</div></div>'); //add input box
                          }
                        });
                        $(wrapper).on("click", ".remove_field_rb", function (e) { //user click on remove text
                          e.preventDefault();
                          $(this).parent('div').remove();
                          x--;
                        })
                      });
                    </script>


                    <script>
                      $(document).ready(function () {
                        var max_fields = 15; //maximum input boxes allowed
                        var wrapper = $(".input_fields_wrap_de"); //Fields wrapper
                        var add_button = $(".add_field_button_de"); //Add button ID
                        var x = 1; //initlal text box count
                        $(add_button).click(function (e) { //on add input button click
                          e.preventDefault();
                          if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_deworming[]" id="insert_date_deworming" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_deworming[]" id="name_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="dosage_deworming[]" id="dosage_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="weight_deworming[]" id="weight_deworming" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_deworming[]" id="due_date_deworming" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_de btn btn-info">-</div></div>'); //add input box
                          }
                        });
                        $(wrapper).on("click", ".remove_field_de", function (e) { //user click on remove text
                          e.preventDefault();
                          $(this).parent('div').remove();
                          x--;
                        })
                      });
                    </script>

                    <script>
                      $(document).ready(function () {
                        var max_fields = 15; //maximum input boxes allowed
                        var wrapper = $(".input_fields_wrap_lt"); //Fields wrapper
                        var add_button = $(".add_field_button_lt"); //Add button ID
                        var x = 1; //initlal text box count
                        $(add_button).click(function (e) { //on add input button click
                          e.preventDefault();
                          if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="dateofbirth[]" id="dateofbirth" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="breeding_partner[]" id="breeding_partner" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="breed_bookno[]" id="breed_bookno" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span> <input class="input form-control" name="breederinfo[]" id="breederinfo" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="letter[]" id="letter" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="males_total[]" id="males_total" type="text" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_lt btn btn-info">-</div></div>'); //add input box
                          }
                        });
                        $(wrapper).on("click", ".remove_field_lt", function (e) { //user click on remove text
                          e.preventDefault();
                          $(this).parent('div').remove();
                          x--;
                        })
                      });
                    </script>

                    <script>
                      $(document).ready(function () {
                        var max_fields = 15; //maximum input boxes allowed
                        var wrapper = $(".input_fields_wrap_sd"); //Fields wrapper
                        var add_button = $(".add_field_button_sd"); //Add button ID
                        var x = 1; //initlal text box count
                        $(add_button).click(function (e) { //on add input button click
                          e.preventDefault();
                          if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="show[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="country[]" class="input form-control"><option value="">Select</option><?php echo $country_select?></select></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="judge[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="rank[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="place[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" id="override' + x + '" name="override" type="radio" value="' + x + '"></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_sd btn btn-info">-</div></div>'); //add input box
                          }
                        });
                        $(wrapper).on("click", ".remove_field_sd", function (e) { //user click on remove text
                          e.preventDefault();
                          $(this).parent('div').remove();
                          x--;
                        })
                      });
                    </script>

                    <?php #END NEW CODE ?>


                    <li><input type="submit" value="Add Pedigree" name="pedigree" class="button yelsubmit">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php /*?><script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='show_name'></td>";
   html_code += "<td contenteditable='true' class='show_code'></td>";
   html_code += "<td contenteditable='true' class='show_judge'></td>";
   html_code += "<td contenteditable='true' class='show_place'></td>";
   html_code += "<td contenteditable='true' class='show_rank'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";
   html_code += "</tr>";
   $('#crud_table').append(html_code);
 });

 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });

 $('#save').click(function(){

  var show_name = [];
  var show_code = [];
  var show_judge = [];
  var show_place = [];
  var show_rank = [];
  $('.show_name').each(function(){
   show_name.push($(this).text());
  });
  $('.show_code').each(function(){
   show_code.push($(this).text());
  });
  $('.show_judge').each(function(){
   show_judge.push($(this).text());
  });
  $('.show_place').each(function(){
   show_place.push($(this).text());
  });
  $('.show_rank').each(function(){
   show_rank.push($(this).text());
  });
  $.ajax({
   url:"function/insert.php",
   method:"POST",
   data:{show_name:show_name, show_code:show_code, show_judge:show_judge, show_place:show_place, show_rank:show_rank, show_dname:$("#dname").val(), show_lname:$("#lname").val(), show_reg1:$("#reg1").val()},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });

 function fetch_item_data()
 {
  $.ajax({
   url:"function/fetch.php",
   method:"POST",
   data:{show_dname:$("#dname").val(), show_reg1:$("#reg1").val()},
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();

});
</script><?php */ ?>

<script>
  $(document).ready(function () {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function (e) { //on add input button click
      e.preventDefault();
      if (x < max_fields) { //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
      }
    });

    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
    })
  });
</script>


<?php include("include/footer.php"); ?>

<script src="webpanel/assets/editor/js/jquery.js"></script>
<script src="webpanel/assets/editor/js/bootstrap.min.js"></script>
<script src="webpanel/assets/editor/js/summernote.js"></script>
<script type="text/javascript">

  $(document).ready(function () {

    $('.summernote').summernote({
      height: 200
    });


    $('#submitBtn').click(function () {
      var summernoteContent = $('.summernote').summernote('code');
      $('#result').val(summernoteContent);
    });

  });
</script>
