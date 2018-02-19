<?php

namespace Drupal\example_fitness\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'entity_relationship_field_with_time' field type.
 *
 * @FieldType(
 *   id = "entity_relationship_field_with_time",
 *   label = @Translation("Entity relationship field with time"),
 *   description = @Translation("A custom Entity Relationship Field with attached hours, minutes, seconds field."),
 *   default_widget = "entity_relationship_field_with_time_widget",
 *   default_formatter = "entity_relationship_field_with_time_formatter",
 *   category = @Translation("Reference"),
 *   list_class = "\Drupal\Core\Field\EntityReferenceFieldItemList",
 * )
 */
class EntityRelationshipFieldWithTime extends EntityReferenceItem {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = parent::propertyDefinitions($field_definition);

    // Prevent early t() calls by using the TranslatableMarkup.
    $properties['time'] = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Time'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = parent::schema($field_definition);

    $schema['columns']['time'] = [
      'type' => 'int',
      'length' => 11,
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {
    return ['time' => random_int(20, 120)]
      + parent::generateSampleValue($field_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function getPreconfiguredOptions() {
    $options = parent::getPreconfiguredOptions();

    foreach ($options as $delta => $option) {
      $options[$delta]['label'] = t('@label with Time field', array('@label' => $option['label']));
    }

    return $options;
  }
}
