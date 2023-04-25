<?php

namespace App\Controller;

use App\Model\ItemManager;
use App\Model\TestimonyManager;

class TestimonyController extends AbstractController
{
    public function testionyController(int $id): string
    {
        $testimonyManager = new TestimonyManager();
        $testimony = $testimonyManager->selectOneById($id);

        return $this->twig->render('Home/testimony.html.twig', ['testiomy' => $testimony]);
    }
}
