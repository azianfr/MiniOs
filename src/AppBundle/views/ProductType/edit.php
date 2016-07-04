<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <fieldset>
            <legend><h1>Edition d'un type de produit</h1></legend>
            <form method="post" action="<?php echo $path('product-type-edit') . '?id=' . $productType['id']; ?>">
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
                    $('legend').append("<div class='alert alert-danger'>" + request.message + "</div>");
                } else {
                    $('legend').append("<div class='alert alert-success'>" + request.message + "</div>");
                }
            });
            return false;
        });
    });
</script>
