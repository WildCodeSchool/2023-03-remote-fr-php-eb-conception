<?php

namespace App\Controller;

use App\Model\TestimonyManager;

class TestimonyController extends AbstractController
{
    public function showTestimony()
    {
        $testimonyManager = new TestimonyManager();
        $testimonies = $testimonyManager->selectAll();

        return $this->twig->render('Admin/showTestimony.html.twig', ['testimonies' => $testimonies]);
    }

    public function deleteTestimony()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $testimonyManager = new TestimonyManager();
            $testimonyManager->delete($id);

            header('Location: /showTestimony');
        }
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
        $testimonyManager = new TestimonyManager();
        $testimonies = $testimonyManager->selectAll();

        return $this->twig->render('Home/testimony.html.twig', [
            'testimonies' => $testimonies,
            'errors' => $errors
        ]);
    }

    public function recep(): string
    {
        return $this->twig->render('Home/recep.html.twig');
    }
}
