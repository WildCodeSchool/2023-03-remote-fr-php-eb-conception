<?php

namespace App\Controller;

class GalleryEscController extends AbstractController
{
    public function galleryEsc(): string
    {
        return $this->twig->render('Home/galleryEsc.html.twig');
    }
}
