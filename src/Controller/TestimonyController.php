<?php

namespace App\Controller;

use App\Model\TestimonyManager;

class TestimonyController extends AbstractController
{
    public function TestionyController(int $id): string
    {
        $testimonyManager = new TestimonyManager();
        $testimony = $testimonyManager->selectOneById($id);

        return $this->twig->render('Home/testimony.html.twig', ['testimony' => $testimony]);
    }
}
