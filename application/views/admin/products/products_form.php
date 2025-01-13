<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Sku <?php echo form_error('sku') ?></label>
        <input type="text" class="form-control" name="sku" id="sku" placeholder="Sku" value="<?php echo $sku; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Name Product <?php echo form_error('name_product') ?></label>
        <input type="text" class="form-control" name="name_product" id="name_product" placeholder="Name Product"
            value="<?php echo $name_product; ?>" />
    </div>
    <div class="form-group">
        <label for="detail_product">Detail Product <?php echo form_error('detail_product') ?></label>
        <textarea class="form-control" rows="3" name="detail_product" id="detail_product"
            placeholder="Detail Product"><?php echo $detail_product; ?></textarea>
    </div>
    <div class="form-group">
        <label for="int">Stock <?php echo form_error('stock') ?></label>
        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock"
            value="<?php echo $stock; ?>" />
    </div>
    <input type="hidden" name="id_shop" value="1" />
    <input type="hidden" name="id_product" value="<?php echo $id_product; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('admin/products') ?>" class="btn btn-default">Cancel</a>
</form>