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

        $publications = $em->getRepository('GCFMainBundle:Publication')->findBy(
            array( ),
            array('createdAt' => 'desc')
        );
        
        foreach($publications as $notrepublication){
            $notrepublication->setFeaturedImage(preg_replace("/app_dev.php\//", "", $notrepublication->getFeaturedImage()));       //$notrepublication->setsetFeaturedImage
        }

        $catsPub = $em ->getRepository('GCFMainBundle:CatPublication')->findAll();

        return $this->render('@GCFFront/Default/Publications/publications.html.twig', array(
            'catsPub' => $catsPub,
            'publications' => $publications
        ));
    }

    public function singlePublicationAction($slug, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $publication = $em->getRepository('GCFMainBundle:Publication')->find($id);

        return $this->render('@GCFFront/Default/Publications/single-publication.html.twig', array(
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

//        $projettype = $em->getRepository('GCFMainBundle:Projet')->find($response['gb_article_project']);
        $categorie = $em->getRepository('GCFMainBundle:CatPublication')->find(2);
        $etat = $em->getRepository('GCFMainBundle:EtatPub')->find(1);

        //save data
        $publication  = new Publication();
        $publication->setTitre($response['gb_article_title']);
        $publication->setContenu($response['gb_article_content']);
        $publication->setCategorie($categorie);

        $publication->setEmailBloggeur($response['gb_email']);
        $publication->setNomBloggeur($response['gb_name']);
        $publication->setPrenomBloggeur($response['gb_last_name']);


        $publication->setEtatPub($etat);


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