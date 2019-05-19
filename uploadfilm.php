<?php
   require 'include/Conn.php';
   session_start();

	 $username=$_SESSION['logged'];
if (!isset($_POST['promeni'])) {
    $id = $_GET["id"];
    
    $sql = "select * from film where SifF=$id";

    $filmTabela = mysqli_query($conn, $sql);

    $film = mysqli_fetch_assoc($filmTabela);

//    var_dump($film);

    $sql = "select * from zanr";
    $zanrovi = mysqli_query($conn, $sql);
	
}else {
	
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $duzina = $_POST['duzina'];
    $cena = $_POST['cena'];
    $ocena = $_POST['ocena'];
    $zanr = $_POST['zanr'];
    
 	$sql = "UPDATE film SET naziv = '$naziv', duzina = $duzina, cena = $cena , ocena = $ocena, SifZ = $zanr" . "  WHERE siff = $id";
    
//    var_dump($sql);
    $res = mysqli_query($conn, $sql);
    
    if ($res == true) {
        header("Location: uploadfilm.php?id=$id");
    }
} 	
	
//	pretraga po ... 
	$sql	="select * from Film";
	$naziv 	= "";
	$min 	= "";
	$max 	= "";
	$duzina	= "";

if(isset($_GET['pretraga'])) {
    $naziv = $_GET['naziv'];
    $sql   = $sql . " where naziv like '%$naziv%'";
    
    $min = $_GET['min'];
    $max = $_GET['max'];
    
    if(!empty($min)) {
        $sql = $sql . " and ocena > $min";
    }
    
    if(!empty($max)) {
        $sql = $sql . " and ocena < $max";
    }
	
    $duzina = $_GET['time'];
		$sql = $sql . " and duzina = $duzina";
	
    var_dump($sql);
}

$filmovi=mysqli_query($conn, $sql);

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
 
//    var_dump($sql);

?>
<!DOCTYPE html>
<?php include 'include/header.php'?>

				<div class="col-9">
					<?php
						echo $poruka ?? ""; //eho poruka ili nista

					?>
        	<form name="promeni_film" method="POST" action="uploadfilm.php"><br>
            
            	<input type="hidden" name="id" value="<?php echo $film['SifF'] ?? ""?>"> <!--dohvata id-->
                
				Naziv  <input type="text"   name="naziv"  value="<?php echo $film['Naziv'] ?? ""; ?>"><br>
				Duzina <input type="number" name="duzina" value="<?php echo $film['Duzina'] ?? ""; ?>"><br>
				Cena   <input type="number" name="cena"   value="<?php echo $film['Cena'] ?? ""; ?>"><br>
				Ocena  <input type="number" name="ocena"  value="<?php echo $film['Ocena'] ?? ""; ?>"><br>
				Zanr:  <select name="zanr"> 
                  		<?php
							while($zanr = mysqli_fetch_assoc($zanrovi)){

							$idZanr=$zanr['SifZ'];
							$nazivZanr=$zanr['Naziv'];

							if($film['SifZ'] == $idZanr){
								echo "<option value='$idZanr' selected>$nazivZanr</option>";

							}else{
								echo "<option value='$idZanr'>$nazivZanr</option>";
							}
							}
						?>                    

                  	 </select>
            		<br>
            
				<button type="submit" name="promeni" class="btn btn-info">
					Upload film
				</button>     
        	</form>  	
        
<!--		pretraga po...  -->
			<form name="pretraga" method="GET" action="uploadfilm.php">

				Naziv: <input type="text" name="naziv" value="<?php echo $naziv ?>">
				<br>
				Minimalna ocena: <input type="number" name="min" value="<?php echo $min ?>">
				<br>
				Maksimalna ocena: <input type="number" name="max" value="<?php echo $max ?>">
				<br>

				Trajanje:
				<select name="time"> 
						<?php
	//						sql = "select * from zanr";
							$filmovi = mysqli_query($conn, $sql);

							while($film = mysqli_fetch_assoc($filmovi)){

							$idFilm=$film['SifF'];
							$traFilm=$film['Duzina'];

								echo "<option value='$idFilm'>$traFilm</option>";
							}							
						?>                    
				 </select>
				 <br>
				 <input type="submit" name="pretraga" value="Pretraga">
				 
			</form>
           				
				</div>
				<div class="col-3"> 
					<?php
						$sql = "select * from zanr";
						$zanrovi = mysqli_query($conn, $sql);
						while($row = mysqli_fetch_array($zanrovi)){
						$id=$row[0]; //$id=$row['SifF'];
						echo $row['Naziv']."<br>";
					}
					?>
				</div>
			</div>
		</div>
		 	  
<?php include 'include/totop.php'?>
<?php include 'include/footer.php'?>