<?php

/**
 * @file
 * Contains workout.page.inc.
 *
 * Page callback for Workout entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Workout templates.
 *
 * Default template: workout.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_workout(array &$variables) {
  // Fetch WorkoutEntity Entity Object.
  $workout = $variables['elements']['#workout'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
