<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="int">Jumlah Barang</label>
        <input type="number" class="form-control" id="jml" placeholder="Jumlah Barang" value="<?php echo $jml; ?>" />
    </div>
    <div class="form-group">
        <label for="datetime">Date <?php echo form_error('date') ?></label>
        <input type="datetime-local" class="form-control" name="date" id="date" placeholder="Date"
            value="<?php echo $date; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Type<?php echo form_error('type_order') ?></label>
        <select class="form-control" name="type_order" id="type_order">
            <option value="out" <?= ($type_order=="pengeluaran") ? "Selected" : "" ; ?>>Out
            </option>
            <option value="in" <?= ($type_order=="pemasukan") ? "Selected" : "" ; ?>>In
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Direction<?php echo form_error('direction') ?></label>
        <select class="form-control" name="direction" id="direction">
            <option value="shopee" <?= ($type_order=="shopee") ? "Selected" : "" ; ?>>Shopee
            </option>
            <option value="tiktok" <?= ($type_order=="tiktok") ? "Selected" : "" ; ?>>Tiktok
            </option>
            <option value="offline" <?= ($type_order=="offline") ? "Selected" : "" ; ?>>Offline
            </option>
            <option value="hadiah" <?= ($type_order=="hadiah") ? "Selected" : "" ; ?>>Hadiah
            </option>
        </select>
    </div>
    <?php for ($i=0; $i < $jml; $i++) { ?>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="int">Product <?php echo form_error('id_product') ?></label>
                <?php echo cmb_dinamis('id_product[]', 'products', 'name_product', 'id_product', $id_product) ?>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="int">Qty <?php echo form_error('qty') ?></label>
                <input type="number" class="form-control" name="qty[]" id="qty" placeholder="Qty" />
            </div>
        </div>
    </div>
    <?php }?>
    <div class="form-group">
        <label for="detail_order">Detail Order <?php echo form_error('detail_order') ?></label>
        <textarea class="form-control" rows="3" name="detail_order" id="detail_order"
            placeholder="Detail Order"><?php echo $detail_order; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $this->session->userdata("id"); ?>" />
    <input type="hidden" name="id_product_order" value="<?php echo $id_product_order; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('admin/product_orders') ?>" class="btn btn-default">Cancel</a>
</form>
<script>
$('#jml').on('change', function() {
    var selectedValue = $(this).val();
    window.location.href = '<?= base_url("admin/product_orders/create/")?>' + encodeURIComponent(selectedValue);
});
</script>