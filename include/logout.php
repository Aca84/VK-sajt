<?php
       if(isset($_GET['logaut'])){
        
               session_destroy();
               header("Location: log_in.php");           
           }
?>

<input type="submit" name="logaut" value="Loggout">