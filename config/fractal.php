<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nested resource autoload
    |--------------------------------------------------------------------------
    |
    | Autoload sub level data transformers during an "input_key" variable received from user request
    |
    */
    'autoload'    => env('FRACTAL_AUTOLOAD', true),

    /*
    |--------------------------------------------------------------------------
    | Input key
    |--------------------------------------------------------------------------
    |
    | Parameter key to include extra data in transformer class from request url
    | * only values defined in transformer class $availableIncludes will be available
    |
    */
    'input_key'   => env('FRACTAL_INPUT_KEY', 'include'),

    /*
    |--------------------------------------------------------------------------
    | Exclude key
    |--------------------------------------------------------------------------
    |
    | Parameter key to excludes from request url, included resources specified in transformer class
    |
    */
    'exclude_key' => env('FRACTAL_EXCLUDE_KEY', 'exclude'),

    /*
    |--------------------------------------------------------------------------
    | Transformer class namespace
    |--------------------------------------------------------------------------
    |
    | Base namespace for generated transformer class
    |
    */
    'namespace'   => env('FRACTAL_NAMESPACE', 'App\Transformers'),

    /*
    |--------------------------------------------------------------------------
    | Transformer store path
    |--------------------------------------------------------------------------
    |
    | Store path where generated transformer class
    |
    */
    'directory'   => env('FRACTAL_DIRECTORY', 'Transformers/'),

    /*
    |--------------------------------------------------------------------------
    | Models/Entities path
    |--------------------------------------------------------------------------
    |
    | Path where transformer looking for entities to generate transformation data.
    |
    */
    'model_namespace'       => 'App',

    /*
    |--------------------------------------------------------------------------
    | Serializer
    |--------------------------------------------------------------------------
    |
    | Parameter key to excludes included resources specified in transformer class
    | * you are required to provide full namespace for custom serializer
    |
    */
    'serializer'  => env('FRACTAL_SERIALIZER', 'DataArraySerializer'), // DataArraySerializer,JsonApiSerializer, ArraySerializer


];
