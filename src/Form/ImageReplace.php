<?php

namespace Drupal\reptile\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ImageReplace.
 */
class ImageReplace extends FormBase
{


    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'image_replace';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['image_radios'] = [
            '#type' => 'radios',
            '#title' => $this->t('Image radio buttons'),
            '#description' => $this->t('none'),
            '#options' => ['Image1' => $this->t('Image1'), 'Image2' => $this->t('Image2'), 'Image3' => $this->t('Image3'), 'Image4' => $this->t('Image4'), 'Image5' => $this->t('Image5'),],
            '#weight' => '0',
        ];
        $form['submit1'] = [
            '#type' => 'button',
            '#title' => $this->t('submit'),
            '#description' => $this->t('none'),
            '#default_value' => 'Submit',
            '#weight' => '0',
        ];

        $form['image_checkboxes'] = [
            '#type' => 'checkboxes',
            '#title' => $this->t('Image checkbox buttons'),
            '#description' => $this->t('none'),
            '#options' => ['Image1' => $this->t('Image1'), 'Image2' => $this->t('Image2'), 'Image3' => $this->t('Image3'), 'Image4' => $this->t('Image4'), 'Image5' => $this->t('Image5'),],
            '#weight' => '0',
        ];
        $form['submit2'] = [
            '#type' => 'button',
            '#title' => $this->t('submit'),
            '#description' => $this->t('none'),
            '#default_value' => 'Submit',
            '#weight' => '0',
        ];


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