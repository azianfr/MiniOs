<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h1>Type de produit</h1>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Libellé</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($product_types as $pt) : ?>
                <tr>
                    <td><?php echo $pt['id']; ?></td>
                    <td><?php echo $pt['wording']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo $path('product-type-create'); ?>" class="btn btn-success">Créer</a>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
