<?php


namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller
{
    public function searchAction(Request $request){
        
        $rand = $request->get('rand');
        
        $pageTitle = 'Résultat de recherche';
        
        
        $events = $em->getRepository('GCFMainBundle:Event')->findlast(3);
        foreach($events as $event){
            $event->setphotoCouverture(preg_replace("/app_dev.php\//", "", $event->getphotoCouverture()));       //$notrepublication->setsetFeaturedImage
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
        $nospublications = $em->getRepository('GCFMainBundle:Publication')->findlast2_Nospublication();
        $gbpublications = $em->getRepository('GCFMainBundle:Publication')->findLastGbPublication();
        $autrespublications = $em->getRepository('GCFMainBundle:Publication')->findLastAutresPublication();
        
        return $this->render('@GCFFront/Default/search-result.html.twig',array (
            'pageTitle' => $pageTitle,
            'ProjectsBySector' => $nbrProj,

            'events' => $events,
            
            'Techniques' => $Techniques,
            'Legislatives' => $Legislatives,
                
            'nospublications' => $nospublications,
            'gbpublications' => $gbpublications,
            'autrespublications' => $autrespublications
        ));
    }
}