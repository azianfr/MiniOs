<?php

namespace AppBundle\Controller;

use Framework\Controller;

class UserController extends Controller
{
    public function registerAction()
    {
        if (isset($_POST['form'])) {
            $request = $this->getRequest();
            $form = $request->getPost('form');
            $username = $form['username'];
            $password = $form['password'];
            $email = $form['email'];
            $firstname = $form['firstname'];
            $lastname = $form['lastname'];
            $address = $form['address'];
            $city = $form['city'];
            $zipcode = $form['zipcode'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['flashbag']['error']['message'] = 'L\'adresse email est invalide.';
                return $this->render('register.php');
            }

            $pdo = $this->getPdo();
            $sql = 'INSERT INTO user (username, password, email, firstname, lastname, address, city, zipcode)
                    VALUES (:username, :password, :email, :firstname, :lastname, :address, :city, :zipcode)';
            $query = $pdo->prepare($sql);
            $query->bindParam('username', $username);
            $query->bindParam('password', md5($password));
            $query->bindParam('email', $email);
            $query->bindParam('firstname', $firstname);
            $query->bindParam('lastname', $lastname);
            $query->bindParam('address', $address);
            $query->bindParam('city', $city);
            $query->bindParam('zipcode', $zipcode);
            $query->execute();

            $_SESSION['flashbag']['success']['message'] = 'Votre compte a été créé avec succès !';
        }

        return $this->render('register.php');
    }
}
