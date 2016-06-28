<?php

namespace AppBundle\Controller;

use Framework\Controller;

class ContactController extends Controller
{
    public function contactAction()
    {
        if (isset($_POST['form'])) {
            $lastname = $_POST['form']['lastname'];
            $firstname = $_POST['form']['firstname'];
            $email = $_POST['form']['email'];
            $description = $_POST['form']['description'];
            $photo = $_POST['form']['photo'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['flashbag']['error']['message'] = 'L\'adresse email est invalide.';
                return $this->render('contact.php');
            }

            if (!$this->storeDatas('/tmp/test.txt', $_POST['form'])) {
                $_SESSION['flashbag']['error']['message'] = 'L\'export vers le fichier à echoué.';
                return $this->render('contact.php');
            }

            if (isset($_FILES['form']['name']['photo'])) {
                $this->uploadFile($_FILES['form']);
            } else {
                $_SESSION['flashbag']['error']['message'] = 'Erreur dans l\'importation de la photo';
                return $this->render('contact.php');
            }

            mail($email, 'Email de test', 'Merci d\'avoir pris contact avec nous !');
            $_SESSION['flashbag']['success']['message'] = 'Merci d\'avoir pris contact, nous traitons votre demande au plus vite.';
        }
        return $this->render('contact.php');
    }

    public function storeDatas($path, $data)
    {
        if (!is_file($path)) {
            $content = json_encode($data);
        } else {
            $content = file_get_contents($path);
            $content .= json_encode($data);
        }
        file_put_contents($path, $content);

        return true;
    }

    public function uploadFile($file)
    {
        $path = __DIR__ . '/../../../web/photos/';
        if (!is_dir($path)) {
            mkdir($path);
        }
        move_uploaded_file($file['tmp_name']['photo'], $path . $file['name']['photo']);
    }

    public function listAction()
    {
        $datas = array();
        if ($content = file_get_contents('/tmp/test.txt')) {
            $datas = json_decode($content);
        }

        return $this->render('Contact/list.php');
    }

}