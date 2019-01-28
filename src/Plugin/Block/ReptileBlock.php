<?php

namespace Drupal\reptile\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\reptile\Form\ImageReplaceTwo;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Image replace form' block.
 *
 * This demonstrates the use of the form_builder service, an
 * instance of \Drupal\Core\Form\FormBuilder, in order to retrieve and display
 * a form.
 *
 * Cela démontre l'utilisation du service form_builder, une instance de \Drupal\Core\Form\FormBuilder, pour
 * récupérer et afficher un formulaire.
 *
 * Questo dimostra l'uso del servizio form_builder, un'istanza del \Drupal\Core\Form\FormBuilder, per recuperare e visualizzare un modulo.
 *
 * @Block(
 *   id = "image_replace_two",
 *   admin_label = @Translation("Image replace form")
 * )
 */
class ReptileBlock extends BlockBase implements ContainerFactoryPluginInterface {

    /**
     * Form builder service.
     *
     * @var \Drupal\Core\Form\FormBuilderInterface
     */
    protected $formBuilder;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilderInterface $form_builder) {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->formBuilder = $form_builder;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('form_builder')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build() {
        $output = [
            'description' => [
                '#markup' => $this->t('Using form provided by @classname', ['@classname' => ImageReplaceTwo::class]),
            ],
        ];

        // Use the form builder service to retrieve a form by providing the full
        // name of the class that implements the form you want to display. getForm()
        // will return a render array representing the form that can be used
        // anywhere render arrays are used.
        //
        // In this case the build() method of a block plugin is expected to return
        // a render array so we add the form to the existing output and return it.
        $output['form'] = $this->formBuilder->getForm(ImageReplaceTwo::class);
        return $output;
    }

}
