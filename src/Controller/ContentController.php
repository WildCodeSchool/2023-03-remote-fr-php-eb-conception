<?php

namespace App\Controller;

use App\Model\ContentManager;

class ContentController extends AbstractController
{
    /**
     * Add a new item
     */
    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $content = array_map('trim', $_POST);

            // TODO validations (length, format...)
            if (empty($content['bold_text'])) {
                $errors[] = "Le champ Bold text est obligatoire";
            }

            if (empty($content['coloured_text'])) {
                $errors[] = "Le champ Colored text est obligatoire";
            }

            if (empty($errors)) {
                $contentManager = new ContentManager();
                $contentManager->insert($content);
                // if validation is ok, insert and redirection

                header('Location: /');
                return null;
            }
        }
        return $this->twig->render('Content/content.html.twig',
        ['content' => $content]);
    }
}
