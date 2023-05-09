<?php

namespace App\Controller;

use App\Model\TestimonyManager;

class TestimonyController extends AbstractController
{
    public function testimony(): string
    {
        $testimonyManager = new TestimonyManager();
        $testimonies = $testimonyManager->selectAll();

        return $this->twig->render('Home/testimony.html.twig', ['testimonies' => $testimonies]);
    }

    public function recep(): string
    {
        return $this->twig->render('Home/recep.html.twig');
    }

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

            if (empty($errors)) {
                $testimonyManager = new TestimonyManager();
                $testimonyManager->insert($testimony);

                header('Location: /recep');
                return null;
            }
        }
        return $this->twig->render('Home/testimony.html.twig', [
            'errors' => $errors
        ]);
    }
}
