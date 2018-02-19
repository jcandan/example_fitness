<?php

namespace Drupal\example_fitness\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Exercise entities.
 *
 * @ingroup example_fitness
 */
interface ExerciseEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Exercise name.
   *
   * @return string
   *   Name of the Exercise.
   */
  public function getName();

  /**
   * Sets the Exercise name.
   *
   * @param string $name
   *   The Exercise name.
   *
   * @return \Drupal\example_fitness\Entity\ExerciseEntityInterface
   *   The called Exercise entity.
   */
  public function setName($name);

  /**
   * Gets the Exercise creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Exercise.
   */
  public function getCreatedTime();

  /**
   * Sets the Exercise creation timestamp.
   *
   * @param int $timestamp
   *   The Exercise creation timestamp.
   *
   * @return \Drupal\example_fitness\Entity\ExerciseEntityInterface
   *   The called Exercise entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Exercise published status indicator.
   *
   * Unpublished Exercise are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Exercise is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Exercise.
   *
   * @param bool $published
   *   TRUE to set this Exercise to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\example_fitness\Entity\ExerciseEntityInterface
   *   The called Exercise entity.
   */
  public function setPublished($published);

}
