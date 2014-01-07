<?php

use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use SilexAssetic\AsseticServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

$loader = require __DIR__ . '/../vendor/autoload.php';
//require '../vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$app->register(new HttpCacheServiceProvider());

$app->register(new SessionServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'dev' => array(
            'pattern' => '^/(_(profiler|wdt)|css|images|js)/',
            'security' => false
        ),
        'main' => array(
            'pattern' => '^/.*$',
            'anonymous' => true,
            'form' => array(
                'login_path' => '/login',
                'check_path' => '/login_check'
            ),
            'logout' => array('logout_path' => '/logout'),
            'users' => $app->share(function () use ($app) {
                return new Smart\User\UserProvider($app['db']);
            }),
        ),
    ),
    'security.access_rules' => array(
        array('^/login', 'IS_AUTHENTICATED_ANONYMOUSLY'),
        array('^/register', 'IS_AUTHENTICATED_ANONYMOUSLY'),
        array('^/admin', 'ROLE_ADMIN'),
        array('^/locations', 'ROLE_USER'),
    ),
    'security.role_hierarchy' => array(
        'ROLE_MANAGER' => array('ROLE_USER'),
        'ROLE_BUSINESS' => array('ROLE_USER'),
        'ROLE_MASTER' => array('ROLE_USER'),
        'ROLE_ADMIN' => array('ROLE_USER'),
    )
));
$app['security.authentication.success_handler.main'] = $app->share(function ($app) {
    return new Smart\Handler\successHandler($app);
});
$app['security.smart.user'] = $app->share(function ($app) {
    if ($app['security']->isGranted('ROLE_USER')) {
        $token = $app['security']->getToken();
        $currentUser = $token->getUser();
        $user = $app['orm.em']->getRepository('Entities\Users')->findByUsername($currentUser->getUsername());
        return $user[0];
    } else {
        return FALSE;
    }
});

$app['security.encoder.digest'] = $app->share(function ($app) {
    return new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', false, 1);
});

$app->register(new TranslationServiceProvider());
$app['translator'] = $app->share($app->extend('translator', function ($translator, $app) {
            $translator->addLoader('yaml', new YamlFileLoader());

            $translator->addResource('yaml', __DIR__ . '/../resources/locales/fr.yml', 'fr');

            return $translator;
        }));

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/../resources/log/app.log',
    'monolog.name' => 'app',
    'monolog.level' => 300 // = Logger::WARNING
));

$app->register(new TwigServiceProvider(), array(
    'twig.options' => array(
        'cache' => isset($app['twig.options.cache']) ? $app['twig.options.cache'] : false,
        'strict_variables' => true
    ),
    'twig.form.templates' => array('form_div_layout.html.twig', 'common/form_div_layout.html.twig'),
    'twig.path' => array(__DIR__ . '/../resources/views')
));

if ($app['debug'] && isset($app['cache.path'])) {
    $app->register(new ServiceControllerServiceProvider());
    $app->register(new WebProfilerServiceProvider(), array(
        'profiler.cache_dir' => $app['cache.path'] . '/profiler',
    ));
}

if (isset($app['assetic.enabled']) && $app['assetic.enabled']) {
    $app->register(new AsseticServiceProvider(), array(
        'assetic.options' => array(
            'debug' => $app['debug'],
            'auto_dump_assets' => $app['debug'],
        )
    ));

    $app['assetic.filter_manager'] = $app->share(
            $app->extend('assetic.filter_manager', function ($fm, $app) {
                $fm->set('lessphp', new Assetic\Filter\LessphpFilter());

                return $fm;
            })
    );

    $app['assetic.asset_manager'] = $app->share(
            $app->extend('assetic.asset_manager', function ($am, $app) {
                $am->set('styles', new Assetic\Asset\AssetCache(
                        new Assetic\Asset\GlobAsset(
                        $app['assetic.input.path_to_css'], array($app['assetic.filter_manager']->get('lessphp'))
                        ), new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
                ));
                $am->get('styles')->setTargetPath($app['assetic.output.path_to_css']);

                $am->set('scripts', new Assetic\Asset\AssetCache(
                        new Assetic\Asset\GlobAsset($app['assetic.input.path_to_js']), new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
                ));
                $am->get('scripts')->setTargetPath($app['assetic.output.path_to_js']);

                return $am;
            })
    );
}
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => '../../resources/cache/doctrine/proxy',
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type" => "annotation",
                "namespace" => "Entities",
                "path" => __DIR__ . "/Entities",
                'use_simple_annotation_reader' => false
            ),
        ),
    ),
));
//$app->register(new Silex\Provider\SwiftmailerServiceProvider());
$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'username' => 'mail2nisam@gmail.com',
        'password' => 'same2you',
        'encryption' => 'ssl',
        'auth_mode' => 'login')
));
return $app;
