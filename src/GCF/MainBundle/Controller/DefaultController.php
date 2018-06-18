<?php

namespace GCF\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction(){

        return $this->render('@GCFMain/Default/index.html.twig');
    }
}