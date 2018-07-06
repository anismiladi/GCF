<?php
namespace GCF\MainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\TranslationBundle\Filter\TranslationFieldFilter;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


class ActualitesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre')
            ->add('contenue',CKEditorType::class, array(
                    'config' => array(
                        'filebrowserBrowseRoute' => 'elfinder',
                        'filebrowserBrowseRouteParameters' => array(
                            'instance' => 'default',
                            'homeFolder' => ''
                        )
                    )
                ));
    }

    /**/protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
    $datagridMapper->add('titre', TranslationFieldFilter::class);
}

    /**/protected function configureListFields(ListMapper $listMapper)
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