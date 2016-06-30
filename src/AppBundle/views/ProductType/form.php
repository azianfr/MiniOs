<div class="form-group">
    <input type="text" name="form[wording]" id="wording" class="form-control" placeholder="Libellé"
           value="<?php if (isset($productType['wording'])) {
    echo $productType['wording'];
} ?>">
</div>
<div class="form-group">
    <textarea name="form[description]" id="description" cols="30" rows="10" class="form-control"
              placeholder="Description"><?php if (isset($productType['description'])) {
    echo $productType['description'];
} ?></textarea>
</div>
<input type="submit" value="Créer" class="btn btn-success">