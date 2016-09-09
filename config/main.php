<?php

Yii::setPathOfAlias('ext-prod', dirname(__FILE__) . '/../ext-prod');
Yii::setPathOfAlias('ext-dev', dirname(__FILE__) . '/../ext-dev');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . '/../protected',
    'runtimePath' => dirname(__FILE__) . '/../wdir/runtime',
    'name' => 'Organic Juniper Tree',
    
    'theme' => 'basic',
    'defaultController' => 'site',
    'preload' => array(
        'session',
        'urlManager',
        'user',
        'booster'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.controllers.*'
    ),
    'behaviors' => array(
        'onBeginRequest' => array(
            'class' => 'application.components.behaviors.BeginRequest'
        )
    ),
    'modules' => array(
        'api',
        'message',
        'backup' => array(
            'path' => dirname(__FILE__) . '/../_backup/'
        )
    ),
    // application components
    'components' => array(
        'booster' => array(
            'class' => 'ext-prod.booster.components.Booster'
        ),
        'mailchimp' => array(
            // EMailChimp == API v1.3 integration
            'class' => 'ext-prod.mailchimp.EMailChimp',
            // please replace with your API key
            'apikey' => '89eed72be1ed6541545bb29ac5a41ba6-us13',
            // you can get your `listId` from Mailchimp panel - go to List, then List Tools, and look for the List ID entry.
            'listId' => '441bcd7073',
            // (optional - default **false**) whether to use Ecommerce360 support or not
            'ecommerce360Enabled' => false,
            // (optional - default **false**) whether to enable dev mode or not
            'devMode' => false
        ),
        'mail' => array(
            'class' => 'ext-prod.yii-mail.YiiMail',
            'transportType' => 'php',
            'viewPath' => 'application.views.mail',
            'logging' => false,
            'dryRun' => false
        ),
        'session' => array(
            'class' => 'CDbHttpSession',
            'connectionID' => 'db',
            'autoCreateSessionTable' => true
        ),
        'session' => array(
            'class' => 'CDbHttpSession',
            'connectionID' => 'db',
            'autoCreateSessionTable' => true
        ),
        'cache' => array(
            'class' => 'CFileCache'
        ),
        'user' => array(
            'class' => 'application.components.WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array(
                '/user/login'
            )
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'home' => 'site',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            )
        ),
        'db' => require (DB_CONFIG_FILE_PATH),
        'errorHandler' => array()
    )
    // 'errorAction'=>'site/error',
    ,
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require (dirname(__FILE__) . '/params.php')
);
