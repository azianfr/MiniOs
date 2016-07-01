<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <fieldset>
            <legend><h1>Edition d'un produit</h1></legend>
            <?php if (isset($_SESSION['flashbag']['success']['message'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['flashbag']['success']['message']; ?></div>
                <?php unset($_SESSION['flashbag']['success']); ?>
            <?php endif ?>
            <?php if (isset($_SESSION['flashbag']['error']['message'])): ?>
                <div class="alert alert-danger"><?php echo $_SESSION['flashbag']['error']['message']; ?></div>
                <?php unset($_SESSION['flashbag']['error']); ?>
            <?php endif ?>
            <form method="post" action="<?php echo $path('product-edit') . '?id=' . $product['id']; ?>"
                  enctype="multipart/form-data">
                <?php include 'form.php'; ?>
            </form>
        </fieldset>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
<script>
    $(function () {
        $("form").on('submit', function () {
            $.post($(this).attr('action'), $(this).serializeArray(), function (request) {
                if (request.error) {
                    $('legend').append("<div class='alert alert-error'>" + request.msg + "</div>");
                } else {
                    $('legend').append("<div class='alert alert-success'>" + request.msg + "</div>");
                }
            });
            return false;
        });
    });
</script>
