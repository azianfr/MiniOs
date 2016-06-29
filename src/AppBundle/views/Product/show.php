<?php include __DIR__ . '/../top.php'; ?>

    <div class="container">
        <div class="col-md-12">
            <h1>Produit</h1>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Type de produit</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $product['wording']; ?></td>
                    <td><?php echo $product_types[$product['product_type_id'] - 1]['wording']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php include __DIR__ . '/../bottom.php'; ?>