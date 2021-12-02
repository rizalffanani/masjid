<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Judul Buletin <?php echo form_error('judul_b') ?></label>
            <input type="text" class="form-control" name="judul_b" id="judul_b" placeholder="Judul B" value="<?php echo $judul_b; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Kategori <?php echo form_error('id_kate') ?></label>
            <?php echo cmb_dinamis('id_kate', 't_kategori', 'nama_kate', 'id_kate', $id_kate) ?>
        </div>
	    <div class="form-group">
            <label for="artikel">Artikel <?php echo form_error('artikel') ?></label>
            <textarea class="form-control" rows="3" name="artikel" id="artikel" placeholder="Artikel"><?php echo $artikel; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Cover Gambar <?php echo form_error('cover_gambar') ?></label>
            <input type="file" name="cover_gambar" id="cover_gambar" accept="image/x-png,image/jpeg">
        </div>
        <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $this->session->userdata("id"); ?>" />
        <input type="hidden" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo date('Y-m-d'); ?>" />
        <input type="hidden" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo date('H:i:s'); ?>" />
	    <input type="hidden" name="id_buletin" value="<?php echo $id_buletin; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_buletin') ?>" class="btn btn-default">Cancel</a>
</form>