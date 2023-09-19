<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Sản phẩm</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <link href="../Admin/assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../Admin/assets/css/font-awesome.css" rel="stylesheet" />
  <link href="../Admin/assets/css/basic.css" rel="stylesheet" />
  <link href="../Admin/assets/css/custom.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../Admin/assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../Admin/assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="../Admin/assets/js/custom.js"></script>
  <style>
    #cncn:hover{
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <?php
      include("Control.php");
      session_start();
      $getdata = new data();
      if(!isset($_SESSION['TenTK']))   header("Location: ../Dangnhap.php");
      if($_SESSION['lan']== 0)   echo'<script>alert("Chào mừng bạn đến với FRUIT SHOP.");</script>';
      $_SESSION['lan']++;
      $input = $getdata->Search_User($_SESSION['TenTK']);
      $ttcn = mysqli_fetch_array($input);
  ?>
  <div class="hero_area">
    <!-- header section strats -->
    <a href="Trangchu.php"><div class="brand_box">
      <div class="navbar-brand">
        <span>
          Ninom
        </span>
      </div>
    </div></a>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="img-box">
              <img src="images/niniom_banner/slider-img.jpg" alt="">
            </div>
          </div>
          <div class="carousel-item">
            <div class="img-box">
              <img src="images/niniom_banner/slider-img.jpg" alt="">
            </div>
          </div>
          <div class="carousel-item">
            <div class="img-box">
              <img src="images/niniom_banner/slider-img.jpg" alt="">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="max-height: 34px;">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" style="width: 150px;" href="Trangchu.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="width: 150px;" href="about.php">Giới thiệu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="width: 150px;" href="fruit.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="width: 150px;" href="testimonial.php">Giỏ hàng</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="width: 150px;" href="contact.php">Liên hệ</a>
                </li>
                <li class="nav-item" style="width: 200px; max-height: 50px;">
                  <!-- <div class="sidebar-collapse" style="width: 200px;"> -->
                    <ul id="main-menu">
                      <li>
                        <a class="nav-link" href="#" style="width: 200px; border: 1px solid white; margin-top: -5px; color: orangered;"><?php echo$ttcn['Name_TK']; ?>
                          <img src="../User/images/image_User/<?php echo$ttcn['Avt']; ?>" class="img-thumbnail" style="width: 40px; height: 40px; margin-top: -5px; border-radius: 50%; float: right;" />
                        </a>
                        <ul class="nav nav-second-level">
                          <li>
                            <a id="cncn" href="ChitietVi.php" style="width: 200px; background-color:  rgba(0, 0, 0, 0.85); color: antiquewhite;">
                              Ví: <div style="float: right;"><?php echo$ttcn['Wallet'].'$'; ?></div>
                            </a>
                          </li>
                          <?php
                            if($ttcn['Chucvu'] == 'Admin'){
                          ?>
                          <hr style="width: 200px; height: 1px; margin-top: -2px; margin-bottom: -2px;">
                          <li>
                            <a id="cncn" href="../Admin/Admin_TC.php" style="width: 200px; background-color:  rgba(0, 0, 0, 0.85); color: antiquewhite;">Quản lý</a>
                          </li>
                          <?php
                            }
                          ?>
                          <hr style="width: 200px; height: 1px; margin-top: -2px; margin-bottom: -2px;">
                          <li>
                            <a id="cncn" href="../Dangnhap.php" style="width: 200px; background-color:  rgba(0, 0, 0, 0.85); color: antiquewhite;">Đăng xuất</a>
                          </li>
                        </ul>
                      </li>
                    </ul> 
                  <!-- </div> -->
                </li> 
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" style="margin-left: 70px;" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->

  <!-- fruit section -->
<form method="post">
  <section class="fruit_section layout_padding">
    <div class="container">
      <div style="margin-bottom: 20px; font-size: 24px;">
        Tìm kiếm sản phẩm:
        <input type="text" name="txtsearch">
        <input type="submit" name="searchsp" value="Tìm kiếm">
      </div>
      <div class="heading_container">
        <hr>
        <h2>
          Danh sách sản phẩm
        </h2>
      </div>
    </div>
    <div class="container-fluid">

      <div class="fruit_container">
        <?php
          $select_sp = $getdata->Load_SP();
          if(isset($_POST['searchsp'])){
              if($_POST['txtsearch'] != ""){
                  $select_sp = $getdata->ListSP_search($_POST['txtsearch']);
              }
          }
          foreach($select_sp as $sp){
        ?>
          <div class="box">
            <img src="images/image_SP/<?php echo$sp['Image_SP']; ?>" alt="">
            <div class="link_box">
              <h5 style="color: red; font-weight: bold; font-size: 24px;">
                <?php echo$sp['Name_SP']; ?>
              </h5>
              <?php 
                if($sp['TysoGiamGia'] > 0){
                  echo'<h5 style="text-decoration: line-through;">Giá gốc: '.$sp['Price']
                  .'$</h5><h4 style="color: orangered;"> Giá ưu đãi: '.($sp['Price']-$sp['Price']*$sp['TysoGiamGia']/100)."$</h4>";
                }else
                  echo'<h5>Giá: '.$sp['Price'].'$</h5>'; 
              ?>
              <a href="Chitietsp.php?idsp=<?php echo$sp['ID_SP']; ?>">
                Chi tiết sản phẩm
              </a><br>
              <a href="themvaogio.php?idsp=<?php echo$sp['ID_SP']; ?>" onclick="<?php $_SESSION['Next'] = 'fruit.php'; ?>">
                Thêm vào giỏ hàng
              </a>
            </div>
          </div>
        <?php
          }
        ?>
      </div>
    </div>
  </section>
</form>
  <!-- end fruit section -->


  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_logo">
        <h2>
          NiNom
        </h2>
      </div>
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href="">
              <img src="images/location.png" alt="">
              <span>
                Địa chỉ của Shop
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/call.png" alt="">
              <span>
                Hostline: 0977359210
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/mail.png" alt="">
              <span>
                Email: lequyminh101@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Nhập email của bạn">
              <button>
                Đăng ký nhận thông báo
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; <span id="displayYear"></span> Bảo lưu mọi quyền.  
      <a href="https://html.design/" style="text-decoration: underline;"> Thiết kế bằng các mẫu Html miễn phí</a>
    </p>
  </section>
  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>