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
		 $mem = "Select * from blog_categories where category_name LIKE '%".$search."%' LIMIT 10";
         $memresult = mysqli_query($con, $mem);
         if (mysqli_num_rows($memresult) > 0) {
            while($memrow = mysqli_fetch_assoc($memresult)) {
        ?>
   
		
            <li><a href="update-blogcat.php?uid=<?php echo $memrow["category_id"]; ?>"><?php echo utf8_decode($memrow["category_name"]); ?></a></li>
          
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