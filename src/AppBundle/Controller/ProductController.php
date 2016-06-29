<?php

namespace AppBundle\Controller;

use Framework\Controller;

class ProductController extends Controller
{
    public function productAction()
    {
        $pdo = $this->getPdo();
        $product_types = $pdo->query('Select * from product_type')->fetchAll();
        $request = $this->getRequest();
        if (isset($_POST['form'])) {
            $request = $this->getRequest();
            $formValues = $request->getPost('form');

            if ($_FILES['form']) {
                move_uploaded_file($_FILES['form']['tmp_name']['photo'], __DIR__ . '/../../../web/img/' . $_FILES['form']['name']['photo']);
            }

            $sql = 'INSERT INTO product (product_type_id, wording, price, description, stock, photo)
                    VALUES (:product_type_id, :wording, :price, :description, :stock, :photo)';
            $query = $pdo->prepare($sql);
            $query->bindParam('product_type_id', $formValues['product_type_id']);
            $query->bindParam('wording', $formValues['wording']);
            $query->bindParam('price', $formValues['price']);
            $query->bindParam('description', $formValues['description']);
            $query->bindParam('stock', $formValues['stock']);
            $query->bindParam('photo', $_FILES['form']['name']['photo']);

            $query->execute();

            return $this->render('product.php');
        }

        return $this->render('product.php', [
            'product_types' => $product_types
        ]);
    }

    public function productTypeAction()
    {
        $pdo = $this->getPdo();
        $request = $this->getRequest();
        if (isset($_POST['form'])) {
            $request = $this->getRequest();
            $formValues = $request->getPost('form');

            $sql = 'INSERT INTO product_type (wording, description)
                    VALUES (:wording, :description)';
            $query = $pdo->prepare($sql);
            $query->bindParam(':wording', $formValues['wording']);
            $query->bindParam(':description', $formValues['description']);
            $query->execute();
        }

        return $this->render('productType.php');
    }
}
