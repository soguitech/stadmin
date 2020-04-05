<?php

return [
    'title' => 'SOGUITECH',
    'nav_bar_title' => 'SOGUITECH',
    'path_nav_bar_img' => env('STADMIN_PATH_NAV_BAR_IMG', ''),

    'auth' => [
        'username' => 'email',

        'controller' => Soguitech\Stadmin\Http\Controllers\AuthController::class,

        'guard' => 'admin',

        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ]
        ],

        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => Soguitech\Stadmin\Models\Auth\Admin::class,
            ]
        ],

        // Add "remember me" to login form
        'remember' => true,

        // Redirect to the specified URI when user is not authorized.
       // 'redirect_to' => route('stadmin.showLoginForm'),

        // The URIs that should be excluded from authorization.
       /* 'excepts' => [
            route('stadmin.showLoginForm'),
        ]*/
    ],

    'models' => [
        'blog' => Soguitech\Stadmin\Models\Blog::class,
        'permission' => Soguitech\Stadmin\Models\Permission::class,
        'role' => Soguitech\Stadmin\Models\Role::class,
        'project' => Soguitech\Stadmin\Models\Project::class,
        'user' => Soguitech\Stadmin\Models\Auth\Admin::class,
        'tag' => Soguitech\Stadmin\Models\Tag::class,
        'category' => Soguitech\Stadmin\Models\Category::class,
        'statut' => Soguitech\Stadmin\Models\Statut::class,

    ],

    'table_names' => [

        'blogs' => 'blogs',
        'categories' => 'categories',
        'roles' => 'roles',
        'tags' => 'tags',
        'projects' => 'projects',
        'teams' => 'teams',
        'clients' => 'clients',
        'permissions' => 'permissions',
        'users' => 'admins',
        'statuts' => 'statuts',


        'model_has_articles' => 'admin_article',
        'blog_has_tag' => 'blog_tag',
        'user_has_permissions' => 'admin_permission',
        'user_has_roles' => 'admin_role',
        'role_has_permissions' => 'permission_role',
    ],

    'route' => [
        'prefix' => env('STADMIN_ROUTE_PREFIX', 'stadmin'),
        'loginRoute' => config('stadmin.route.prefix') . '/login',
        'dashRoute' => config('stadmin.route.prefix') . '/dashboard'
    ],

    'path_logo_img' => env('STADMIN_PATH_LOGO_IMG', '/img/vendor/stadmin/logo.png'),

    'database' => [
        // Database connection for following tables.
        'connection' => '',
    ],

    'column_names' => [
        'model_morph_key' => 'model_id',
    ],

    'https' => env('ADMIN_HTTPS', false),

    'login_background_image' => '',

    'default_avatar' => '/img/vendor/stadmin/avatars/256-512.png',

    'check_route_permission' => true,

    'check_menu_roles'       => true,

    'skin' => 'skin-blue-light',

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