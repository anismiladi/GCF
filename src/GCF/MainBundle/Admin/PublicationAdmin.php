<?php

namespace GCF\MainBundle\Admin;

use Doctrine\ORM\EntityRepository;
use GCF\MainBundle\Entity\EtatPub;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->with( 'Gestion des Publications', ['class' => 'col-md-8'])
                ->add('titre')
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
                        'btn_add' => true,
                        'multiple' => true,
                        'minimum_input_length' => 1,
                        'property' => 'label',
                        'to_string_callback' => function($enitity, $property) {
                            return $enitity->getLabel();
                        },
                    )
                )
                ->add('projet')
                ->add('categorie')
            ->end()
            ->with( 'Green Blogger info', ['class' => 'col-md-4'])
                ->add('emailBloggeur',TextType::class, ['disabled' => true, 'required' => false])
                ->add('nomBloggeur',TextType::class, ['disabled' => true, 'required' => false])
                ->add('prenomBloggeur', TextType::class, ['disabled' => true, 'required' => false ])
            ->end()
            ->with( 'Image', ['class' => 'col-md-4'])
                ->add('featuredImage', ElFinderType::class, ['instance' => 'form_photo', 'enable' => true,'required' => false])
            ->end()
            ->with('Etat de publication', ['class' => 'col-md-4'])
                ->add('etatPub')
            ->end()

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