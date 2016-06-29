<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $path('index') ?>">Mon commerce</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $path('wiki') ?>">Wiki</a></li>
                <li><a href="<?php echo $path('articles') ?>">Articles</a></li>
                <li><a href="<?php echo $path('test') ?>">Test</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Gérer <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $path('product') ?>">Produit</a></li>
                        <li><a href="<?php echo $path('product-type') ?>">Type de produit</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Contact <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $path('contact') ?>">Formulaire</a></li>
                        <li><a href="<?php echo $path('contact_list') ?>">Liste</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <?php echo (isset($_SESSION['user'])) ? $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] : 'Utilisateur' ?><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Informations</li>
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <li><a href="<?php echo $path('login'); ?>">Se connecter</a></li>
                            <li><a href="<?php echo $path('register'); ?>">S'inscrire</a></li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <li><a href="<?php echo $path('profile'); ?>">Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Autre</li>
                            <li><a href="<?php echo $path('logout'); ?>">Deconnexion</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
