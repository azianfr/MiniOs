<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h1>CRUD Product</h1>
        <?php if (isset($_SESSION['flashbag']['success']['message'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['flashbag']['success']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['success']); ?>
        <?php endif ?>
        <?php if (isset($_SESSION['flashbag']['error']['message'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['flashbag']['error']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['error']); ?>
        <?php endif ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Type de produit</th>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $p) : ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?php echo $product_types[$p['product_type_id'] - 1]['wording']; ?></td>
                        <td><?php echo $p['wording']; ?></td>
                        <td><?php echo $p['description']; ?></td>
                        <td><?php echo $p['price']; ?> €</td>
                        <td><?php echo $p['stock']; ?></td>
                        <td><a href="<?php echo $path('product-show') . '?id=' . $p['id']; ?>" class="btn btn-default">Show</a></td>
                        <td><a href="<?php echo $path('product-edit') . '?id=' . $p['id']; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="<?php echo $path('product-delete') . '?id=' . $p['id']; ?>" class="btn btn-danger" onclick="return confirm('Souhaitez-vous vraiment supprimer ce produit ?');">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo $path('product-create'); ?>" class="btn btn-success">Créer</a>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
