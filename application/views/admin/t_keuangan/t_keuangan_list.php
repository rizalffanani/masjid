<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php if($this->session->userdata('lvl')==1) { echo anchor(site_url('admin/t_keuangan/create'), 'Create', 'class="btn btn-primary"'); } ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
        		    <th>Tgl</th>
                    <th width="300px">Keterangan</th>
        		    <th>Debit</th>
                    <th>Kredit</th>
        		    <th>Saldo</th>
                    <?php if($this->session->userdata('lvl')==1) { ?>
        		    <th width="200px">Action</th>
                    <?php } ?>
                </tr>
            </thead>
	        <tbody>
                <?php $start = 0;$ttl=0;foreach ($users_data as $users){?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo tgl_indo($users->tgl) ?></td>
                        <td><?php echo ($users->deskprisi) ?></td>
                        <td><?php if ($users->jenis=='pemasukan') { $masuk=$users->total;$ttl=$ttl+$masuk; echo rupiah($masuk);} ?></td>
                        <td><?php if ($users->jenis=='pengeluaran') { $keluar=$users->total;$ttl=$ttl-$keluar; echo rupiah($keluar);} ?></td>
                        <td>Rp.<?= rupiah($ttl)?></td>
                         <?php if($this->session->userdata('lvl')==1) { ?>
                        <td>
                            <?php 
                            echo anchor(site_url('admin/t_keuangan/update/'.$users->id_keuangan),'Edit',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                            echo '  '; 
                            echo anchor(site_url('admin/t_keuangan/read/'.$users->id_keuangan),'Read',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                            echo '  '; 
                            echo anchor(site_url('admin/t_keuangan/update/'.$users->id_keuangan),'Hapus',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
                            ?>
                        </td>
                        <?php } ?>
                   </tr>
                <?php }?>

                <tr>
                    <td>_</td>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Rp.<?= rupiah($ttl)?></td>
                    <?php if($this->session->userdata('lvl')==1) { ?>
                        <td></td>
                    <?php }?>
                </tr>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>