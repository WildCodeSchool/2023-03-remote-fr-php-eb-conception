<?php

namespace App\Controller;

class GalleryEbeController extends AbstractController
{
    public function galleryEbe(): string
    {
        return $this->twig->render('Home/galleryEbe.html.twig');
    }
}
