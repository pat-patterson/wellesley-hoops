<?php

/* Add Default Styling */

drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/default.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));

/* Custom Styles */

$style = theme_get_setting('style');

switch ($style) {
	case 0:
		drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/style1.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
		break;
	case 1:
		drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/style2.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
		break;
	case 2:
		drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/style3.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
		break;
	case 3:
		drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/style4.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
		break;
	case 4:
		drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/style5.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
		break;
	default:
		drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/style1.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
}

/* Get Custom CSS */

$css = theme_get_setting('css');

  if  ($css == 1) {
    drupal_add_css(drupal_get_path('theme', 'amoeba') . '/css/custom.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE)); 
  } 


/* Breadcrumbs */

function amoeba_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Adding the title of the current page to the breadcrumb.
    $breadcrumb[] = drupal_get_title();
   
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb"><div class="breadcrumb-inner">' . implode(' / ', $breadcrumb) . '</div></div>';
    return $output;
  }
}

/* First & Last Classes on Blocks */

function amoeba_preprocess_block(&$variables, $hook) {
  // Classes describing the position of the block within the region.
  if ($variables['block_id'] == 1) {
    $variables['classes_array'][] = 'first';
  }
  // The last_in_region property is set in zen_page_alter().
  if (isset($variables['block']->last_in_region)) {
    $variables['classes_array'][] = 'last';
  }
  $variables['classes_array'][] = $variables['block_zebra'];
}

function amoeba_page_alter(&$page) {
  // Look in each visible region for blocks.
  foreach (system_region_list($GLOBALS['theme'], REGIONS_VISIBLE) as $region => $name) {
    if (!empty($page[$region])) {
      // Find the last block in the region.
      $blocks = array_reverse(element_children($page[$region]));
      while ($blocks && !isset($page[$region][$blocks[0]]['#block'])) {
        array_shift($blocks);
      }
      if ($blocks) {
        $page[$region][$blocks[0]]['#block']->last_in_region = TRUE;
      }
    }
  }
}

function amoeba_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'page__'. str_replace('_', '--', $vars['node']->type);
  }
}
