<?php include __DIR__ . '/top.php'; ?>

    <div class="container">
        <div class="col-md-12">
            <fieldset>
                <legend><h1>Création d'un produit</h1></legend>
                <form method="post" action="<?php echo $path('product'); ?>">
                    <div class="form-group">
                        <select name="form[product_type_id]" id="product_type_id" class="form-control">
                            <?php foreach ($product_types as $pt): ?>
                                <option value="<?php echo $pt['id']; ?>"><?php echo $pt['wording']; ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="form[wording]" id="wording" class="form-control" placeholder="Libellé">
                    </div>
                    <div class="form-group">
                        <input type="number" name="form[price]" id="price" class="form-control" placeholder="Prix">
                    </div>
                    <div class="form-group">
                        <textarea name="form[description]" id="description" cols="30" rows="10" class="form-control"
                                  placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="form[stock]" id="stock" class="form-control" placeholder="Stock">
                    </div>
                    <input type="submit" value="Créer" class="btn btn-success">
                </form>
            </fieldset>
        </div>
    </div>

<?php include __DIR__ . '/bottom.php'; ?>