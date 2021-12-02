    <!-- inner header wrapper start -->
    <div class="page_title_section float_left">
        <div class="page_header">
            <div class="container">
                <div class="row">
                    <!-- section_heading start -->
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <h1><?php echo $judul; ?></h1>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="#"> Home </a> &nbsp;&nbsp;&nbsp; &gt; &nbsp;&nbsp;</li>
                                <li><?php echo $judul; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->
    <!--blog wrapper start-->
    <div class="blog_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-post-wrapper iner_blog">
                        
                        <!-- /.post-thumbnail -->
                        <div class="blog-content">
                            <header class="entry-header" style="height:unset !important;">
                                <!-- /.entry-meta -->
                                <h4 class="entry-title"><a href="#"><?php echo $judul; ?></a></h4>
                            </header>
                            <!-- /.entry-header -->
                            <div class="entry-content">
                                <table class="table table-bordered " id="mytable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Tgl</th>
                                            <th width="140px">Keterangan</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $ttl = 0;foreach ($row as $users){?>
                                            <tr>
                                                <td><?php echo tgl_indo($users->tgl) ?></td>
                                                <td><?php echo ($users->deskprisi) ?></td>
                                                <td><?php if ($users->jenis=='pemasukan') { $masuk=$users->total;$ttl=$ttl+$masuk; echo rupiah($masuk);} ?></td>
                                                <td><?php if ($users->jenis=='pengeluaran') { $keluar=$users->total;$ttl=$ttl-$keluar; echo rupiah($keluar);} ?></td>
                                                <td>Rp.<?= rupiah($ttl)?></td>
                                           </tr>
                                        <?php }?>
                                        <tr>
                                            <td colspan="4">Total</td>
                                            <td>Rp.<?= rupiah($ttl)?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.blog-content -->
                    </div>
                    <div class="comments_wrapper float_left">
                        <div class="widget_heading">
                            <h2>Berita Terkait</h2>
                        </div>
                        <div class="row">
                            <?php foreach ($menu as $key => $value) { ?>
                                <a href="<?php echo site_url('web/detail/'.$value->id_buletin) ?>">
                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="edu_slide_tab_box float_left">
                                            <div class="edu_slide_tabs_img_box edu_slide_tabs_img_box_event float_left">
                                                <img src="<?php echo(base_url()) ?>gambar/<?php echo $value->cover_gambar; ?>" alt="img" style="height: 100%;">
                                            </div>
                                            <div class="edu_slide_tabs_img_cont_box edu_slide_tabs_img_cont_box_event float_left">
                                                <h4><span><?php echo tgl_indo($value->date); ?></span></h4>
                                                <h3><a href="<?php echo site_url('web/detail/'.$value->id_buletin) ?>"><?php echo $value->judul_b; ?></a></h3>
                                                <p><?php echo substr($value->artikel,0,120); ?>..</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            <?php }?>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 right_sidebar blog_single_sidebar">
                    <div class="sidebar_widget float_left">
                        <div class="widget_heading">
                            <h2>Berita Terbaru</h2>
                        </div>
                        <?php foreach ($menu as $key => $value) { ?>
                        <div class="blog_wrapper22 float_left">
                            <div class="blog_image">
                                <img src="<?php echo(base_url()) ?>gambar/<?php echo $value->cover_gambar; ?>" class="img-responsive" style="height: 65px !important;width: 65px !important;" alt="blog_img1" />
                            </div>
                            <div class="blog_text">
                                <h5><a href="<?php echo site_url('web/detail/'.$value->id_buletin) ?>"><?php echo $value->judul_b; ?></a></h5>
                                <div class="blog_date"><?php echo tgl_indo($value->date); ?></div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="sidebar_widget float_left">
                        <div class="widget_heading">
                            <h2>Ketegori Buletin</h2>
                        </div>
                        <div class="sidebar_tag_cloud">
                            <ul>
                                <?php $i=1; foreach ($kategori as $key => $val) {?>
                                <li><a href="<?php echo site_url('web/kategori/'.$val->id_kate) ?>"><?php echo$val->nama_kate;?> </a>
                                </li>
                                <?php $i++;}?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>