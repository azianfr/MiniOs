<?php include __DIR__.'/top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <fieldset>
            <legend><h1>Inscription</h1></legend>
        </fieldset>
        <?php if (isset($_SESSION['flashbag']['success']['message'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['flashbag']['success']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['success']); ?>
        <?php endif ?>
        <?php if (isset($_SESSION['flashbag']['error']['message'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['flashbag']['error']['message']; ?></div>
            <?php unset($_SESSION['flashbag']['error']); ?>
        <?php endif ?>
        <form method='post' action='<?php echo $path('register'); ?>'>
            <div class="form-group">
                <input type="text" name="form[username]" id="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="form[password]" id="password" class="form-control" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <input type="email" name="form[email]" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" name="form[firstname]" id="firstname" class="form-control" placeholder="Prénom">
            </div>
            <div class="form-group">
                <input type="text" name="form[lastname]" id="lastname" class="form-control" placeholder="Nom">
            </div>
            <div class="form-group">
                <input type="text" name="form[address]" id="address" class="form-control" placeholder="Adresse">
            </div>
            <div class="form-group">
                <input type="text" name="form[city]" id="city" class="form-control" placeholder="Ville">
            </div>
            <div class="form-group">
                <input type="text" name="form[zipcode]" id="zipcode" class="form-control" placeholder="Code postal">
            </div>
            <input type="submit" value="Créer" class="btn btn-success">
        </form>
    </div>
</div>

<?php include __DIR__.'/bottom.php'; ?>
