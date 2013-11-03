<?php

function limitterms_admin_settings() {

  $form['limitterms_content_types_fieldset'] = array(
    '#type' => 'fieldset',
    '#title' => 'Content Types',
    '#collapsible' => true,
    '#collapsed' => true,
  );
  
  $options = node_get_types('names');
  $limited_types = variable_get('limitterms_content_types', array());
  $form['limitterms_content_types_fieldset']['limitterms_content_types'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Choose content types'),
    '#description' => t('Choose the content types for which you wish to exclude terms'),
    '#options' => $options,
    '#default_value' => $limited_types,
  );
  
  foreach(array_keys($options) as $ctype) {
    //loop through content types and see if they match
    if ($limited_types[$ctype]) {
      // add matched content type as fieldset to form.
      $form['ctypes'][$ctype] = array(
        '#type' => 'fieldset',
        '#title' => $options[$ctype],
        '#collapsible' => true,
        '#collapsed' => false,
        '#description' => t('The terms you select will be <strong>removed</strong> from the list of available terms for this content type.')
      );
      $vocabs = taxonomy_get_vocabularies($ctype);
      foreach ($vocabs as $vocab) {
        $terms = taxonomy_form($vocab->vid, variable_get('limitterms-' . $ctype . '-' . $vocab->vid, array()));
        $form['ctypes'][$ctype]['limitterms-' . $ctype . '-' . $vocab->vid] = $terms;
      }
    }
  }
  return system_settings_form($form);
}