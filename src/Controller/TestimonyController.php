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
}
