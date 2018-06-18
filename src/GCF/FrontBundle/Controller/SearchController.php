<?php


namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller
{
    public function searchAction(){
        $pageTitle = 'Résultat de recherche';

        return $this->render('@GCFFront/Default/search-result.html.twig',array (
            'pageTitle' => $pageTitle
        ));
    }
}