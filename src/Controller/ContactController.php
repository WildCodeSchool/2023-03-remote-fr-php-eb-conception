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
                $errors[] = "Le champ nom est obligatoire";
            }

            if (empty($contact['email'])) {
                $errors[] = "Le champ email est obligatoire";
            }

            if (empty($contact['message'])) {
                $errors[] = "Le champ message est obligatoire";
            }

            if (empty($accessory['email'])) {
                $errors[] = 'EMAIL is required';
            } elseif (!filter_var($accessory['url'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'EMAIL is not valid';
            }

            if (empty($errors)) {
                $contactManager = new ContactManager();
                $contactManager->insert($contact);

                header('Location: /');
                return null;
            }
        }
        return $this->twig->render('Home/contact.html.twig', [
            'errors' => $errors
        ]);
    }

    public function showContact()
    {
        $contactManager = new ContactManager();
        $contact = $contactManager->selectAll();

        return $this->twig->render('Admin/showContact.html.twig', ['contact' => $contact]);
    }

    public function deleteContact()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $contactManager = new ContactManager();
            $contactManager->delete($id);

            header('Location: /showContact');
        }
    }
}
