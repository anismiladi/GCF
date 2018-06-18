<?php


namespace GCF\FrontBundle\Controller;


use GCF\MainBundle\Entity\Publication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PublicationsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pageTitle = 'Publications';

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Accueil", $this->get("router")->generate("gcf_front_homepage"));
        // Simple example
        $breadcrumbs->addItem("Publications");

        $nospublications = $em->getRepository('GCFMainBundle:Publication')->findBy(
            array('categorie' => '1'),
            array('id' => 'desc')
        );

        $gbpublications = $em->getRepository('GCFMainBundle:Publication')->findBy(
            array('categorie' => '2'),
            array('id' => 'desc')
        );
        $autrespublications = $em->getRepository('GCFMainBundle:Publication')->findBy(
            array('categorie' => '3'),
            array('id' => 'desc')
        );

        $catsPub = $em ->getRepository('GCFMainBundle:CatPublication')->findAll();

        return $this->render('@GCFFront/Default/Publications/publications.html.twig', array(
            'pageTitle' => $pageTitle,
            'catsPub' => $catsPub,
            'nospublications' => $nospublications,
            'gbpublications' => $gbpublications,
            'autrespublications' => $autrespublications
        ));
    }

    public function singlePublicationAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $publication = $em->getRepository('GCFMainBundle:Publication')->find($id);

        $pageTitle = $publication->getTitre();

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Accueil", $this->get("router")->generate("gcf_front_homepage"));
        // Simple example
        $breadcrumbs->addItem("Publications", $this->get("router")->generate("gcf_front_publicationspage"));
        // example with route params
        if( strlen($publication->getTitre()) > 50 ){
            $publication_title = substr($publication->getTitre(), 0, 50);
        }
        $breadcrumbs->addItem($publication->getTitre(), $this->get("router")->generate("gcf_front_single_publications_page", array('id' => $publication->getId() ) ));


        return $this->render('@GCFFront/Default/Publications/single-publication.html.twig', array(
            'pageTitle' => $pageTitle,
            'publication' => $publication
        ));
    }


    public function saveGbPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //get data posted
        $datas = $request->request;

        $response = array();

        foreach ($datas as $key =>$data){
            $response[$key] = $data;
        }

        $projettype = $em->getRepository('GCFMainBundle:Projet')->find($response['gb_article_project']);
        $categorie = $em->getRepository('GCFMainBundle:CatPublication')->find(2);

        //save data
        $publication  = new Publication();
        $publication->setTitre($response['gb_article_title']);
        $publication->setContenu($response['gb_article_content']);
        $publication->setProjet($projettype);

        $publication->setEmailBloggeur($response['gb_email']);
//        $publication->setNameBloggeur($response['gb_name']);

        $publication->setCategorie($categorie);
//        $publication->setEtatPub();


        $em->persist($publication);

        $em->flush();

        return new JsonResponse($response);
    }

    public function popupAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projects = $em->getRepository('GCFMainBundle:Projet')->findAll();

        return $this->render('@GCFFront/Default/blocks/gb-popoup.html.twig',array(
           'projects' => $projects
        ));
    }
}