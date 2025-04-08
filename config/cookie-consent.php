<?php
return [
    // The cookie name that will be used to remember the user's choice
    'cookie_name' => 'laravel_cookie_consent',

    // How long the cookie will remain valid (in minutes)
    'cookie_lifetime' => 60 * 24 * 365, // 1 year

    // Customize the message and button text as needed
    'message' => 'The website uses its own cookies to provide the site ("functional cookies") and for convenience features, as well as cookies from service providers to continuously improve the site. By clicking the "Accept all" button, you agree to this. Your consent can be revoked or changed at any time with future effect. Functional cookies will also be executed without your consent.',

    'button_text' => 'Accept all',

    // Add a link to your privacy policy
    'policy_url' => '/privacy-policy',
    'policy_url_text' => 'Privacy Policy',

    // Add a link to select different cookie options
    'settings_url' => '/cookie-settings',
    'settings_url_text' => 'Select',
];
