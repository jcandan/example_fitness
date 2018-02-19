<?php

namespace Drupal\example_fitness\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Workout entities.
 *
 * @ingroup example_fitness
 */
interface WorkoutEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Workout name.
   *
   * @return string
   *   Name of the Workout.
   */
  public function getName();

  /**
   * Sets the Workout name.
   *
   * @param string $name
   *   The Workout name.
   *
   * @return \Drupal\example_fitness\Entity\WorkoutEntityInterface
   *   The called Workout entity.
   */
  public function setName($name);

  /**
   * Gets the Workout creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Workout.
   */
  public function getCreatedTime();

  /**
   * Sets the Workout creation timestamp.
   *
   * @param int $timestamp
   *   The Workout creation timestamp.
   *
   * @return \Drupal\example_fitness\Entity\WorkoutEntityInterface
   *   The called Workout entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Workout published status indicator.
   *
   * Unpublished Workout are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Workout is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Workout.
   *
   * @param bool $published
   *   TRUE to set this Workout to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\example_fitness\Entity\WorkoutEntityInterface
   *   The called Workout entity.
   */
  public function setPublished($published);

}
