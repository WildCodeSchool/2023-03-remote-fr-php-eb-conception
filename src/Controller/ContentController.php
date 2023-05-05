<?php

namespace App\Controller;

use App\Model\ContentManager;

class ContentController extends AbstractController
{
    public function showContent()
    {
        $contentManager = new ContentManager();
        $content = $contentManager->selectAll();

        return $this->twig->render('Content/showContent.html.twig', ['content' => $content]);
    }

    public function moveUploadedFile($content, &$errors, $image = 'main_img'): void
    {
        $uploadDir = __DIR__ . '/../../public/uploads/';
        $mainFileName = basename($_FILES[$image]['name']);
        $mainFilePath = $uploadDir . $mainFileName;
        $mainExtension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
        $authorizedExtensions = ['jpg', 'png'];

        if ((!in_array($mainExtension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Png pour l\'image principale!';
        }

        $maxFileSize = 2000000;
        if (
            (file_exists($_FILES[$image]['tmp_name'])
                && filesize($_FILES[$image]['tmp_name']) > $maxFileSize)
        ) {
            $errors[] = "Votre fichier doit faire moins de 2M !";
        }

        if (empty($errors) && move_uploaded_file($_FILES[$image]['tmp_name'], $mainFilePath)) {
            $content[$image] = $mainFileName;
            $contentManager = new ContentManager();
            $contentManager->updateFile($content, $image);
        }
    }

    public function editText($content, &$errors): void
    {
        if (isset($content['bold_text']) && strlen($content['bold_text']) > 100) {
            $errors[] = "Le text en gras ne doit pas etre plus de 100 caractères";
        }

        if (isset($content['coloured_text']) && strlen($content['coloured_text']) > 100) {
            $errors[] = "Le text coloré ne doit pas etre plus de 100 caractères";
        }

        if (isset($content['main_content']) && strlen($content['main_content']) > 1000) {
            $errors[] = "Le Contenu principale ne doit pas etre plus de 1000 caractères";
        }
    }

    /**
     * Edit a specific item
     */
    public function editContent(int $id): ?string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = array_map('trim', $_POST);
            $this->editText($content, $errors);
            //validation $content errors

            if (empty($errors)) {
                $contentManager = new ContentManager();
                $contentManager->updateText($content);

                if (isset($_FILES['main_img']) && !empty($_FILES['main_img']['name'])) {
                    $this->moveUploadedFile($content, $errors);
                }
                if (isset($_FILES['secondary_img']) && !empty($_FILES['secondary_img']['name'])) {
                    $this->moveUploadedFile($content, $errors, 'secondary_img');
                }

                if (empty($errors)) {
                    header('Location: /showContent');
                    return null;
                }
            }
        }
        $contentManager = new ContentManager();
        $content = $contentManager->selectOneById($id);
        return $this->twig->render('Content/editContent.html.twig', [
            'content' => $content,
            'errors' => $errors
        ]);
    }
}
