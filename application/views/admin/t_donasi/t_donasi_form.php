<form action="<?php echo $action; ?>" method="post">
        <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $this->session->userdata("id"); ?>" />
	    <div class="form-group">
            <label for="varchar">Donatur <?php echo form_error('donatur') ?></label>
            <input type="text" class="form-control" name="donatur" id="donatur" placeholder="Donatur" value="<?php echo $donatur; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Uang <?php echo form_error('uang') ?></label>
            <input type="text" class="form-control" name="uang" id="uang" placeholder="Uang" value="<?php echo $uang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Barang <?php echo form_error('barang') ?></label>
            <input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket">Ket <?php echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
        </div>
	    <input type="hidden" name="id_donasi" value="<?php echo $id_donasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_donasi') ?>" class="btn btn-default">Cancel</a>
	</form>