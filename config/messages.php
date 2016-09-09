<?php
/**
 * This is the configuration for generating message translations
 * for the Yii framework. It is used by the 'yiic message' command.
 */
return array(
        'sourcePath'=>dirname(__FILE__).'/../',
        'messagePath'=>dirname(__FILE__).'/../protected/messages',

        'languages'=>array('en','ar'),
        'fileTypes'=>array('php'),
        'overwrite'=>true,
        'exclude'=>array(
                '.svn',
                'yiilite.php',
                'yiit.php',
                '/i18n/data',
                '/blog',
                '/web/js',
                '/protected/gii',
                '/protected/yii',
                '/protected/messages',
                '/ext-dev',
				'/ext-prod',
                '/images',
                '/media',
                '/assets',
                '/assets',
                '/protected/vendors',
),
);