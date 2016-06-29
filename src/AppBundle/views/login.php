<?php include __DIR__ . '/top.php'; ?>

<style>
    form {
        position: relative;
        top: 25vh;
    }
</style>

<div class="container">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3">
            <form method='post' action="<?php echo $path('login'); ?>">
                <?php if (isset($_SESSION['flashbag']['error']['message'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['flashbag']['error']['message']; ?></div>
                    <?php unset($_SESSION['flashbag']['error']); ?>
                <?php endif ?>
                <div class="form-group">
                    <input type="text" name="form[username]" id="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="form[password]" id="password" class="form-control"
                           placeholder="Password">
                </div>
                <input type="submit" value="Se connecter" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/bottom.php'; ?>
