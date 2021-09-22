<?php
session_start();
include 'include/dbconnection.php';
$bree_id = intval($_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

// for updating pedigree info
    if ($_POST['pedigree']) {
        $cid = mysqli_real_escape_string($con, $_POST['cat']);
        $breeder = mysqli_real_escape_string($con, $_POST['breeder']);
        $owner = mysqli_real_escape_string($con, $_POST['owner']);
        $reg1 = mysqli_real_escape_string($con, $_POST['reg1']);
        $c1 = mysqli_real_escape_string($con, $_POST['c1']);
        $reg2 = mysqli_real_escape_string($con, $_POST['reg2']);
        $c2 = mysqli_real_escape_string($con, $_POST['c2']);
        $dname = mysqli_real_escape_string($con, $_POST['dname']);
        $dlastname = mysqli_real_escape_string($con, $_POST['dlastname']);
        $father_id = mysqli_real_escape_string($con, $_POST['father_id']);
        $mother_id = mysqli_real_escape_string($con, $_POST['mother_id']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $kz = mysqli_real_escape_string($con, $_POST['kz']);
        $kork = mysqli_real_escape_string($con, $_POST['kork']);
        $tattoo = mysqli_real_escape_string($con, $_POST['tattoo']);
        $hdzw = mysqli_real_escape_string($con, $_POST['hdzw']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $elbow = mysqli_real_escape_string($con, $_POST['elbow']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $micro_chip = mysqli_real_escape_string($con, $_POST['micro_chip']);
        $dna = mysqli_real_escape_string($con, $_POST['dna']);
        $dm = mysqli_real_escape_string($con, $_POST['dm']);
        $color = mysqli_real_escape_string($con, $_POST['color']);
        $class = mysqli_real_escape_string($con, $_POST['class']);
        $coat = mysqli_real_escape_string($con, $_POST['coat']);
        $breast_depth = mysqli_real_escape_string($con, $_POST['breast_depth']);
        $breast_width = mysqli_real_escape_string($con, $_POST['breast_width']);
        $height_withers = mysqli_real_escape_string($con, $_POST['height_withers']);
        $weight = mysqli_real_escape_string($con, $_POST['weight']);
        $breeding = mysqli_real_escape_string($con, $_POST['breeding']);
        $height = mysqli_real_escape_string($con, $_POST['height']);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $uid = intval($_GET['uid']);
        move_uploaded_file($image_tmp, "../pictures/$image");

        if ($image) {
            $queupdate = "UPDATE  " . $tb_prefix . "pd_entries SET 
		cid = '$cid', breeder = '$breeder', owner = '$owner', reg1 = '$reg1', c1 = '$c1', reg2 = '$reg2', c2 = '$c2', name = '$dname', lastname = '$dlastname', father_id = '$father_id', mother_id = '$mother_id', gender = '$gender', kz = '$kz', kork = '$kork', tattoo_nr = '$tattoo', hdzw = '$hdzw', title = '$title', elbow = '$elbow', dob = '$dob', micro_chip = '$micro_chip', dna = '$dna', dm = '$dm', color = '$color', class = '$class', coat = '$coat', breast_depth = '$breast_depth', breast_width = '$breast_width', height_withers = '$height_withers', weight = '$weight', breeding = '$breeding', height = '$height', picture = '$image' WHERE reg1 = '$reg1'";

        } else {
            $queupdate = "UPDATE  " . $tb_prefix . "pd_entries SET 
		cid = '$cid', breeder = '$breeder', owner = '$owner', reg1 = '$reg1', c1 = '$c1', reg2 = '$reg2', c2 = '$c2', name = '$dname', lastname = '$dlastname', father_id = '$father_id', mother_id = '$mother_id', gender = '$gender', kz = '$kz', kork = '$kork', tattoo_nr = '$tattoo', hdzw = '$hdzw', title = '$title', elbow = '$elbow', dob = '$dob', micro_chip = '$micro_chip', dna = '$dna', dm = '$dm', color = '$color', class = '$class', coat = '$coat', breast_depth = '$breast_depth', breast_width = '$breast_width', height_withers = '$height_withers', weight = '$weight', breeding = '$breeding', height = '$height' WHERE reg1 = '$reg1'";
        }


        $query = mysqli_query($con, $queupdate);


        $pd = mysqli_real_escape_string($con, $_POST['reg1']);


        // DELETE QUERY
        $delquehm = "DELETE from dp_health_matters WHERE pd = '$pd'";
        mysqli_query($con, $delquehm);// Health Matters

        $delquerabi = "DELETE from dp_rabies WHERE pd = '$pd'";
        mysqli_query($con, $delquerabi);// Rabies

        $delquevacc = "DELETE from dp_vaccines WHERE pd = '$pd'";
        mysqli_query($con, $delquevacc);// Vaccines

        $delquedew = "DELETE from dp_deworming WHERE pd = '$pd'";
        mysqli_query($con, $delquedew);// Deworming

        $delquelitter = "DELETE from dp_litters WHERE pd = '$pd'";
        mysqli_query($con, $delquelitter);// Litters

        $delqueshow = "DELETE from pd_show WHERE sz = '$pd'";
        mysqli_query($con, $delqueshow);// Show

        // END DELETE QUERY


        // For Health Matters
        $iHMData = count($_POST['insert_date_hm']);
        if ($iHMData > 0) {
            for ($hm = 0; $hm < $iHMData; $hm++) {
                $insert_date_hm = mysqli_real_escape_string($con, $_POST['insert_date_hm'][$hm]);
                $name_hm = mysqli_real_escape_string($con, $_POST['name_hm'][$hm]);
                $dosage_hm = mysqli_real_escape_string($con, $_POST['dosage_hm'][$hm]);
                $due_date_hm = $insert_date_hm;

                if ($insert_date_hm != '' and $name_hm != '') {
                    $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                    $query_que_deworming = mysqli_query($con, $que_deworming);
                }
            }
        }//if


        // For Vaccines
        $iVCData = count($_POST['insert_date_vaccines']);
        if ($iVCData > 0) {
            for ($va = 0; $va < $iVCData; $va++) {
                $insert_date_vaccines = mysqli_real_escape_string($con, $_POST['insert_date_vaccines'][$va]);
                $name_vaccines = mysqli_real_escape_string($con, $_POST['name_vaccines'][$va]);
                $dosage_vaccines = mysqli_real_escape_string($con, $_POST['dosage_vaccines'][$va]);
                $due_date_vaccines = mysqli_real_escape_string($con, $_POST['due_date_vaccines'][$va]);
                $type_vaccines = mysqli_real_escape_string($con, $_POST['type_vaccines'][$va]);

                if ($insert_date_vaccines != '' and $name_vaccines != '') {
                    $que_va = "INSERT INTO dp_vaccines(pd, insert_date, due_date, name, dosage,type)    VALUES('$pd','$insert_date_vaccines','$due_date_vaccines','$name_vaccines','$dosage_vaccines','$type_vaccines')";
                    $query_que_va = mysqli_query($con, $que_va);
                }
            }
        }// if

        // For Rabies
        $iRBData = count($_POST['insert_date_rabies']);
        if ($iRBData > 0) {
            for ($ra = 0; $ra < $iRBData; $ra++) {
                $insert_date_rabies = mysqli_real_escape_string($con, $_POST['insert_date_rabies'][$ra]);
                $name_rabies = mysqli_real_escape_string($con, $_POST['name_rabies'][$ra]);
                $dosage_rabies = mysqli_real_escape_string($con, $_POST['dosage_rabies'][$ra]);
                $due_date_rabies = mysqli_real_escape_string($con, $_POST['due_date_rabies'][$ra]);
                $type_rabies = mysqli_real_escape_string($con, $_POST['type_rabies'][$ra]);

                if ($insert_date_rabies != '' and $name_rabies != '') {
                    $que_rab = "INSERT INTO dp_rabies(pd, insert_date, due_date, name, dosage,type) VALUES('$pd','$insert_date_rabies','$due_date_rabies','$name_rabies','$dosage_rabies','$type_rabies')";
                    $query_que_rab = mysqli_query($con, $que_rab);
                }
            }
        }//if

        // For Deworming
        $iDEData = count($_POST['insert_date_deworming']);
        if ($iDEData > 0) {
            for ($de = 0; $de < $iDEData; $de++) {
                $insert_date_deworming = mysqli_real_escape_string($con, $_POST['insert_date_deworming'][$de]);
                $name_deworming = mysqli_real_escape_string($con, $_POST['name_deworming'][$de]);
                $dosage_deworming = mysqli_real_escape_string($con, $_POST['dosage_deworming'][$de]);
                $due_date_deworming = mysqli_real_escape_string($con, $_POST['due_date_deworming'][$de]);
                $weight_deworming = mysqli_real_escape_string($con, $_POST['weight_deworming'][$de]);
                $type_deworming = mysqli_real_escape_string($con, $_POST['type_deworming'][$de]);

                if ($insert_date_deworming != '' and $name_deworming != '') {
                    $que_deworming = "INSERT INTO dp_deworming(pd, insert_date, due_date, name, dosage, weight,type) 	 			
						VALUES('$pd','$insert_date_deworming','$due_date_deworming','$name_deworming','$dosage_deworming','$weight_deworming','$type_deworming')";

                    $query_que_deworming = mysqli_query($con, $que_deworming);
                }
            }
        }

        // For Litters Information
        $iLIData = count($_POST['dateofbirth']);
        if ($iLIData > 0) {
            for ($li = 0; $li < $iLIData; $li++) {
                $dateofbirth = mysqli_real_escape_string($con, $_POST['dateofbirth'][$li]);
                $breeding_partner = mysqli_real_escape_string($con, $_POST['breeding_partner'][$li]);
                $breed_bookno = mysqli_real_escape_string($con, $_POST['breed_bookno'][$li]);
                $letter = mysqli_real_escape_string($con, $_POST['letter'][$li]);
                $males_total = mysqli_real_escape_string($con, $_POST['males_total'][$li]);
                $breederinfo = mysqli_real_escape_string($con, $_POST['breederinfo'][$li]);

                if ($dateofbirth != '' and $breeding_partner != '') {
                    $que_litter = "INSERT INTO dp_litters(pd, dateofbirth, breeding_partner, breed_bookno, breeder,letter,males_total) VALUES('$pd','$dateofbirth','$breeding_partner','$breed_bookno','$breederinfo','$letter','$males_total')";
                    $query_que_litter = mysqli_query($con, $que_litter);
                }
            }
        }//if

        // For Shows Detail
        // For Litters Information
        $iSDData = count($_POST['show']);
        if ($iSDData > 0) {


            for ($sd = 0; $sd < $iSDData; $sd++) {
                $show = mysqli_real_escape_string($con, $_POST['show'][$sd]);
                $judge = mysqli_real_escape_string($con, $_POST['judge'][$sd]);
                $place = mysqli_real_escape_string($con, $_POST['place'][$sd]);
                $rank = mysqli_real_escape_string($con, $_POST['rank'][$sd]);
                $country = mysqli_real_escape_string($con, $_POST['country'][$sd]);

                $ov = $sd + 1;

                $override = mysqli_real_escape_string($con, $_POST['override'][$sd]);

                if (isset($_POST['override']) && $_POST['override'] == $ov) {
                    $override = mysqli_real_escape_string($con, $_POST['override']);
                } else {
                    $override = 0;
                }


                if ($show != '') {
                    //$que_sd = "INSERT INTO pd_show(sz, name, place, judge, rank,country) VALUES('$pd','$show','$place','$judge','$rank','$country')";
                    $que_sd = "INSERT INTO pd_show(sz, cat, place, judge, rank,country,override,name,kennel) VALUES('$pd','$show','$place','$judge','$rank','$country','$override','$dname','$dlastname')";
                    $query_que_sd = mysqli_query($con, $que_sd);
                }
            }
        }//if


        $_SESSION['msg'] = "Pedigree updated successfully";
        $extra = "manage-pedigree.php";
        echo "<script>window.location.href='" . $extra . "'</script>";
    }

    $country_select = '<option value="ABW">ABW</option><option value="AFG">AFG</option><option value="AGO">AGO</option><option value="AIA">AIA</option><option value="ALA">ALA</option><option value="ALB">ALB</option><option value="AND">AND</option><option value="ARE">ARE</option><option value="ARG">ARG</option><option value="ARM">ARM</option><option value="ASM">ASM</option><option value="ATA">ATA</option><option value="ATF">ATF</option><option value="ATG">ATG</option><option value="AUS">AUS</option><option value="AUT">AUT</option><option value="AZE">AZE</option><option value="BDI">BDI</option><option value="BEL">BEL</option><option value="BEN">BEN</option><option value="BFA">BFA</option><option value="BGD">BGD</option><option value="BGR">BGR</option><option value="BHR">BHR</option><option value="BHS">BHS</option><option value="BIH">BIH</option><option value="BLM">BLM</option><option value="BLR">BLR</option><option value="BLZ">BLZ</option><option value="BMU">BMU</option><option value="BOL">BOL</option><option value="BRA">BRA</option><option value="BRB">BRB</option><option value="BRN">BRN</option><option value="BTN">BTN</option><option value="BVT">BVT</option><option value="BWA">BWA</option><option value="BES">BES</option><option value="CAF">CAF</option><option value="CAN">CAN</option><option value="CCK">CCK</option><option value="CHE">CHE</option><option value="CHL">CHL</option><option value="CHN">CHN</option><option value="CIV">CIV</option><option value="CMR">CMR</option><option value="COD">COD</option><option value="COG">COG</option><option value="COK">COK</option><option value="COL">COL</option><option value="COM">COM</option><option value="CPV">CPV</option><option value="CRI">CRI</option><option value="CUB">CUB</option><option value="CUW">CUW</option><option value="CXR">CXR</option><option value="CYM">CYM</option><option value="CYP">CYP</option><option value="CZE">CZE</option><option value="DEU">DEU</option><option value="DJI">DJI</option><option value="DMA">DMA</option><option value="DNK">DNK</option><option value="DOM">DOM</option><option value="DZA">DZA</option><option value="ECU">ECU</option><option value="EGY">EGY</option><option value="ERI">ERI</option><option value="ESH">ESH</option><option value="ESP">ESP</option><option value="EST">EST</option><option value="ETH">ETH</option><option value="FIN">FIN</option><option value="FJI">FJI</option><option value="FLK">FLK</option><option value="FRA">FRA</option><option value="FRO">FRO</option><option value="FSM">FSM</option><option value="GAB">GAB</option><option value="GBR">GBR</option><option value="GEO">GEO</option><option value="GGY">GGY</option><option value="GHA">GHA</option><option value="GIB">GIB</option><option value="GIN">GIN</option><option value="GLP">GLP</option><option value="GMB">GMB</option><option value="GNB">GNB</option><option value="GNQ">GNQ</option><option value="GRC">GRC</option><option value="GRD">GRD</option><option value="GRL">GRL</option><option value="GTM">GTM</option><option value="GUF">GUF</option><option value="GUM">GUM</option><option value="GUY">GUY</option><option value="HKG">HKG</option><option value="HMD">HMD</option><option value="HND">HND</option><option value="HRV">HRV</option><option value="HTI">HTI</option><option value="HUN">HUN</option><option value="IDN">IDN</option><option value="IMN">IMN</option><option value="IND">IND</option><option value="IOT">IOT</option><option value="IRL">IRL</option><option value="IRN">IRN</option><option value="IRQ">IRQ</option><option value="ISL">ISL</option><option value="ISR">ISR</option><option value="ITA">ITA</option><option value="JAM">JAM</option><option value="JEY">JEY</option><option value="JOR">JOR</option><option value="JPN">JPN</option><option value="KAZ">KAZ</option><option value="KEN">KEN</option><option value="KGZ">KGZ</option><option value="KHM">KHM</option><option value="KIR">KIR</option><option value="KNA">KNA</option><option value="KOR">KOR</option><option value="KWT">KWT</option><option value="LAO">LAO</option><option value="LBN">LBN</option><option value="LBR">LBR</option><option value="LBY">LBY</option><option value="LCA">LCA</option><option value="LIE">LIE</option><option value="LKA">LKA</option><option value="LSO">LSO</option><option value="LTU">LTU</option><option value="LUX">LUX</option><option value="LVA">LVA</option><option value="MAC">MAC</option><option value="MAF">MAF</option><option value="MAR">MAR</option><option value="MCO">MCO</option><option value="MDA">MDA</option><option value="MDG">MDG</option><option value="MDV">MDV</option><option value="MEX">MEX</option><option value="MHL">MHL</option><option value="MKD">MKD</option><option value="MLI">MLI</option><option value="MLT">MLT</option><option value="MMR">MMR</option><option value="MNE">MNE</option><option value="MNG">MNG</option><option value="MNP">MNP</option><option value="MOZ">MOZ</option><option value="MRT">MRT</option><option value="MSR">MSR</option><option value="MTQ">MTQ</option><option value="MUS">MUS</option><option value="MWI">MWI</option><option value="MYS">MYS</option><option value="MYT">MYT</option><option value="NAM">NAM</option><option value="NCL">NCL</option><option value="NER">NER</option><option value="NFK">NFK</option><option value="NGA">NGA</option><option value="NIC">NIC</option><option value="NIU">NIU</option><option value="NLD">NLD</option><option value="NOR">NOR</option><option value="NPL">NPL</option><option value="NRU">NRU</option><option value="NZL">NZL</option><option value="OMN">OMN</option><option value="PAK">PAK</option><option value="PAN">PAN</option><option value="PCN">PCN</option><option value="PER">PER</option><option value="PHL">PHL</option><option value="PLW">PLW</option><option value="PNG">PNG</option><option value="POL">POL</option><option value="PRI">PRI</option><option value="PRK">PRK</option><option value="PRT">PRT</option><option value="PRY">PRY</option><option value="PSE">PSE</option><option value="PYF">PYF</option><option value="QAT">QAT</option><option value="REU">REU</option><option value="ROU">ROU</option><option value="RUS">RUS</option><option value="RWA">RWA</option><option value="SAU">SAU</option><option value="SDN">SDN</option><option value="SEN">SEN</option><option value="SGP">SGP</option><option value="SGS">SGS</option><option value="SSD">SSD</option><option value="SHN">SHN</option><option value="SXM">SXM</option><option value="SJM">SJM</option><option value="SLB">SLB</option><option value="SLE">SLE</option><option value="SLV">SLV</option><option value="SMR">SMR</option><option value="SOM">SOM</option><option value="SPM">SPM</option><option value="SRB">SRB</option><option value="STP">STP</option><option value="SUR">SUR</option><option value="SVK">SVK</option><option value="SVN">SVN</option><option value="SWE">SWE</option><option value="SWZ">SWZ</option><option value="SYC">SYC</option><option value="SYR">SYR</option><option value="TCA">TCA</option><option value="TCD">TCD</option><option value="TGO">TGO</option><option value="THA">THA</option><option value="TJK">TJK</option><option value="TKL">TKL</option><option value="TKM">TKM</option><option value="TLS">TLS</option><option value="TON">TON</option><option value="TTO">TTO</option><option value="TUN">TUN</option><option value="TUR">TUR</option><option value="TUV">TUV</option><option value="TWN">TWN</option><option value="TZA">TZA</option><option value="UGA">UGA</option><option value="UKR">UKR</option><option value="UMI">UMI</option><option value="URY">URY</option><option value="USA">USA</option><option value="UZB">UZB</option><option value="VAT">VAT</option><option value="VCT">VCT</option><option value="VEN">VEN</option><option value="VGB">VGB</option><option value="VIR">VIR</option><option value="VNM">VNM</option><option value="VUT">VUT</option><option value="WLF">WLF</option><option value="WSM">WSM</option><option value="YEM">YEM</option><option value="ZAF">ZAF</option><option value="ZMB">ZMB</option><option value="ZWE">ZWE</option>';
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Admin | Update Pedigree</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <link href="assets/editor/css/summernote.css" rel="stylesheet">
        <link href="assets/editor/css/font-awesome.css" rel="stylesheet">
    </head>

    <body>

    <section id="container">
        <?php
        include 'include/header.php';
        include 'include/side.php';
        ?>

        <?php
        //$ret=mysqli_query($con,"select * from pd_entries where reg1='".$_GET['uid']."'");
        // $row=mysqli_fetch_array($ret);

        $pgdid = $_GET['uid'];

        $szdetail = "Select * from " . $tb_prefix . "pd_entries where  reg1='" . $_GET['uid'] . "'";
        $szresultdetail = mysqli_query($con, $szdetail);
        $szccdetail = mysqli_fetch_assoc($szresultdetail);
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3>
                    <i class="fa fa-angle-right"></i> <?php echo $szccdetail['name']; ?> <?php echo $szccdetail['lastname']; ?>
                    's Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>


                            <form name="add" action="" method="post" enctype="multipart/form-data">
                                <ul>

                                    <li>
                                        <h3>Basic Information</h3>
                                        <hr>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">
                                            <div class="col-lg-4">
<span>
<label>Category:</label><br>

<select class="form-control" value="" name="cat">
<?php
$sqlcc = "Select * from " . $tb_prefix . "channels";
$resultcc = mysqli_query($con, $sqlcc);
if (mysqli_num_rows($resultcc) > 0) {
    while ($rowcat = mysqli_fetch_assoc($resultcc)) {
        ?>
        <option value="<?php echo $rowcat["channel_id"] ?>" <?php if ($szccdetail['cid'] == $rowcat["channel_id"]) { ?> selected="selected"<?php } ?>><?php echo $rowcat["channel_name"] ?></option>
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
$sqlcc = "Select * from " . $tb_prefix . "member_profile WHERE breeder= 1 limit 100";
$resultcc = mysqli_query($con, $sqlcc);
if (mysqli_num_rows($resultcc) > 0) {
    while ($rowcat = mysqli_fetch_assoc($resultcc)) {
        ?>
        <option value="<?php echo $rowcat["user_id"] ?>" <?php if ($szccdetail['breeder'] == $rowcat["user_id"]) { ?> selected="selected"<?php } ?>><?php echo $rowcat["user_name"] ?></option>
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
$sqlcc = "Select * from " . $tb_prefix . "member_profile WHERE owner = 1 limit 100";
$resultcc = mysqli_query($con, $sqlcc);
if (mysqli_num_rows($resultcc) > 0) {
    while ($rowcat = mysqli_fetch_assoc($resultcc)) {
        ?>
        <option value="<?php echo $rowcat["user_id"] ?>"  <?php if ($szccdetail['owner'] == $rowcat["user_id"]) { ?> selected="selected"<?php } ?>><?php echo $rowcat["user_name"] ?></option>
    <?php }
} ?>
</select>

</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <label>Regcode #1:</label><br>
                                        <div class="row">
                                            <div class="col-lg-6">
<span>

<input class="input form-control" name="reg1" id="reg1" type="text" value="<?= $szccdetail['reg1'] ?>">
</span>
                                            </div>

                                            <div class="col-lg-6">
<span>

<?php /*?><select class="form-control narrow" value="" name="c1" >

<option value="">Please Select </option>
<?php
$sqlc1 = "Select DISTINCT c1 from ".$tb_prefix."pd_entries";
$resultc1 = mysqli_query($con, $sqlc1);
if (mysqli_num_rows($resultc1) > 0) {
while($rowc1 = mysqli_fetch_assoc($resultc1)) {
?>
<option value="<?php echo $rowc1["c1"] ?>" <?php if($szccdetail['c1'] == $rowc1["c1"]){?> selected="selected"<?php }?>><?php echo $rowc1["c1"] ?></option>
<?php } } ?>
</select><?php */ ?>

<select class="form-control narrow" value="" name="c1">
            <option value="">Please Select an Option </option>
            <?php
            $sqlregistry1 = "Select * from dp_registry ORDER BY title ASC";
            $resultregistry1 = mysqli_query($con, $sqlregistry1);
            if (mysqli_num_rows($resultregistry1) > 0) {
                while ($rowregistry1 = mysqli_fetch_assoc($resultregistry1)) {
                    ?>
                    <option value="<?php echo $rowregistry1["title"] ?>" <?php if ($szccdetail['c1'] == $rowregistry1["title"]) { ?> selected="selected"<?php } ?>><?php echo $rowregistry1["title"] ?></option>
                <?php }
            } ?>

            </select>
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <label>Regcode #2 (optional):</label><br>
                                        <div class="row">
                                            <div class="col-lg-6">
<span>

<input class="input form-control" name="reg2" type="text" value="<?= $szccdetail['reg2'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-6">
<span>

<?php /*?><select class="form-control narrow" name="c2" >
<option value="">Please Select </option>
<?php
$sqlc1 = "Select DISTINCT c2 from ".$tb_prefix."pd_entries";
$resultc1 = mysqli_query($con, $sqlc1);
if (mysqli_num_rows($resultc1) > 0) {
while($rowc1 = mysqli_fetch_assoc($resultc1)) {
?>
<option value="<?php echo $rowc1["c2"] ?>" <?php if($szccdetail['c2'] == $rowc1["c2"]){?> selected="selected"<?php }?>><?php echo $rowc1["c2"] ?></option>
<?php } } ?>
</select><?php */ ?>

<select class="form-control narrow" name="c2">
<option value="">Please Select an Option </option>
<?php
$sqlregistry1 = "Select * from dp_registry ORDER BY title ASC";
$resultregistry1 = mysqli_query($con, $sqlregistry1);
if (mysqli_num_rows($resultregistry1) > 0) {
    while ($rowregistry1 = mysqli_fetch_assoc($resultregistry1)) {
        ?>
        <option value="<?php echo $rowregistry1["title"] ?>" <?php if ($szccdetail['c2'] == $rowregistry1["title"]) { ?> selected="selected"<?php } ?>><?php echo $rowregistry1["title"] ?></option>
    <?php }
} ?>

</select>
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
<span>
<label>Dog Name:</label><br>
<input class="input form-control" id="dname" name="dname" type="text" value="<?= $szccdetail['name'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-6">
<span>
<label>Kennel Name:</label><br>
<input class="input form-control" id="lname" name="dlastname" type="text" value="<?= $szccdetail['lastname'] ?>">
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
<span>
<label>Father's Regcode:</label><br>
<input class="input form-control" name="father_id" type="text" value="<?= $szccdetail['father_id'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-6">
<span>
<label>Mother's Regcode:</label><br>
<input class="input form-control" name="mother_id" type="text" value="<?= $szccdetail['mother_id'] ?>">
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">
                                            <div class="col-lg-4">
<span>
<label>Gender:</label><br>
<select class="form-control" name="gender">
<option value="">Please Select an Option </option>
<option value="R" <?php if ($szccdetail['gender'] == 'R') { ?> selected="selected"<?php } ?>>Male</option>
<option value="H" <?php if ($szccdetail['gender'] == 'H') { ?> selected="selected"<?php } ?>>Female</option></select>
</span>
                                            </div>
                                            <div class="col-lg-4">
<span>
<label>Title:</label><br>
<select class="form-control" value="" name="kz">
<option value="">Please Select an Option </option>
<?php
$sqlct = "Select * from " . $tb_prefix . "dp_kz";
$resultct = mysqli_query($con, $sqlct);
if (mysqli_num_rows($resultct) > 0) {
    while ($rowct = mysqli_fetch_assoc($resultct)) {
        ?>
        <option value="<?php echo $rowct["title"] ?>" <?php if ($szccdetail['kz'] == $rowct["title"]) { ?> selected="selected"<?php } ?>><?php echo $rowct["title"] ?></option>
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
$resultkoer = mysqli_query($con, $sqlkoer);
if (mysqli_num_rows($resultkoer) > 0) {
    while ($rowkoer = mysqli_fetch_assoc($resultkoer)) {
        ?>
        <option value="<?php echo $rowkoer["title"] ?>" <?php if ($szccdetail['kork'] == $rowkoer["title"]) { ?> selected="selected"<?php } ?>><?php echo $rowkoer["title"] ?></option>
    <?php }
} ?>

</select>
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
<span>
<label>Tattoo:</label><br>
<input class="input form-control" name="tattoo" type="text" value="<?= $szccdetail['tattoo_nr'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-6">
<span>
<label>HDZW:</label><br>
<input class="input form-control" name="hdzw" type="text" value="<?= $szccdetail['hdzw'] ?>">
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">
                                            <div class="col-lg-6">
<span>
<label>Hips:</label><br>
<select class="form-control" name="title">
<option value="">Please Select an Option </option>
<?php
$sqlh = "Select * from " . $tb_prefix . "hips";
$resulth = mysqli_query($con, $sqlh);
if (mysqli_num_rows($resulth) > 0) {
    while ($rowch = mysqli_fetch_assoc($resulth)) {
        ?>
        <option value="<?php echo $rowch["hdb"] ?>" <?php if ($szccdetail['title'] == $rowch["hdb"]) { ?> selected="selected"<?php } ?>><?php echo $rowch["hips_desc"] ?></option>
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
$sqlel = "Select * from " . $tb_prefix . "hips_elbow";
$resultel = mysqli_query($con, $sqlel);
if (mysqli_num_rows($resultel) > 0) {
    while ($rowel = mysqli_fetch_assoc($resultel)) {
        ?>
        <option value="<?php echo $rowel["hdb"] ?>" <?php if ($szccdetail['elbow'] == $rowel["hdb"]) { ?> selected="selected"<?php } ?>><?php echo $rowel["hips_desc"] ?></option>
    <?php }
} ?>
</select>
</span>
                                            </div>
                                        </div>

                                    </li>
                                    <li style="">
                                        <div class="sm">
                                            <label>Date of Birth:</label>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-12">
                                                <input class="input form-control" name="dob" type="date"
                                                       value="<?= $szccdetail['dob'] ?>">
                                            </div>


                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">

                                            <div class="col-lg-4">
<span>
<label>Micro Chip:</label><br>
<input class="input form-control" name="micro_chip" type="text" value="<?= $szccdetail['micro_chip'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-4">
<span>
<label>DNA:</label><br>
<input class="input form-control" name="dna" type="text" value="<?= utf8_decode($szccdetail['dna']) ?>">
</span>
                                            </div>
                                            <div class="col-lg-4">
<span>
<label>Degenerative Myelopathy:</label>
<br>
<select class="form-control" name="dm">
<option value="" <?php if (empty($szccdetail['dm'])) { ?> selected="selected"<?php } ?>>Please Select an Option </option>
<option value="1" <?php if ($szccdetail['dm'] == 1) { ?> selected="selected"<?php } ?>>Clear</option>
<option value="2" <?php if ($szccdetail['dm'] == 2) { ?> selected="selected"<?php } ?>>Normal (N/N)</option>
<option value="3" <?php if ($szccdetail['dm'] == 3) { ?> selected="selected"<?php } ?>>Carrier (A/N)</option>
<option value="4" <?php if ($szccdetail['dm'] == 4) { ?> selected="selected"<?php } ?>>At-Risk (A/A)</option>
</select>
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">

                                            <div class="col-lg-4">
<span>
<label>Color:</label><br>
<input class="input form-control" name="color" type="text" value="<?= $szccdetail['color'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-4">
<span>
<label>Class:</label><br>
<select class="form-control" name="class">
<option value="" <?php if (empty($szccdetail['class'])) { ?> selected="selected"<?php } ?>>Please Select an Option</option>
<option value="VA" <?php if ($szccdetail['class'] == 'VA') { ?> selected="selected"<?php } ?>>VA</option>

<option value="V" <?php if ($szccdetail['class'] == 'V') { ?> selected="selected"<?php } ?>>V</option>
<option value="SG" <?php if ($szccdetail['class'] == 'SG') { ?> selected="selected"<?php } ?>>SG</option>
<option value="G" <?php if ($szccdetail['class'] == 'G') { ?> selected="selected"<?php } ?>>G</option>
</select>
</span>
                                            </div>
                                            <div class="col-lg-4">
<span>
<label>Coat Type:</label><br>
<select class="form-control" name="coat">
<option value="" <?php if (empty($szccdetail['coat'])) { ?> selected="selected"<?php } ?>>Please Select an Option </option>
<option value="0" <?php if ($szccdetail['coat'] == '0') { ?> selected="selected"<?php } ?>>Stock Coat (Stockhaar)</option>
<option value="1" <?php if ($szccdetail['coat'] == '1') { ?> selected="selected"<?php } ?>>Long Stock Coat (Langstockhaar)</option>
<option value="2" <?php if ($szccdetail['coat'] == '2') { ?> selected="selected"<?php } ?>>Long Coat (Langhaar)</option></select>


    </select> </span>
                                            </div>
                                        </div>
                                    </li>


                                    <li><br>
                                        <hr>
                                        <h3>Koer Information</h3>
                                        <hr>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
<span>
<label>Breast Depth:</label><br>
<input class="input form-control" name="breast_depth" type="text" value="<?= $szccdetail['breast_depth'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-6">
<span>
<label>Breast width:</label><br>
<input class="input form-control" name="breast_width" type="text" value="<?= $szccdetail['breast_width'] ?>">
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
<span>
<label>Height/Withers:</label><br>
<input class="input form-control" name="height_withers" type="text" value="<?= $szccdetail['height_withers'] ?>">
</span>
                                            </div>
                                            <div class="col-lg-6">
<span>
<label>Weight:</label><br>
<input class="input form-control" name="weight" type="text" value="<?= $szccdetail['weight'] ?>">
</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="textarea" style="">
                                        <label>Koer Report (breed certification report in English):</label>
                                        <br>
                                        <textarea class="input form-control summernote" row="30" style="height: 200px"
                                                  name="breeding"><?= $szccdetail['breeding'] ?></textarea>
                                    </li>
                                    <li style="">
<span>
<label>Koer Date:</label><br>
<input class="input form-control" name="height" type="text" value="<?= $szccdetail['height'] ?>">
</span>
                                        <span>
</span>
                                    </li>


                                    <li style=""><strong><label>Padigree Image:</strong></label><br>
                                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Upload
                                            Picture</label>
                                        <input type="file" id="imageUpload" accept="image/*" style="display: none"
                                               name="image"><br>
                                        <? if ($szccdetail["picture"]) { ?><img
                                            src="../pictures/<?php echo $szccdetail["picture"]; ?>" id="profile-img-tag"
                                            width="100px" /><? } else { ?><img src="" id="profile-img-tag"
                                                                               width="100px"/><? } ?>

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

                                          $("#imageUpload").change(function () {
                                            readURL(this);
                                          });
                                        </script>
                                    </li>


                                    <li><br>
                                        <h3>Health Matters</h3>
                                        <hr>
                                    <li>
                                    <li style="">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-4"><span><label>Insert Date:</label></span></div>
                                                <div class="col-lg-4"><span><label>Name:</label></span></div>
                                                <div class="col-lg-3"><span><label>Dosage:</label></span></div>
                                                <!--<div class="col-lg-3"><span><label>Due Date:</label></span></div>-->
                                            </div>
                                        </div>

                                        <?php
                                        $sqlhm = "Select * from dp_health_matters where pd = '$pgdid'";
                                        $resulthm = mysqli_query($con, $sqlhm);
                                        $iHM = mysqli_num_rows($resulthm);
                                        ?>

                                        <div class="col-md-12">
                                            <div class="input_fields_wrap_hm">
                                                <?php
                                                if ($iHM > 0) {
                                                    $i = 0;
                                                    while ($rowhm = mysqli_fetch_assoc($resulthm)) {

                                                        if ($i == 0) {
                                                            $btnhm = '<button style="background-color:green;height:37px;" class="add_field_button_hm btn btn-info active">+</button>';
                                                        } else {
                                                            $btnhm = '<div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_hm btn btn-info">-</div>';
                                                        }
                                                        ?>

                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="insert_date_hm[]"
                                                                                id="insert_date_hm" type="date"
                                                                                value="<?= $rowhm['insert_date'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="name_hm[]" id="name_hm"
                                                                                type="text"
                                                                                value="<?= $rowhm['name'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="dosage_hm[]" id="dosage_hm"
                                                                                type="text"
                                                                                value="<?= $rowhm['dosage'] ?>"></span>
                                                                </div>
                                                            </div>

                                                            <?php echo $btnhm; ?>
                                                        </div>
                                                        <?php $i++;
                                                    }//while

                                                } else {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="insert_date_hm[]" id="insert_date_hm"
                                                                            type="date" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control" name="name_hm[]"
                                                                            id="name_hm" type="text" value=""></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="dosage_hm[]" id="dosage_hm"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <button style="background-color:green;"
                                                                class="add_field_button_hm btn btn-info active">+
                                                        </button>
                                                    </div>
                                                    <?php
                                                } ?>


                                            </div>
                                        </div>

                                        <div style="clear:both"></div>
                                    </li>

                                    <?php
                                    $sqlvaccines = "Select * from dp_vaccines where pd = '$pgdid'";
                                    $resultvaccines = mysqli_query($con, $sqlvaccines);
                                    $iVac = mysqli_num_rows($resultvaccines);
                                    ?>


                                    <li><br/>
                                        <h3>Vaccines</h3>
                                        <hr>
                                    </li>
                                    <li style="">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                                                <div class="col-lg-2"><span><label>Name:</label></span></div>
                                                <div class="col-lg-2"><span><label>Dosage:</label></span></div>
                                                <div class="col-lg-2"><span><label>Date:</label></span></div>
                                                <div class="col-lg-2"><span><label>Type:</label></span></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input_fields_wrap_vc">
                                                <?php
                                                if ($iVac > 0) {
                                                    $j = 0;
                                                    while ($rowvaccines = mysqli_fetch_assoc($resultvaccines)) {

                                                        if ($j == 0) {
                                                            $btnvc = '<button style="background-color:green;height:37px;" class="add_field_button_vc btn btn-info active">+</button>';
                                                        } else {
                                                            $btnvc = '<div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_vc btn btn-info">-</div>';
                                                        }
                                                        ?>

                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="insert_date_vaccines[]"
                                                                                id="name_vaccines" type="date"
                                                                                value="<?= $rowvaccines['insert_date'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="name_vaccines[]"
                                                                                id="name_vaccines" type="text"
                                                                                value="<?= $rowvaccines['name'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="dosage_vaccines[]"
                                                                                id="dosage_vaccines" type="text"
                                                                                value="<?= $rowvaccines['dosage'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="due_date_vaccines[]"
                                                                                id="due_date_vaccines" type="date"
                                                                                value="<?= $rowvaccines['due_date'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span>
<select name="type_vaccines[]" class="input form-control">
<option value="1" <? if ($rowvaccines['type'] == 1) { ?> selected="selected"<? } ?>>Due date</option>
<option value="2" <? if ($rowvaccines['type'] == 2) { ?> selected="selected"<? } ?>>End date</option>
</select>
</span></div>
                                                            </div>

                                                            <?php echo $btnvc; ?>
                                                        </div>

                                                        <?php $j++;
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="insert_date_vaccines[]"
                                                                            id="name_vaccines" type="date"
                                                                            value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="name_vaccines[]" id="name_vaccines"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="dosage_vaccines[]"
                                                                            id="dosage_vaccines" type="text"
                                                                            value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="due_date_vaccines[]"
                                                                            id="due_date_vaccines" type="date" value=""></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span>
     <select name="type_vaccines[]" class="input form-control">
     <option value="1">Due date</option>
     <option value="2">End date</option>
     </select>
     </span></div>
                                                        </div>
                                                        <button style="background-color:green;"
                                                                class="add_field_button_vc btn btn-info active">+
                                                        </button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                    </li>


                                    <li><br/>
                                        <h3>Rabies</h3>
                                        <hr>
                                    </li>
                                    <li style="">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                                                <div class="col-lg-2"><span><label>Name:</label></span></div>
                                                <div class="col-lg-2"><span><label>Dosage:</label></span></div>
                                                <div class="col-lg-2"><span><label>Date:</label></span></div>
                                                <div class="col-lg-2"><span><label>Type:</label></span></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input_fields_wrap_rb">
                                                <?php
                                                $sqlrabies = "Select * from dp_rabies where pd = '$pgdid'";
                                                $resultrabies = mysqli_query($con, $sqlrabies);
                                                $iReb = mysqli_num_rows($resultrabies);

                                                if ($iReb > 0) {
                                                    $k = 0;
                                                    while ($rowrabies = mysqli_fetch_assoc($resultrabies)) {

                                                        if ($k == 0) {
                                                            $btnrb = '<button style="background-color:green;height:37px;" class="add_field_button_rb btn btn-info active">+</button>';
                                                        } else {
                                                            $btnrb = '<div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_rb btn btn-info">-</div>';
                                                        }
                                                        ?>

                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="insert_date_rabies[]"
                                                                                id="insert_date_rabies" type="date"
                                                                                value="<?= $rowrabies['insert_date'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="name_rabies[]" id="name_rabies"
                                                                                type="text"
                                                                                value="<?= $rowrabies['name'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="dosage_rabies[]"
                                                                                id="dosage_rabies" type="text"
                                                                                value="<?= $rowrabies['dosage'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="due_date_rabies[]"
                                                                                id="due_date_rabies" type="date"
                                                                                value="<?= $rowrabies['due_date'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span>
     <select name="type_rabies[]" class="input form-control">
     <option value="1" <? if ($rowrabies['type'] == 1) { ?> selected="selected"<? } ?>>Due date</option>
     <option value="2" <? if ($rowrabies['type'] == 2) { ?> selected="selected"<? } ?>>End date</option>
     </select>
     </span></div>
                                                            </div>
                                                            <?php echo $btnrb; ?>
                                                        </div>

                                                        <?php $k++;
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="insert_date_rabies[]"
                                                                            id="insert_date_rabies" type="date"
                                                                            value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="name_rabies[]" id="name_rabies"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="dosage_rabies[]" id="dosage_rabies"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="due_date_rabies[]"
                                                                            id="due_date_rabies" type="date"
                                                                            value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span>
     <select name="type_rabies[]" class="input form-control">
     <option value="1">Due date</option>
     <option value="2">End date</option>
     </select>
     </span></div>
                                                        </div>
                                                        <button style="background-color:green;"
                                                                class="add_field_button_rb btn btn-info active">+
                                                        </button>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                    </li>


                                    <li><br/>
                                        <h3>Deworming</h3>
                                        <hr>
                                    </li>
                                    <li style="">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                                                <div class="col-lg-2"><span><label>Name:</label></span></div>
                                                <div class="col-lg-1"><span><label>Dosage:</label></span></div>
                                                <div class="col-lg-1"><span><label>Weight:</label></span></div>
                                                <div class="col-lg-2"><span><label>Date:</label></span></div>
                                                <div class="col-lg-2"><span><label>Type:</label></span></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input_fields_wrap_de">
                                                <?php
                                                $sqldeworming = "Select * from dp_deworming where pd = '$pgdid'";
                                                $resultdeworming = mysqli_query($con, $sqldeworming);
                                                $iDew = mysqli_num_rows($resultdeworming);

                                                if ($iDew > 0) {
                                                    $l = 0;
                                                    while ($rowdeworming = mysqli_fetch_assoc($resultdeworming)) {

                                                        if ($l == 0) {
                                                            $btnde = '<button style="background-color:green;height:37px;" class="add_field_button_de btn btn-info active">+</button>';
                                                        } else {
                                                            $btnde = '<div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_de btn btn-info">-</div>';
                                                        }
                                                        ?>

                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="insert_date_deworming[]"
                                                                                id="insert_date_deworming" type="date"
                                                                                value="<?= $rowdeworming['insert_date'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="name_deworming[]"
                                                                                id="name_deworming" type="text"
                                                                                value="<?= $rowdeworming['name'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="dosage_deworming[]"
                                                                                id="dosage_deworming" type="text"
                                                                                value="<?= $rowdeworming['dosage'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="weight_deworming[]"
                                                                                id="weight_deworming" type="text"
                                                                                value="<?= $rowdeworming['weight'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="due_date_deworming[]"
                                                                                id="due_date_deworming" type="date"
                                                                                value="<?= $rowdeworming['due_date'] ?>"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span>
     <select name="type_deworming[]" class="input form-control">
     <option value="1" <? if ($rowdeworming['type'] == 1) { ?> selected="selected"<? } ?>>Due date</option>
     <option value="2" <? if ($rowdeworming['type'] == 2) { ?> selected="selected"<? } ?>>End date</option>
     </select>
     </span></div>
                                                            </div>

                                                            <?php echo $btnde; ?>
                                                        </div>
                                                        <?php $l++;
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="insert_date_deworming[]"
                                                                            id="insert_date_deworming" type="date"
                                                                            value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="name_deworming[]" id="name_deworming"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="dosage_deworming[]"
                                                                            id="dosage_deworming" type="text" value=""></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="weight_deworming[]"
                                                                            id="weight_deworming" type="text" value=""></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="due_date_deworming[]"
                                                                            id="due_date_deworming" type="date"
                                                                            value=""></span></div>
                                                        </div>

                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span>
     <select name="type_deworming[]" class="input form-control">
     <option value="1">Due date</option>
     <option value="2">End date</option>
     </select>
     </span></div>
                                                        </div>

                                                        <button style="background-color:green;"
                                                                class="add_field_button_de btn btn-info active">+
                                                        </button>

                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div style="clear:both"></div>
                                    </li>

                                    <li><br/>
                                        <h3>Litters Information</h3>
                                        <hr>
                                    </li>
                                    <li style="">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-3"><span><label>Date of Birth:</label></span></div>
                                                <div class="col-lg-3"><span><label>Breeding Partner:</label></span>
                                                </div>
                                                <div class="col-lg-2"><span><label>Breed Book No.:</label></span></div>
                                                <div class="col-lg-1"><span><label>Breeder:</label></span></div>
                                                <div class="col-lg-1"><span><label>Letter:</label></span></div>
                                                <div class="col-lg-1"><span><label>Males Total:</label></span></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input_fields_wrap_lt">
                                                <?php
                                                $sqllitters = "Select * from dp_litters where pd = '$pgdid'";
                                                $resultlitters = mysqli_query($con, $sqllitters);
                                                $iLitter = mysqli_num_rows($resultlitters);

                                                if ($iLitter > 0) {
                                                    $m = 0;
                                                    while ($rowlitter = mysqli_fetch_assoc($resultlitters)) {

                                                        if ($m == 0) {
                                                            $btndlt = '<button style="background-color:green;height:37px;" class="add_field_button_lt btn btn-info active">+</button>';
                                                        } else {
                                                            $btndlt = '<div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_lt btn btn-info">-</div>';
                                                        }
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="dateofbirth[]" id="dateofbirth"
                                                                                type="date"
                                                                                value="<?= $rowlitter['dateofbirth'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="breeding_partner[]"
                                                                                id="breeding_partner" type="text"
                                                                                value="<?= $rowlitter['breeding_partner'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="breed_bookno[]" id="breed_bookno"
                                                                                type="text"
                                                                                value="<?= $rowlitter['breed_bookno'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group"><span> <input
                                                                                class="input form-control"
                                                                                name="breederinfo[]" id="breederinfo"
                                                                                type="text"
                                                                                value="<?= $rowlitter['breeder'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="letter[]" id="letter" type="text"
                                                                                value="<?= $rowlitter['letter'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="males_total[]" id="males_total"
                                                                                type="text"
                                                                                value="<?= $rowlitter['males_total'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <?php echo $btndlt; ?>
                                                        </div>

                                                        <?php $m++;
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="dateofbirth[]" id="dateofbirth"
                                                                            type="date" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="breeding_partner[]"
                                                                            id="breeding_partner" type="text" value=""></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="breed_bookno[]" id="breed_bookno"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="form-group"><span> <input
                                                                            class="input form-control"
                                                                            name="breederinfo[]" id="breederinfo"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control" name="letter[]"
                                                                            id="letter" type="text" value=""></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            name="males_total[]" id="males_total"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <button style="background-color:green;"
                                                                class="add_field_button_lt btn btn-info active">+
                                                        </button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                    </li>

                                    <li><br/>
                                        <h3>Shows Detail</h3>
                                        <hr>
                                    </li>
                                    <li style="">
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

                                                <?php
                                                $showdetail = "Select * from " . $tb_prefix . "pd_show where sz = '$pgdid'  ORDER BY override DESC, cat DESC";
                                                $showresultdetail = mysqli_query($con, $showdetail);

                                                $iShow = mysqli_num_rows($showresultdetail);
                                                if ($iShow > 0) {
                                                    $y = $iShow;
                                                    $n = 0;
                                                    while ($rowshowdetail = mysqli_fetch_assoc($showresultdetail)) {

                                                        if ($n == 0) {
                                                            $btndsd = '<button style="background-color:green;height:37px;" class="add_field_button_sd btn btn-info active">+</button>';
                                                        } else {
                                                            $btndsd = '<div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_sd btn btn-info">-</div>';
                                                        }
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control" name="show[]"
                                                                                type="text"
                                                                                value="<?= $rowshowdetail['cat'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><select name="country[]"
                                                                                                      class="input form-control"><option
                                                                                    value="">Select</option><option
                                                                                    value="<?= $rowshowdetail['country'] ?>"
                                                                                    selected><?= $rowshowdetail['country'] ?></option> <?php echo $country_select; ?></select></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="judge[]" type="text"
                                                                                value="<?= $rowshowdetail['judge'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control" name="rank[]"
                                                                                type="text"
                                                                                value="<?= $rowshowdetail['rank'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                name="place[]" type="text"
                                                                                value="<?= $rowshowdetail['place'] ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group"><span><input
                                                                                class="input form-control"
                                                                                id="override<?php echo $n + 1; ?>"
                                                                                name="override"
                                                                                type="radio" <?php if ($rowshowdetail['override'] > 0) { ?> checked<?php } ?> value="<?php echo $n + 1; ?>"></span>
                                                                </div>
                                                            </div>
                                                            <?php echo $btndsd; ?>
                                                        </div>
                                                        <?php $n++;
                                                    }//while

                                                } else {
                                                    $y = 1;
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control" name="show[]"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><select name="country[]"
                                                                                                  class="input form-control"><option
                                                                                value="">Select</option><?php echo $country_select; ?></select></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control" name="judge[]"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control" name="rank[]"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control" name="place[]"
                                                                            type="text" value=""></span></div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="form-group"><span><input
                                                                            class="input form-control"
                                                                            id="override<?php echo $iShow + 1; ?>"
                                                                            name="override" type="radio"
                                                                            value="<?php echo $iShow + 1; ?>"></span>
                                                            </div>
                                                        </div>
                                                        <button style="background-color:green;"
                                                                class="add_field_button_sd btn btn-info active">+
                                                        </button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                    </li>


                                    <li style="margin-top:20px;padding-top:20px;">
                                        <input type="submit" value="Update Pedigree" name="pedigree"
                                               class="button yelsubmit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        <a href="manage-pedigree.php?id=<?php echo $szccdetail['indexer']; ?>&reg=<?php echo $szccdetail['reg1']; ?>">
                                            <button type="button" class="button yelsubmit"
                                                    onClick="return confirm('Are you sure you want to delete pedigree <?php echo $szccdetail['name']; ?><?php echo $row['lastname']; ?>');">
                                                Delete Pedigree
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </form>


                        </div>
                    </div>
                </div>
            </section>

        </section>
    </section>
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
            $(wrapper).append('<div class="row"><div class="col-lg-4"><div class="form-group"><span><input class="input form-control" name="insert_date_hm[]" id="insert_date_hm" type="date" value=""></span></div></div><div class="col-lg-4"><div class="form-group"><span><input class="input form-control" name="name_hm[]" id="name_hm" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="dosage_hm[]" id="dosage_hm" type="text" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_hm btn btn-info">-</div></div>'); //add input box
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
            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_vaccines[]" id="insert_date_vaccines" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="name_vaccines[]" id="name_vaccines" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_vaccines[]" id="dosage_vaccines" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="due_date_vaccines[]" id="due_date_vaccines" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="type_vaccines[]" class="input form-control"><option value="1">Due date</option><option value="2">End date</option>   </select></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_vc btn btn-info">-</div></div>'); //add input box
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
            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_rabies[]" id="insert_date_rabies" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="name_rabies[]" id="name_rabies" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_rabies[]" id="dosage_rabies" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="due_date_rabies[]" id="due_date_rabies" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="type_rabies[]" class="input form-control"><option value="1">Due date</option><option value="2">End date</option> </select></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_rb btn btn-info">-</div></div>'); //add input box
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
            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_deworming[]" id="insert_date_deworming" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="name_deworming[]" id="name_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="dosage_deworming[]" id="dosage_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="weight_deworming[]" id="weight_deworming" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="due_date_deworming[]" id="due_date_deworming" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="type_deworming[]" class="input form-control"><option value="1">Due date</option><option value="2">End date</option> </select></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_de btn btn-info">-</div></div>'); //add input box
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
        var x = <?=$y?>; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
          e.preventDefault();
          if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="show[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="country[]" class="input form-control"><option value="">Select</option><?php echo $country_select;?></select></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="judge[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="rank[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="place[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" id="override' + x + '" name="override" type="radio" value="' + x + '"></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_sd btn btn-info">-</div></div>'); //add input box
          }
        });
        $(wrapper).on("click", ".remove_field_sd", function (e) { //user click on remove text
          e.preventDefault();
          $(this).parent('div').remove();
          x--;
        })
      });
    </script>
    <?php
    include 'include/footer.php';
    ?>
    </body>
    </html>
<?php } ?>
