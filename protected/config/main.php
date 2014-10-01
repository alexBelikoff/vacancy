<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
    Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'myYii',
        //'defaultController'=>'Vacancy',
	// preloading 'log' component
	'preload'=>array('log','bootstrap',),
        'language'=>'ru',
        'sourceLanguage'=>'ru',
        'theme'=>'bootstrap',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',           
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'class' => 'WebUser',
		),
            'log'=>array(
                'class'=>'CLogRouter',
                'enabled'=>YII_DEBUG,
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                        //'showInFireBug'=>true,
                    ),
                    /*array(
                        'class'=>'application.extensions.yii-debug-toolbar.YiiDebugToolbarRoute',
                        'ipFilters'=>array('127.0.0.1','::1'),
                    ),*/
                ),
            ),            

	// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			//'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
                    //'showScriptName'=>false,
		),

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=my_yii',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'secret',
			'charset' => 'utf8',
		),
		/*'db2'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=sakila',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'secret',
			'charset' => 'utf8',
		),*/            
                'authManager' => array(
                    // Будем использовать свой менеджер авторизации
                    'class' => 'PhpAuthManager',
                    // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
                    'defaultRoles' => array('guest'),
                ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
                'bootstrap'=>array(
                'class'=>'bootstrap.components.Bootstrap',
                ),
            'viewRenderer'=>array(
                'class'=>'ext.smarty.ESmartyViewRenderer',
            ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' =>require(dirname(__FILE__).'/params.php'),

);