<?php
namespace App\Controllers;

use Twig\Environment;
use App\Models\QuoteModel;
use App\Models\OptionsModel;
use App\Models\BlogModel;
use App\Models\SocialsModel;

class PageController {
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function index() {
        $quoteModel = new QuoteModel();
        $optionsModel = new OptionsModel();
        $blogModel = new BlogModel();
        $socialsModel = new SocialsModel();

        echo $this->twig->render('core/home.twig', [
            'quote' => $quoteModel->getRandomQuote(),
            'about' => $optionsModel->getAbout(),
            'blogs' => $blogModel->getAllBlogs(),
            'socials' => $socialsModel->getSocials()
        ]);
    }
}