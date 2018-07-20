<?php
/**
 * Created by PhpStorm.
 * User: maroine
 * Date: 08/05/2018
 * Time: 11:22
 */

namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ElearningController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $TypeTechnique = $em->getRepository('GCFMainBundle:CatLearning')->findOneById(1);
        //echo $TypeTechnique->getNom()."<br>";
        $TypeLegislative = $em->getRepository('GCFMainBundle:CatLearning')->findOneById(2);
        //echo $TypeLegislative->getNom()."<br>";

        $Techniques = $em->getRepository('GCFMainBundle:Elearning')->findByCatLearning($TypeTechnique);       //Techniques
        foreach ($Techniques as $Technique){
            //preg_replace("/(.*)&v=(.*)/", "https://www.youtube.com/embed/$2", $Legislative->getYoutube());
            //echo preg_replace("/com\/(.*)&v=/", "com/embed/", $Technique->getYoutube())."<br>";
            $Technique->setYoutube(preg_replace("/(.*)v=([^&]*)&?(.*)/", "https://www.youtube.com/embed/$2", $Technique->getYoutube()));
        }
        $Legislatives = $em->getRepository('GCFMainBundle:Elearning')->findByCatLearning($TypeLegislative);       //Legislatives 
        foreach ($Legislatives as $Legislative){
            $Legislative->setFichier(preg_replace("/app_dev.php\//", "", $Legislative->getFichier()));
        }


        $elearningCategories = $em->getRepository('GCFMainBundle:CatLearning')->findAll();
        $elearninglist = $em->getRepository('GCFMainBundle:Elearning')->findAll();

        $elearning  = $this->get('knp_paginator')->paginate(
            $elearninglist,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            10/*nbre d'éléments par page*/
        );

        return $this->render('@GCFFront/Default/Elearning/e-learning.html.twig',array(
            'Techniques' => $Techniques,
            'Legislatives' => $Legislatives,
            'elearning'=> $elearning,
            'elearningCategories' => $elearningCategories
            
        ));
    }
}