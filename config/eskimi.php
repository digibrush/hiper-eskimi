<?php

return [
    /*
    * --------------------------------------------------------------------------
    *  Base Url
    * --------------------------------------------------------------------------
    *
    * This is where you can configure Eskimi base url, based on the
    * application environment. On production, the value should set to
    * https://dsp-api.eskimi.com/
    *
    */

    'base_url' => env('ESKIMI_BASE_URL', 'https://dsp-api.eskimi.com/'),

    /*
    * --------------------------------------------------------------------------
    *  Grant Type
    * --------------------------------------------------------------------------
     * This must be set to "eskimi_dsp"
     */

    'grant_type' => env('ESKIMI_GRANT_TYPE', 'eskimi_dsp'),

    /*
    * --------------------------------------------------------------------------
    *  User Name
    * --------------------------------------------------------------------------
     * This is the Eskimi DSP username/email you use to log into Eskimi web
     * portal
     */

    'username' => env('ESKIMI_DSP_USERNAME'),

    /*
    * --------------------------------------------------------------------------
    *  Password
    * --------------------------------------------------------------------------
     * This is the Eskimi DSP password you use to log into Eskimi web
     * portal
     */

    'password' => env('ESKIMI_DSP_PASSWORD'),

    /*
    * --------------------------------------------------------------------------
    *  Client Id
    * --------------------------------------------------------------------------
     * This needs to be the client id of the MASTER ACCOUNT (not the child
     * accounts; how ever the child account information can be accessed through
     * this connection).
     */

    'client_id' => env('ESKIMI_CLIENT_ID'),

    /*
    * --------------------------------------------------------------------------
    *  Client Secret
    * --------------------------------------------------------------------------
     * This needs to be the client secret of the MASTER ACCOUNT (not the child
     * accounts; how ever the child account information can be accessed through
     * this connection).
     */

    'access_token' => env('ESKIMI_CLIENT_SECRET'),

    /*
    * --------------------------------------------------------------------------
    *  Access Token
    * --------------------------------------------------------------------------
     * This Token will be generated using the above information and will be used
     * to directly access the data from Eskimi
     */

    'refresh_token' => env('ESKIMI_ACCESS_TOKEN'),

    /*
    * --------------------------------------------------------------------------
    *  Refresh Token
    * --------------------------------------------------------------------------
     * This Token will be generated using the above information
     */

    'client_secret' => env('ESKIMI_REFRESH_TOKEN'),
];
