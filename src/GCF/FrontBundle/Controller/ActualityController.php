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
        $pageTitle = 'Actualités ';

        //$routeName = $request->get('_route');
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("gcf_front_homepage"));

        // Example without URL
        $breadcrumbs->addItem("Actualités");

        return $this->render('@GCFFront/Default/actuality.html.twig',array(
            'pageTitle' => $pageTitle
        ));
    }
}