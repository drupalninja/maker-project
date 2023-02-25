<?php

namespace Drupal\creator\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Creator CMS settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'creator_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['creator.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // Create 5 ad slots with sample ad embeds for article pages.
    for ($i = 1; $i <= 5; $i++) {
      $form['ad_slot_' . $i] = [
        '#type' => 'text_format',
        '#format' => 'embed',
        '#title' => $this->t('Article Ad Slot @i', ['@i' => $i]),
        '#default_value' => $this->config('creator.settings')->get('ad_slot_' . $i),
        '#description' => $this->t('Pasted third-party embed script for Ad slot @i.', ['@i' => $i]),
      ];
    }

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

    // Save the article ad slots.
    for ($i = 1; $i <= 5; $i++) {
      $this->config('creator.settings')
        ->set('ad_slot_' . $i, $form_state->getValue('ad_slot_' . $i)['value'])
        ->save();
    }

    parent::submitForm($form, $form_state);
  }

}
