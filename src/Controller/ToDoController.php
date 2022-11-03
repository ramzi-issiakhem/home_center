<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/todo', name: 'app_to_do')]
    public function indexAction(Session $session): Response
    {
        $list = $session->get('todoList');
        if ($list == null) {
            $list = [
                "achat" => "acheter clé usb",
                "cours" => "Finaliser Cours"
            ];
            $session->set("todoList",$list);
        }

        return $this->render('to_do/index.html.twig');
    }
}
