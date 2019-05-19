<?php
	require 'include/Conn.php';
	session_start();
	$username=$_SESSION['logged'];
//	$sql = "SELECT * FROM Film";
//	$filmovi = mysqli_query($conn, $sql);

	$sql1 = "SELECT * FROM zanr";
	$zanrovi = mysqli_query($conn, $sql1);

	if(isset($_POST['dodaj'])){

		$naziv  = $_POST['naziv'];
		$duzina = $_POST['duzina'];
		$cena   = $_POST['cena'];
		$zanr   = $_POST['zanr'];


		if(empty($_POST['naziv'])||
				empty($_POST['cena'])||
				empty($_POST['duzina'])||
				empty($_POST['zanr'])){

				$poruka = "Niste uneli sve podatke";
		}else{	

			$sqlMaxId = "SELECT MAX(SifF) from Film";

			$maxIdRez = mysqli_query($conn, $sqlMaxId);
			$id = mysqli_fetch_row($maxIdRez)[0];
			$id = (int)$id;         
			$id++;



			$mysql = "INSERT INTO `film`(`SifF`, `Naziv`, `Duzina`, `Cena`, `SifZ`) VALUES ( $id, '$naziv', $duzina, $cena, $zanr) ";




		$rez = mysqli_query($conn,$mysql);

				if($rez){
					$poruka = "Film je uspesno dodat!";
				}else{
					$poruka = "Film nije dodat!";
				}
	}
}

//		$naziv = "";
//
//			if(isset($_GET['nadji'])){
//
//				$naziv = $_GET['naziv'];
//
//				$sql = $sql . " where Naziv like '%$naziv%'";
//			}
//
//		//var_dump($sql);
//
//			$filmovi = mysqli_query($conn, $sql);

?>
<?php include 'include/header.php'?>


				<div class="col-9">
				
				<?php
               		echo $poruka ?? ""; //eho poruka ili nista
				?>   

				<form name="novi_film" method="POST" action="novifilm.php">
					
					<table>
						<tr>
							<td>Naziv:<input type="text" name="naziv" value="<?php echo $naziv ?? "" ?>"></td>	
						</tr>
						<tr>
							<td>Duzina:<input type="number" name="duzina" value="<?php echo $duzina ?? ""; ?>"></td>	
						</tr>
						<tr>
							<td>Cena:<input type="number" name="cena" value="<?php echo $cena ?? ""; ?>"></td>	
						</tr>
						<tr>
							<td>
							Zanr: 
<!--								<select name="zanr"> -->
								   <?php
//										while($zanr = mysqli_fetch_assoc($zanrovi)){
//											
//										$idZanr    = $zanr['SifZ'];
//										$nazivZanr = $zanr['Naziv'];
//											
//										if($_POST['zanr'] == $idZanr){
//											echo "<option value='$idZanr' selected>$nazivZanr</option>";
//										}else{
//											echo "<option value='$idZanr'>$nazivZanr</option>";
//										}
//										}
								   ?>                    
<!--					  			 </select>							-->
								<select name="zanr">
									<?php 
										while($zanr= mysqli_fetch_assoc($zanrovi)){
											
											$idZanr    = $zanr['SifZ'];
											$nazivZanr = $zanr['Naziv'];

											echo "<option value='$idZanr'>$nazivZanr</option>";
										}
									?>
								</select>
							</td>
						</tr>
					</table>							
				<br>
				<br>
<!--		<button type="submit"  name="dodaj" class="btn btn-success">Dodajfilm</button> -->
				
				<!-- Button trigger modal -->
				<button type="submit" name="dodaj" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
				  Dodaj film
				</button>

<!--
				 Modal 
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							...
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						  </div>
						</div>
					  </div>
					</div>
				
-->
	<!--            <input type="submit" name="dodaj" value="dodaj">-->
				</form>
<!--
						<a href="novifilm.php" target="_blank">
							<button type="button" class="btn btn-success">Dodaj film</button>
						</a>
-->						
					
<!--
					<form action="/action_page.php">
					
						<div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="usr" name="username">
						</div>
						
						<div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="usr" name="username">
						</div>
						
						<div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="usr" name="username">
						</div>
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							Zanr
							</button>
						<div class="dropdown-menu" name="zanr">						
							<a class="dropdown-item">
							<?php 
//								while($zanr= mysqli_fetch_assoc($zanrovi)){
//											
//									$idZanr    = $zanr['SifZ'];
//									$nazivZanr = $zanr['Naziv'];
//
//									echo "<option value='$idZanr'>$nazivZanr</option>";
//								}
							?>
							</a>
						</div>	
						<br>
						<br>
						<br>
						<button type="submit" class="btn btn-primary">Submit</button>
					 </form>		
-->
			
				</div>
				<div class="col-3"> 
				<?php
            		while($row = mysqli_fetch_array($zanrovi)){
                	$id=$row[0]; //$id=$row['SifF'];
                	echo $row['Naziv']."<br>";
            	}
        		?>
				</div>
		
<?php include 'include/totop.php'?>
<?php include 'include/footer.php'?>