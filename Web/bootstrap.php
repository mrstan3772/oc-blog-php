<?php
const DEFAULT_APP = 'FrontEnd';

$app = filter_input(INPUT_GET, $_GET['app'], FILTER_SANITIZE_STRING);

if (!isset($app) || !file_exists(__DIR__.'/../App/'.$app)) $app = DEFAULT_APP;

require __DIR__.'/../Lib/SamplePHPFramework/Psr4AutoloaderClass.php';

use \SamplePHPFramework\Psr4AutoloaderClass;

$loader = new Psr4AutoloaderClass();

$loader->register();

$loader->addNamespace('SamplePHPFramework', __DIR__.'/../Lib/SamplePHPFramework');
$loader->addNamespace('App', __DIR__.'/../App');
$loader->addNamespace('Model', __DIR__.'/../Lib/vendors/Model');
$loader->addNamespace('Entity', __DIR__.'/../Lib/vendors/Entity');
$loader->addNamespace('FormBuilder', __DIR__.'/../Lib/vendors/FormBuilder');

$appClass = 'App\\'.$app.'\\'.$app.'Application';

require '../vendor/autoload.php';

$app = new $appClass;
$app->run();