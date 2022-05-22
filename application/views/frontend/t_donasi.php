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
                                <button type="button" id="donasi-add" class="award_btns colortheme text-light my-3" data-toggle="modal" data-target="#exampleModal"data-backdrop="static" data-keyboard="false">
                                    Donasi
                                </button>
                                <table class="table table-bordered " id="mytable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="80px">No</th>
                                            <th>Donatur</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Uang</th>
                                            <th>Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $start = 0;foreach ($row as $users){?>
                                            <tr>
                                                <td><?php echo ++$start ?></td>
                                                <td><?php echo $users->donatur ?></td>
                                                <td><?php echo $users->telepon ?></td>
                                                <td><?php echo $users->alamat ?></td>
                                                <td><?php echo rupiah($users->uang) ?></td>
                                                <td><?php echo $users->barang ?></td>
                                                <td style="text-align:center" width="200px">
                                                <?php 
                                                if ($this->session->userdata("id")==$users->id_user) {
                                                    // echo anchor(site_url('admin/t_donasi/update/'.$users->id_donasi),'Update'); 
                                                    // echo ' | '; 
                                                    echo anchor(site_url('admin/t_donasi/preview/'.$users->id_donasi),'Preview'); 
                                                    echo ' | '; 
                                                    echo anchor(site_url('admin/t_donasi/cetak/'.$users->id_donasi),'Cetak'); 
                                                    echo ' | '; 
                                                    echo anchor(site_url('admin/t_donasi/delete/'.$users->id_donasi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                                }
                                                ?>
                                                </td>
                                           </tr>
                                        <?php }?>
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

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan Masukkan Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo $action; ?>" method="post">
                    <div class="modal-body">            
                        <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $this->session->userdata("id"); ?>" />
                        <div class="form-group">
                            <label for="varchar">Donatur <?php echo form_error('donatur') ?></label>
                            <input type="text" class="form-control" name="donatur" id="donatur" placeholder="Donatur" value="<?php echo $donatur; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
                            <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat" required><?php echo $alamat; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Uang <?php echo form_error('uang') ?></label>
                            <input type="number" class="form-control" name="uang" id="uang" placeholder="Uang" value="<?php echo $uang; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Barang <?php echo form_error('barang') ?></label>
                            <input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="ket">Ket <?php echo form_error('ket') ?></label>
                            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
                        </div>
                        <input type="hidden" name="id_donasi" value="<?php echo $id_donasi; ?>" /> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="award_btns close" data-dismiss="modal">Close</button>
                        <button type="submit" class="award_btns colortheme text-light" >Save changes</button>
                    </div>        
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#donasi-add").click(function(e) {
            e.preventDefault();
            $('.svgclippaths').css({
                'overflow': 'hidden',
                'max-height': '100%'
            });
        });
        $(".close").click(function(e) {
            e.preventDefault();
            $('.svgclippaths').css({
                'overflow': 'auto',
                'max-height': 'unset'
            });
        });
    </script>