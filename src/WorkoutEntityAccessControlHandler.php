<?php

namespace Drupal\example_fitness;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Workout entity.
 *
 * @see \Drupal\example_fitness\Entity\WorkoutEntity.
 */
class WorkoutEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\example_fitness\Entity\WorkoutEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished workout entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published workout entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit workout entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete workout entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add workout entities');
  }

}
