<?php

namespace App\Controller;

use App\Model\AdminManager;

class AdminController extends AbstractController
{
    public function login(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = array_map('trim', $_POST);

            $adminManager = new AdminManager();
            $admin = $adminManager->selectOneByUsername($credentials['username']);
            if ($admin && password_verify($credentials['password'], $admin['password'])) {
                $_SESSION['admin_id'] = $admin['id'];
                header('Location: /');
            }
        }
        return $this->twig->render('Admin/login.html.twig');
    }

    public function logout()
    {
        unset($_SESSION['admin_id']);
        header('Location: /');
    }

    public function register(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = array_map('trim', $_POST);
            // @todo verify form values
            $adminManager = new AdminManager();
            $adminManager->insert($credentials);
            return $this->login();
        }
        return $this->twig->render('Admin/register.html.twig');
    }
}
