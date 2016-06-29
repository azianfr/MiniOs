<?php

namespace AppBundle\Controller;

use Framework\Controller;

class ProductTypeController extends Controller
{
    public function indexAction()
    {
        $pdo = $this->getPdo();
        $product_types = $pdo->query('Select * from product_type')->fetchAll();

        return $this->render('ProductType/index.php', [
            'product_types' => $product_types
        ]);
    }

    public function createAction()
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

            header('location:/MiniOs/web/app.php/product-type');
        }
        return $this->render('ProductType/create.php');
    }
}
