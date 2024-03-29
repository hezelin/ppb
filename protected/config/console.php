<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=ppb_base',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'guoan2',
            'charset' => 'utf8',
        ),

        'db2'=> require(__DIR__.'/platformDbConfig.php'),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);