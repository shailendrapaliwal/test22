<?php

require('../vendor/autoload.php');


$app = new Silex\Application();

$app['debug'] = true;



// Register the monolog logging service

$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));


// Register view rendering

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));


// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
 
return $app['twig']->render('nav.html');
});




$a = 0;
$b = 0;
for( $i=0; $i<5; $i++ )
{
$a += 10;
$b += 5;
}
echo ("At the end of the loop a=$a and b=$b" );

$app->run();

?>