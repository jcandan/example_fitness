<?php

namespace Drupal\example_fitness\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceEntityFormatter;

/**
 * Plugin implementation of the 'entity_relationship_field_with_time_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "entity_relationship_field_with_time_formatter",
 *   label = @Translation("Entity relationship field with time formatter"),
 *   field_types = {
 *     "entity_relationship_field_with_time"
 *   }
 * )
 */
class EntityRelationshipFieldWithTimeFormatter extends EntityReferenceEntityFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $field_items, $langcode) {
    $elements = parent::viewElements($field_items, $langcode);

    foreach ($elements as $delta => $item) {
      $items = [];

      $additional_field = $field_items[$delta]->get('time')->getValue();
      $items[] = [
        '#theme' => 'hms',
        '#format' => 'hh:mm:ss',
        '#value' => $additional_field,
      ];
      $items[] = $elements[$delta];

      $elements[$delta] = $items;
    }

    return $elements;
  }

}
