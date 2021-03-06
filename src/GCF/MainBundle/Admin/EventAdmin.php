<?php

namespace GCF\MainBundle\Admin;

use GCF\MainBundle\Entity\EtatPub;
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

class EventAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Gestion des évenements', ['class' => 'col-md-8'])
                ->add('nom')
                ->add('description', CKEditorType::class, array(
                        'config' => array(
                            'filebrowserBrowseRoute' => 'elfinder',
                            'filebrowserBrowseRouteParameters' => array(
                                'instance' => 'default',
                                'homeFolder' => ''
                            )
                        ),
                    )
                )
                ->add('lienFB', 'text', ['required' => false])
                ->add('lienAutre', 'text', ['required' => false])

                ->add('photoCouverture', ElFinderType::class, ['instance' => 'form_photo', 'enable' => true, 'required' => false])
                //->add('photoAffiche', ElFinderType::class, ['instance' => 'form_photo', 'enable' => true,'required' => false])
                ->add('debut')
                ->add('fin')
                ->add('lieu')
            ->end()
            ->with('Etat de publication', ['class' => 'col-md-4'])
                ->add('etatPub')
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom', TranslationFieldFilter::class)
            ->add('etatPub');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('nom', TranslationFieldList::class)
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