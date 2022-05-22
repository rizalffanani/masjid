<!DOCTYPE html>
<?php 
  $page=$this->db->get_where('page', array('enum' => 'y'))->result();
  $infoweb=$this->db->get_where('info', array('id_info' => '1'))->row();
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?= $infoweb->nama_web?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="description" content="Edu365 Education HTML" />
  <meta name="keywords" content="Education" />
  <meta name="author" content="" />
  <meta name="MobileOptimized" content="320" />

  <link rel="icon" href="<?php echo base_url(); ?>assets/img/<?= $infoweb->logo_web?>">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?php  echo (base_url());?>assets/backend/plugins/jquery/jquery.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/js/popper.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/backend/plugins/toastr/toastr.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/animate.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/font-awesome.html" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/nice-select.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/book.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/swiper.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/venobox.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/testimonial.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/flaticon.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/owl.carousel.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/owl.theme.default.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/style.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/style_II.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo (base_url());?>assets/edu365/css/responsive_II.css" />
  <!--favicon-->
  <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
  <style type="text/css">
    .award_btns {
      margin: 5px !important;
      padding: 5px 10px !important;
      font-size: 1em !important;
      border-radius: 50px !important;
      border: 1px solid #573744 !important;
    }
    .colortheme {      
      background: -webkit-linear-gradient(left, rgba(116,66,93,1) 0%, rgba(62,46,46,1) 100%);
    }
  </style>

</head>
<body>
  <div id="preloader">
    <div id="status">
      <img src="<?php echo base_url(); ?>assets/img/<?= $infoweb->logo_web?>" id="preloader_image" alt="loader">
    </div>
  </div>
  <a id="back2Top" title="Back to top" href="#">&#10148;</a>
  <!-- edu logo header wrapper Start -->
  <div class="edu_logo_header_wrapper float_left">
    <form  action="<?= base_url(); ?>web/search" method="post" id="search_open" class="gc_search_box">
      <input type="search" name="keyword" placeholder="Search here">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
      </button>
    </form>
    <div class="container">
      <div class="edu_logo_main_wrapper" style="padding-top: unset;">
        <a href="<?php echo site_url('web') ?>"> 
          <img src="<?php echo base_url(); ?>assets/img/<?= $infoweb->logo_web?>" style="height: 86px;" alt="logo">
        </a>
        <?= $infoweb->nama_web?>
      </div>
      <div class="edu_seach_wrapper">
        <div id="search_button">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2" x="0px" y="0px" viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;" xml:space="preserve">
            <g>
              <path id="search" d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3   s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4   C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3   s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z" />
            </g>
          </svg>
        </div>
      </div>
      <div class="kv_navigation_wrapper">
        <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
          <ul class="main_nav_ul">
            <!-- mega menu start -->
            <li class="has-mega gc_main_navigation"><a href="<?php echo site_url('web') ?>" class="gc_main_navigation hover_color">Beranda</a>
            </li>
            <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation hover_color">  Tentang Kami&nbsp; <i class="fas fa-angle-down"></i></a>
              <ul>
                <?php foreach ($page as $key => $value) { ?>
                  <li class="parent"><a href="<?php echo site_url('web/page/'.$value->link) ?>"><?= $value->judul?></a></li>
                <?php }?>
              </ul>
            </li>
            <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation hover_color">  Informasi Masjid&nbsp; <i class="fas fa-angle-down"></i></a>
              <ul>
                <?php if($this->session->userdata("user_id")){?>
                <li class="parent"><a href="<?php echo site_url('web/t_keuangan') ?>">Laporan Keuangan</a></li>
                <li class="parent"><a href="<?php echo site_url('web/t_donasi') ?>">Donasi</a>
                <?php }?>
                <li class="parent"><a href="<?php echo site_url('web/t_jadwal') ?>">Kegiatan Masjid</a>
                <li class="parent"><a href="<?php echo site_url('web/t_sholat') ?>">Imam Sholat</a>
                </li>
              </ul>
            </li>
            <li class="has-mega gc_main_navigation">
              <a href="<?php echo site_url('web/t_buletin') ?>" class="gc_main_navigation hover_color">Buletin</a>
            </li>
            <?php if(!$this->session->userdata("user_id")){?>
            <li class="has-mega gc_main_navigation">
              <a href="<?php echo site_url('web/login') ?>" class="gc_main_navigation hover_color">Login</a>
            </li>
            <?php }else{?>
            <li class="has-mega gc_main_navigation">
              <a href="<?php echo site_url('login/logout') ?>" class="gc_main_navigation hover_color">Logout</a>
            </li>
            <?php }?>
          </ul>
        </div>
        <!-- mainmenu end -->
      </div>
      <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
        <div class="cd-dropdown-wrapper">
          <a class="house_toggle" href="#0">  <i class="flaticon-menu"></i>
          </a>
          <nav class="cd-dropdown">
            <h2><a href="#"><?= $infoweb->nama_web?></a></h2>
            <a href="#0" class="cd-close">Close</a>
            <ul class="cd-dropdown-content">
              <li><a href="about_us.html">Beranda</a>
              </li>
              <li class="has-children"> <a href="#">Home</a>
                <ul class="cd-secondary-dropdown icon_menu is-hidden">
                  <li class="go-back"><a href="#0">Menu</a></li>
                  <li><a href="index-2.html">Tentang Masjid</a></li>
                  <li><a href="index_II.html">Sejarah</a></li>
                  <li><a href="index_II.html">Struktur Organisasi</a></li>
                  <li><a href="index_II.html">Sejarah</a></li>
                </ul>
              </li>
              <li class="has-children"> <a href="#">Informasi Masjid</a>
                <ul class="cd-secondary-dropdown icon_menu is-hidden">
                  <li class="go-back"><a href="#0">Menu</a></li>
                  <li><a href="index-2.html">Laporan Keuangan</a></li>
                  <li><a href="index_II.html">Kegiatan Masjid</a></li>
                  <li><a href="index_II.html">Imam Sholat</a></li>
                  <li><a href="index_II.html">Donasi</a></li>
                </ul>
              </li>
              <li><a href="contact_us.html">Buletin</a>
              <?php if(!$this->session->userdata("user_id")){?> 
              <li><a href="<?php echo site_url('login') ?>">Login</a>
              <?php }else{?>  
              <li><a href="<?php echo site_url('login/logout') ?>">Logout</a>
              <?php }?> 
              </li>
            </ul>
            <!-- .cd-dropdown-content -->
          </nav>
          <!-- .cd-dropdown -->
        </div>
        <!-- .cd-dropdown-wrapper -->
      </header>
    </div>
  </div>
  <!-- edu logo header wrapper End -->
  <?php
    echo $contents;
  ?>
  <div class="edu_footer_bottom float_left">
    <div class="container">
      <div class="bottom_footer float_left">
        <p>&copy;<?= date("Y")?> ~ <a href="<?php echo site_url('dashboard') ?>"><?= $infoweb->nama_web?></a></p>
      </div>
    </div>
  </div>
  
  <script src="<?php  echo (base_url());?>assets/edu365/js/jquery-3.3.1.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/bootstrap.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/modernizr.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/testimonial.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/jquery.nice-select.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/jquery.countTo.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/jquery.inview.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/swiper.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/venobox.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/owl.carousel.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/jquery.menu-aim.js"></script>
  <script src="<?php  echo (base_url());?>assets/edu365/js/custom_II.js"></script>
  <!-- custom js-->
  <script>
    $(".edu_coll_slider_tabs .nav-tabs a").click(function() {
              var position = $(this).parent().position();
              var width = $(this).parent().width();
                $(".slider").css({"left":+ position.left,"width":width});
            });
            var actWidth = $(".edu_coll_slider_tabs .nav-tabs .active").width();
            var actPosition = $(".edu_coll_slider_tabs .nav-tabs .active").position();
            $(".slider").css({"left":+ actPosition.left,"width": actWidth});
        
        // collection Slider
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        loop: !0, 
        mode:'horizontal',
        grabCursor: true,
        centeredSlides: !0,
        parallax: !0,
        grabCursor: true,
        effect: 'coverflow',
        slidesPerView: 'auto',
        coverflowEffect: {
          rotate:  20, 
          stretch: 0,
          depth: 90,
          modifier: 1,
          slideShadows : !1,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: !0
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
  </script>
</body>
</html>
