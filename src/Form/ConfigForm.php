<?php

namespace Drupal\burdamagazine_lift\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ConfigForm.
 *
 * @package Drupal\burdamagazine_lift\Form
 */
class ConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'burdamagazine_lift.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('burdamagazine_lift.settings');

    $form['enable_search_engine_filter'] = array(
      '#type' => 'checkbox',
      '#title' => t('Enable search engine filter'),
      '#description' => t('Enable this checkbox to filter out search engine traffic.'),
      '#default_value' => $config->get('enable_search_engine_filter'),
    );

    return parent::buildForm($form, $form_state);
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
    parent::submitForm($form, $form_state);

    $this->config('burdamagazine_lift.settings')
      ->set('enable_search_engine_filter', $form_state->getValue('enable_search_engine_filter'))
      ->save();
  }

}
