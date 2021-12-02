<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/t_donasi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/t_donasi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/t_donasi'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>User</th>
        		<th>Donatur</th>
        		<th>Uang</th>
        		<th>Barang</th>
        		<th>Action</th>
            </tr>
            <?php foreach ($t_donasi_data as $t_donasi) {?>
                <tr>
        			<td width="80px"><?php echo ++$start ?></td>
        			<td><?php echo $t_donasi->username ?></td>
        			<td><?php echo $t_donasi->donatur ?></td>
        			<td>Rp.<?php echo rupiah($t_donasi->uang);?></td>
        			<td><?php echo $t_donasi->barang ?></td>
        			<td style="text-align:center" width="200px">
    				<?php 
                    if ($this->session->userdata("id")==$t_donasi->id_user) {
                        echo anchor(site_url('admin/t_donasi/update/'.$t_donasi->id_donasi),'Update'); 
                        echo ' | '; 
                        echo anchor(site_url('admin/t_donasi/cetak/'.$t_donasi->id_donasi),'Cetak'); 
        				echo ' | '; 
        				echo anchor(site_url('admin/t_donasi/delete/'.$t_donasi->id_donasi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    }
    				?>
                    </td>
                </tr>
            <?php }?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>