<?php
namespace GCF\MainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\TranslationBundle\Filter\TranslationFieldFilter;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


class AproposAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('contenu', CKEditorType::class, array(
                    'config' => array(
                        'filebrowserBrowseRoute' => 'elfinder',
                        'filebrowserBrowseRouteParameters' => array(
                            'instance' => 'default',
                            'homeFolder' => ''
                        )
                    ),
                )
            )        ;
    }

    /**/protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('contenu', TranslationFieldFilter::class);
    }

    /**/protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('contenu', TranslationFieldList::class)
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