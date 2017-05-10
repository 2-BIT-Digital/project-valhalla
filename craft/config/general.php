<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */
return array(
    // All environments
    '*' => array(
        'omitScriptNameInUrls' => true,
        'usePathInfo' => true,
        'cacheDuration' => false,
        'useEmailAsUsername' => true,
        'generateTransformsBeforePageLoad' => true,
        'siteUrl' => getenv('SITE_URL') ?: null,
        'craftEnv' => getenv('CRAFT_ENVIRONMENT') ?: CRAFT_ENVIRONMENT,
        'pageTrigger' => 'page/',
        // Set the environment variables as per:
        // https://craftcms.com/docs/multi-environment-configs#environment-specific-variables
        'environmentVariables' => array(
            'basePath' => getenv('BASE_PATH'),
            'baseUrl' => getenv('BASE_URL'),
        ),
    ),
    // Live (production) environment
    'production' => array(
        'devMode' => false,
        'enableTemplateCaching' => true,
        'allowAutoUpdates' => false,
    ),
    // Staging (pre-production) environment
    'staging' => array(
        'devMode' => false,
        'enableTemplateCaching' => true,
        'allowAutoUpdates' => false,
    ),
    // Local (development) environment
    'development' => array(
        'devMode' => true,
        'enableTemplateCaching' => false,
        'allowAutoUpdates' => true,
    ),
);