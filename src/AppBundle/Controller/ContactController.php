<?php

namespace AppBundle\Controller;

use Framework\Controller;

class ContactController extends Controller
{
    public function contactAction()
    {
        $request = $this->getRequest();
        if (isset($_POST['form'])) {
            $formValues = $request->getPost('form');
            $lastname = $formValues['lastname'];
            $firstname = $formValues['firstname'];
            $email = $formValues['email'];
            $description = $formValues['description'];
            $photo = $formValues['photo'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['flashbag']['error']['message'] = 'L\'adresse email est invalide.';
                return $this->render('contact.php');
            }

            if (!$this->storeDatas($_POST['form'])) {
                $_SESSION['flashbag']['error']['message'] = 'L\'export vers le fichier à echoué.';
                return $this->render('contact.php');
            }

            if (isset($_FILES['form']['name']['photo'])) {
                $this->uploadFile($_FILES['form']);
            } else {
                $_SESSION['flashbag']['error']['message'] = 'Erreur dans l\'importation de la photo';
                return $this->render('contact.php');
            }

            try {
                mail($email, 'Email de test', 'Merci d\'avoir pris contact avec nous !');
            } catch (\Exception $e) {
                $_SESSION['flashbag']['error']['message'] = 'Erreur lors de l\'envoie de mail';
            }
            $_SESSION['flashbag']['success']['message'] = 'Merci d\'avoir pris contact, nous traitons votre demande au plus vite.';
        }
        return $this->render('contact.php');
    }

    public function storeDatas($data)
    {
        $root = __DIR__ . '/../../../web/contact/';
        if (!is_dir($root)) {
            mkdir($root);
        }
        file_put_contents($root . rand(rand(1000, 100000), rand(100000,1000000)) . '.json', json_encode($data));

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
        $root = __DIR__ . '/../../../web/contact/';
        $scan = scandir($root);
        $datas = array();
        foreach ($scan as $file) {
            if (is_file($root . $file)) {
                $datas[] = json_decode(file_get_contents($root . $file));
            }
        }

        return $this->render('Contact/list.php', [
            'contacts' => $datas,
        ]);
    }

}