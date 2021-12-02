<!-- inner header wrapper start -->
	<div class="page_title_section float_left">
		<div class="page_header">
			<div class="container">
				<div class="row">
					<!-- section_heading start -->
					<div class="col-lg-12 col-md-12 col-12 col-sm-12">
						<h1><?php echo $judul; ?> </h1>
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
	<!-- edu course wrapper Start -->
	<div class="edu_inner_course_main_wrapper float_left">
		<div class="container">
			<div class="row">
				<?php $start = 0;foreach ($row as $value){?>
					<a href="<?php echo site_url('web/detail/'.$value->id_buletin) ?>">
						<div  class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
							<div class="edu_slide_tab_box float_left">
								<div class="edu_slide_tabs_img_box float_left">
									<img src="<?php echo(base_url()) ?>gambar/<?php echo $value->cover_gambar; ?>" alt="img" style="height: 300px;">
								</div>
								<div class="edu_slide_tabs_img_cont_box float_left">
									<h4><span><?php echo tgl_indo($value->date); ?></span></h4>
									<h3><a href="<?php echo site_url('web/detail/'.$value->id_buletin) ?>"><?php echo $value->judul_b; ?></a></h3>
									<p><?php echo substr($value->artikel,0,101); ?></p>
								</div>
							</div>
						</div>
					</a>
				<?php }?>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		            <?php echo $pagination; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- edu course wrapper end -->