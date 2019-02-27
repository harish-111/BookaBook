<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">


    <title>BOOKaBOOK | Admin Panel</title>

    <style type="text/css">
    	#headingZero:hover{
			cursor: pointer;
		}
		#headingOne:hover{
			cursor: pointer;
		}
		#headingTwo:hover{
			cursor: pointer;
		}
		#headingThree:hover{
			cursor: pointer;
		}
    </style>
  </head>
  <body>

    <?php

    include 'actions/connect.php';
    error_reporting(0);
    $sql = "SELECT * FROM product";
    ?>

    <!-- NAVBAR-TOP -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img class="navbar-brand img-fluid" src="../logo.png">
       <ul class="navbar-nav" style="position:absolute;right:20px;">
        <li class="nav-item">
          <button class="btn btn-dark text-light" onclick="location.reload()"role="button">Reload</button>
          <a class="btn btn-dark text-light" href="admindashboard.php">Admin Panel</a>
        </li>
      </ul>
  </nav>

  <div class="accordion" id="accordionExample">

    <div class="card">
    <div class="card-header" id="headingZero" data-toggle="collapse" data-target="#collapseZero">
      <h5 class="mb-0">
          Magnetic Palette, Highlighter and Blush <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>

    <div id="collapseZero" class="collapse" aria-labelledby="headingZero" data-parent="#accordionExample">
      <!-- Magnetic Palette, Highlighter and Blush -->
		<div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_glitters = "SELECT * FROM palette_colors WHERE color_category LIKE 'MAGNETIC PALETTE, HIGHLIGHTER AND BLUSH'";
			$result_fetch_glitters = $conn->query($sql_fetch_glitters);

			if ($result_fetch_glitters->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_glitters->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
								<div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
      <h5 class="mb-0">
          Glitters <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <!-- GLITTERS -->
		<div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_glitters = "SELECT * FROM palette_colors WHERE color_category LIKE 'GLITTERS'";
			$result_fetch_glitters = $conn->query($sql_fetch_glitters);

			if ($result_fetch_glitters->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_glitters->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
								<div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
      <h5 class="mb-0">
          Shimmers <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>
 
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
    	 <!-- SHIMMERS -->
      <div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_shimmers = "SELECT * FROM palette_colors WHERE color_category LIKE 'SHIMMERS'";
			$result_fetch_shimmers = $conn->query($sql_fetch_shimmers);

			if ($result_fetch_shimmers->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_shimmers->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
							    <div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree">
      <h5 class="mb-0">
          Matte <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
       <!-- MATTE -->
      <div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_matte = "SELECT * FROM palette_colors WHERE color_category LIKE 'MATTE'";
			$result_fetch_matte = $conn->query($sql_fetch_matte);

			if ($result_fetch_matte->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_matte->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
							    <div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>