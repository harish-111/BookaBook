
   <?php
    session_start();
    include 'header.php';
   ?>

   <!-- TOP BANNER CARAOUSEL -->
  <div id="top-banner-caraousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="products/banner01.jpeg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="products/banner02.jpeg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="products/banner03.jpeg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#top-banner-caraousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#top-banner-caraousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- CATEGORY and SUB-CATEGORY -->
  <div class="container text-center category-subcategory">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <hr>
      </div>
      <div class="col-sm-4 col-xs-12">
        <h5>SKIN CARE</h5>
      </div>
      <div class="col-sm-4 col-xs-12">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <!-- <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/facialserum.jpg">
        </div>Facial Serum -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <a class="dropdown-item" href="viewproducts.php?category=Body Care&sub_category=Facial Serum"><img class="img-fluid img-thumbnail" src="products/facialserum.jpg"><br>Facial Serum</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <a class="dropdown-item" href="viewproducts.php?category=Body Care&sub_category=Facial Cleansers & Toners"><img class="img-fluid img-thumbnail" src="products/facialcleanserstoners.jpg"><br>Facial Cleansers & Toners</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <!-- <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/facialserum.jpg">
        </div>Facial Serum -->
      </div>
      <!-- <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/square01.jpeg">
        </div>Sub-category here
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/square01.jpeg">
        </div>Sub-category here
      </div> -->
    </div>
    <hr>
  </div>

  <div class="container text-center category-subcategory">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <hr>
      </div>
      <div class="col-sm-4 col-xs-12">
        <h5>BATH AND BODY CARE</h5>
      </div>
      <div class="col-sm-4 col-xs-12">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <!-- <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/facialserum.jpg">
        </div>Facial Serum -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <a class="dropdown-item" href="viewproducts.php?category=Bath and Body Care&sub_category=Body Oil"><img class="img-fluid img-thumbnail" src="products/bodyoil.jpg"><br>Body Oil</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <a class="dropdown-item" href="viewproducts.php?category=Bath and Body Care&sub_category=Body Ubtan"><img class="img-fluid img-thumbnail" src="products/bodyubtan.jpg"><br>Body Ubtan</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <!-- <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/facialserum.jpg">
        </div>Facial Serum -->
      </div>
      <!-- <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/square02.jpeg">
        </div>Sub-category here
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/square02.jpeg">
        </div>Sub-category here
      </div> -->
    </div>
    <hr>
  </div>

  <div class="container text-center category-subcategory">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <hr>
      </div>
      <div class="col-sm-4 col-xs-12">
        <h5>Other Products</h5>
      </div>
      <div class="col-sm-4 col-xs-12">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 col-sm-6 col-xs-12">
        <!-- <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/haircare.jpg">
        </div>Hair Care -->
      </div>
      <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <a class="dropdown-item" href="viewproducts.php?category=Hair Care"><img class="img-fluid img-thumbnail" src="products/haircare.jpg"><br>Hair Care</a>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <a class="dropdown-item" href="viewproducts.php?category=Fragnances Male"><img class="img-fluid img-thumbnail" src="products/fragnancesmale.jpg"><br>Fragnances - Male</a>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <a class="dropdown-item" href="viewproducts.php?category=Fragnances Female"><img class="img-fluid img-thumbnail" src="products/fragnancesfemale.jpg"><br>Fragnances - Female</a>
        </div>
      </div>
      <!-- <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="thumbnail">
          <img class="img-fluid img-thumbnail" src="products/square03.jpeg">
        </div>Sub-category here
      </div> -->
    </div>
    <hr>
  </div>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>