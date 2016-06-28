<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Mon site</h1>

            <p>Mon texte</p>

            <p>
                <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Bouton !!
                    &raquo;</a>
            </p>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <td>Libellé</td>
                <td>Description</td>
                <td>Prix</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td><?php echo $p['wording']; ?></td>
                    <td><?php echo $p['description']; ?></td>
                    <td><?php echo $p['price']; ?> €</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
