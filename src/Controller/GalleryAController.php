<?php

namespace App\Controller;

class GalleryAController extends AbstractController
{
    public function galleryA(): string
    {
        return $this->twig->render('Home/galleryA.html.twig');
    }
}
