<?php

/**
 * @file
 * Contains exercise.page.inc.
 *
 * Page callback for Exercise entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Exercise templates.
 *
 * Default template: exercise.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_exercise(array &$variables) {
  // Fetch ExerciseEntity Entity Object.
  $exercise = $variables['elements']['#exercise'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
