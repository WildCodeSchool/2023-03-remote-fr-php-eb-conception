<?php

namespace App\Controller;

class GalleryController extends AbstractController
{
    public function galleryA(): string
    {
        return $this->twig->render('Home/galleryA.html.twig');
    }

    public function galleryEbe(): string
    {
        return $this->twig->render('Home/galleryEbe.html.twig');
    }
    public function galleryEsc(): string
    {
        return $this->twig->render('Home/galleryEsc.html.twig');
    }
    public function galleryM(): string
    {
        return $this->twig->render('Home/galleryM.html.twig');
    }
    public function galleryE(): string
    {
        return $this->twig->render('Home/galleryE.html.twig');
    }
}
