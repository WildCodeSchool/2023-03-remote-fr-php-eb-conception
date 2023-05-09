<?php

namespace App\Controller;

use App\Model\TestimonyManager;

class TestimonyController extends AbstractController
{
    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $testimony = array_map('trim', $_POST);

            if (empty($testimony['first_name'])) {
                $errors[] = "Le champ prenom est obligatoire";
            }

            if (empty($testimony['last_name'])) {
                $errors[] = "Le champ nom est obligatoire";
            }

            if (empty($testimony['message'])) {
                $errors[] = "Le champ message est obligatoire";
            }
            var_dump($_POST);

            if (empty($errors)) {
                $testimonyManager = new TestimonyManager();
                $testimonyManager->insert($testimony);

                header('Location: /testimony/add');
                return null;
            }
        }
        return $this->twig->render('Home/testimony.html.twig', [
            'errors' => $errors
        ]);
    }

    public function recep(): string
    {
        return $this->twig->render('Home/recep.html.twig');
    }
}
