<?php

namespace Drupal\auto_height\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure auto_height settings.
 */
class AutoHeightSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'auto_height_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['auto_height.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('auto_height.settings');

    $form['auto_height_intro'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $this->t('jQuery Auto Height module dynamically adjust column heights, matching the biggest column in each Row.'),
    ];

    $form['auto_height_selectors'] = [
      '#type' => 'textarea',
      '#title' => $this->t('jQuery Class Selectors'),
      '#default_value' => $config->get('class_selectors'),
      '#rows' => 3,
      '#description' => $this->t('Enter jQuery class selectors for your row column elements e.g., ".classname". Use a new line for each selector.'),
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('auto_height.settings');
    $config
      ->set('class_selectors', $form_state->getValue('auto_height_selectors'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
