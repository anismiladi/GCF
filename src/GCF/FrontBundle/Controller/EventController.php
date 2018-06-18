<?php
/**
 * Created by PhpStorm.
 * User: maroine
 * Date: 12/06/2018
 * Time: 15:18
 */

namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function eventIndexAction(){

        $pageTitle = 'Evenement';
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Accueil", $this->get("router")->generate("gcf_front_homepage"));
        // Simple example
        $breadcrumbs->addItem("Evénement");

        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('GCFMainBundle:Event')->findBy(
            array(),
            array('debut'=> 'desc')
        );

        return $this->render('@GCFFront/Default/Event/eventIndex.html.twig',array(
            'pageTitle' => $pageTitle,
            'evenements' => $evenements

        ));
    }

}