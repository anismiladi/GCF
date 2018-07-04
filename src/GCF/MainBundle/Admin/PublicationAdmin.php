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

class PublicationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre')
            ->add('featuredImage', ElFinderType::class, ['instance' => 'form_photo', 'enable' => true,'required' => false])
            ->add('contenu', CKEditorType::class, array(
                    'config' => array(
                        'filebrowserBrowseRoute' => 'elfinder',
                        'filebrowserBrowseRouteParameters' => array(
                            'instance' => 'default',
                            'homeFolder' => ''
                        )
                    ),
                )
            )
            ->add('keyword', ModelAutocompleteType::class,        //_autocomplete
                array(
                    'label' => "Mots clés",
                    'required' => false,
                    //'expanded' => true,
                    'multiple' => true,
                    'minimum_input_length' => 1,
                    'property' => 'label',
                    'to_string_callback' => function($enitity, $property) {
                        return $enitity->getLabel();
                    },
                )
            )
            ->add('projet')
            /*
            ->add('projet','sonata_type_model_autocomplete',
                array(
                    'required' => false,
                    'multiple' => false,
                    'minimum_input_length' => 1,
                    'property' => 'nom',
                    'to_string_callback' => function($enitity, $property) {
                        return $enitity->getNom();
                    },
                )
            )*/
            ->add('categorie')
            ->add('etatPub')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('titre', TranslationFieldFilter::class)
            ->add('categorie')
            ->add('etatPub');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('titre', TranslationFieldList::class)
            ->add('categorie')
            ->add('etatPub')
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