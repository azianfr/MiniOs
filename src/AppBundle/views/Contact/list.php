<?php include __DIR__.'/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h1>Liste des contacts</h1>
        <table class="table">
            <thead>
                <tr>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Email</td>
                    <td><Description></Description></td>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($contacts as $c): ?>
                <tr>
                    <td><?php echo $c->lastname; ?></td>
                    <td><?php echo $c->firstname; ?></td>
                    <td><?php echo $c->email; ?></td>
                    <td><?php echo $c->description; ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__.'/../bottom.php'; ?>