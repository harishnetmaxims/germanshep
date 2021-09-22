<?php
//Including Database configuration file.
session_start();
include("../include/dbconnection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $search = $_POST['search'];

   
       ?>


        <!--for users search-->
        
	    <?php  
		 $mem = "Select * from pd_entries where reg1 = '".$search."'";
         $memresult = mysqli_query($con, $mem);
         if (mysqli_num_rows($memresult) > 0) {
            while($memrow = mysqli_fetch_assoc($memresult)) {
        	echo '<spna style="color:#FF0000">Regcode alreday exist. Enter new one.</span>';
		} }  else { echo '';} ?>
      
        <?php
}
?>
