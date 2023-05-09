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

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $testimony = array_map('trim', $_POST);

            if (empty($testimony['first_name'])) {
                $errors[] = "Le champ est obligatoire";
            }

            if (empty($testimony['last_name'])) {
                $errors[] = "Le champ est obligatoire";
            }

            if (empty($testimony['message'])) {
                $errors[] = "Le champ est obligatoire";
            }

            if (empty($errors)) {
                $testimonyManager = new TestimonyManager();
                $testimonyManager->insert($testimony);

                header('Location: /');
                return null;
            }
        }
        return $this->twig->render('home/testimony.html.twig');
    }

    public function showTestimony()
    {
        $testimonyManager = new testimonyManager();
        $testimony = $testimonyManager->selectAll();

        return $this->twig->render('Testimony/showTestimony.html.twig', ['testimony' => $testimony]);
    }

    public function editStatut(int $id): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $testimony = array_map('trim', $_POST);

            $TestimonyManager = new TestimonyManager();
            $TestimonyManager->updateStatut($testimony);

            header('Location: /showTestimony');
            return null;
        }

        $TestimonyManager = new TestimonyManager();
        $testimony = $TestimonyManager->selectOneById($id);
        return $this->twig->render('Testimony/showTestimony.html.twig', [
            'testimony' => $testimony,
        ]);
    }
}
