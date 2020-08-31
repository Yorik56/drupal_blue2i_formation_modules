<?php

namespace Drupal\mon_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class MonmoduleController extends \Drupal\Core\Controller\ControllerBase {

    public function description() {
        $build = array(
            '#type' => 'markup',
            '#markup' => t('Hello world !'),
        );

        return $build;
    }

    public function requests() {

        // Requête sur tout les noeuds
        $query = \Drupal::entityQuery('node');
        $nids = $query->execute();

        // Requête sur tout les utilisateur
        $query = \Drupal::entityQuery('user');
        $uids = $query->execute();
        // Requête sur tout les commentaires
        $query = \Drupal::entityQuery('comment');
        $cids = $query->execute();

        // Filtre de requête sur tout les noeuds
        $query = \Drupal::entityQuery('node')
            ->condition('type', 'horloge');
        $filtered_nids = $query->execute();

        // dsm($nids);

        $markup = 'Node ids: ' . implode(', ', $nids);
        $markup .= '<br/>User ids:' . implode(', ', $uids);
        $markup .= '<br/>Comment ids:' . implode(', ', $cids);

        $build = array(
            '#type' => 'markup',
            '#markup' => $markup,
        );

        return $build;
    }
}