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

    /**
     * Edit a specific item
     */
    public function editContent(int $id): ?string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadDir = __DIR__ . '/../../public/uploads/';
            $mainFileName = basename($_FILES['main_img']['name']);
            $mainFilePath = $uploadDir . $mainFileName;
            $secondaryFileName = basename($_FILES['secondary_img']['name']);
            $secondaryFilePath = $uploadDir . $secondaryFileName;
            $mainExtension = pathinfo($_FILES['main_img']['name'], PATHINFO_EXTENSION);
            $secondaryExtension = pathinfo($_FILES['secondary_img']['name'], PATHINFO_EXTENSION);
            $authorizedExtensions = ['jpg', 'png'];
            $maxFileSize = 2000000;

            if (
                (file_exists($_FILES['main_img']['tmp_name'])
                    && filesize($_FILES['main_img']['tmp_name']) > $maxFileSize)
            ) {
                $errors[] = "Votre fichier doit faire moins de 2M !";
            }

            if (
                (file_exists($_FILES['secondary_img']['tmp_name'])
                    && filesize($_FILES['secondary_img']['tmp_name']) > $maxFileSize)
            ) {
                $errors[] = "Votre fichier doit faire moins de 2M !";
            }

            $content = array_map('trim', $_POST);
            if (empty($errors)) {
                $contentManager = new ContentManager();
                $contentManager->updateText($content);

                if (move_uploaded_file($_FILES['main_img']['tmp_name'], $mainFilePath)) {
                    if ((!in_array($mainExtension, $authorizedExtensions))) {
                        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Png pour l\'image principale!';
                    } else {
                        $content['main_img'] = $mainFileName;
                        $contentManager->updateMainFile($content);
                    }
                }
                if (move_uploaded_file($_FILES['secondary_img']['tmp_name'], $secondaryFilePath)) {
                    if ((!in_array($secondaryExtension, $authorizedExtensions))) {
                        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Png pour l\'image secondaire!!';
                    } else {
                        $content['secondary_img'] = $secondaryFileName;
                        $contentManager->updateSecondaryFile($content);
                    }
                }
                header('Location: /showContent');
                return null;
            }
        }
        $contentManager = new ContentManager();
        $content = $contentManager->selectOneById($id);
        return $this->twig->render('Content/editContent.html.twig', [
            'content' => $content,
        ]);
    }
}
