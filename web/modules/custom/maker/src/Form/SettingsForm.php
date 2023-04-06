<?php

namespace Drupal\maker\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure maker CMS settings for this site.
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
    return ['maker.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $ads_per_paragraph = $this->config('maker.settings')->get('ads_per_paragraph');

    $form['ads_per_paragraph'] = [
      '#type' => 'number',
      '#title' => $this->t('Ads per paragraph'),
      '#default_value' => empty($ads_per_paragraph) ? 2 : $ads_per_paragraph,
      '#description' => $this->t('Number of ads to insert after every X paragraphs (body values).'),
    ];

    // Create 5 ad slots with sample ad embeds for article pages.
    for ($i = 1; $i <= 5; $i++) {
      $form['ad_slot_' . $i] = [
        '#type' => 'text_format',
        '#format' => 'embed',
        '#title' => $this->t('Article Ad Slot @i', ['@i' => $i]),
        '#default_value' => $this->config('maker.settings')->get('ad_slot_' . $i),
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
      $this->config('maker.settings')
        ->set('ad_slot_' . $i, $form_state->getValue('ad_slot_' . $i)['value'])
        ->save();
    }

    $this->config('maker.settings')
      ->set('ads_per_paragraph', $form_state->getValue('ads_per_paragraph'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
