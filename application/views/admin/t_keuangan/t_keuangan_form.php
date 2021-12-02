<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskprisi">Deskprisi <?php echo form_error('deskprisi') ?></label>
            <textarea class="form-control" rows="3" name="deskprisi" id="deskprisi" placeholder="Deskprisi"><?php echo $deskprisi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="enum">Jenis <?php echo form_error('jenis') ?></label>
            <select class="form-control" name="jenis" id="jenis" >
              <option value="pengeluaran" <?php echo $retVal = ($jenis=="pengeluaran") ? "Selected" : "" ; ?>>Pengeluaran</option>
              <option value="pemasukan" <?php echo $retVal = ($jenis=="pemasukan") ? "Selected" : "" ; ?>>Pemasukan</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Total <?php echo form_error('total') ?></label>
            <input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
	    <input type="hidden" name="id_keuangan" value="<?php echo $id_keuangan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_keuangan') ?>" class="btn btn-default">Cancel</a>
	</form>