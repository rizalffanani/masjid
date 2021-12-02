  <!-- hs Slider Start -->
  <div class="slider-area">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
         <?php $i=0;foreach ($slider as $key => $value) {?>
        <div class="carousel-item  <?php echo ($i==0) ? 'active' : '' ; ?>">
          <div class="carousel-captions caption-<?= $i?>" style="background: url(<?php  echo (base_url());?>gambar/slider/<?= $value->images?>) 50% 0 repeat-y;min-height:unset;">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="content" style="text-align:center;">
                    <h2 data-animation="animated zoomInDown"><span><?= $value->judul?></span></h2>
                    <p data-animation="animated bounceInUp"><?= $value->deskripsi?></p>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $i++;}?>


        <ol class="carousel-indicators">
          <?php $i=0;foreach ($slider as $key => $value) {?>
          <li data-target="#carousel-example-generic" data-slide-to="<?= $i?>" class="<?php echo ($i==0) ? 'active' : '' ; ?>">
            <span class="number"></span>
          </li>
          <?php $i++;}?>
        </ol>

        <div class="carousel-nevigation">
          <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i>
            <span>PR<br>EV</span>
          </a>
          <a class="next" href="#carousel-example-generic" role="button" data-slide="next"> <span>NE<br>XT</span>
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- hs Slider End -->

  <!--edu addmi wrapper Start-->
  <div class="edu_addmi_main_wrapper float_left">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="edu_heading_wrapper float_left">
            <h3>BERITA TERBARU</h3>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="index3_form_box jb_cover"></div>
        </div>
        <?php $a=0;foreach ($menu as $key => $value) { if($a<3){?>
        <div class="col-lg-<?php if($a==0){ echo'6'; }else{ echo'3'; }?> col-md-12 col-sm-12">
          <div class="<?php if($a==0){ echo'edu_addmi_main_box_wrapper'; }else{ echo'edu_addmi_center_main_box_wrapper'; }?>  float_left">
            <?php if($a==0){?>
            <h3>History</h3><br>
            <?php }?>
            <img src="<?php echo(base_url()) ?>gambar/<?php echo $value->cover_gambar; ?>" alt="img" style="width: 100%;">
            <?php if($a>0){?>
            <h4><a href="#"><?php echo $value->judul_b; ?></a></h4>
            <?php }?>
            <p><?php echo substr($value->artikel,0,191); ?></p>
          </div>
        </div>
        <?php $a++;} }?>
        <div class="col-md-12">
          <div class="edu_coll_slider_tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li>
                <div class="slider"></div>
              </li>
              <?php $i=1; foreach ($kategori as $key => $value) {?>
              <li role="presentation" class="<?php echo ($i==1) ? 'active' : '' ; ?>">
                <a href="#one-<?php echo$i;?>" role="tab" data-toggle="tab"><?php echo$value->nama_kate;?></a>
              </li>
              <?php $i++;}?>
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="tab-content">
            <?php $i=1; foreach ($kategori as $key => $val) {?>
            <div id="one-<?php echo$i;?>" class="tab-pane <?php echo ($i==1) ? 'active' : '' ; ?>" role="tabpanel">
              <div class="row">
                <?php $a=0;foreach ($menu as $key => $value) { if ($value->id_kate==$val->id_kate) {?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                  <div class="edu_slide_tab_box float_left">
                    <div class="edu_slide_tabs_img_box float_left">
                      <img src="<?php echo(base_url()) ?>gambar/<?php echo $value->cover_gambar; ?>" alt="img" style="height: 250px;">
                    </div>
                    <div class="edu_slide_tabs_img_cont_box float_left" style="padding:10px 10px;">
                      <h4><span><?php echo tgl_indo($value->date); ?></span></h4>
                      <h3><a href="#"><?php echo $value->judul_b; ?></a></h3>
                      <p><?php echo substr($value->artikel,0,120); ?>..</p>
                    </div>
                  </div>
                </div>
                <?php $a++;} }?>
              </div>
            </div>
            <?php $i++;}?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--edu addmi wrapper end-->