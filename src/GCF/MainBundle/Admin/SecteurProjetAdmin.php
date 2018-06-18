<?php
// src/Admin/CategoryAdmin.php
namespace GCF\MainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Sonata\TranslationBundle\Filter\TranslationFieldFilter;
use Sonata\AdminBundle\Form\Type\ModelType;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use FM\ElfinderBundle\Form\Type\ElFinderType;

class SecteurProjetAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom')
            ->add('logo', ElFinderType::class, ['instance' => 'form', 'enable' => true])        //
            ->add('secteurProjetParent','sonata_type_model',        //_autocomplete',
                array(
                    'required' => false,
                    'multiple' => false,
                    //'minimum_input_length' => 1,
                    'property' => 'nom',
                    /*'to_string_callback' => function($enitity, $property) {
                        return $enitity->getNom();
                    },*/
                )
            );
        //->add('translations', TranslationsType::class)
        //        ->add('nom');
    }

    /**/protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom', TranslationFieldFilter::class);
    }

    /**/protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('nom', TranslationFieldList::class)
            // You may also specify the actions you want to be displayed in the list
            ->add('_action', 'actions', array(
                    'actions' => array(
                //    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }
}