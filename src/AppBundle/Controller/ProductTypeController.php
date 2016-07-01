<?php

namespace AppBundle\Controller;

use Framework\Controller;
use Framework\JsonResponse;
use Framework\Response;

class ProductTypeController extends Controller
{
    public function indexAction()
    {
        $pdo = $this->getPdo();
        $productTypes = $pdo->query('Select * from product_type')->fetchAll();

        return $this->render('ProductType/index.php', [
            'productTypes' => $productTypes,
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

            $_SESSION['flashbag']['success']['message'] = 'Success.';
            $this->redirectToRoute('product-type');
        }

        return $this->render('ProductType/create.php');
    }

    public function showAction()
    {
        $pdo = $this->getPdo();
        $request = $this->getRequest();
        $query = $pdo->prepare('Select * from product_type where id = :id');
        $query->bindParam('id', $request->getGet('id'));
        $query->execute();
        $productType = $query->fetch();

        return $this->render('ProductType/show.php', [
            'productType' => $productType,
        ]);
    }

    public function editAction()
    {
        $pdo = $this->getPdo();
        $request = $this->getRequest();
        $id = $request->get('id');
        $query = $pdo->prepare('Select * from product_type where id = :id');
        $query->bindParam('id', $id);
        $query->execute();
        $productType = $query->fetch();

        if (isset($_POST['form'])) {
            $form = $request->getPost('form');
            $id = $request->get('id');
            $sql = 'Update product_type set
                    wording = :wording,
                    description = :description
                    where id = :id';
            $query = $pdo->prepare($sql);
            $query->bindParam('wording', $form['wording']);
            $query->bindParam('description', $form['description']);
            $query->bindParam('id', $id);
            try {
                $query->execute();
            } catch (\Exception $e) {
                return new JsonResponse(500, json_encode(array('error' => true, 'message' => $e->getMessage())));
            }

            return new JsonResponse(200, json_encode(array('error' => false, 'message' => 'Modifications apportées avec succès.')));
        }

        return $this->render('ProductType/edit.php', [
            'productType' => $productType,
        ]);
    }

    public function deleteAction()
    {
        $request = $this->getRequest();
        $pdo = $this->getPdo();
        $id = $request->getGet('id');
        $sql = 'Delete from product_type where id = :id';
        $query = $pdo->prepare($sql);
        $query->bindParam('id', $id);
        try {
            $query->execute();
        } catch (\Exception $e) {
            $_SESSION['flashbag']['error']['message'] = $e->getMessage();
        }
        $_SESSION['flashbag']['success']['message'] = 'Type de produit supprimé avec succès.';
        $this->redirectToRoute('product-type');
    }
}
