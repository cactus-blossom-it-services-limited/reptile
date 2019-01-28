<?php

namespace Drupal\reptile\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ImageReplaceTwo.
 */
class ImageReplaceTwo extends FormBase
{


    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'image_replace_two';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['image1'] = [
            '#type' => 'checkbox',
            '#description' => $this->t(''),
            '#weight' => '0',
            '#image_replace' => TRUE,
            '#image_tag' => array
            (
                '#markup' => '<img class="img-fluid" src="https://github.com/cactus-blossom-it-services-limited/millais/blob/master/radio-image-1.jpeg?raw=true"/>',
            ),
            '#attributes' => array(
                'name' => 'image_checkbox',
                'value' => 1,
            ),
        ];
        $form['image2'] = [
            '#type' => 'checkbox',
            '#description' => $this->t(''),
            '#weight' => '1',
            '#image_replace' => TRUE,
            '#image_tag' => array
            (
                '#markup' => '<img class="img-fluid" src="https://github.com/cactus-blossom-it-services-limited/millais/blob/master/radio-image-2.jpeg?raw=true"/>',
            ),
            '#attributes' => array(
                'name' => 'image_checkbox',
                'value' => 2,
            ),
        ];
        $form['image3'] = [
            '#type' => 'checkbox',
            '#description' => $this->t(''),
            '#weight' => '2',
            '#image_replace' => TRUE,
            '#image_tag' => array
            (
                '#markup' => '<img class="img-fluid" src="https://github.com/cactus-blossom-it-services-limited/millais/blob/master/radio-image-3.jpeg?raw=true"/>',
            ),
            '#attributes' => array(
                'name' => 'image_checkbox',
                'value' => 3,
            ),
        ];
        $form['image4'] = [
            '#type' => 'checkbox',
            '#description' => $this->t(''),
            '#weight' => '3',
            '#image_replace' => TRUE,
            '#image_tag' => array
            (
                '#markup' => '<img class="img-fluid" src="https://github.com/cactus-blossom-it-services-limited/millais/blob/master/radio-image-4.jpeg?raw=true"/>',
            ),
            '#attributes' => array(
                'name' => 'image_checkbox',
                'value' => 4,
                'checked' => FALSE,

            ),
        ];
        $form['image5'] = [
            '#type' => 'checkbox',
            '#description' => $this->t(''),
            '#weight' => '4',
            '#image_replace' => TRUE,
            '#image_tag' => array
            (
                '#markup' => '<img class="img-fluid" src="https://github.com/cactus-blossom-it-services-limited/millais/blob/master/radio-image-5.jpeg?raw=true"/>',
            ),
            '#attributes' => array(
                'name' => 'image_checkbox',
                'value' => 5,

            ),
        ];

        // Group submit handlers in an actions element with a key of "actions" so
        // that it gets styled correctly, and so that other modules may add actions
        // to the form. This is not required, but is convention.
        $form['actions'] = [
            '#type' => 'actions',
        ];

        // Add a submit button that handles the submission of the form.
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        $form['#theme'] = 'form__image_replace_two';

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        parent::validateForm($form, $form_state);

    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }

    }

}
