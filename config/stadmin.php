<?php

return [

    'models' => [

        'article' => Soguitech\Stadmin\Models\Article::class,
        'permission' => Soguitech\Stadmin\Models\Permission::class,
        'role' => Soguitech\Stadmin\Models\Role::class,


    ],

    'table_names' => [


        'articles' => 'articles',
        'roles' => 'roles',
        'permissions' => 'permissions',


        'model_has_articles' => 'model_has_articles',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',

    ],

    'column_names' => [

        'model_morph_key' => 'model_id',
    ],

    'cache' => [

        /*
         * By default all permissions are cached for 24 hours to speed up performance.
         * When permissions or roles are updated the cache is flushed automatically.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * The cache key used to store all permissions.
         */

        'key' => 'soguitech.stadmin.cache',

        /*
         * When checking for a permission against a model by passing a Permission
         * instance to the check, this key determines what attribute on the
         * Permissions model is used to cache against.
         *
         * Ideally, this should match your preferred way of checking permissions, eg:
         * `$user->can('view-posts')` would be 'name'.
         */

        'model_key' => 'name',

        /*
         * You may optionally indicate a specific cache driver to use for permission and
         * role caching using any of the `store` drivers listed in the cache.php config
         * file. Using 'default' here means to use the `default` set in cache.php.
         */

        'store' => 'default',
    ],
];