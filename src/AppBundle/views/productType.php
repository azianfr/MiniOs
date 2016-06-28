<?php include __DIR__ . '/top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <fieldset>
            <legend><h1>Création d'un type de produit</h1></legend>
            <form method="post" action="<?php echo $path('product-type'); ?>">
                <div class="form-group">
                    <input type="text" name="form[wording]" id="wording" class="form-control" placeholder="Libellé">
                </div>
                <div class="form-group">
                    <textarea name="form[description]" id="description" cols="30" rows="10" class="form-control" placeholder="Description"></textarea>
                </div>
                <input type="submit" value="Créer" class="btn btn-success">
            </form>
        </fieldset>
    </div>
</div>

<?php include __DIR__ . '/bottom.php'; ?>