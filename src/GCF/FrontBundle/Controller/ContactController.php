<?php
/**
 * Created by PhpStorm.
 * User: maroine
 * Date: 06/06/2018
 * Time: 13:37
 */

namespace GCF\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{

    public function indexAction(Request $request){

        $pageTitle = 'Contactez-nous';


        //$routeName = $request->get('_route');
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("gcf_front_homepage"));

        // Example without URL
        $breadcrumbs->addItem("Contact");


        return $this->render('@GCFFront/Default/contact.html.twig',array(
            'pageTitle' => $pageTitle,
        ));
    }

    public function contactAjaxAction(Request $request){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        header('Content-Type: application/json');

        if ($name === ''){
            return new JsonResponse(array('message' => 'Le Nom ne peut pas être vide', 'code' => 0));
            exit();
        }
        if ($email === ''){
            return new JsonResponse(array('message' => "L'Email ne peut pas être vide", 'code' => 0));
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return new JsonResponse(array('message' => "Le format de l'Email est invalide.", 'code' => 0));
                exit();
            }
        }
        if ($subject === ''){
            return new JsonResponse(array('message' => 'Le Subject ne peut pas être vide', 'code' => 0));
            exit();
        }
        if ($message === ''){
            return new JsonResponse(array('message' => 'Message ne peut pas être vide', 'code' => 0));

        }
        $content="From: $name \nEmail: $email \nMessage: $message";
        $recipient = "younes.maroine@gmail.com";
        $mailheader = "From: $email \r\n";
        mail($recipient, $subject, $content, $mailheader) or die("Error!");
        return new JsonResponse(array('message' => 'Votre message est envoyé avec succès', 'code' => 1));



    }
}