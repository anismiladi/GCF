<?php

namespace GCF\MainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\TranslationBundle\Filter\TranslationFieldFilter;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

use FOS\CKEditorBundle\Form\Type\CKEditorType;

use FM\ElfinderBundle\Form\Type\ElFinderType;

class ElearningAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom')
            ->add('description')
            ->add('keyword', ModelAutocompleteType::class,        //_autocomplete
                array(
                    'label' => "Mots clés",
                    'required' => false,
                    'btn_add' => true,
                    'multiple' => true,
                    'minimum_input_length' => 1,
                    'property' => 'label',
                    'to_string_callback' => function($enitity, $property) {
                        return $enitity->getLabel();
                    },
                )
            )
            ->add('youtube', 'text', array('required' => false))
            ->add('fichier', ElFinderType::class, ['instance' => 'form_pdf', 'enable' => true,'required' => false])        //
            ->add('image', ElFinderType::class, ['instance' => 'form_photo', 'enable' => true,'required' => false])
            ->add('catLearning')    /*, 'sonata_type_model', array(
                'required' => false,
                'multiple' => false, 
                //'expanded' => true
            ))*/
            /*
            ->add('catLearning','sonata_type_model_autocomplete',
                array(
                    'required' => true,
                    'multiple' => false,
                    'property' => 'nom',
                    'to_string_callback' => function($enitity, $property) {
                        return $enitity->getNom();
                    }
                )
            )
             * 
             */
            ->add('etatPub')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom', TranslationFieldFilter::class);
    }

    protected function configureListFields(ListMapper $listMapper)
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