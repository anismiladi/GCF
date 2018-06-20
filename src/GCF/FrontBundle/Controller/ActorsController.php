<?php

namespace GCF\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class ActorsController extends Controller
{
    public function indexAction()
    {
        $pageTitle = 'Acteurs';

        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Accueil", $this->get("router")->generate("gcf_front_homepage"));
        // Simple example
        $breadcrumbs->addItem("Acteurs", $this->get("router")->generate("gcf_front_actorspage"));

        $em = $this->getDoctrine()->getManager();

        $sectors = $em->getRepository('GCFMainBundle:SecteurActeur')->findBy(
            array(
                'secteurActeurParent' => null
            )
        );
        $mainactors=[];
        foreach($sectors as $sector){
            //  echo $sector->getNom()."<br>";
            //  $mainactors[]['sector'] = $sector;
            $mainactors[$sector->getId()]['actors'] = $em->getRepository('GCFMainBundle:Acteur')->topBySector($sector);
        }
        
        $actors = $em->getRepository('GCFMainBundle:Acteur')->findBy(
            array(
                'acteurParent' => null
            )
        );


        return $this->render('@GCFFront/Default/Actors/actors.html.twig',array(
            'pageTitle' => $pageTitle,
            'sectors' => $sectors,
            'mainactors' => $mainactors,
            'actors' => $actors

        ));
    }

//    public function gethierarchieAction( $clicked )
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $acteur = $em->getRepository('GCFMainBundle:Acteur')->findAll();
//
//        $secteursActeur = $em->getRepository('GCFMainBundle:SecteurActeur')->findAll();
//
//        $response = array();
//
//        foreach ($acteur as $act){
//
//            //$response[] = $act->getSecteurActeur()->getId();
//
//            foreach ( $secteursActeur as $secteurActeur)
//            {
//                if($secteurActeur->getId() == $act->getSecteurActeur()->getId())
//                {
//                    if ($secteurActeur->getNom() == $clicked){
//                        //$response[] = $act->getActeurParent();
//                        if ($act->getActeurParent() == null){
//                            //dump($act->getNom());
//
//                            foreach ($act->getActeurFils() as $fils){
//                                $filsarray[] = $fils->getNom();
//                            }
//                            $response[] = array('nom' => $act->getNom(), 'parent'=> 'null', 'fils' => $filsarray );
//                        }else{
//                            //dump($act->getNom());
//                            $filsarray = array();
//                            foreach ($act->getActeurFils() as $fils){
//                                $filsarray[] = $fils->getNom();
//                            }
//                            $response[] = array('nom'=>$act->getNom(), 'parent' => $act->getActeurParent()->getNom(), 'fils' => $filsarray );
//
//                        }
//                    }
//                }
//            }
//
//        }
//
//        return new JsonResponse($response);
//    }

    public function ActorsSectorAction($id){

        $em = $this->getDoctrine()->getManager();

        $sector = $em->getRepository('GCFMainBundle:SecteurActeur')->findOneById($id);

        $actors = $em->getRepository('GCFMainBundle:Acteur')->findBy(
            array( 'secteurActeur' => $id,
                'acteurParent' => Null,
            )
        );

        $sectors = $em->getRepository('GCFMainBundle:SecteurActeur')->findBy(
            array( 'secteurActeurParent' => Null)
        );

        $pageTitle = 'Sous secteur';

        return $this->render('@GCFFront/Default/Actors/actorsSector.html.twig',array(
            'sector' => $sector,
            'actors' => $actors,
            'sectors' => $sectors,
            'pageTitle' => $pageTitle
        ));

    }
    public function sousActorsAction($id){

        $em = $this->getDoctrine()->getManager();


        $actor = $em->getRepository('GCFMainBundle:Acteur')->findOneById($id);

        return $this->render('@GCFFront/Default/Actors/blocks/sousactors.html.twig',array(
            'actor' => $actor,
        ));
    }

    public function singleActorAction($id){
        $em = $this->getDoctrine()->getManager();
        $singleActor = array();
        //$id = $request->get('id');
        $actor = $em->getRepository('GCFMainBundle:Acteur')->findOneBy( array( 'id' => $id ) );
        
        //$data =  $this->get('serializer')->serialize($actor, 'json');
        //$response = new Response($data);
        //$response->headers->set('Content-Type', 'application/json');
        //return $response;
        
        //$jsonContent = new serialize($actor);
        // $jsonContent contains {"name":"foo","age":99,"sportsperson":false,"createdAt":null}
        //return $jsonContent; // or return it in a Response

        return new JsonResponse($actor->jsonSerialize());
        
        //return json_encode($actor);
        //return new JsonResponse(json_encode($actor));
    }

}