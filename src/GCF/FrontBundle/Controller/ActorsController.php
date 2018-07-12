<?php

namespace GCF\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class ActorsController extends Controller
{
    public function indexAction()
    {
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
            'sectors' => $sectors,
            'mainactors' => $mainactors,
            'actors' => $actors,

        ));
    }



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


        return new JsonResponse($actor->jsonSerialize());
    }

    public function pageSingleActorAction($id, $slug){
        $em = $this->getDoctrine()->getManager();

        $actor = $em->getRepository('GCFMainBundle:Acteur')->findOneBy( array( 'id' => $id ) );


        return $this->render('@GCFFront/Default/Actors/singleActor.html.twig',array(
            'actor'=> $actor

        ));
    }

}