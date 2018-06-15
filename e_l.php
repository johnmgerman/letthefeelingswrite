<?php

require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

//TWIG: https://www.smashingmagazine.com/2011/10/getting-started-with-php-templating/
//https://twig.symfony.com/doc/2.x/intro.html

require "feelthewrite_n.php";

$d = new johngerman\writing\poetic\FeelTheWrite_n();

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Poetry | John German</title>
<meta charset="utf-8">
<noscript>
<link rel="stylesheet" href="css/5grid/core.css">
<link rel="stylesheet" href="css/5grid/core-desktop.css">
<link rel="stylesheet" href="css/5grid/core-1200px.css">
<link rel="stylesheet" href="css/5grid/core-noscript.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style-desktop.css">
</noscript>
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
<!--[if IE 9]>
<link rel="stylesheet" href="css/style-ie9.css">
<![endif]-->
<script>
	$(document).ready(function() {
		$(".iejern").click(function() {
			$.ajax({
			  url: 'ajax_poetry_john_german.php',
			  type: 'GET',
			  data: 'poetryorelse=' + $(this).attr('i') + '&iejer=' + $(this).attr('o'),
			  success: function(data) {
				$("#p_title").html(JSON.parse(data).title);
				$("#p_kienre").html(JSON.parse(data).section);
				window.location.href = '#asdf';
			  },
			  error: function(e) {
				  alert(e);
			  }
			});
		});
	});
</script>
</head>
<body>
<div id="header-wrapper">
  <header id="header" class="5grid-layout">
    <div id="row">
      <div id="12u">
        <div id="logo">
          <h1><a href="?fogjw=poetry" class="mobileUI-site-name">Poetry</a></h1>
          <p>John German - Let the feelings write.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="12u">
        <div class="5grid-layout" id="menu">
          <nav class="mobileUI-site-nav">
            <ul>
			  <?= $twig->render('g.phtml', array( 'folders' => new \DirectoryIterator('stuff'))); ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</div>
<div id="wrapper">
  <a name="asdf"></a>
  <div class="5grid-layout" id="page-wrapper">
    <div class="row">
      <div class="3u">
        <section id="pbox1">
          <h2>Random <?= $d->ucSectionDisplay(); ?></h2>
          <ul class="style4">
			<ul>
			  <?= $twig->render('a.phtml', array( 'PoetryStuff' => $d->kweruower())); ?>
          </ul>
        </section>
      </div>
      <div class="9u mobileUI-main-content">
        <section id="pbox3">
          <h2><center><span id="p_title"><?= $d->setupTitle(''); ?></span></center></h2>
          <p><center  style="line-height: 22px"><span id="p_kienre"><?= $d->titleContents(false); ?></span>
		  <br />
			--------------
		  <br />
		  <br />
		  Written by John German:<br />
		  <a href="https://www.stage32.com/johngerman" target="_blank">John German - Stage32</a></center></p>
        </section>
      </div>
    </div>
  </div>
</div>
<div class="5grid-layout" id="marketing">
  <div class="row">
    <div class="3u">
      <section>
        <h2><?= $d->ucSectionDisplay(); ?></h2>
		
        <ul class="style3">
		  <?= $d->kerjlwer('m', 0,$d->kenero()); ?>
        </ul>
      </section>
    </div>
    <div class="3u">
      <section>
        <h2><?= $d->ucSectionDisplay(); ?> continued</h2>
        <ul class="style3">
		  <?= $d->kerjlwer('m', ($d->kenero() + 1),($d->kenero() + $d->kenero()) + 1); ?>
        </ul>
      </section>
    </div>
    <div class="3u">
      <section>
        <h2><?= $d->ucSectionDisplay(); ?> continued</h2>
        <ul class="style3">
		  <?= $d->kerjlwer('m',($d->kenero() + $d->kenero()) + 2,($d->kenero() + $d->kenero() + $d->kenero()) + 1); ?>
        </ul>
      </section>
    </div>
    <div class="3u">
      <section>
        <h2><?= $d->ucSectionDisplay(); ?> continued</h2>
        <ul class="style3">
		  <?= $d->kerjlwer('m',($d->kenero() + $d->kenero() + $d->kenero()) + 2,$d->getCount() - 1); ?>
        </ul>
      </section>
    </div>
  </div>
</div>
<div class="5grid-layout" id="copyright">
  <div class="row">
    <div class="12u">
      <section>
        <p>&copy; JOHN GERMAN - LET THE FEELINGS WRITE. | Images: <a href="http://fotogrph.com/">Fotogrph</a> | Design: <a href="http://html5templates.com/">HTML5Templates.com</a></p>
      </section>
    </div>
  </div>
</div>
</body>
</html>