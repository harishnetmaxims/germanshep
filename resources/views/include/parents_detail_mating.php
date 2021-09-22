<!-- For mother Detail  -->
<!-- First Column -->
<?php	 
	$msz = $szccdetail["mother_id"];
	$mszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$msz'";
	$mszresultdetail = mysqli_query($aVar, $mszdetail); 
	$mszccdetail = mysqli_fetch_assoc($mszresultdetail);
	
	$mshowdetail = "Select * from ".$tb_prefix."pd_show where sz = $msz AND cat != ''  ORDER BY showid desc LIMIT 1";
	$mshowresultdetail = mysqli_query($aVar, $mshowdetail); 
	$mshowccdetail = mysqli_fetch_assoc($mshowresultdetail);
?> 

<!-- For Father Detail  -->
<?php	 
	$fsz = $szccdetail["father_id"];
	$fszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$fsz'";
	$fszresultdetail = mysqli_query($aVar, $fszdetail); 
	$fszccdetail = mysqli_fetch_assoc($fszresultdetail);
	
	$fshowdetail = "Select * from ".$tb_prefix."pd_show where sz = $fsz AND cat != ''  ORDER BY showid desc LIMIT 1";
	$fshowresultdetail = mysqli_query($aVar, $fshowdetail); 
	$fshowccdetail = mysqli_fetch_assoc($fshowresultdetail);
?> 

<!-- End First Column -->



<!-- For F.mother Detail  -->
<!-- Second Column -->
<?php	 
		 $fmsz = $matccdetail["mother_id"];
		 $fmszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$fmsz'";
         $fmszresultdetail = mysqli_query($aVar, $fmszdetail); 
		 $fmszccdetail = mysqli_fetch_assoc($fmszresultdetail);	 
		 
		 $fmshowdetail = "Select * from ".$tb_prefix."pd_show where sz = $fmsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $fmshowresultdetail = mysqli_query($aVar, $fmshowdetail); 
         $fmshowccdetail = mysqli_fetch_assoc($fmshowresultdetail);	 
?> 

<!-- For F.Father Detail  -->
<?php	 
		 $ffsz = $matccdetail["father_id"];
		 $ffszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$ffsz'";
         $ffszresultdetail = mysqli_query($aVar, $ffszdetail); 
		 $ffszccdetail = mysqli_fetch_assoc($ffszresultdetail);
		 
		 
		$ffshowdetail = "Select * from ".$tb_prefix."pd_show where sz = $ffsz AND cat != ''  ORDER BY showid desc LIMIT 1";
        $ffshowresultdetail = mysqli_query($aVar, $ffshowdetail); 
        $ffshowccdetail = mysqli_fetch_assoc($ffshowresultdetail);	 
?> 
<!-- For M.mother Detail  -->
<?php	 
		 $mmsz = $szccdetail["mother_id"];
		 $mmszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$mmsz'";
         $mmszresultdetail = mysqli_query($aVar, $mmszdetail); 
		 $mmszccdetail = mysqli_fetch_assoc($mmszresultdetail);	 
		 
		 $mmshowdetail = "Select * from ".$tb_prefix."pd_show where sz = $mmsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $mmshowresultdetail = mysqli_query($aVar, $mmshowdetail); 
         $mmshowccdetail = mysqli_fetch_assoc($mmshowresultdetail);
?> 

<!-- For M.Father Detail  -->
<?php	 
		 $mfsz = $szccdetail["father_id"];
		 $mfszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$mfsz'";
         $mfszresultdetail = mysqli_query($aVar, $mfszdetail); 
		 $mfszccdetail = mysqli_fetch_assoc($mfszresultdetail);	
		 
		 $mfshowdetail = "Select * from ".$tb_prefix."pd_show where sz = $mfsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $mfshowresultdetail = mysqli_query($aVar, $mfshowdetail); 
         $mfshowccdetail = mysqli_fetch_assoc($mfshowresultdetail); 
?> 




<!-- End Second Column -->


<!-- Third Column -->

<!-- For M.M.mother Detail  -->
<?php	 
		 $mmmsz = $mmszccdetail["mother_id"];
		 $mmmszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$mmmsz'";
         $mmmszresultdetail = mysqli_query($aVar, $mmmszdetail); 
		 $mmmszccdetail = mysqli_fetch_assoc($mmmszresultdetail);	
		 
		 $mmmszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $mmmsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $mmmszresultdetailshow = mysqli_query($aVar, $mmmszdetailshow); 
         $mmmszccdetailshow = mysqli_fetch_assoc($mmmszresultdetailshow);  
?> 
<!-- For M.M.Father Detail  -->
<?php	 
		 $mmfsz = $mmszccdetail["father_id"];
		 $mmfszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$mmfsz'";
         $mmfszresultdetail = mysqli_query($aVar, $mmfszdetail); 
		 $mmfszccdetail = mysqli_fetch_assoc($mmfszresultdetail);	 
		 
		 $mmfszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $mmfsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $mmfszresultdetailshow = mysqli_query($aVar, $mmfszdetailshow); 
         $mmfszccdetailshow = mysqli_fetch_assoc($mmfszresultdetailshow); 
?> 
<!-- For M.M.mother Detail  -->
<?php	 
		 $mfmsz = $mfszccdetail["mother_id"];
		 $mmmmszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$mfmsz'";
         $mmmmszresultdetail = mysqli_query($aVar, $mmmmszdetail); 
		 $mmmmszccdetail = mysqli_fetch_assoc($mmmmszresultdetail);	 
		 
		 $mmmmszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $mfmsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $mmmmszresultdetailshow = mysqli_query($aVar, $mmmmszdetailshow); 
         $mmmmszccdetailshow = mysqli_fetch_assoc($mmmmszresultdetailshow); 
?> 

<!-- For M.M.Father Detail  -->
<?php	 
		 $mffsz = $mfszccdetail["father_id"];
		 $mffszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$mffsz'";
         $mffszresultdetail = mysqli_query($aVar, $mffszdetail); 
		 $mffszccdetail = mysqli_fetch_assoc($mffszresultdetail);	
		 
		 $mffszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $mffsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $mffszresultdetailshow = mysqli_query($aVar, $mffszdetailshow); 
         $mffszccdetailshow = mysqli_fetch_assoc($mffszresultdetailshow);  
?> 










<!-- For F.F.mother Detail  -->
<?php	 
		 $ffmsz = $ffszccdetail["mother_id"];
		 $ffmszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$ffmsz'";
         $ffmszresultdetail = mysqli_query($aVar, $ffmszdetail); 
		 $ffmszccdetail = mysqli_fetch_assoc($ffmszresultdetail);	
		 
		 $ffmszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $ffmsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $ffmszresultdetailshow = mysqli_query($aVar, $ffmszdetailshow); 
         $ffmszccdetailshow = mysqli_fetch_assoc($ffmszresultdetailshow);   
?> 

<!-- For F.F.Father Detail  -->
<?php	 
		 $fffsz = $ffszccdetail["father_id"];
		 $fffszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$fffsz'";
         $fffszresultdetail = mysqli_query($aVar, $fffszdetail); 
		 $fffszccdetail = mysqli_fetch_assoc($fffszresultdetail);	
		 
		 $fffszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $fffsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $fffszresultdetailshow = mysqli_query($aVar, $fffszdetailshow); 
         $fffszccdetailshow = mysqli_fetch_assoc($fffszresultdetailshow);    
?> 
<!-- For F.M.mother Detail  -->
<?php	 
		 $fmmsz = $fmszccdetail["mother_id"];
		 $fmmszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$fmmsz'";
         $fmmszresultdetail = mysqli_query($aVar, $fmmszdetail); 
		 $fmmszccdetail = mysqli_fetch_assoc($fmmszresultdetail);
		 
		 $fmmszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $fmmsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $fmmszresultdetailshow = mysqli_query($aVar, $fmmszdetailshow); 
         $fmmszccdetailshow = mysqli_fetch_assoc($fmmszresultdetailshow);	 
?> 

<!-- For F.M.Father Detail  -->
<?php	 
		 $fmfsz = $fmszccdetail["father_id"];
		 $fmfszdetail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$fmfsz'";
         $fmfszresultdetail = mysqli_query($aVar, $fmfszdetail); 
		 $fmfszccdetail = mysqli_fetch_assoc($fmfszresultdetail);	
		 
		 $fmfszdetailshow = "Select * from ".$tb_prefix."pd_show where sz = $fmfsz AND cat != ''  ORDER BY showid desc LIMIT 1";
         $fmfszresultdetailshow = mysqli_query($aVar, $fmfszdetailshow); 
         $fmfszccdetailshow = mysqli_fetch_assoc($fmfszresultdetailshow);	  
?> 

<!-- End Third Column -->

<!--Column $th data-->

<!--Column 4th 1 row data-->
<?php	 
		 $col4_1 = $fffszccdetail["father_id"];		 		   
		 $col4_1detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_1'";
         $col4_1resultdetail = mysqli_query($aVar, $col4_1detail); 
		 $col4_1ccdetail = mysqli_fetch_assoc($col4_1resultdetail);	
		 
		 
		 $col4_1detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_1 AND cat != '' ORDER BY showid desc LIMIT 1";
         $col4_1resultdetail_show = mysqli_query($aVar, $col4_1detail_show); 
         $col4_1ccdetail_show = mysqli_fetch_assoc($col4_1resultdetail_show);	 
		 
		 
?> 
<!--Column 4th 2 row data-->
<?php	 
		 $col4_2 = $fffszccdetail["mother_id"];
		 $col4_2detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_2'";
         $col4_2resultdetail = mysqli_query($aVar, $col4_2detail); 
		 $col4_2ccdetail = mysqli_fetch_assoc($col4_2resultdetail);	 
		 
		 $col4_2detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_2 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_2resultdetail_show = mysqli_query($aVar, $col4_2detail_show); 
         $col4_2ccdetail_show = mysqli_fetch_assoc($col4_2resultdetail_show);	 
?> 

<!--Column 4th 3 row data-->
<?php	 
		 $col4_3 = $ffmszccdetail["father_id"];
		 $col4_3detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_3'";
         $col4_3resultdetail = mysqli_query($aVar, $col4_3detail); 
		 $col4_3ccdetail = mysqli_fetch_assoc($col4_3resultdetail);	 
		 
		 $col4_3detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_3 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_3resultdetail_show = mysqli_query($aVar, $col4_3detail_show); 
         $col4_3ccdetail_show = mysqli_fetch_assoc($col4_3resultdetail_show);
?> 
<!--Column 4th 4 row data-->
<?php	 
		 $col4_4 = $ffmszccdetail["mother_id"];
		 $col4_4detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_4'";
         $col4_4resultdetail = mysqli_query($aVar, $col4_4detail); 
		 $col4_4ccdetail = mysqli_fetch_assoc($col4_4resultdetail);	 
		 
		 $col4_4detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_4 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_4resultdetail_show = mysqli_query($aVar, $col4_4detail_show); 
         $col4_4ccdetail_show = mysqli_fetch_assoc($col4_4resultdetail_show);
?> 


<!--Column 4th 5 row data-->
<?php	 
		 $col4_5 = $fmfszccdetail["father_id"];
		 $col4_5detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_5'";
         $col4_5resultdetail = mysqli_query($aVar, $col4_5detail); 
		 $col4_5ccdetail = mysqli_fetch_assoc($col4_5resultdetail);	 
		 
		 $col4_5detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_5 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_5resultdetail_show = mysqli_query($aVar, $col4_5detail_show); 
         $col4_5ccdetail_show = mysqli_fetch_assoc($col4_5resultdetail_show);
?> 
<!--Column 4th 6 row data-->
<?php	 
		 $col4_6 = $fmfszccdetail["mother_id"];
		 $col4_6detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_6'";
         $col4_6resultdetail = mysqli_query($aVar, $col4_6detail); 
		 $col4_6ccdetail = mysqli_fetch_assoc($col4_6resultdetail);	
		 
		 $col4_6detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_6 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_6resultdetail_show = mysqli_query($aVar, $col4_6detail_show); 
         $col4_6ccdetail_show = mysqli_fetch_assoc($col4_6resultdetail_show); 
?> 

<!--Column 4th 7 row data-->
<?php	 
		 $col4_7 = $fmmszccdetail["father_id"];
		 $col4_7detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_7'";
         $col4_7resultdetail = mysqli_query($aVar, $col4_7detail); 
		 $col4_7ccdetail = mysqli_fetch_assoc($col4_7resultdetail);	
		 
		 $col4_7detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_7 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_7resultdetail_show = mysqli_query($aVar, $col4_7detail_show); 
         $col4_7ccdetail_show = mysqli_fetch_assoc($col4_7resultdetail_show);  
?> 
<!--Column 4th 8 row data-->
<?php	 
		 $col4_8 = $fmmszccdetail["mother_id"];
		 $col4_8detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_8'";
         $col4_8resultdetail = mysqli_query($aVar, $col4_8detail); 
		 $col4_8ccdetail = mysqli_fetch_assoc($col4_8resultdetail);	 
		 
		 $col4_8detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_8 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_8resultdetail_show = mysqli_query($aVar, $col4_8detail_show); 
         $col4_8ccdetail_show = mysqli_fetch_assoc($col4_8resultdetail_show); 
?> 


<!--Column 4th 9 row data-->
<?php	 
		 $col4_9 = $mffszccdetail["father_id"];
		 $col4_9detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_9'";
         $col4_9resultdetail = mysqli_query($aVar, $col4_9detail); 
		 $col4_9ccdetail = mysqli_fetch_assoc($col4_9resultdetail);	 
		 
		 $col4_9detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_9 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_9resultdetail_show = mysqli_query($aVar, $col4_9detail_show); 
         $col4_9ccdetail_show = mysqli_fetch_assoc($col4_9resultdetail_show); 
?> 
<!--Column 4th 10 row data-->
<?php	 
		 $col4_10 = $mffszccdetail["mother_id"];
		 $col4_10detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_10'";
         $col4_10resultdetail = mysqli_query($aVar, $col4_10detail); 
		 $col4_10ccdetail = mysqli_fetch_assoc($col4_10resultdetail);	 
		 
		 $col4_10detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_10 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_10resultdetail_show = mysqli_query($aVar, $col4_10detail_show); 
         $col4_10ccdetail_show = mysqli_fetch_assoc($col4_10resultdetail_show); 
?> 

<!--Column 4th 11 row data-->
<?php	 
		 $col4_11 = $mmmmszccdetail["father_id"];
		 $col4_11detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_11'";
         $col4_11resultdetail = mysqli_query($aVar, $col4_11detail); 
		 $col4_11ccdetail = mysqli_fetch_assoc($col4_11resultdetail);	 
		 
		 $col4_11detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_11 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_11resultdetail_show = mysqli_query($aVar, $col4_11detail_show); 
         $col4_11ccdetail_show = mysqli_fetch_assoc($col4_11resultdetail_show); 
?> 
<!--Column 4th 12 row data-->
<?php	 
		 $col4_12 = $mmmmszccdetail["mother_id"];
		 $col4_12detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_12'";
         $col4_12resultdetail = mysqli_query($aVar, $col4_12detail); 
		 $col4_12ccdetail = mysqli_fetch_assoc($col4_12resultdetail);	 
		 
		 $col4_12detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_12 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_12resultdetail_show = mysqli_query($aVar, $col4_12detail_show); 
         $col4_12ccdetail_show = mysqli_fetch_assoc($col4_12resultdetail_show); 
?> 


<!--Column 4th 13 row data-->
<?php	 
		 $col4_13 = $mmfszccdetail["father_id"];
		 $col4_13detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_13'";
         $col4_13resultdetail = mysqli_query($aVar, $col4_13detail); 
		 $col4_13ccdetail = mysqli_fetch_assoc($col4_13resultdetail);
		 
		 $col4_13detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_13 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_13resultdetail_show = mysqli_query($aVar, $col4_13detail_show); 
         $col4_13ccdetail_show = mysqli_fetch_assoc($col4_13resultdetail_show); 	 
?> 
<!--Column 4th 14 row data-->
<?php	 
		 $col4_14 = $mmfszccdetail["mother_id"];
		 $col4_14detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_14'";
         $col4_14resultdetail = mysqli_query($aVar, $col4_14detail); 
		 $col4_14ccdetail = mysqli_fetch_assoc($col4_14resultdetail);	 
		 
		 $col4_14detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_14 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_14resultdetail_show = mysqli_query($aVar, $col4_14detail_show); 
         $col4_14ccdetail_show = mysqli_fetch_assoc($col4_14resultdetail_show); 
?> 

<!--Column 4th 15 row data-->
<?php	 
		 $col4_15 = $mmmszccdetail["father_id"];
		 $col4_15detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_15'";
         $col4_15resultdetail = mysqli_query($aVar, $col4_15detail); 
		 $col4_15ccdetail = mysqli_fetch_assoc($col4_15resultdetail);	
		 
		 $col4_15detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_15 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_15resultdetail_show = mysqli_query($aVar, $col4_15detail_show); 
         $col4_15ccdetail_show = mysqli_fetch_assoc($col4_15resultdetail_show);  
?> 
<!--Column 4th 16 row data-->
<?php	 
		 $col4_16 = $mmmszccdetail["mother_id"];
		 $col4_16detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col4_16'";
         $col4_16resultdetail = mysqli_query($aVar, $col4_16detail); 
		 $col4_16ccdetail = mysqli_fetch_assoc($col4_16resultdetail);
		 
		 $col4_16detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col4_16 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col4_16resultdetail_show = mysqli_query($aVar, $col4_16detail_show); 
         $col4_16ccdetail_show = mysqli_fetch_assoc($col4_16resultdetail_show); 	 
?> 



<!--Column 5th 1 row data-->
<?php	 
		// Father		
		 $col5_1 = $col4_1ccdetail["father_id"];		 		   
		 $col5_1detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_1'";
         $col5_1resultdetail = mysqli_query($aVar, $col5_1detail); 
		 $col5_1ccdetail = mysqli_fetch_assoc($col5_1resultdetail);	
		 
		 
		 $col5_1detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_1 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_1resultdetail_show = mysqli_query($aVar, $col4_1detail_show); 
         $col5_1ccdetail_show = mysqli_fetch_assoc($col5_1resultdetail_show);	
		 
		 //Mother
		 $col5_2 = $col4_1ccdetail["mother_id"];		 		   
		 $col5_2detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_2'";
         $col5_2resultdetail = mysqli_query($aVar, $col5_2detail); 
		 $col5_2ccdetail = mysqli_fetch_assoc($col5_2resultdetail);	
		 
		 
		 $col5_2detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_2 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_2resultdetail_show = mysqli_query($aVar, $col5_2detail_show); 
         $col5_2ccdetail_show = mysqli_fetch_assoc($col5_2resultdetail_show);	
		 
		 ##########################################################################################################################
		 
		 // Father		
		 $col5_3 = $col4_2ccdetail["father_id"];		 		   
		 $col5_3detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_3'";
         $col5_3resultdetail = mysqli_query($aVar, $col5_3detail); 
		 $col5_3ccdetail = mysqli_fetch_assoc($col5_3resultdetail);	
		 
		 
		 $col5_3detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_3 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_3resultdetail_show = mysqli_query($aVar, $col5_3detail_show); 
         $col5_3ccdetail_show = mysqli_fetch_assoc($col5_3resultdetail_show);	
		 
		  // Mother		
		 $col5_4 = $col4_2ccdetail["mother_id"];		 		   
		 $col5_4detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_4'";
         $col5_4resultdetail = mysqli_query($aVar, $col5_4detail); 
		 $col5_4ccdetail = mysqli_fetch_assoc($col5_4resultdetail);	
		 
		 
		 $col5_4detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_4 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_4resultdetail_show = mysqli_query($aVar, $col5_4detail_show); 
         $col5_4ccdetail_show = mysqli_fetch_assoc($col5_4resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_5 = $col4_3ccdetail["father_id"];		 		   
		 $col5_5detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_5'";
         $col5_5resultdetail = mysqli_query($aVar, $col5_5detail); 
		 $col5_5ccdetail = mysqli_fetch_assoc($col5_5resultdetail);	
		 
		 
		 $col5_5detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_5 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_5resultdetail_show = mysqli_query($aVar, $col5_5detail_show); 
         $col5_5ccdetail_show = mysqli_fetch_assoc($col5_5resultdetail_show);	
		 
		  // Mother		
		 $col5_6 = $col4_3ccdetail["mother_id"];		 		   
		 $col5_6detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_6'";
         $col5_6resultdetail = mysqli_query($aVar, $col5_6detail); 
		 $col5_6ccdetail = mysqli_fetch_assoc($col5_6resultdetail);	
		 
		 
		 $col5_6detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_6 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_6resultdetail_show = mysqli_query($aVar, $col5_6detail_show); 
         $col5_6ccdetail_show = mysqli_fetch_assoc($col5_6resultdetail_show);		
		 
		  ############################################################################################################################
		 
		 // Father		
		 $col5_7 = $col4_4ccdetail["father_id"];		 		   
		 $col5_7detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_7'";
         $col5_7resultdetail = mysqli_query($aVar, $col5_7detail); 
		 $col5_7ccdetail = mysqli_fetch_assoc($col5_7resultdetail);	
		 
		 
		 $col5_7detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_7 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_7resultdetail_show = mysqli_query($aVar, $col5_7detail_show); 
         $col5_7ccdetail_show = mysqli_fetch_assoc($col5_7resultdetail_show);	
		 
		  // Mother		
		 $col5_8 = $col4_4ccdetail["mother_id"];		 		   
		 $col5_8detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_8'";
         $col5_8resultdetail = mysqli_query($aVar, $col5_8detail); 
		 $col5_8ccdetail = mysqli_fetch_assoc($col5_8resultdetail);	
		 
		 
		 $col5_8detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_8 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_8resultdetail_show = mysqli_query($aVar, $col5_8detail_show); 
         $col5_8ccdetail_show = mysqli_fetch_assoc($col5_8resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_9 = $col4_5ccdetail["father_id"];		 		   
		 $col5_9detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_9'";
         $col5_9resultdetail = mysqli_query($aVar, $col5_9detail); 
		 $col5_9ccdetail = mysqli_fetch_assoc($col5_9resultdetail);	
		 
		 
		 $col5_9detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_9 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_9resultdetail_show = mysqli_query($aVar, $col5_9detail_show); 
         $col5_9ccdetail_show = mysqli_fetch_assoc($col5_9resultdetail_show);	
		 
		  // Mother		
		 $col5_10 = $col4_5ccdetail["mother_id"];		 		   
		 $col5_10detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_10'";
         $col5_10resultdetail = mysqli_query($aVar, $col5_10detail); 
		 $col5_10ccdetail = mysqli_fetch_assoc($col5_10resultdetail);	
		 
		 
		 $col5_10detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_10 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_10resultdetail_show = mysqli_query($aVar, $col5_10detail_show); 
         $col5_10ccdetail_show = mysqli_fetch_assoc($col5_10resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_11 = $col4_6ccdetail["father_id"];		 		   
		 $col5_11detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_11'";
         $col5_11resultdetail = mysqli_query($aVar, $col5_11detail); 
		 $col5_11ccdetail = mysqli_fetch_assoc($col5_11resultdetail);	
		 
		 
		 $col5_11detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_11 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_11resultdetail_show = mysqli_query($aVar, $col5_11detail_show); 
         $col5_11ccdetail_show = mysqli_fetch_assoc($col5_11resultdetail_show);	
		 
		  // Mother		
		 $col5_12 = $col4_6ccdetail["mother_id"];		 		   
		 $col5_12detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_12'";
         $col5_12resultdetail = mysqli_query($aVar, $col5_12detail); 
		 $col5_12ccdetail = mysqli_fetch_assoc($col5_12resultdetail);	
		 
		 
		 $col5_12detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_12 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_12resultdetail_show = mysqli_query($aVar, $col5_12detail_show); 
         $col5_12ccdetail_show = mysqli_fetch_assoc($col5_12resultdetail_show);		 
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_13 = $col4_7ccdetail["father_id"];		 		   
		 $col5_13detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_13'";
         $col5_13resultdetail = mysqli_query($aVar, $col5_13detail); 
		 $col5_13ccdetail = mysqli_fetch_assoc($col5_13resultdetail);	
		 
		 
		 $col5_13detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_13 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_13resultdetail_show = mysqli_query($aVar, $col5_13detail_show); 
         $col5_13ccdetail_show = mysqli_fetch_assoc($col5_13resultdetail_show);	
		 
		  // Mother		
		 $col5_14 = $col4_7ccdetail["mother_id"];		 		   
		 $col5_14detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_14'";
         $col5_14resultdetail = mysqli_query($aVar, $col5_14detail); 
		 $col5_14ccdetail = mysqli_fetch_assoc($col5_14resultdetail);	
		 
		 
		 $col5_14detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_14 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_14resultdetail_show = mysqli_query($aVar, $col5_14detail_show); 
         $col5_14ccdetail_show = mysqli_fetch_assoc($col5_14resultdetail_show);	
		 
		  ############################################################################################################################
		 
		 // Father		
		 $col5_15 = $col4_8ccdetail["father_id"];		 		   
		 $col5_15detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_15'";
         $col5_15resultdetail = mysqli_query($aVar, $col5_15detail); 
		 $col5_15ccdetail = mysqli_fetch_assoc($col5_15resultdetail);	
		 
		 
		 $col5_15detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_15 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_15resultdetail_show = mysqli_query($aVar, $col5_15detail_show); 
         $col5_15ccdetail_show = mysqli_fetch_assoc($col5_15resultdetail_show);	
		 
		  // Mother		
		 $col5_16 = $col4_8ccdetail["mother_id"];		 		   
		 $col5_16detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_16'";
         $col5_16resultdetail = mysqli_query($aVar, $col5_16detail); 
		 $col5_16ccdetail = mysqli_fetch_assoc($col5_16resultdetail);	
		 
		 
		 $col5_16detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_16 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_16resultdetail_show = mysqli_query($aVar, $col5_16detail_show); 
         $col5_16ccdetail_show = mysqli_fetch_assoc($col5_16resultdetail_show);		 
		 
		 
		  ############################################################################################################################
		 
		 // Father		
		 $col5_17 = $col4_9ccdetail["father_id"];		 		   
		 $col5_17detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_17'";
         $col5_17resultdetail = mysqli_query($aVar, $col5_17detail); 
		 $col5_17ccdetail = mysqli_fetch_assoc($col5_17resultdetail);	
		 
		 
		 $col5_17detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_17 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_17resultdetail_show = mysqli_query($aVar, $col5_17detail_show); 
         $col5_17ccdetail_show = mysqli_fetch_assoc($col5_17resultdetail_show);	
		 
		  // Mother		
		 $col5_18 = $col4_9ccdetail["mother_id"];		 		   
		 $col5_18detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_18'";
         $col5_18resultdetail = mysqli_query($aVar, $col5_18detail); 
		 $col5_18ccdetail = mysqli_fetch_assoc($col5_18resultdetail);	
		 
		 
		 $col5_18detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_18 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_18resultdetail_show = mysqli_query($aVar, $col5_18detail_show); 
         $col5_18ccdetail_show = mysqli_fetch_assoc($col5_18resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_19 = $col4_10ccdetail["father_id"];		 		   
		 $col5_19detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_19'";
         $col5_19resultdetail = mysqli_query($aVar, $col5_19detail); 
		 $col5_19ccdetail = mysqli_fetch_assoc($col5_19resultdetail);	
		 
		 
		 $col5_19detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_19 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_19resultdetail_show = mysqli_query($aVar, $col5_19detail_show); 
         $col5_19ccdetail_show = mysqli_fetch_assoc($col5_19resultdetail_show);	
		 
		  // Mother		
		 $col5_20 = $col4_10ccdetail["mother_id"];		 		   
		 $col5_20detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_20'";
         $col5_20resultdetail = mysqli_query($aVar, $col5_20detail); 
		 $col5_20ccdetail = mysqli_fetch_assoc($col5_20resultdetail);	
		 
		 
		 $col5_20detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_20 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_20resultdetail_show = mysqli_query($aVar, $col5_20detail_show); 
         $col5_20ccdetail_show = mysqli_fetch_assoc($col5_20resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_21 = $col4_11ccdetail["father_id"];		 		   
		 $col5_21detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_21'";
         $col5_21resultdetail = mysqli_query($aVar, $col5_21detail); 
		 $col5_21ccdetail = mysqli_fetch_assoc($col5_21resultdetail);	
		 
		 
		 $col5_21detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_21 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_21resultdetail_show = mysqli_query($aVar, $col5_21detail_show); 
         $col5_21ccdetail_show = mysqli_fetch_assoc($col5_21resultdetail_show);	
		 
		  // Mother		
		 $col5_22 = $col4_11ccdetail["mother_id"];		 		   
		 $col5_22detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_22'";
         $col5_22resultdetail = mysqli_query($aVar, $col5_22detail); 
		 $col5_22ccdetail = mysqli_fetch_assoc($col5_22resultdetail);	
		 
		 
		 $col5_22detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_22 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_22resultdetail_show = mysqli_query($aVar, $col5_22detail_show); 
         $col5_22ccdetail_show = mysqli_fetch_assoc($col5_22resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_23 = $col4_12ccdetail["father_id"];		 		   
		 $col5_23detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_23'";
         $col5_23resultdetail = mysqli_query($aVar, $col5_23detail); 
		 $col5_23ccdetail = mysqli_fetch_assoc($col5_23resultdetail);	
		 
		 
		 $col5_23detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_23 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_23resultdetail_show = mysqli_query($aVar, $col5_23detail_show); 
         $col5_23ccdetail_show = mysqli_fetch_assoc($col5_23resultdetail_show);	
		 
		  // Mother		
		 $col5_24 = $col4_12ccdetail["mother_id"];		 		   
		 $col5_24detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_24'";
         $col5_24resultdetail = mysqli_query($aVar, $col5_24detail); 
		 $col5_24ccdetail = mysqli_fetch_assoc($col5_24resultdetail);	
		 
		 
		 $col5_24detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_24 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_24resultdetail_show = mysqli_query($aVar, $col5_24detail_show); 
         $col5_24ccdetail_show = mysqli_fetch_assoc($col5_24resultdetail_show);	
		 
		  ############################################################################################################################
		 
		 // Father		
		 $col5_25 = $col4_13ccdetail["father_id"];		 		   
		 $col5_25detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_25'";
         $col5_25resultdetail = mysqli_query($aVar, $col5_25detail); 
		 $col5_25ccdetail = mysqli_fetch_assoc($col5_25resultdetail);	
		 
		 
		 $col5_25detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_25 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_25resultdetail_show = mysqli_query($aVar, $col5_25detail_show); 
         $col5_25ccdetail_show = mysqli_fetch_assoc($col5_25resultdetail_show);	
		 
		  // Mother		
		 $col5_26 = $col4_13ccdetail["mother_id"];		 		   
		 $col5_26detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_26'";
         $col5_26resultdetail = mysqli_query($aVar, $col5_26detail); 
		 $col5_26ccdetail = mysqli_fetch_assoc($col5_26resultdetail);	
		 
		 
		 $col5_26detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_26 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_26resultdetail_show = mysqli_query($aVar, $col5_26detail_show); 
         $col5_26ccdetail_show = mysqli_fetch_assoc($col5_26resultdetail_show);	
		 
		   ############################################################################################################################
		 
		 // Father		
		 $col5_27 = $col4_14ccdetail["father_id"];		 		   
		 $col5_27detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_27'";
         $col5_27resultdetail = mysqli_query($aVar, $col5_27detail); 
		 $col5_27ccdetail = mysqli_fetch_assoc($col5_27resultdetail);	
		 
		 
		 $col5_27detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_27 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_27resultdetail_show = mysqli_query($aVar, $col5_27detail_show); 
         $col5_27ccdetail_show = mysqli_fetch_assoc($col5_27resultdetail_show);	
		 
		  // Mother		
		 $col5_28 = $col4_14ccdetail["mother_id"];		 		   
		 $col5_28detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_28'";
         $col5_28resultdetail = mysqli_query($aVar, $col5_28detail); 
		 $col5_28ccdetail = mysqli_fetch_assoc($col5_28resultdetail);	
		 
		 
		 $col5_28detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_28 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_28resultdetail_show = mysqli_query($aVar, $col5_28detail_show); 
         $col5_28ccdetail_show = mysqli_fetch_assoc($col5_28resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_29 = $col4_15ccdetail["father_id"];		 		   
		 $col5_29detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_29'";
         $col5_29resultdetail = mysqli_query($aVar, $col5_29detail); 
		 $col5_29ccdetail = mysqli_fetch_assoc($col5_29resultdetail);	
		 
		 
		 $col5_29detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_29 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_29resultdetail_show = mysqli_query($aVar, $col5_29detail_show); 
         $col5_29ccdetail_show = mysqli_fetch_assoc($col5_29resultdetail_show);	
		 
		  // Mother		
		 $col5_30 = $col4_15ccdetail["mother_id"];		 		   
		 $col5_30detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_30'";
         $col5_30resultdetail = mysqli_query($aVar, $col5_30detail); 
		 $col5_30ccdetail = mysqli_fetch_assoc($col5_30resultdetail);	
		 
		 
		 $col5_30detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_30 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_30resultdetail_show = mysqli_query($aVar, $col5_30detail_show); 
         $col5_30ccdetail_show = mysqli_fetch_assoc($col5_30resultdetail_show);	
		 
		 ############################################################################################################################
		 
		 // Father		
		 $col5_31 = $col4_16ccdetail["father_id"];		 		   
		 $col5_31detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_31'";
         $col5_31resultdetail = mysqli_query($aVar, $col5_31detail); 
		 $col5_31ccdetail = mysqli_fetch_assoc($col5_31resultdetail);	
		 
		 
		 $col5_31detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_31 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_31resultdetail_show = mysqli_query($aVar, $col5_31detail_show); 
         $col5_31ccdetail_show = mysqli_fetch_assoc($col5_31resultdetail_show);	
		 
		  // Mother		
		 $col5_32 = $col4_16ccdetail["mother_id"];		 		   
		 $col5_32detail = "SELECT * from ".$tb_prefix."pd_entries WHERE reg1='$col5_32'";
         $col5_32resultdetail = mysqli_query($aVar, $col5_32detail); 
		 $col5_32ccdetail = mysqli_fetch_assoc($col5_32resultdetail);	
		 
		 
		 $col5_32detail_show = "Select * from ".$tb_prefix."pd_show where sz = $col5_32 AND cat != ''  ORDER BY showid desc LIMIT 1";
         $col5_32resultdetail_show = mysqli_query($aVar, $col5_32detail_show); 
         $col5_32ccdetail_show = mysqli_fetch_assoc($col5_32resultdetail_show);	
?> 


