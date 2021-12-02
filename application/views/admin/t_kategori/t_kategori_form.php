<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kate <?php echo form_error('nama_kate') ?></label>
            <input type="text" class="form-control" name="nama_kate" id="nama_kate" placeholder="Nama Kate" value="<?php echo $nama_kate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status" >
              <option value="1" <?php echo $retVal = ($status=="1") ? "Selected" : "" ; ?>>Aktif</option>
              <option value="0" <?php echo $retVal = ($status=="0") ? "Selected" : "" ; ?>>Tidak</option>
            </select>
        </div>
	    <input type="hidden" name="id_kate" value="<?php echo $id_kate; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_kategori') ?>" class="btn btn-default">Cancel</a>
	</form>