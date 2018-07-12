<?php
namespace GCF\MainBundle\Admin;

use FM\ElfinderBundle\Form\Type\ElFinderType;
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
            ->with('Gestion des actualités', ['class' => 'col-md-8'])
                ->add('titre')
                ->add('contenu',CKEditorType::class, array(
                        'config' => array(
                            'filebrowserBrowseRoute' => 'elfinder',
                            'filebrowserBrowseRouteParameters' => array(
                                'instance' => 'default',
                                'homeFolder' => ''
                            )
                        )
                    ))
            ->end()
            ->with('Image', ['class' => 'col-md-4'])
                ->add('image', ElFinderType::class, ['instance' => 'form_photo', 'enable' => true,'required' => true])
            ->end()

            ->with('etatPub', ['class' => 'col-md-4'])
                ->add('etatPub')
            ->end();
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