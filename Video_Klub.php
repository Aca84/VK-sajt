<?php
	require 'include/Conn.php';

	session_start();

	if(!isset($_SESSION['logged'])){ /* ili $_SESSION['loggedin'])*/
        header("Location: loggin.php");
        exit();
    }

	$username=$_SESSION['logged'];

	$sql = "SELECT * FROM Film";	
	$sql1 = "SELECT * FROM zanr";
	$zanrovi = mysqli_query($conn, $sql1);

	$naziv = "";

	if(isset($_GET['nadji'])){
		
		$naziv = $_GET['naziv'];
		
		$sql = $sql . " where Naziv like '%$naziv%'";
	}
//var_dump($sql);

	$filmovi = mysqli_query($conn, $sql);
	
?>
<?php include 'include/header.php'?>
									
				<div class="col-9">
				  	<?php
//						 if(isset($_SESSION['logged'])){
//            				echo "<h2>Dobrodosli, $username<br><br></h2>";}
            	
            		while($row = mysqli_fetch_array($filmovi)){
						$id=$row[0]; //$id=$row['SifF'];
		                echo "<a class='lista' href='infofilm.php?id=$id' target='_blank'> ".$row['Naziv']."</a>"
                   ."<br>";
            		}
        			?>
        			
				<br>
			
				</div>
				<div class="col-3"> 

				<?php
            		while($row = mysqli_fetch_array($zanrovi)){
                	$id=$row[0]; //$id=$row['SifF'];
                	echo $row['Naziv']."<br>";
            		}
        		?>
   		
				</div>
<!--</div>-->		
<?php include 'include/totop.php'?>
<?php include 'include/footer.php'?>