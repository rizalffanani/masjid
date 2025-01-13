<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="int">Product <?php echo form_error('id_product') ?></label>
        <?php echo cmb_dinamis('id_product', 'products', 'name_product', 'id_product', $id_product) ?>
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
        <label for="int">Qty <?php echo form_error('qty') ?></label>
        <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
    </div>
    <div class="form-group">
        <label for="datetime">Date <?php echo form_error('date') ?></label>
        <input type="datetime-local" class="form-control" name="date" id="date" placeholder="Date"
            value="<?php echo $date; ?>" />
    </div>
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