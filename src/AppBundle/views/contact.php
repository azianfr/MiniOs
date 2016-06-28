<?php include __DIR__ . '/top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h2>Formulaire de contact</h2>
        <?php if (isset($_SESSION['flashbag']['success']['message'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['flashbag']['success']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['success']); ?>
        <?php endif ?>
        <?php if (isset($_SESSION['flashbag']['error']['message'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['flashbag']['error']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['error']); ?>
        <?php endif ?>
        <form method="post" action="<?php echo $path("contact") ;?>" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="form[lastname]" id="lastname" class="form-control" placeholder="Nom">
            </div>
            <div class="form-group">
                <input type="text" name="form[firstname]" id="firstname" class="form-control" placeholder="Prénom">
            </div>
            <div class="form-group">
                <input type="email" name="form[email]" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <textarea name="form[description]" id="description" cols="50" rows="10" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="form[photo]" id="photo">
            </div>
            <input type="submit" class="btn btn-success" value="Valider">
        </form>
    </div>
</div>

<?php include __DIR__ . '/bottom.php'; ?>