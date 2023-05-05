<?php

namespace App\Controller;

class GalleryEController extends AbstractController
{
    public function galleryE(): string
    {
        return $this->twig->render('Home/galleryE.html.twig');
    }
}
