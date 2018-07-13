<?php

namespace GCF\MainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\TranslationBundle\Filter\TranslationFieldFilter;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Form\Type\AdminType;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use FM\ElfinderBundle\Form\Type\ElFinderType;

class ActeurAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Gestion les Acteurs', ['class' => 'col-md-8'])
                ->add('logo', ElFinderType::class, ['instance' => 'form_image', 'enable' => true,'required' => false])
                ->add('nom')
                ->add('nomcomplet')
                ->add('description', CKEditorType::class, array(
                        'config' => array(
                            'filebrowserBrowseRoute' => 'elfinder',
                            'filebrowserBrowseRouteParameters' => array(
                                'instance' => 'default',
                                'homeFolder' => ''
                            )
                        ),
                    )
                )          //, 'textarea', array('attr' => array('class' => 'ckeditor')))
                ->add('hierarchie', CKEditorType::class, ['required' => false])        //, 'textarea', array('attr' => array('class' => 'ckeditor')))
                ->add('mission', CKEditorType::class, ['required' => false])        //, 'textarea', array('attr' => array('class' => 'ckeditor')))
                ->add('fichier', ElFinderType::class, ['instance' => 'form_pdf', 'enable' => true, 'required' => false,])
                /*->add('adresse', SimpleFormatterType::class, array(
                    'format' => 'markdown',
                    'ckeditor_context' => 'default'))
                 * 
                 */
                ->add('adresse', CKEditorType::class, ['required' => false])        //, 'textarea', array('attr' => array('class' => 'ckeditor')))
                ->add('email')
                ->add('tel')
                ->add('fax')
                ->add('siteweb') 
                /*
                ->add('acteurParent','sonata_type_model_autocomplete',
                    array(
                        'required' => false,
                        'multiple' => false,
                        'minimum_input_length' => 1,
                        'property' => 'nom',
                        'to_string_callback' => function($enitity, $property) {
                            return $enitity->getNom();
                        },
                    )
                )
                 * 
                 */

                ->add('acteurParent')/*, ModelType::class, [
                    'required' => false,
                    'attr' => [
                        'data-sonata-select2' => 'true',
                        'data-sonata-select2-allow-clear' => 'true'
                    ]
                ])*/
                ->add('secteurActeur')/*, ModelType::class, [
                    'attr' => [
                        'data-sonata-select2' => 'true'
                    ]
                ])*/
            ->end()


                
            ->with('Responsable accès à l\'information', ['class' => 'col-md-4'])
                ->add('responsable', 'text', array('label' => "Nom", 'required' => false))
                ->add('telresponsable', 'text', array('label' => "Téléphone", 'required' => false))
                ->add('emailresponsable', 'text', array('label' => "Email", 'required' => false))
            ->end();
//->add('critique')

            
            /*  
            ->add('secteurActeur','sonata_type_model_autocomplete',
                array(
                    'required' => false,
                    'multiple' => false,
                    'property' => 'nom',
                    'to_string_callback' => function($enitity, $property) {
                        return $enitity->getNom();
                    },
                )
            )
        
             */


            /*
            ->add('secteurActeur', ModelType::class, [
                'attr' => [
                    'data-sonata-select2' => 'true'
                ]
            ])*/
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nomcomplet', TranslationFieldFilter::class) ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('nomcomplet', TranslationFieldList::class)
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