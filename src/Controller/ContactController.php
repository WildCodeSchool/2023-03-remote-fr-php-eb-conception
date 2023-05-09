<?php

namespace App\Controller;

use App\Model\ContactManager;

class ContactController extends AbstractController
{
    public function contact(): string
    {
        $contactManager = new ContactManager();
        $contacts = $contactManager->selectAll();

        return $this->twig->render('Home/contact.html.twig', ['contacts' => $contacts]);
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact = array_map('trim', $_POST);

            if (empty($contact['name'])) {
                $errors[] = "Le champ est obligatoire";
            }

            if (empty($contact['email'])) {
                $errors[] = "Le champ est obligatoire";
            }

            if (empty($contact['message'])) {
                $errors[] = "Le champ est obligatoire";
            }

            if (empty($errors)) {
                $contactManager = new ContactManager();
                $contactManager->insert($contact);

                header('Location: /');
                return null;
            }
        }
        return $this->twig->render('home/contact.html.twig', [
            'errors' => $errors
        ]);
    }
}
