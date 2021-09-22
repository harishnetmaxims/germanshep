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
		 $mem = "Select * from pd_entries where CONCAT(name, ' ', lastname) LIKE '%".$search."%' OR lastname LIKE '%".$search."%' OR reg1 LIKE '%".$search."%' LIMIT 10";
         $memresult = mysqli_query($con, $mem);
         if (mysqli_num_rows($memresult) > 0) {
            while($memrow = mysqli_fetch_assoc($memresult)) {
        ?>
   
		
            <li><a href="update-pedigree.php?uid=<?php echo $memrow["reg1"]; ?>"><?php echo utf8_decode($memrow["name"]); ?> <?php echo utf8_decode($memrow["lastname"]); ?> (<?php echo $memrow["reg1"]; ?>)</a></li>
          
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