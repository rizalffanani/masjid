<style>
#customers {
  text-transform: capitalize;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin: auto;
}

#customers td, #customers th {
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

</style>

<table id="customers">
		<tr>
			<td colspan="4" style="text-align:center;"></td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:center;">
				<h1>Kwitansi</h1>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:right;">No&nbsp;<?php echo $row->id_donasi; ?></td>
		</tr>
	    <tr>
	    	<td colspan="2" style="width:30%;">Sudah terima dari</td>
	    	<td colspan="2" >:&nbsp;<?php echo $row->donatur; ?> - <?php echo $row->alamat; ?></td>
	    </tr>
	    <!-- <tr>
	    	<td colspan="2" >Alamat :&nbsp;<?php echo $row->alamat; ?></td>
	    	<td colspan="2" >Telepon :&nbsp;<?php echo $row->telepon; ?></td>
	    </tr> -->
	    <tr>
	    	<td colspan="2" >Berupa</td>
	    	<td colspan="2" >:&nbsp;<?php echo $row->uang.' '.$row->barang; ?></td>
	    </tr>
	    <tr>
	    	<td colspan="2" >Untuk Keperluan</td>
	    	<td colspan="2" >:&nbsp;<?php echo $row->ket; ?></td>
	    </tr>
	    <tr>
	    	<td colspan="2" ></td>
	    	<td style="width:35%;"></td>
	    	<td style="height:120px;text-align:center;">
	    		<?php echo tgl_indo(date('Y-m-d')); ?>
	    		<br><br><br><br>
	    		<?php echo $row->donatur; ?> 
	    	</td>
	    </tr>
		<tr>
			<td colspan="4" style="text-align:center;"></td>
		</tr>
	</table>