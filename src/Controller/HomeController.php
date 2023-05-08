<?php

namespace App\Controller;

use App\Model\ContentManager;
use App\Model\TestimonyManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $contentManager = new ContentManager();
        $carpentry = $contentManager->selectOneById(1);
        $stairs = $contentManager->selectOneById(2);
        $exterior = $contentManager->selectOneById(3);
        $cabinetMaking = $contentManager->selectOneById(4);
        $layout = $contentManager->selectOneById(5);
        return $this->twig->render('Home/index.html.twig', [
            'carpentry' => $carpentry,
            'stairs' => $stairs,
            'exterior' => $exterior,
            'cabinetMaking' => $cabinetMaking,
            'layout' => $layout
        ]);
    }

    public function contact(): string
    {
        return $this->twig->render('Home/contact.html.twig');
    }

    public function indextestimony(): string
    {
        $testimonyManager = new testimonyManager();
        $Emilienne = $testimonyManager->selectOneById(1);
        $Maurice = $testimonyManager->selectOneById(2);
        $Raymonde = $testimonyManager->selectOneById(3);
        return $this->twig->render('Home/index.html.twig', [
            'Emilienne' => $Emilienne,
            'Maurice' => $Maurice,
            'Raymonde' => $Raymonde
        ]);
    }
}
