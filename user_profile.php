<?php

	include 'header.php';
?>


    <style type="text/css">
        
.emp-profile{
    padding: 3%;
   
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    </style>

<body>
<!-- DISPLAY USER INFO -->
<?php
$temp_id = $_SESSION['user_id'];
$sql_fetch_user_details = "SELECT * FROM registered_user WHERE user_id = $temp_id";

$result = $conn->query($sql_fetch_user_details);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        	
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            
                <div class="row">
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $row['user_name'];?>
                                    </h5>
                                   
                                    <br>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" data-toggle="modal" data-target="#edit_profile_modal" value="Edit Profile"/>
                    </div>
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <form method="post" action="edit_profile.php">
                    <div class="modal fade" id="edit_profile_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                <input type="hidden" name="userEmail" value="<?php echo $row['user_email'];?>">
                              <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" value="<?php echo $row['user_mobile'];?>">
                              </div>
                              <div class="form-group">
                                <label for="userDate">Date of Birth</label>
                                <input type="date" class="form-control" id="userDate" name="userDate" value="<?php echo $row['user_dob'];?>">
                              </div>
                              <div class="form-group">
                                <label for="inputStreet">Address</label>
                                <input type="text" class="form-control" id="inputStreet" name="inputStreet" value="<?php echo $row['user_street'];?>">
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="inputState">State</label>
                                  <input type="text" class="form-control" id="inputState" name="inputState" value="<?php echo $row['user_state'];?>">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputCity">City</label>
                                  <input type="text" class="form-control" id="inputCity" name="inputCity" value="<?php echo $row['user_city'];?>">
                                </div>                                
                                <div class="form-group col-md-4">
                                  <label for="inputZip">Zip</label>
                                  <input type="text" class="form-control" id="inputZip" name="inputZip" value="<?php echo $row['user_zip'];?>">
                                </div>
                              </div>
                              
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </form>
                <div class="row">
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['user_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['user_email'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['user_dob'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contact Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['user_mobile'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['user_street'].', '.$row['user_city'].', '.$row['user_state'].' - '.$row['user_zip'];?></p>
                                            </div>
                                        </div>
                          
                            
                            </div>
                        </div>
                    </div>
                </div>
               
        </div>

        <?php
    }
} else {
    echo "0 results";
}

include 'footer.php';
?>
</body>
</html>