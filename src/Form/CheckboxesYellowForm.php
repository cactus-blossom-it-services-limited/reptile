<?php

namespace Drupal\reptile\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CheckboxesYellowForm.
 */
class CheckboxesYellowForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'checkboxes_yellow_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['images'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Images'),
      '#description' => $this->t('image checkboxes'),
      '#options' => ['image1' => $this->t('image1'), 'image2' => $this->t('image2'), 'image3' => $this->t('image3'), 'image4' => $this->t('image4'), 'image5' => $this->t('image5')],
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }


    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Find out what was submitted.
        $values = $form_state->getValues();
        foreach ($values as $key => $value) {
            $label = isset($form[$key]['#title']) ? $form[$key]['#title'] : $key;

            // Many arrays return 0 for unselected values so lets filter that out.
            if (is_array($value)) {
                $value = array_filter($value);
            }

            // Only display for controls that have titles and values.
            if ($value && $label) {
                $display_value = is_array($value) ? preg_replace('/[\n\r\s]+/', ' ', print_r($value, 1)) : $value;
                $message = $this->t('Value for %title: %value', ['%title' => $label, '%value' => $display_value]);
                $this->messenger()->addMessage($message);
            }
        }
    }

}
