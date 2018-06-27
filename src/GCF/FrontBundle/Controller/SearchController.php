<?php

namespace GCF\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\HttpFoundation\Session\Session;

class SearchController extends Controller
{
    public function searchAction(Request $request){
        
        $keyword = $request->get('key');
        $theme = $request->get('theme');
        $gouvr = $request->get('gouvr');
        
        $pageTitle = 'Résultat de recherche';
        
        $em = $this->getDoctrine()->getManager();
        
        $Acteurs = array();
        $Projets = array();
        $Publications = array();
        $Elearnings = array();
        $Events = array();
        
        $nb = 50;

        if($theme == "Theme" || $theme == "Actors"){
            if($theme == "Theme"){$nb = 4;}
            $Acteurs = $em->getRepository('GCFMainBundle:Acteur')->search($keyword, $nb);
            foreach($Acteurs as $key => $Acteur){
                $Acteur->setLogo(preg_replace("/app_dev.php\//", "", $Acteur->getLogo()));       //$notrepublication->setsetFeaturedImage
                if($Acteur->getNom() == ""){
                    unset($Acteurs[$key]);
                }
            }
        }

        if($theme == "Theme" || $theme == "Projects"){
            if($theme == "Theme"){$nb = 4;}
            $Projets = $em->getRepository('GCFMainBundle:Projet')->search($keyword, $nb);
            foreach($Projets as $key => $Projet){
                $Projet->setFichier(preg_replace("/app_dev.php\//", "", $Projet->getFichier()));       //$notrepublication->setsetFeaturedImage
                if($Projet->getNom() == ""){
                    unset($Projets[$key]);
                }
            }
        }
        
        if($theme == "Theme"){$nb = 3;}
        
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
        
        //Block article & publication
        if($theme == "Theme" || $theme == "Publications"){
            $Publications = $em->getRepository('GCFMainBundle:Publication')->search($keyword, $nb);
            foreach ($Publications as $key => $Publication){
                $Publication->setFeaturedImage(preg_replace("/app_dev.php\//", "", $Publication->getFeaturedImage()));
                $em->persist($Publication);
                $em->flush();
                if($Publication->getTitre() == ""){
                    unset($Publications[$key]);
                }
            }
        }
        
        if($theme == "Theme" || $theme == "Events"){
            $Events = $em->getRepository('GCFMainBundle:Event')->search($keyword, $nb);
            foreach($Events as $key => $Event){
                $Event->setphotoCouverture(preg_replace("/app_dev.php\//", "", $Event->getphotoCouverture()));       //$notrepublication->setsetFeaturedImage
                $em->persist($Event);
                $em->flush();
                if($Event->getNom() == ""){
                    unset($Events[$key]);
                }
            }
        }
                
        if($theme == "Theme" || $theme == "E-learning"){
            $Elearnings = $em->getRepository('GCFMainBundle:Elearning')->search($keyword, $nb);       //Techniques  idCat=1
            foreach ($Elearnings as $Elearning){
                //$Technique->setYoutube(preg_replace("/com\/(.*)v=/", "com/embed/", $Technique->getYoutube()));
                if($Elearning->getImage() == "" && $Elearning->getYoutube() != ""){
                    //echo preg_replace("/(.*)v=(.*)/", "https://img.youtube.com/vi/$2/0.jpg", $Elearning->getYoutube())."<br>";
                    $Elearning->setImage(preg_replace("/(.*)v=([^&]*)&?(.*)/", "https://img.youtube.com/vi/$2/0.jpg", $Elearning->getYoutube()));
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
        }
        
        return $this->render('@GCFFront/Default/search-result.html.twig',array (
            'pageTitle' => $pageTitle,

            'keyword' => $keyword,
            'theme' => $theme,
            'gouvr' => $gouvr,
        
            'Acteurs' => $Acteurs,
            'Projets' => $Projets,
            'Publications' => $Publications,
            'Elearnings' => $Elearnings,
            'Events' => $Events,
            
        ));
    }
}