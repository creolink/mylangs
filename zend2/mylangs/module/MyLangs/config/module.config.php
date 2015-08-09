<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'MyLangs\Controller\MyLangs' => 'MyLangs\Controller\MyLangsController',
         ),
     ),
     'view_manager' => array(
         'template_path_stack' => array(
             'album' => __DIR__ . '/../view',
         ),
     ),
 );
