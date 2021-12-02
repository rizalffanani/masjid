<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Waktu Sholat <?php echo form_error('waktu_sholat') ?></label>
            <select class="form-control" name="waktu_sholat" id="waktu_sholat" >
              <option value="subuh" <?php echo $retVal = ($waktu_sholat=="subuh") ? "Selected" : "" ; ?>>subuh</option>
              <option value="dhuhur" <?php echo $retVal = ($waktu_sholat=="dhuhur") ? "Selected" : "" ; ?>>dhuhur</option>
              <option value="ashar" <?php echo $retVal = ($waktu_sholat=="ashar") ? "Selected" : "" ; ?>>ashar</option>
              <option value="magrib" <?php echo $retVal = ($waktu_sholat=="magrib") ? "Selected" : "" ; ?>>magrib</option>
              <option value="isya" <?php echo $retVal = ($waktu_sholat=="isya") ? "Selected" : "" ; ?>>isya</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Hari <?php echo form_error('hari') ?></label>
            <select class="form-control" name="hari" id="hari" >
              <option value="senin" <?php echo $retVal = ($hari=="senin") ? "Selected" : "" ; ?>>senin</option>
              <option value="selasa" <?php echo $retVal = ($hari=="selasa") ? "Selected" : "" ; ?>>selasa</option>
              <option value="rabu" <?php echo $retVal = ($hari=="rabu") ? "Selected" : "" ; ?>>rabu</option>
              <option value="kamis" <?php echo $retVal = ($hari=="kamis") ? "Selected" : "" ; ?>>kamis</option>
              <option value="jumat" <?php echo $retVal = ($hari=="jumat") ? "Selected" : "" ; ?>>jumat</option>
              <option value="sabtu" <?php echo $retVal = ($hari=="sabtu") ? "Selected" : "" ; ?>>sabtu</option>
              <option value="minggu" <?php echo $retVal = ($hari=="minggu") ? "Selected" : "" ; ?>>minggu</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Imam <?php echo form_error('imam') ?></label>
            <input type="text" class="form-control" name="imam" id="imam" placeholder="Imam" value="<?php echo $imam; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Muadzin <?php echo form_error('muadzin') ?></label>
            <input type="text" class="form-control" name="muadzin" id="muadzin" placeholder="Muadzin" value="<?php echo $muadzin; ?>" />
        </div>
	    <input type="hidden" name="id_sholat" value="<?php echo $id_sholat; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_sholat') ?>" class="btn btn-default">Cancel</a>
	</form>