<?php
const DEFAULT_APP = 'FrontEnd';

if(isset($_GET['app'])) $set_app = htmlspecialchars($_GET['app']);

error_log(print_r($set_app, true), 0);

if (!isset($set_app) || !file_exists(__DIR__ . '/../App/' . $set_app)) $set_app = DEFAULT_APP;

require __DIR__ . '/../Lib/SamplePHPFramework/Psr4AutoloaderClass.php';

use \SamplePHPFramework\Psr4AutoloaderClass;

$loader = new Psr4AutoloaderClass();

$loader->register();

$loader->addNamespace('SamplePHPFramework', __DIR__ . '/../Lib/SamplePHPFramework');
$loader->addNamespace('App', __DIR__ . '/../App');
$loader->addNamespace('Model', __DIR__ . '/../Lib/vendors/Model');
$loader->addNamespace('Entity', __DIR__ . '/../Lib/vendors/Entity');
$loader->addNamespace('FormBuilder', __DIR__ . '/../Lib/vendors/FormBuilder');

$appClass = 'App\\' . $set_app . '\\' . $set_app . 'Application';

require '../vendor/autoload.php';

$app = new $appClass;
$app->run();
