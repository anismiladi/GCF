<?php
/**
 * Created by PhpStorm.
 * User: maroine
 * Date: 12/06/2018
 * Time: 15:18
 */

namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;

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

    public function eventSingleAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $singleEvent = array();
        //$id = $request->get('id');
        $event = $em->getRepository('GCFMainBundle:Event')->findOneBy( array( 'id' => $id ) );

        $singleEvent['id'] = "";
        if($event->getId()!=null)
        $singleEvent['id'] = $event->getId();

        $singleEvent['name'] = "";
        if($event->getNom()!=null)
        $singleEvent['name'] = $event->getNom();

        $singleEvent['date'] = "";
        if($event->getDebut()!=null)
        $singleEvent['date'] = $event->getDebut();

        $singleEvent['description'] = "";
        if($event->getDescription()!=null)
        $singleEvent['description'] = $event->getDescription();

        $singleEvent['banner'] = "";
        if ($event->getPhotoCouverture() != null)
        $singleEvent['banner'] = $event->getPhotoCouverture();

        $singleEvent['logo']= "";
        if ($event->getPhotoAffiche() != null)
        $singleEvent['logo'] = $event->getPhotoAffiche();


        return new JsonResponse($singleEvent);
    }

}