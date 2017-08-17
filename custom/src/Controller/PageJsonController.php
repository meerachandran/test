<?php
/**
 * @file
 * Loading node and convert ito to json format.
 * Reference: drupal.org, https://www.lullabot.com/articles/what-happened-to-hook_menu-in-drupal-8
 */

//TODO: Check arguments of the menu and print json isted of dpm.

namespace Drupal\custom\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

class PageJsonController extends ControllerBase {
 
  public function pageJson($apikey, $nodeid) {
    $node = \Drupal\node\Entity\Node::load(1);
    $apikey = \Drupal::state()->get('siteapikey');
        if ($node != NULL && $apikey != "" ) {
      dpm(new JsonResponse($node));
      return [
        '#markup' => $this->t('Node to json!'),
    ]; 
      }
     else{
       return [
        '#markup' => $this->t('Access Denied!'),
    ]; 
    }
  }
}
