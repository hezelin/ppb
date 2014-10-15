<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap3', dirname(__FILE__).'/../extensions/YiiBooster');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'泡泡兵管理后台',
    'language'=>'zh_cn',
	'preload'=>array('log', 'booster'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'guoan',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        'auth' => array(
            'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
            'userClass' => 'TblUser', // the name of the user model class.
            'userIdColumn' => 'uid', // the name of the user id column.
            'userNameColumn' => 'name', // the name of the user name column.
            'defaultLayout' => 'webroot.themes.booster.views.layouts.clean', // the layout used by the module.
            'viewDir' => null, // the path to view files to use with this module.
        ),
	),

	'theme'=>'booster',
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'auth.components.AuthWebUser',
            'loginUrl' => array('/user/login'),
            'admins' => array('admin', 'foo', 'bar'), // users with full access
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

        'curl'=>array(
            'class'=>'ext.curl.Curl',
        ),
        'booster'=>array(
            'class'=>'bootstrap3.components.Booster',
        ),

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=ppb_base',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'guoan2',
            'charset' => 'utf8',
        ),

        'db2'=> require(__DIR__.'/platformDbConfig.php'),

        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'behaviors' => array(
                'auth' => array(
                    'class' => 'auth.components.AuthBehavior',
                ),
            ),
        ),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);