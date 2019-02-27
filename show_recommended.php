   <?php
    include 'header.php';
   ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container" style="padding: 5px;">
    <h4><strong>Recommended :</strong></h4><hr>
    <div class="row">
      <?php

      $sql_fetch_product_recommended = "SELECT * FROM product WHERE product_tag LIKE '%recommended%' ORDER BY tag_order DESC";

      $result_recommended = $conn->query($sql_fetch_product_recommended);

      if ($result_recommended->num_rows > 0) {
          // output data of each row
          while($row = $result_recommended->fetch_assoc()) {
               ?>
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-header">
                      <p class="card-header-text"><?php echo $row['product_name'];?></p>
                    </div>
                    <div class="card-body" style="padding-bottom: 0;">
                      <div class="row">
                        <div class="col-sm-7 col-5" style="padding: 5px">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['product_imgurl_01']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_01']?>" alt="First slide"></a>
                                  </div>
                                    <?php
                                  }
                                  if($row['product_imgurl_02']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_02']?>" alt="Second slide"></a>
                                  </div>
                                    <?php
                                  }
                                  if($row['product_imgurl_03']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_03']?>" alt="Third slide"></a>
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                          <div style="position: absolute; top:0px;">
                            <h5><span class="badge badge-success">Recommended</span></h5>
                          </div>
                        </div>
                        <div class="col-sm-5 col-7" style="padding:5px">
                          <p class="card-text"> <strong>Available Sizes :</strong> 
                            <?php
        if($row['product_size_01']!="")
          {
            echo $row['product_size_01'];
          }
        for($i=2;$i<6;$i++)
        {
          if($row['product_size_0'.$i]!="")
          {
            echo ' | '.$row['product_size_0'.$i];
          }
        }
        ?><br>
                            <strong>Price :</strong> 
                            <?php
        if($row['product_discount']!=0)
        {
          if($row['product_price_01']!=0)
          {
            echo '<span style="text-decoration : line-through;">'.'Rs. '.$row['product_price_01'].'</span> ';
            echo '<b>Rs. '.($row['product_price_01'] - ($row['product_price_01']*($row['product_discount']/100))).'</b>';

          }
          for($i=2;$i<6;$i++)
          {
            if($row['product_price_0'.$i]!=0)
            {
              echo '<br><span style="text-decoration : line-through;">'.' Rs. '.$row['product_price_0'.$i].'</span> ';
              echo '<b>Rs. '.($row['product_price_0'.$i] - ($row['product_price_0'.$i]*($row['product_discount']/100))).'</b>';
            }

          }
          echo '<br><i><span style="color : green;">'.$row['product_discount'].'% off</i></span>';
        }
        else{
          if($row['product_price_01']!=0)
            {
              echo 'Rs. '.$row['product_price_01'];
            }
          for($i=2;$i<6;$i++)
          {
            if($row['product_price_0'.$i]!=0)
            {
              echo ' | Rs. '.$row['product_price_0'.$i];
            }
          }
        }
        ?></p>
                         
                          <div class="card-button">
                            <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>" title="View Details"><i class="fas fa-lg fa-info-circle" style="margin-bottom: 10px;"></i></a>
                            
                          </div>
                          <div class="card-button">
                            <form method="post">
                              <input type="hidden" name="product_id_picked" value="<?php echo $row['product_id'];?>">
                              <input type="hidden" name="product_name_picked" value="<?php echo $row['product_name'];?>">
                              <input type="hidden" name="product_size" value="<?php echo $row['product_size_01'];?>">
                              <input type="hidden" name="product_units" value="1">
                              <input type="submit" title="Add to Cart" id="add_to_cart_form" name="add_to_cart_form" class="btn btn-outline-dark" value="Add to cart" style="visibility: visible;">
                              <a class="btn btn-dark" id="show_cart_now" style="visibility: hidden" href="show_cart.php">View Cart</a>
                              <div id="cart_notification"></div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php

            }
          }
            ?>

      
           </div>
  </div>
</div>


<div class="text-center category-subcategory">
    <h4 style="margin-bottom: 20px;"><b>Shop by category : </b></h4>
    <div class="row">
       <hr>
      <div class="col-md-2 col-sm-4 col-4">
          <br><a onclick="show_skin_care_sub()" class="category-link"><img src="icons/skincare.svg" style="width:35%;">
          <h5 style="margin-top:10px;padding:10px;">Skin Care</h5></a><br>
          <script type="text/javascript">
            function show_skin_care_sub()
            {
              document.getElementById("body_care_sub").style.display = "none";
              document.getElementById("hair_care_sub").style.display = "none";
              document.getElementById("fragrances_sub").style.display = "none";
              document.getElementById("cosmetics_sub").style.display = "none";
              document.getElementById("combo_sub").style.display = "none";

               if (document.getElementById("skin_care_sub").style.display == "none" ) {
                   document.getElementById("skin_care_sub").style.display="block";
                 } else {
                    document.getElementById("skin_care_sub").style.display="none";
              }
            }
          </script>
              <div id="skin_care_sub" style="display: none;">
                    <?php
                      $category_temp = "Skin Care";
                      $sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
                      $result1 = $conn->query($sql_subcategory);

                  if ($result1->num_rows > 0) {
                      // output data of each row
                      ?>
                          
                      <?php

                      while($row = $result1->fetch_assoc()) {
                          // echo "CATEGORY " . $row["product_category"]."<br>";
                          ?>
                          <a style="padding-left:10px;text-align: left;font-weight: 800;" class="dropdown-item" href="viewproducts.php?category=<?php echo $category_temp?>&sub_category=<?php echo $row["product_subcategory"];?>"><?php echo $row["product_subcategory"];?></a>
                  <?php
              }
          }
          ?><br>
          </div>
      </div>
      <div class="col-md-2 col-sm-4 col-4">
          <br><a onclick="show_hair_care_sub()" class="category-link"><img src="icons/haircare.svg" style="width:35%;">
          <h5 style="margin-top:10px;padding:10px;">Hair Care</h5></a><br>
          <script type="text/javascript">
            function show_hair_care_sub()
            {
              document.getElementById("body_care_sub").style.display = "none";
              document.getElementById("skin_care_sub").style.display = "none";
              document.getElementById("fragrances_sub").style.display = "none";
              document.getElementById("cosmetics_sub").style.display = "none";
              document.getElementById("combo_sub").style.display = "none";
               if (document.getElementById("hair_care_sub").style.display == "none" ) {
                   document.getElementById("hair_care_sub").style.display="block";
                 } else {
                    document.getElementById("hair_care_sub").style.display="none";
              }
            }
          </script>

          <div class="container" id="hair_care_sub" style="display: none;text-align: left;">
                          <?php
                            $category_temp = "Hair Care";
                            $sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
                            $result1 = $conn->query($sql_subcategory);

                        if ($result1->num_rows > 0) {
                            // output data of each row
                            ?>
                                
                            <?php

                            while($row = $result1->fetch_assoc()) {
                                // echo "CATEGORY " . $row["product_category"]."<br>";
                                ?>
                                <a style="padding:0;text-align: center;font-weight: 800;" class="dropdown-item" href="viewproducts.php?category=<?php echo $category_temp?>&sub_category=<?php echo $row["product_subcategory"];?>"><?php echo $row["product_subcategory"];?></a>

                          
                        <?php
                    }
                        

                }
                ?><br>
          </div>
      </div>
      <div class="col-md-2 col-sm-4 col-4">
          <br><a onclick="show_body_care_sub()" class="category-link"><img src="icons/bathandbody.svg" style="width:35%;">
          <h5 style="margin-top:10px;padding:10px;">Body Care</h5></a><br>
          <script type="text/javascript">
            function show_body_care_sub()
            {
              document.getElementById("skin_care_sub").style.display = "none";
              document.getElementById("hair_care_sub").style.display = "none";
              document.getElementById("fragrances_sub").style.display = "none";
              document.getElementById("cosmetics_sub").style.display = "none";
              document.getElementById("combo_sub").style.display = "none";
               if (document.getElementById("body_care_sub").style.display == "none" ) {
                   document.getElementById("body_care_sub").style.display="block";
                 } else {
                    document.getElementById("body_care_sub").style.display="none";
              }
            }
          </script>
          <div class="container" id="body_care_sub" style="display: none;text-align: right;">
                          <?php
                            $category_temp = "Body Care";
                            $sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
                            $result1 = $conn->query($sql_subcategory);

                        if ($result1->num_rows > 0) {
                            // output data of each row
                            ?>
                                
                            <?php

                            while($row = $result1->fetch_assoc()) {
                                // echo "CATEGORY " . $row["product_category"]."<br>";
                                ?>
                                <a style="text-align: left;font-weight: 800;white-space: normal;" class="dropdown-item" href="viewproducts.php?category=<?php echo $category_temp?>&sub_category=<?php echo $row["product_subcategory"];?>"><?php echo $row["product_subcategory"];?></a>
                        <?php
                    }
                }
                ?><br>
          </div>
      </div>
      <div class="col-md-2 col-sm-4 col-4">
          <br><a onclick="show_fragrances_sub()" class="category-link"><img src="icons/fragrance.svg" style="width:35%;">
          <h5 style="margin-top:10px;padding:10px;">Fragrances</h5></a><br>
          <script type="text/javascript">
            function show_fragrances_sub()
            {
              document.getElementById("body_care_sub").style.display = "none";
              document.getElementById("hair_care_sub").style.display = "none";
              document.getElementById("skin_care_sub").style.display = "none";
              document.getElementById("cosmetics_sub").style.display = "none";
              document.getElementById("combo_sub").style.display = "none";
               if (document.getElementById("fragrances_sub").style.display == "none" ) {
                   document.getElementById("fragrances_sub").style.display="block";
                 } else {
                    document.getElementById("fragrances_sub").style.display="none";
              }
            }
          </script>
          <div class="container" id="fragrances_sub" style="display: none;text-align: left;">
                          <?php
                            $category_temp = "Fragrances";
                            $sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
                            $result1 = $conn->query($sql_subcategory);

                        if ($result1->num_rows > 0) {
                            // output data of each row
                            ?>
                                
                            <?php

                            while($row = $result1->fetch_assoc()) {
                                // echo "CATEGORY " . $row["product_category"]."<br>";
                                ?>
                                <a style="padding-left:10px;text-align:left;font-weight: 800;" class="dropdown-item" href="viewproducts.php?category=<?php echo $category_temp?>&sub_category=<?php echo $row["product_subcategory"];?>"><?php echo $row["product_subcategory"];?></a>
                        <?php
                    }
                }
                ?><br>
          </div>
      </div>
      <div class="col-md-2 col-sm-4 col-4">
          <br><a onclick="show_cosmetics_sub()" class="category-link" id="category-link"><img src="icons/cosmetics.svg" style="width:35%;">
          <h5 style="margin-top:10px;padding:10px;">Cosmetics</h5></a><br>
          <script type="text/javascript">
            function show_cosmetics_sub()
            {
              document.getElementById("body_care_sub").style.display = "none";
              document.getElementById("hair_care_sub").style.display = "none";
              document.getElementById("fragrances_sub").style.display = "none";
              document.getElementById("skin_care_sub").style.display = "none";
              document.getElementById("combo_sub").style.display = "none";
               if (document.getElementById("cosmetics_sub").style.display == "none" ) {
                   document.getElementById("cosmetics_sub").style.display="block";
                   document.getElementById("category-link").style.content="";
                 } else {
                    document.getElementById("cosmetics_sub").style.display="none";
                    document.getElementById("category-link").style.content="";
              }
            }
          </script>
          <div class="container" id="cosmetics_sub" style="display: none;text-align: center;">
                          <?php
                            $category_temp = "Cosmetics";
                            $sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
                            $result1 = $conn->query($sql_subcategory);

                        if ($result1->num_rows > 0) {
                            // output data of each row
                            ?>
                                
                            <?php

                            while($row = $result1->fetch_assoc()) {
                                // echo "CATEGORY " . $row["product_category"]."<br>";
                                ?>
                                <a style="padding:0;text-align: center;font-weight: 800;" class="dropdown-item" href="viewproducts.php?category=<?php echo $category_temp?>&sub_category=<?php echo $row["product_subcategory"];?>"><?php echo $row["product_subcategory"];?></a>
                        <?php
                    }
                }
                ?><br>
          </div>
      </div>
      <div class="col-md-2 col-sm-4 col-4">
          <br><a onclick="show_combo_sub()" class="category-link"><img src="icons/combo.svg" style="width:35%;">
          <h5 style="margin-top:10px;padding:10px;">Combo</h5></a><br>
          <script type="text/javascript">
            function show_combo_sub()
            {
              document.getElementById("body_care_sub").style.display = "none";
              document.getElementById("hair_care_sub").style.display = "none";
              document.getElementById("fragrances_sub").style.display = "none";
              document.getElementById("cosmetics_sub").style.display = "none";
              document.getElementById("skin_care_sub").style.display = "none";
               if (document.getElementById("combo_sub").style.display == "none" ) {
                   document.getElementById("combo_sub").style.display="block";
                 } else {
                    document.getElementById("combo_sub").style.display="none";
              }
            }
          </script>
          <div class="container" id="combo_sub" style="display: none;text-align: left;">
                          <?php
                            $category_temp = "Combo";
                            $sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
                            $result1 = $conn->query($sql_subcategory);

                        if ($result1->num_rows > 0) {
                            // output data of each row
                            ?>
                                
                            <?php

                            while($row = $result1->fetch_assoc()) {
                                // echo "CATEGORY " . $row["product_category"]."<br>";
                                ?>
                                <a style="padding-left: 10px;text-align: left;font-weight: 800;white-space: normal;" class="dropdown-item" href="viewproducts.php?category=<?php echo $category_temp?>&sub_category=<?php echo $row["product_subcategory"];?>"><?php echo $row["product_subcategory"];?></a>
                        <?php
                    }
                }
                ?><br>
          </div>
      </div>
    </div>
  </div>
<br>

      

 <?php
              if(isset($_POST['add_to_cart_form']))
              {
                  $picked_id = $_POST['product_id_picked'];
                  $picked_quantity = $_POST['product_units']; 
                  $picked_size = $_POST['product_size'];
                  $picked_name = $_POST['product_name_picked'];
                  $picked_price = 0;

                $sql_fetch_product_price = "SELECT * FROM product WHERE product_id = $picked_id";
                $result_fetch_product_price = $conn->query($sql_fetch_product_price);

                if ($result_fetch_product_price->num_rows > 0) {
                    // output data of each row
                    while($row = $result_fetch_product_price->fetch_assoc()) {
                                        if($row['product_discount']!=0)
                                        {
                                          if($picked_size == $row['product_size_01'])
                          {
                            $picked_price = $row['product_price_01'] - ($row['product_price_01']*($row['product_discount']/100));
                          }
                          if($picked_size == $row['product_size_02'])
                          {
                            $picked_price = $row['product_price_02'] - ($row['product_price_02']*($row['product_discount']/100));
                          }
                          if($picked_size == $row['product_size_03'])
                          {
                            $picked_price = $row['product_price_03'] - ($row['product_price_03']*($row['product_discount']/100));
                          }
                          if($picked_size == $row['product_size_04'])
                          {
                            $picked_price = $row['product_price_04'] - ($row['product_price_04']*($row['product_discount']/100));
                          }
                          if($picked_size == $row['product_size_05'])
                          {
                            $picked_price = $row['product_price_05'] - ($row['product_price_05']*($row['product_discount']/100));
                          }
                                        }   
                                        else {                     
                          if($picked_size == $row['product_size_01'])
                          {
                            $picked_price = $row['product_price_01'];
                          }
                          if($picked_size == $row['product_size_02'])
                          {
                            $picked_price = $row['product_price_02'];
                          }
                          if($picked_size == $row['product_size_03'])
                          {
                            $picked_price = $row['product_price_03'];
                          }
                          if($picked_size == $row['product_size_04'])
                          {
                            $picked_price = $row['product_price_04'];
                          }
                          if($picked_size == $row['product_size_05'])
                          {
                            $picked_price = $row['product_price_05'];
                          }
                      }
                          
                }
              }

                      if(in_array($picked_id,$_SESSION['cart_content']))
                      {
                        ?>
                          <script type="text/javascript">
                          document.getElementById("cart_notification").innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">This product is already in the cart.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                          </script>

                        <?php
                      }
                      else {
                        array_push($_SESSION['cart_content'], $picked_id);
                        array_push($_SESSION['cart_content_size'], $picked_size);
                        array_push($_SESSION['cart_content_units'], $picked_quantity);
                        array_push($_SESSION['cart_content_name'], $picked_name);
                        array_push($_SESSION['cart_content_price'], $picked_price);
                        $_SESSION['cart_count'] = $_SESSION['cart_count'] + 1;
                        ?>
                          <script type="text/javascript">
                          document.getElementById("cart_notification").innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">Added to cart.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                          </script>
                          
                        <?php 
                      }
                    
                  ?>
                  <script>  
                          document.getElementById('show_cart_now').style.visibility='visible';
                          document.getElementById('add_to_cart_form').style.visibility='hidden';
                          document.getElementById('add_to_cart_form').style.display='none';
                          document.getElementById('cart_link').innerHTML=" <i class='fas fa-shopping-cart'></i> (<?php echo count($_SESSION['cart_content']);?>)";
                          
                    
                  </script>
                  <?php
              }
      
                
              ?>     
    
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <hr>
      <h5 class="text-center">About Us</h5>
      <hr>
      <p class="text-justify">We at BOOKaBOOK present you most economical, chemical-free and Eco-friendly Second Hand Books. These Second hand books are from various sources and <br><i> <b>Even You can Sell Your BOOKS.</b></i></p>
      <p class="text-justify">If you want to sell your books mail the book details like name,price,photo,genre to. <a href="mailto:onlyuseharish@gmail.com?Subject=SellBook" target="_top">onlyuseharish@gmail.com</a></p>
    </div>

    <div class="col-md-6 text-center">
      <hr>
      <h5 class="text-center">Contact and Social</h5>
      <hr>
      <p>Email : <strong>onlyuseharish@gmail.com</strong></p>
      <p>DM us on Instagram:
       <!-- <a href="https://instagram.com/glamaroma_beauty/" target="_blank"><i class="fab fa-lg fa-instagram"></i></a></p>
       <p>Follow us on :             
         <a href="https://www.facebook.com/InstaGlam-Hair-And-Beauty-1947590502146146" target="_blank"><i class="fab fa-lg fa-facebook"></i> 
         </a></p> -->
         <p>WhatsApp : 9494660109</p>

         <hr>
       </div>
     </div>
   </div>

</div>
       
    

<?php

 include 'footer.php';
?>