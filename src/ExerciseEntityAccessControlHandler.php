<?php

namespace Drupal\example_fitness;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Exercise entity.
 *
 * @see \Drupal\example_fitness\Entity\ExerciseEntity.
 */
class ExerciseEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\example_fitness\Entity\ExerciseEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished exercise entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published exercise entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit exercise entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete exercise entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add exercise entities');
  }

}
