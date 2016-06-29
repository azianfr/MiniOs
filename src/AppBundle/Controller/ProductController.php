<?php

namespace AppBundle\Controller;

use Framework\Controller;

class ProductController extends Controller
{
    public function indexAction()
    {
        $pdo = $this->getPdo();
        $products = $pdo->query('Select * from product')->fetchAll();
        $product_types = $pdo->query('Select * from product_type')->fetchAll();

        return $this->render('Product/index.php', [
            'products' => $products,
            'product_types' => $product_types,
        ]);
    }

    public function createAction()
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

            $this->redirect('product');
        }

        return $this->render('Product/create.php', [
            'product_types' => $product_types
        ]);
    }

    public function showAction()
    {
        $request = $this->getRequest();
        $id = $request->getGet('id');
        $pdo = $this->getPdo();
        $product_types = $pdo->query('Select * from product_type')->fetchAll();
        $sql = 'Select * from product where id = :id';
        $query = $pdo->prepare($sql);
        $query->bindParam('id', $id);
        $query->execute();
        $product = $query->fetch();

        return $this->render('Product/show.php', [
            'product_types' => $product_types,
            'product' => $product,
        ]);
    }

    public function editAction()
    {
        $request = $this->getRequest();
        $id = $request->getGet('id');
        $pdo = $this->getPdo();
        $product_types = $pdo->query('Select * from product_type')->fetchAll();
        $query = $pdo->prepare('Select * from product where id = :id');
        $query->bindParam('id', $id);
        $query->execute();
        $product = $query->fetch();

        if (isset($_POST['form'])) {
            $this->redirect('product-edit', array('id' => $id));
            $form = $request->getPost('form');
            $sql = 'Update product set wording = :wording,
                    price = :price,
                    description = :description,
                    stock = :stock
                    where id = :id';
            $query = $pdo->prepare($sql);
            $query->bindParam('wording', $form['wording']);
            $query->bindParam('price', $form['price']);
            $query->bindParam('description', $form['description']);
            $query->bindParam('stock', $form['stock']);
            $query->bindParam('id', $id);
            try {
                $query->execute();
            } catch (\Exception $e) {
                $_SESSION['flashbag']['error']['message'] = $e->getMessage();
            }
            $_SESSION['flashbag']['success']['message'] = 'Modifications apportées avec succès.';
        }

        return $this->render('Product/edit.php', [
            'product' => $product,
            'product_types' => $product_types
        ]);
    }

    public function deleteAction()
    {
        $request = $this->getRequest();
        $pdo = $this->getPdo();
        $id = $request->getGet('id');
        $sql = 'Delete from product where id = :id';
        $query = $pdo->prepare($sql);
        $query->bindParam('id', $id);
        try {
            $query->execute();
        } catch (\Exception $e) {
            $_SESSION['flashbag']['error']['message'] = $e->getMessage();
        }
        $_SESSION['flashbag']['success']['message'] = 'Produit supprimé avec succès.';
        $this->redirect('product');
    }
}
