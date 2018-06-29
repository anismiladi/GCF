<?php
/**
 * Created by PhpStorm.
 * User: maroine
 * Date: 04/06/2018
 * Time: 10:42
 */

namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActualityController extends Controller
{
    public function indexAction()
    {
        return $this->render('@GCFFront/Default/actuality.html.twig');
    }
}