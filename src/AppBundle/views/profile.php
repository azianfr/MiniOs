<?php include __DIR__.'/top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h1>Mon profil</h1><hr>
        <table class="table">
            <tbody>
            <tr>
                <td>Username</td>
                <td><?php echo $_SESSION['user']['username']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $_SESSION['user']['email']; ?></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><?php echo $_SESSION['user']['lastname']; ?></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><?php echo $_SESSION['user']['firstname']; ?></td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td><?php echo $_SESSION['user']['address']; ?></td>
            </tr>
            <tr>
                <td>Ville</td>
                <td><?php echo $_SESSION['user']['city']; ?></td>
            </tr>
            <tr>
                <td>Code postal</td>
                <td><?php echo $_SESSION['user']['zipcode']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__.'/bottom.php'; ?>
