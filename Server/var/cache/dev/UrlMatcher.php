<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/article' => [
            [['_route' => 'app_article_getarticles', '_controller' => 'App\\Controller\\ArticleController::getArticlesAction'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_article_postarticle', '_controller' => 'App\\Controller\\ArticleController::postArticleAction'], null, ['POST' => 0], null, false, false, null],
        ],
        '/category' => [
            [['_route' => 'app_category_getcategorys', '_controller' => 'App\\Controller\\CategoryController::getCategorys'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_category_postcategory', '_controller' => 'App\\Controller\\CategoryController::postCategoryAction'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/category/new' => [[['_route' => 'app_category_new', '_controller' => 'App\\Controller\\CategoryController::new'], null, ['POST' => 0], null, false, false, null]],
        '/picture/produit' => [[['_route' => 'picture_produit_index', '_controller' => 'App\\Controller\\PictureProduitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/picture/produit/new' => [[['_route' => 'picture_produit_new', '_controller' => 'App\\Controller\\PictureProduitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/produit' => [
            [['_route' => 'app_produit_getproduits', '_controller' => 'App\\Controller\\ProduitController::getProduitsAction'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_produit_postproduit', '_controller' => 'App\\Controller\\ProduitController::postProduitAction'], null, ['POST' => 0], null, false, false, null],
        ],
        '/' => [[['_route' => 'security', '_controller' => 'App\\Controller\\SecurityController::index'], null, null, null, false, false, null]],
        '/connexion' => [[['_route' => 'security_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/deconnexion' => [[['_route' => 'security_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/api/profile' => [[['_route' => 'api-profile', '_controller' => 'App\\Controller\\SecurityController::profile'], null, null, null, false, false, null]],
        '/api/edit' => [[['_route' => 'api-edit', '_controller' => 'App\\Controller\\SecurityController::editUser'], null, null, null, false, false, null]],
        '/api/admin/users' => [[['_route' => 'app_user_allusers', '_controller' => 'App\\Controller\\UserController::allUsers'], null, ['GET' => 0], null, false, false, null]],
        '/api/admin/users/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/doc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\SecurityController::registration'], null, ['POST' => 0], null, false, false, null]],
        '/api' => [[['_route' => 'api', '_controller' => 'App\\Controller\\SecurityController::api'], null, null, null, false, false, null]],
        '/login_check' => [[['_route' => 'login_check'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/a(?'
                    .'|rticle/([^/]++)(?'
                        .'|/produit(*:200)'
                        .'|(*:208)'
                    .')'
                    .'|pi/admin/(?'
                        .'|category/([^/]++)(?'
                            .'|/edit(*:254)'
                            .'|(*:262)'
                        .')'
                        .'|users/([^/]++)(?'
                            .'|(*:288)'
                            .'|/edit(*:301)'
                            .'|(*:309)'
                        .')'
                    .')'
                .')'
                .'|/category/([^/]++)(?'
                    .'|/article(*:349)'
                    .'|(*:357)'
                .')'
                .'|/p(?'
                    .'|icture/produit/([^/]++)(?'
                        .'|(*:397)'
                        .'|/edit(*:410)'
                        .'|(*:418)'
                    .')'
                    .'|roduit/([^/]++)(?'
                        .'|/variant(*:453)'
                        .'|(*:461)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        200 => [[['_route' => 'app_article_getproduits', '_controller' => 'App\\Controller\\ArticleController::getProduits'], ['id'], ['GET' => 0], null, false, false, null]],
        208 => [[['_route' => 'app_article_getarticle', '_controller' => 'App\\Controller\\ArticleController::getArticleAction'], ['articleId'], ['GET' => 0], null, false, true, null]],
        254 => [[['_route' => 'app_category_edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], ['POST' => 0], null, false, false, null]],
        262 => [[['_route' => 'app_category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        288 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        301 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        309 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        349 => [[['_route' => 'app_category_getcategoryid', '_controller' => 'App\\Controller\\CategoryController::getCategoryId'], ['id'], ['GET' => 0], null, false, false, null]],
        357 => [[['_route' => 'app_category_getcategory', '_controller' => 'App\\Controller\\CategoryController::getCategoryAction'], ['categoryId'], ['GET' => 0], null, false, true, null]],
        397 => [[['_route' => 'picture_produit_show', '_controller' => 'App\\Controller\\PictureProduitController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        410 => [[['_route' => 'picture_produit_edit', '_controller' => 'App\\Controller\\PictureProduitController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        418 => [[['_route' => 'picture_produit_delete', '_controller' => 'App\\Controller\\PictureProduitController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        453 => [[['_route' => 'app_produit_getvariants', '_controller' => 'App\\Controller\\ProduitController::getVariantsAction'], ['id'], ['GET' => 0], null, false, false, null]],
        461 => [
            [['_route' => 'app_produit_getproduit', '_controller' => 'App\\Controller\\ProduitController::getProduitAction'], ['produitId'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
