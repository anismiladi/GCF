<?php
/**
 * Created by PhpStorm.
 * User: maroine
 * Date: 04/06/2018
 * Time: 10:42
 */

namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ActualityController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $actualitieslist = $em->getRepository('GCFMainBundle:Actualites')->findAll(array(), array('createdAt' => 'DESC'));
        $actualities  = $this->get('knp_paginator')->paginate(
            $actualitieslist,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            9/*nbre d'éléments par page*/
        );
        return $this->render('@GCFFront/Default/Actuality/actuality.html.twig',array(
            'actualities' => $actualities
        ));
    }
    public function singleActualityPageAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $actuality = $em->getRepository('GCFMainBundle:Actualites')->find($id);

        $relatedActualities = $em->getRepository('GCFMainBundle:Actualites')->findRelatedNews();

        return $this->render('@GCFFront/Default/Actuality/singleActuality.html.twig',array(
            'actuality' => $actuality,
            'relatedActualities' => $relatedActualities
        ));
    }
}