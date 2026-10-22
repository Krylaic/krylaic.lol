<?php
namespace App\Controllers;

use Twig\Environment;
use App\Models\QuoteModel;
use App\Models\OptionsModel;
use App\Models\BlogModel;
use App\Models\SocialsModel;

class BlogController {
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function blogs() {
        $blogModel = new BlogModel();

        echo $this->twig->render('blogs/blog.twig', [
            'blogs' => $blogModel->getAllBlogs()
        ]);
    }

    public function blogPost($id) {
        $blogModel = new BlogModel();

        echo $this->twig->render('blogs/post.twig', [
            'post' => $blogModel->getBlogPost($id)
        ]);
    }
}