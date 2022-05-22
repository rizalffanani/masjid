<!-- inner header wrapper start -->
	<style type="text/css">
		#submit-login {
			background: linear-gradient(to right, rgb(66 116 69) 0%, rgb(50 62 46) 100%);
		}
	</style>
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
	<!-- jp login wrapper start -->
	<div class="login_section">
		<!-- login_form_wrapper -->
		<div class="login_form_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<?php if ($t=="log") {?>
							<!-- login_wrapper -->
							<h1>SILAHKAN LOGIN</h1>
							<form action="<?php echo base_url(); ?>login/process" method="post" id="form-login" class="login_wrapper">
								<?=@$err?>
								<div class="formsix-pos">
									<div class="form-group i-email">
										<input type="email" name="username" value="<?=@$val->username?>" class="form-control" required id="email2" placeholder="Username*">
									</div>
								</div>
								<div class="formsix-e">
									<div class="form-group i-password">
										<input type="password" name="password" class="form-control" required id="password2" placeholder="Password *">
									</div>
								</div>
								<input type="hidden" name="web" value="true">
								<div class="login_btn_wrapper">	
									<a href="#" onclick="document.getElementById('form-login').submit();" id="submit-login" class="btn btn-primary login_btn"> Login </a>
								</div>
								<div class="login_message">
									<p>Belum Punya Akun ? <a href="<?= site_url()?>web/regis"> Daftar Akun Baru </a> 
									</p>
								</div>
							</form>
							<!-- /.login_wrapper-->
						<?php }else{?>
							<h1>Pendaftaran Akun Baru</h1>
							<form action="<?php echo base_url(); ?>login/daftar" method="post" id="form-regis" class="login_wrapper">
								<?=@$errs2?>
								<div class="formsix-e">
									<div class="form-group">
										<input type="text" name="first_name" value="<?=@$vals->first_name?>" class="form-control" required="" id="password2" placeholder="Nama Anda">
									</div>
								</div>
								<div class="formsix-pos">
									<div class="form-group">
										<input type="text" name="username" value="<?=@$vals->username?>" class="form-control" required="" id="email2" placeholder="Username*">
									</div>
								</div>
								<div class="formsix-e">
									<div class="form-group">
										<input type="email" name="email" value="<?=@$vals->email?>" class="form-control" required="" id="password2" placeholder="Email">
									</div>
								</div>
								<div class="formsix-pos">
									<div class="form-group">
										<input type="number" name="phone" value="<?=@$vals->phone?>" class="form-control" required="" id="email2" placeholder="Phone*">
									</div>
								</div>
								<div class="formsix-e">
									<div class="form-group">
										<input type="password" name="password" class="form-control" required="" id="password2" placeholder="Password *">
									</div>
								</div>
								<div class="formsix-e">
									<div class="form-group">
										<input type="password" name="passretype" class="form-control" required="" id="password2" placeholder="Ulangi password *">
									</div>
								</div>
								<input type="hidden" name="web" value="true">
								<div class="login_btn_wrapper">	<a href="#" onclick="document.getElementById('form-regis').submit();" id="submit-login"  class="btn btn-primary login_btn"> Daftar </a>
								</div>
								<div class="login_message">
									<p>Sudah Punya Akun ? <a href="<?= site_url()?>web/login"> Login </a> 
									</p>
								</div>
							</form>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<!-- /.login_form_wrapper-->
	</div>
	<!-- jp login wrapper end -->