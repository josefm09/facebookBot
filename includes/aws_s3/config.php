<?php

return array(
    // Bootstrap the configuration file with AWS specific features
    'includes' => array('_aws'),
    'services' => array(
        // All AWS clients extend from 'default_settings'. Here we are
        // overriding 'default_settings' with our default credentials and
        // providing a default region setting.
        'default_settings' => array(
            'params' => array(
                'credentials' => array(
                    'key'    => 'AKIAIAQQ5RJRG54SGA2A',
                    'secret' => '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',
                ),
                'region' => 'eu-central-1'
            )
        )
    )
);
?>
