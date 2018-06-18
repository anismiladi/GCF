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

class PublicationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre')
            ->add('contenu', 'textarea', array('attr' => array('class' => 'ckeditor')))
            ->add('projet', ModelType::class, [
                    'attr' => [
                        'data-sonata-select2' => 'true'
                    ]
                ])
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
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        /*
        $datagridMapper
            ->add('titre', TranslationFieldFilter::class)
            ->add('title')
            ->add('with_open_comments', 'doctrine_orm_callback', array(
//                'callback'   => array($this, 'getWithOpenCommentFilter'),
                'callback' => function($queryBuilder, $alias, $field, $value) {
                    if (!$value['value']) {
                        return;
                    }

                    $queryBuilder->leftJoin(sprintf('%s.comments', $alias), 'c');
                    $queryBuilder->andWhere('c.status = :status');
                    $queryBuilder->setParameter('status', Comment::STATUS_MODERATE);

                    return true;
                },
                'field_type' => 'checkbox'
            ))
        ;
         * 
         */
    }
/*
    public function getWithOpenCommentFilter($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }

        $queryBuilder->leftJoin(sprintf('%s.comments', $alias), 'c');
        $queryBuilder->andWhere('c.status = :status');
        $queryBuilder->setParameter('status', Comment::STATUS_MODERATE);

        return true;
    }
 * 
 */


    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('titre', TranslationFieldList::class)
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