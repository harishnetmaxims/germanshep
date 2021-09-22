<?php
//Including Database configuration file.
session_start();
include("../include/dbconnection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $search = $_POST['search'];

   echo '
<div class="row">
<div class="relates">
		    	<div class="relatessec">
		  <ul class="serchfor">
   ';
       ?>


        <!--for users search-->
        
	    <?php  
		 $mem = "Select * from group_profile where group_name LIKE '%".$search."%' OR breeder_id LIKE '%".$search."%' LIMIT 10";
         $memresult = mysqli_query($con, $mem);
         if (mysqli_num_rows($memresult) > 0) {
            while($memrow = mysqli_fetch_assoc($memresult)) {
        ?>
   
		
            <li><a href="update-breeder.php?uid=<?php echo $memrow["indexer"]; ?>"><?php echo utf8_decode($memrow["group_name"]); ?> (<?=$memrow["breeder_id"]?>)</a></li>
          
		<?php	 
		} }  else { } ?>
       </ul> 
        <?php
}
?>
</ul>
        </div>
     </div>
</div>