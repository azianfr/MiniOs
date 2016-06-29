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
            <tr>
                <td><?php echo $productType['id']; ?></td>
                <td><?php echo $productType['wording']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
