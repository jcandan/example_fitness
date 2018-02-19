<?php

namespace Drupal\example_fitness\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\EntityReferenceAutocompleteWidget;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'entity_relationship_field_with_time_widget' widget.
 *
 * @FieldWidget(
 *   id = "entity_relationship_field_with_time_widget",
 *   label = @Translation("Entity relationship field with time widget"),
 *   field_types = {
 *     "entity_relationship_field_with_time"
 *   }
 * )
 */
class EntityRelationshipFieldWithTimeWidget extends EntityReferenceAutocompleteWidget {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    $element['time'] = [
      '#type' => 'hms',
      '#title' => $items[$delta]->get('time')->getDataDefinition()->getLabel(),
    ];

    return $element;
  }
}
