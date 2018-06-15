<?php

require_once 'vendor/autoload.php';
require "feelthewrite_r.php";

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->load('a_g.phtml');

$d = new johngerman\writing\poetic\FeelTheWrite_r();

echo $template->render(array(
							'folders' => new \DirectoryIterator('stuff'),
							'PoetryStuff' => $d->kweruower(),
							'i7' => $d->kjerher(($d->kenero() + $d->kenero() + $d->kenero()) + 2, (($d->getCount() - 1) - (($d->kenero() + $d->kenero() + $d->kenero()) + 2)) + 1),
							'i4' => $d->kjerher(($d->kenero() + $d->kenero()) + 2, ((($d->kenero() + $d->kenero() + $d->kenero()) + 1) - (($d->kenero() + $d->kenero()) + 2)) + 1),
							'i9' => $d->kjerher(($d->kenero() + 1), ((($d->kenero() + $d->kenero()) + 1) - ($d->kenero() + 1)) + 1),
							'i' => $d->kjerher(0, $d->kenero() + 1),
							'usd' => $d->ucSectionDisplay(),
							'onener' => $d->onener(),
							'tc' => $d->titleContents(false),
							'st' => $d->setupTitle('')
							)
						);

//TWIG: https://www.smashingmagazine.com/2011/10/getting-started-with-php-templating/
//https://twig.symfony.com/doc/2.x/intro.html

?>