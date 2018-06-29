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
    public function eventIndexAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('GCFMainBundle:Event')->findBy(
            array(),
            array('debut'=> 'desc')
        );

        $eventByDate = $em->getRepository('GCFMainBundle:Event')->findEvent();
        if($request->isXmlHttpRequest()) {
            // Do something...
            return new JsonResponse( $eventByDate );
        }


        return $this->render('@GCFFront/Default/Event/eventIndex.html.twig',array(
            'evenements' => $evenements,
            'eventByDate' => $eventByDate

        ));
    }

    public function singleEventAction($slug, $id){

        $em = $this->getDoctrine()->getManager();

        $evenement = $em->getRepository('GCFMainBundle:Event')->find($id);

        return $this->render('@GCFFront/Default/Event/singleEvent.html.twig',array(
            'evenement' => $evenement
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

        $singleEvent['linkFB']= "";
        if ($event->getLienFB() != null)
        $singleEvent['linkFB'] = $event->getLienFB();

        $singleEvent['linkOthers']= "";
        if ($event->getLienAutre() != null)
        $singleEvent['linkOthers'] = $event->getLienAutre();


        return new JsonResponse($singleEvent);
    }

}