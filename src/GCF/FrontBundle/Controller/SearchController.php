<?php

namespace GCF\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\HttpFoundation\Session\Session;

class SearchController extends Controller
{
    public function searchAction(Request $request){
        
        $keyword = $request->get('key');
        $type = $request->get('type');
        $gouvr = $request->get('gouvr');
        
        $pageTitle = 'Résultat de recherche';
        
        $em = $this->getDoctrine()->getManager();
        
        $Acteurs = $em->getRepository('GCFMainBundle:Acteur')->search($keyword, 4);
        foreach($Acteurs as $key => $Acteur){
            $Acteur->setLogo(preg_replace("/app_dev.php\//", "", $Acteur->getLogo()));       //$notrepublication->setsetFeaturedImage
            if($Acteur->getNom() == ""){
                unset($Acteurs[$key]);
            }
        }

        $Projets = $em->getRepository('GCFMainBundle:Projet')->search($keyword, 4);
        foreach($Projets as $key => $Projet){
            $Projet->setFichier(preg_replace("/app_dev.php\//", "", $Projet->getFichier()));       //$notrepublication->setsetFeaturedImage
            if($Projet->getNom() == ""){
                unset($Projets[$key]);
            }
        }

        /*
        $Legislatives = $em->getRepository('GCFMainBundle:Elearning')->search($keyword);       //Legislatives idCat=2
        foreach ($Legislatives as $Legislative){
            $Legislative->setFichier(preg_replace("/app_dev.php\//", "", $Legislative->getFichier()));
        }

        $Techniques = $em->getRepository('GCFMainBundle:Elearning')->search($keyword);       //Techniques  idCat=1
        foreach ($Techniques as $Technique){
            if($Technique->getImage() == "" && $Technique->getYoutube() != ""){
                echo preg_replace("/(.*)v=(.*)/", "https://img.youtube.com/vi/$2/0.jpg", $Technique->getYoutube())."<br>";
                $Technique->setImage(preg_replace("/(.*)v=(.*)/", "https://img.youtube.com/vi/$2/0.jpg", $Technique->getYoutube()));
                $em->persist($Technique);
                $em->flush();
            }
        }
         * 
         */
        
        $Elearnings = $em->getRepository('GCFMainBundle:Elearning')->search($keyword, 3);       //Techniques  idCat=1
        foreach ($Elearnings as $Elearning){
            //$Technique->setYoutube(preg_replace("/com\/(.*)v=/", "com/embed/", $Technique->getYoutube()));
            if($Elearning->getImage() == "" && $Elearning->getYoutube() != ""){
                echo preg_replace("/(.*)v=(.*)/", "https://img.youtube.com/vi/$2/0.jpg", $Elearning->getYoutube())."<br>";
                $Elearning->setImage(preg_replace("/(.*)v=(.*)/", "https://img.youtube.com/vi/$2/0.jpg", $Elearning->getYoutube()));
                $em->persist($Elearning);
                $em->flush();
            }
            
            if($Elearning->getFichier() != ""){
                $Elearning->setFichier(preg_replace("/app_dev.php\//", "", $Elearning->getFichier()));
                $em->persist($Elearning);
                $em->flush();
            }
            //preg_match("/(.*)v=(.*)/", $input_line, $output_array);
        }
        
        //Block article & publication
        $Publications = $em->getRepository('GCFMainBundle:Publication')->search($keyword, 3);
        foreach ($Publications as $key => $Publication){
            $Publication->setFeaturedImage(preg_replace("/app_dev.php\//", "", $Publication->getFeaturedImage()));
            $em->persist($Publication);
            $em->flush();
            if($Publication->getTitre() == ""){
                unset($Publications[$key]);
            }
        }
        
        $Events = $em->getRepository('GCFMainBundle:Event')->search($keyword, 3);
        foreach($Events as $key => $Event){
            $Event->setphotoCouverture(preg_replace("/app_dev.php\//", "", $Event->getphotoCouverture()));       //$notrepublication->setsetFeaturedImage
            $em->persist($Event);
            $em->flush();
            if($Event->getNom() == ""){
                unset($Events[$key]);
            }
        }
        
        return $this->render('@GCFFront/Default/search-result.html.twig',array (
            'pageTitle' => $pageTitle,
            //'ProjectsBySector' => $nbrProj,

            'Acteurs' => $Acteurs,
            'Projets' => $Projets,
            
            'Publications' => $Publications,
            
            'Elearnings' => $Elearnings,
            //'Techniques' => $Techniques,
            //'Legislatives' => $Legislatives,
            
            'Events' => $Events,
            
        ));
    }
}