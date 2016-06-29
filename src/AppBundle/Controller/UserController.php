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
            try {
                $query->execute();
            } catch (\Exception $e) {
                $_SESSION['flashbag']['error']['message'] = $e->getMessage();
                return $this->render('register.php');
            }
            $_SESSION['flashbag']['success']['message'] = 'Votre compte a été créé avec succès !';
        }

        return $this->render('register.php');
    }

    public function loginAction()
    {
        $request = $this->getRequest();
        if (isset($_POST['form'])) {
            $pdo = $this->getPdo();
            $form = $request->getPost('form');
            $password = md5($form['password']);

            $sql = 'Select * from user where username = :username and password = :password';
            $query = $pdo->prepare($sql);
            $query->bindParam('username', $form['username'], $pdo::PARAM_STR);
            $query->bindParam('password', $password, $pdo::PARAM_STR);
            $query->execute();
            $login = $query->fetch();
            if ($login) {
                session_start();
                $_SESSION['user'] = $login;
                $this->redirect('index');
            } else {
                $_SESSION['flashbag']['error']['message'] = 'Login ou mot de passe incorrect.';
            }
        }

        return $this->render('login.php');
    }

    public function logoutAction()
    {
        session_start();
        session_destroy();
        $this->redirect('index');
    }

    public function profileAction()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            return $this->render('profile.php');
        } else {
            $this->redirect('login');
        }
    }
}
