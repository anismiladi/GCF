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
        $em = $this->getDoctrine()->getManager();

        $actualities = $em->getRepository('GCFMainBundle:Actualites')->findAll(array(), array('createdAt' => 'DESC'));

        return $this->render('@GCFFront/Default/Actuality/actuality.html.twig',array(
            'actualities' => $actualities
        ));
    }
    public function singleActualityPageAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $actuality = $em->getRepository('GCFMainBundle:Actualites')->find($id);


        return $this->render('@GCFFront/Default/Actuality/singleActuality.html.twig',array(
            'actuality' => $actuality
        ));
    }
}