<?php
/**
 * Created by PhpStorm.
 * User: maroine
 * Date: 08/05/2018
 * Time: 11:22
 */

namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ElearningController extends Controller
{
    public function indexAction()
    {
        $pageTitle = 'E-learning';
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Accueil", $this->get("router")->generate("gcf_front_homepage"));
        // Simple example
        $breadcrumbs->addItem("E-learning");

        $em = $this->getDoctrine()->getManager();
        $TypeTechnique = $em->getRepository('GCFMainBundle:CatLearning')->findOneById(1);
        //echo $TypeTechnique->getNom()."<br>";
        $TypeLegislative = $em->getRepository('GCFMainBundle:CatLearning')->findOneById(2);
        //echo $TypeLegislative->getNom()."<br>";
        $Techniques = $em->getRepository('GCFMainBundle:Elearning')->findByCatLearning($TypeTechnique);       //Techniques 
        foreach ($Techniques as $Technique){
            //preg_replace("/(.*)&v=(.*)/", "https://www.youtube.com/embed/$2", $Legislative->getYoutube());
            //echo preg_replace("/com\/(.*)&v=/", "com/embed/", $Technique->getYoutube())."<br>";
            $Technique->setYoutube(preg_replace("/com\/(.*)v=/", "com/embed/", $Technique->getYoutube()));
        }
        $Legislatives = $em->getRepository('GCFMainBundle:Elearning')->findByCatLearning($TypeLegislative);       //Legislatives 
        foreach ($Legislatives as $Legislative){
            $Legislative->setFichier(preg_replace("/app_dev.php\//", "", $Legislative->getFichier()));
        }
        
        return $this->render('@GCFFront/Default/Elearning/e-learning.html.twig',array(
            'pageTitle' => $pageTitle,
            'Techniques' => $Techniques,
            'Legislatives' => $Legislatives
            
        ));
    }
}