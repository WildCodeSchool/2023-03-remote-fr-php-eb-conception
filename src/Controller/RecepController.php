<?php

namespace App\Controller;

class RecepController extends AbstractController
{
    public function recep(): string
    {
        return $this->twig->render('Home/recep.html.twig');
    }
}
