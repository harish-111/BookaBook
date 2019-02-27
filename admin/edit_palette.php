<?php
  session_start();
  include 'actions/connect.php';
    error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>BOOKaBOOK | Admin Panel</title>
    </head>
  <body>

    <?php

    
    
    ?>

    <!-- NAVBAR-TOP -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img class="navbar-brand img-fluid" src="../logo.png">
       <ul class="navbar-nav" style="position:absolute;right:20px;">
        <li class="nav-item">
          <button class="btn btn-dark text-light" onclick="location.reload()" role="button">Reload</button>
          <a href="admindashboard.php" class="btn btn-dark text-light">Admin Panel</a>
        </li>
      </ul>
  </nav>

<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Add a Shade</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Edit a Shade</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Delete a Shade</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <br>
        <h5>Add a shade : </h5>
        <hr>
        <form method="post" action="#" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <label for="colourname">Colour Name</label>
              <input type="text" class="form-control" id="colourname" name="colourname" placeholder="Colour Name">
            </div>
            <div class="col">
              <label for="colourcode">Colour Code</label>
              <input type="text" class="form-control" id="colourcode" name="colourcode" placeholder="Colour Code">
            </div>
          </div><hr>
          <div class="row">
            <div class="col">
              <label for="colourunits">Colour Units</label>
              <input type="number" class="form-control" id="colourunits" name="colourunits" placeholder="Colour Units">
            </div>
            <div class="col">
              <label for="colourprice">Colour Price</label>
              <input type="text" class="form-control" id="colourprice" name="colourprice" placeholder="Colour Price">
            </div>
          </div><hr>
          <div class="row">
            <div class="col">
              <label for="colourcategory">Colour Category</label><br>
              <select id="colourcategory" name="colourcategory">
                <option value="MAGNETIC PALETTE, HIGHLIGHTER AND BLUSH">MAGNETIC PALETTE, HIGHLIGHTER AND BLUSH</option>
                <option value="GLITTERS">GLITTERS</option>
                <option value="SHIMMERS">SHIMMERS</option>
                <option value="MATTE">MATTE</option>
              </select>
            </div>
            <div class="col">
              <label for="colourimage">Colour Image 1</label>
              <input type="file" class="form-control" id="colourimage1" name="colourimage1" placeholder="Colour Image">
            </div>
          </div><hr>
          <div class="row">
            <div class="col">
              <label for="colourimage">Colour Image 2</label>
              <input type="file" class="form-control" id="colourimage2" name="colourimage2" placeholder="Colour Image">
            </div>
            <div class="col">
              <label for="colourimage">Colour Image 3</label>
              <input type="file" class="form-control" id="colourimage3" name="colourimage3" placeholder="Colour Image">
            </div>
          </div>
          <br>
          <input type="submit" class="btn btn-dark" name="add_a_shade_form">
        </form>

        <!-- ADD A SHADE -->
        <?php
          if(isset($_POST['add_a_shade_form']))
          {
            $color_code_temp = $_POST['colourcode'];
            $sql_check_shade_exists = "SELECT color_code FROM palette_colors";
            $result_check_shade_exists = $conn->query($sql_check_shade_exists);
            $flag=0;
            if ($result_check_shade_exists->num_rows > 0) {
              // output data of each row
                while($row = $result_check_shade_exists->fetch_assoc()) {
                    if($row["color_code"]==$color_code_temp)
                      $flag=1;
                }
            }

            if($flag==1)
              {
                ?>
                <div class="alert alert-danger text-center" role="alert">
                  <p>A shade with that name already exists. Cannot create a new Shade.</p>
                </div>
              <?php
              } else {

        $currentDir = getcwd();
        $uploadDirectory = "actions/uploads/palette_shades/";

        $errors = []; // Store all foreseen and unforseen errors here

        $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

            //first file

        $fileName1 = $_FILES['colourimage1']['name'];
        $colour_image1 = $fileName1;
        $fileSize1 = $_FILES['colourimage1']['size'];
        $fileTmpName1  = $_FILES['colourimage1']['tmp_name'];
        $fileType1 = $_FILES['colourimage1']['type'];
        $fileExtension1 = strtolower(end(explode('.',$fileName1)));

        $uploadPath1 = $uploadDirectory . basename($fileName1); 

        //second file

        $fileName2 = $_FILES['colourimage2']['name'];
        $colour_image1 = $fileName2;
        $fileSize2 = $_FILES['colourimage2']['size'];
        $fileTmpName2  = $_FILES['colourimage2']['tmp_name'];
        $fileType2 = $_FILES['colourimage2']['type'];
        $fileExtension2 = strtolower(end(explode('.',$fileName2)));

        $uploadPath2 = $uploadDirectory . basename($fileName2); 

        //third file

        $fileName3 = $_FILES['colourimage3']['name'];
        $colour_image3 = $fileName3;
        $fileSize3 = $_FILES['colourimage3']['size'];
        $fileTmpName3  = $_FILES['colourimage3']['tmp_name'];
        $fileType3 = $_FILES['colourimage3']['type'];
        $fileExtension3 = strtolower(end(explode('.',$fileName3)));

        $uploadPath3 = $uploadDirectory . basename($fileName3); 

   
        if ($fileSize1 > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if ($fileSize2 > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if ($fileSize3 > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        
            $didUpload1 = move_uploaded_file($fileTmpName1, $uploadPath1);

            if ($didUpload1) {
                echo "The file " . basename($fileName1) . " has been uploaded.<br>";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin.<br>";
            }

            $didUpload2 = move_uploaded_file($fileTmpName2, $uploadPath2);

            if ($didUpload2) {
                echo "The file " . basename($fileName2) . " has been uploaded<br>";
            } else {
                echo "No image was selected for Image 2.<br>";
            }

            $didUpload3 = move_uploaded_file($fileTmpName3, $uploadPath3);

            if ($didUpload3) {
                echo "The file " . basename($fileName3) . " has been uploaded.<br>";
            } else {
                echo "No image was selected for Image 3.<br>";
            }

            $color_name = $_POST['colourname'];
            $color_code = $_POST['colourcode'];
            $color_units = $_POST['colourunits'];
            $color_price = $_POST['colourprice'];
            $color_category = $_POST['colourcategory'];

            $sql_add_a_shade = "INSERT INTO palette_colors(color_name, color_code, color_units, color_price, color_category, color_image1, color_image2, color_image3) VALUES('$color_name','$color_code','$color_units','$color_price','$color_category','$fileName1','$fileName2','$fileName3')";

            if ($conn->query($sql_add_a_shade) === TRUE) {
                echo "New shade added successfully.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

          }
        }
        ?>


      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
       <br>
        <h5>Edit a shade : </h5><hr>
        <form name="edit_a_shade" action="#" method="post">
          <select name="selected_shade">
            <?php
              $sql_fetch_shade_to_edit = "SELECT * FROM palette_colors";
              $result_fetch_shade_to_edit = $conn->query($sql_fetch_shade_to_edit);
              if ($result_fetch_shade_to_edit->num_rows > 0) {
                    // output data of each row
                    while($row = $result_fetch_shade_to_edit->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['color_code'];?>"><?php echo $row['color_name'];?></option>
                        <?php
                }
              }
            ?>
          </select>
          <input type="submit" name="fetch_current_values">
        </form>
        <hr>
        <form name="edit_shade_values" method="post" action="#">
          <?php
            if(isset($_POST['fetch_current_values']))
            {
              $shade_to_be_fetched = $_POST['selected_shade'];
              $sql_fetch_shade_values_to_edit = "SELECT * FROM palette_colors WHERE color_code LIKE '$shade_to_be_fetched'";
              $result_fetch_shade_values_to_edit = $conn->query($sql_fetch_shade_values_to_edit);
              if ($result_fetch_shade_to_edit->num_rows > 0) {
                    // output data of each row
                    while($row = $result_fetch_shade_values_to_edit->fetch_assoc()) {
                        ?>
                          <div class="row">
                            <div class="col">
                              <label for="colourname">Colour Name</label>
                              <input type="text" class="form-control" name="colournameedit" id="colournameedit" value="<?php echo $row['color_name'];?>" placeholder="Colour Name">
                            </div>
                            <div class="col">
                              <label for="colourcode">Colour Code</label>
                              <input type="text" value="<?php echo $row['color_code'];?>" class="form-control" id="colourcodeedit" name="colourcodeedit" placeholder="Colour Code">
                            </div>
                          </div><hr>
                          <div class="row">
                            <div class="col">
                              <label for="colourunits">Colour Units</label>
                              <input type="number" value="<?php echo $row['color_units'];?>" class="form-control" id="colourunitsedit" name="colourunitsedit" placeholder="Colour Units">
                            </div>
                            <div class="col">
                              <label for="colourprice">Colour Price</label>
                              <input type="text" value="<?php echo $row['color_price'];?>" class="form-control" id="colourpriceedit" name="colourpriceedit" placeholder="Colour Price">
                            </div>
                          </div><hr>
                          <div class="row">
                            <div class="col">
                              <label for="colourcategory">Colour Category</label>
                              <select id="colourcategoryedit" name="colourcategoryedit">
                                <option value="<?php echo $row['color_category'];?>"><?php echo $row['color_category'];?></option>
                                <option>------</option>
                                <option value="GLITTERS">GLITTERS</option>
                                <option value="SHIMMERS">SHIMMERS</option>
                                <option value="MATTE">MATTE</option>
                              </select>
                            </div>
                          </div>
                          <input type="submit" class="btn btn-dark" name="edit_a_shade_form">
                        <?php
                }
              }
            }
          ?>
          
          <br>
          
        </form> 

        <!-- UPDATE SHADE -->
        <?php
        if(isset($_POST['edit_a_shade_form']))
        {
            $color_name_edit = $_POST['colournameedit'];
            $color_code_edit = $_POST['colourcodeedit'];
            $color_units_edit = $_POST['colourunitsedit'];
            $color_price_edit = $_POST['colourpriceedit'];
            $color_category_edit = $_POST['colourcategoryedit'];

            $sql_edit_shade = "UPDATE palette_colors SET color_name = '$color_name_edit', color_code = '$color_code_edit', color_units = '$color_units_edit', color_price = '$color_price_edit', color_category = '$color_category_edit' WHERE color_code = '$color_code_edit'";

            if ($conn->query($sql_edit_shade) === TRUE) {
                echo "Shade updated successfully";
            }
            else{
              echo $conn->error;
            }
          }
        ?>
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <br>
        <h5>Delete a shade : </h5><hr>
        <form name="delete_a_shade" action="#" method="post">
          <select name="delete_shade">
            <?php
              $sql_fetch_shade_to_delete = "SELECT * FROM palette_colors";
              $result_fetch_shade_to_delete = $conn->query($sql_fetch_shade_to_delete);
              if ($result_fetch_shade_to_delete->num_rows > 0) {
                    // output data of each row
                    while($row = $result_fetch_shade_to_delete->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['color_code'];?>"><?php echo $row['color_name'];?></option>
                        <?php
                }
              }
            ?>
          </select>
          <input type="submit" name="fetch_delete_value">
        </form>

        <?php
        if(isset($_POST['fetch_delete_value']))
        {
          $color_code_delete = $_POST['delete_shade'];
          echo $color_code_delete;
          $sql_delete_shade = "DELETE FROM palette_colors WHERE color_code = '$color_code_delete'";

          if ($conn->query($sql_delete_shade) === TRUE) {
              echo " Shade deleted successfully";
          } 
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
