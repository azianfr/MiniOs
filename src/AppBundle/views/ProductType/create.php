<?php include __DIR__.'/../top.php'; ?>

    <div class="container">
        <div class="col-md-12">
            <fieldset>
                <legend><h1>Création d'un type de produit</h1></legend>
                <form method="post" action="<?php echo $path('product-type-create'); ?>">
                    <?php include 'form.php'; ?>
                </form>
            </fieldset>
        </div>
    </div>

<?php include __DIR__.'/../bottom.php'; ?>