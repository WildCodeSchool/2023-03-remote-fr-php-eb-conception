<?php

namespace App\Controller;

class GalleryMController extends AbstractController
{
    public function galleryM(): string
    {
        return $this->twig->render('Home/galleryM.html.twig');
    }
}
