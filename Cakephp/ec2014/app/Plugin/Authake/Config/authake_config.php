<?php
$config = array (
  'Authake' => 
  array (
    'useDefaultLayout' => '1',
    'baseUrl' => '/',
    'service' => 'Authake',
    'loginAction' => 
    array (
      'plugin' => 'authake',
      'controller' => 'user',
      'action' => 'login',
      'named' => 
      array (
      ),
      'pass' => 
      array (
      ),
    ),
    'loggedAction' => '/',
    'sessionTimeout' => '6048000000000',
    'defaultDeniedAction' => 
    array (
      'plugin' => 'authake',
      'controller' => 'user',
      'action' => 'denied',
      'named' => 
      array (
      ),
      'pass' => 
      array (
      ),
    ),
    'rulesCacheTimeout' => '300',
    'systemEmail' => 'noreply@example.com',
    'systemReplyTo' => 'noreply@example.com',
    'passwordVerify' => '0',
    'registration' => '0',
    'defaultGroup' => '2',
    'useEmailAsUsername' => '0',
  ),
);