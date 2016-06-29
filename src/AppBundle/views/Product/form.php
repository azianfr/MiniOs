<div class="form-group">
    <select name="form[product_type_id]" id="product_type_id" class="form-control">
        <?php foreach ($productTypes as $pt): ?>
            <option
                value="<?php echo $pt['id']; ?>" <?php if ($pt['id'] == $product['product_type_id']) echo 'selected'; ?>><?php echo $pt['wording']; ?></option>
        <? endforeach; ?>
    </select>
</div>
<div class="form-group">
    <input type="text" name="form[wording]" id="wording" class="form-control" placeholder="Libellé"
           value="<?php if (isset($product['wording'])) echo $product['wording']; ?>">
</div>
<div class="form-group">
    <input type="number" name="form[price]" id="price" class="form-control" placeholder="Prix"
           value="<?php if (isset($product['price'])) echo $product['price']; ?>">
</div>
<div class="form-group">
    <textarea name="form[description]" id="description" cols="30" rows="10" class="form-control"
              placeholder="Description"><?php if (isset($product['description'])) echo $product['description']; ?></textarea>
</div>
<div class="form-group">
    <input type="number" name="form[stock]" id="stock" class="form-control" placeholder="Stock"
           value="<?php if (isset($product['stock'])) echo $product['stock']; ?>">
</div>
<div class="form-group">
    <input type="file" name="form[photo]" id="photo">
</div>
<input type="submit" value="Créer" class="btn btn-success">