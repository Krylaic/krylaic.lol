<?php
namespace App\Controllers;

use Twig\Environment;
use App\Models\ContactModel;

class ContactController {
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function contactPage() {
        echo $this->twig->render('core/contact.twig');
    }

    public function contactForm() {
        $contactModel = new ContactModel();

        $email = $_POST['email'];
        $message = $_POST['message'];

        $errors = [];

        if(!$email) {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        } elseif (!$message) {
            $errors[] = "Message is required";
        }

        if(!empty($errors)) {
            echo $this->twig->render('core/contact.twig', [
                'errors' => $errors
            ]);
            return;
        }

        if($contactModel->insertContact($email, $message)) {
            echo $this->twig->render('core/contact.twig', [
                'success' => "Your message was successfully sent"
            ]);
        }
        
    }
}