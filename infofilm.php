<?php 
	require 'include/Conn.php';
	session_start();
	$username=$_SESSION['logged'];
// 	$sql = "SELECT * FROM Film";

    if(empty($_GET['id'])){
        header("Location: Video_Klub.php");
    }
    $id=$_GET['id'];
	$_SESSION['idFilm'] = $id;
			
    $sql="select SifK, kaseta.Duzina from kaseta join sadrzi using(SifK) join film using(SifF) where SifF = $id";
    
    $kasete= mysqli_query($conn, $sql);
    
    $sqlFilm="SELECT film.SifF, film.Naziv, Duzina, Ocena, Cena, zanr.Naziv as Zanr FROM film join zanr using(SifZ) where SifF=$id";
		
    $filmTabela= mysqli_query($conn, $sqlFilm);
    $film= mysqli_fetch_assoc($filmTabela);
	
    if($film==null){
        header("Location: Video_Klub.php");
    }
	
//	$naziv = "";
//
//	if(isset($_GET['nadji'])){
//		
//		$naziv = $_GET['naziv'];
//		
//		$sql = $sql . " where Naziv like '%$naziv%'";
//	}
//
////var_dump($sql);
//
//	$filmovi = mysqli_query($conn, $sql);
?>

<?php include 'include/header.php'?>
	
				<div class="col-9">
				<?php
					echo "Naziv: ".$film['Naziv']."<br>";
					echo "Duzina: ".$film['Duzina']."<br>";
					echo "Ocena: ".$film['Ocena']."<br>";
					echo "Cena: ".$film['Cena']."<br>";
					echo "Zanr: ".$film['Zanr']."<br>";


					if(mysqli_num_rows($kasete)==0){
						echo "Nema nijedne kasete";
					}
					else {
						echo "Kaseta, Duzina<br>";
						while($kaseta= mysqli_fetch_array($kasete)){
							$_SESSION['SifK']=$kaseta[0];
							echo $kaseta[0]." ".$kaseta['Duzina']."<a href='iznajmi.php?'> Iznajmi</a>"."<br>";
					}
					}
			    ?>
			    <br>
			    <a href="uploadfilm.php?id=<?php echo $film['SifF'] ?>" target="_blank">
					<button type="button" class="btn btn-outline-info">Update film</button>
				</a>			    			
			    
				</div>
				<div class="col-3"> 
				<?php
					
					$sql1 = "SELECT * FROM zanr";
					$zanrovi = mysqli_query($conn, $sql1);
					
            		while($row = mysqli_fetch_array($zanrovi)){
                	$id=$row[0]; //$id=$row['SifF'];
                	echo $row['Naziv']."<br>";
            		}
        		?>   		
				</div>
<!--
		</div>
		</div>
		
-->
<?php include 'include/totop.php'?>
<?php include 'include/footer.php'?>