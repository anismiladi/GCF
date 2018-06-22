<?php

namespace GCF\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\HttpFoundation\Session\Session;

class SearchController extends Controller
{
    public function searchAction(Request $request){
        
        $keyword = $request->get('key');
        echo $keyword."<br>";
        
        $pageTitle = 'Résultat de recherche';
        
        $em = $this->getDoctrine()->getManager();
        
        $Acteurs = $em->getRepository('GCFMainBundle:Acteur')->search($keyword);
        foreach($Acteurs as $key => $Acteur){
            $Acteur->setLogo(preg_replace("/app_dev.php\//", "", $Acteur->getLogo()));       //$notrepublication->setsetFeaturedImage
            if($Acteur->getNom() == ""){
                unset($Acteurs[$key]);
            }
        }

        $Projets = $em->getRepository('GCFMainBundle:Projet')->search($keyword);
        foreach($Projets as $key => $Projet){
            $Projet->setFichier(preg_replace("/app_dev.php\//", "", $Projet->getFichier()));       //$notrepublication->setsetFeaturedImage
            if($Projet->getNom() == ""){
                unset($Projets[$key]);
            }
        }

        $Legislatives = $em->getRepository('GCFMainBundle:Elearning')->findlast(3, 2);       //Legislatives 
        foreach ($Legislatives as $Legislative){
            $Legislative->setFichier(preg_replace("/app_dev.php\//", "", $Legislative->getFichier()));
        }
        $Techniques = $em->getRepository('GCFMainBundle:Elearning')->findlast(3, 1);       //Techniques 
        foreach ($Techniques as $Technique){
            $Technique->setYoutube(preg_replace("/com\/(.*)v=/", "com/embed/", $Technique->getYoutube()));
        }
        
        //Block article & publication
        $Publications = $em->getRepository('GCFMainBundle:Publication')->search($keyword, 3);
        foreach ($Publications as $key => $Publication){
            $Publication->setFeaturedImage(preg_replace("/app_dev.php\//", "", $Publication->getFeaturedImage()));
            if($Publication->getTitre() == ""){
                unset($Publications[$key]);
            }
        }
        
        $Events = $em->getRepository('GCFMainBundle:Event')->search($keyword);
        foreach($Events as $key => $Event){
            $Event->setphotoCouverture(preg_replace("/app_dev.php\//", "", $Event->getphotoCouverture()));       //$notrepublication->setsetFeaturedImage
            if($Event->getNom() == ""){
                unset($Events[$key]);
            }
        }
        
        return $this->render('@GCFFront/Default/search-result.html.twig',array (
            'pageTitle' => $pageTitle,
            //'ProjectsBySector' => $nbrProj,

            'Projets' => $Projets,
            //'Acteurs' => $Acteurs,
            
            'Publications' => $Publications,
            
            'Techniques' => $Techniques,
            'Legislatives' => $Legislatives,
            
            'Events' => $Events,
            
        ));
    }
}