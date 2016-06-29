<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h1>CRUD Type de produit</h1>
        <?php if (isset($_SESSION['flashbag']['success']['message'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['flashbag']['success']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['success']); ?>
        <?php endif ?>
        <?php if (isset($_SESSION['flashbag']['error']['message'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['flashbag']['error']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['error']); ?>
        <?php endif ?>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Libellé</th>
                <th>Description</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productTypes as $pt) : ?>
                <tr>
                    <td><?php echo $pt['id']; ?></td>
                    <td><?php echo $pt['wording']; ?></td>
                    <td><?php echo $pt['description']; ?></td>
                    <td><a href="<?php echo $path('product-type-show') . '?id=' . $pt['id']; ?>" class="btn btn-default">Show</a></td>
                    <td><a href="<?php echo $path('product-type-edit') . '?id=' . $pt['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="<?php echo $path('product-type-delete') . '?id=' . $pt['id']; ?>" class="btn btn-danger" onclick="return confirm('Souhaitez-vous vraiment supprimer ce produit ?');">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo $path('product-type-create'); ?>" class="btn btn-success">Créer</a>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
