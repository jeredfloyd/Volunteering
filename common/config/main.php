<?php
$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'showScriptName' => false,
			'enablePrettyUrl' => true,
			'rules' => [
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:[\w\-]+>/<id:\d+>/<uid:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:[\w\-]+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			],
		],
		'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => 'set in main-local.php',
            'secret' => 'set in main-local.php',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => [
        ],
    ];
}

return $config;
