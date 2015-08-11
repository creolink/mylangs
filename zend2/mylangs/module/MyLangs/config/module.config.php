<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'MyLangs\Controller\MyLangs' => 'MyLangs\Controller\MyLangsController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'mylangs/index/index' => __DIR__ . '/../view/mylangs/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'mylangs' => __DIR__ . '/../view',
        ),
    ),
);
