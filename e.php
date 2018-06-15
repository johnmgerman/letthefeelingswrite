<?php

define('FDEERE', 'stuff/');

function listdir_by_date($path){
    $dir = opendir($path);
    $list = array();
    while($file = readdir($dir)){
        if ($file != '.' and $file != '..'){
            // add the filename, to be sure not to
            // overwrite a array key
			$title = oksouwer($file);
            $ctime = date ("F d, Y", filectime($path . $file)). ',' . $file . ',' . $title;
            $list[$ctime] = $file;
        }
    }
    closedir($dir);
    krsort($list);
    return $list;
}

$fogjw = $_GET["fogjw"] ?? 'poetry';
$iekder = str_replace("songish", "Song'ish", $fogjw);

$ewrwerw = listdir_by_date(FDEERE . $fogjw . '/');

shuffle($ewrwerw);

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
			  <?php
				  foreach (new DirectoryIterator('stuff') as $fileInfo) {
					if($fileInfo->isDir() && !$fileInfo->isDot()) {
						?><li><a href="?fogjw=<?= $fileInfo ?>"><?= str_replace("songish", "Song'ish", $fileInfo); ?></a></li><?php
					}
				  }
			  ?>
              <!--<li class="current_page_item"><a href="?fogjw=poetry">Poetry</a></li>
			  <li><a href="?fogjw=songish">Song'ish</a></li>-->
			  <!--<li><a href="rapish.html">Rap'ish</a></li>-->
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</div>
<div id="wrapper">
  <div class="5grid-layout" id="page-wrapper">
    <div class="row">
      <div class="3u">
        <section id="pbox1">
          <h2>Random <?= ucwords($iekder); ?></h2>
          <ul class="style4">
			<?php
				$ieryer = 1;
				foreach ($ewrwerw as $key => $value) {
					$title = oksouwer($value);
					
					$section = file_get_contents(FDEERE . $fogjw . '/' . $value);
					$section = substr($section, 0, strpos($section, '<'));
				
					echo "<li class=\"first\">";
					echo "	<p class=\"date\"><a href=\"?feelme=$value&fogjw=$fogjw\">$title</a></p>";
					echo "	<p><a href=\"?feelme=$value&fogjw=$fogjw\">$section</a></p>";
					echo "</li>";
					
					$ieryer = $ieryer + 1;
					
					if ($ieryer > 3)
						break;
				}
			?>
          </ul>
        </section>
      </div>
      <div class="9u mobileUI-main-content">
        <section id="pbox3">
		  <?php
			$title = $_GET["feelme"] ?? 'a_photograph.html';
			if (file_exists(FDEERE . $fogjw . '/' . $title) == false)
			{
				if ($fogjw == 'poetry')
					$title = 'a_photograph.html';
				else
					$title = 'im_home.html';
			}
			
			$section = file_get_contents(FDEERE . $fogjw . '/' . $title);
			$title = oksouwer($title);
		  ?>
          <h2><center><?= $title; ?></center></h2>
          <p><center  style="line-height: 22px"><?= $section; ?>
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
<?php
	$kwerwe = round(count($ewrwerw) / 4);
?>
<div class="5grid-layout" id="marketing">
  <div class="row">
    <div class="3u">
      <section>
        <h2><?= ucwords($iekder); ?></h2>
		
        <ul class="style3">
		  <?= kerjlwer($title,$fogjw,$ewrwerw, 0,$kwerwe); ?>
        </ul>
      </section>
    </div>
    <div class="3u">
      <section>
        <h2><?= ucwords($iekder); ?> continued</h2>
        <ul class="style3">
		  <?= kerjlwer($title,$fogjw,$ewrwerw, ($kwerwe + 1),($kwerwe + $kwerwe) + 1); ?>
        </ul>
      </section>
    </div>
    <div class="3u">
      <section>
        <h2><?= ucwords($iekder); ?> continued</h2>
        <ul class="style3">
		  <?= kerjlwer($title,$fogjw,$ewrwerw,($kwerwe + $kwerwe) + 2,($kwerwe + $kwerwe + $kwerwe) + 1); ?>
        </ul>
      </section>
    </div>
    <div class="3u">
      <section>
        <h2><?= ucwords($iekder); ?> continued</h2>
        <ul class="style3">
		  <?= kerjlwer($title,$fogjw,$ewrwerw,($kwerwe + $kwerwe + $kwerwe) + 2,count($ewrwerw) - 1); ?>
        </ul>
      </section>
    </div>
  </div>
</div>

<?php

function kerjlwer($title, $fogjw, $ewrwerw, $o, $n) {
	$new_items = ',hello.html';
	
	for($i=$o; $i <= $n; $i++)
	{
		$title = oksouwer($ewrwerw[$i]);
		?><li>
			<a href="?feelme=<?= $ewrwerw[$i]; ?>&fogjw=<?= $fogjw?>"><?= $title; ?></a>
			<?php
				if (strpos($new_items, $ewrwerw[$i]) > 0) {?>
					&nbsp;&nbsp;<img width="22" height="22" src="images/asdf.png" />
				<?php
				}
			?>
		  </li>
		<?php
	}
}

function oksouwer($awoiuere) {
	return ucwords(str_replace('_', ' ', str_replace('.html', '', $awoiuere)));
}

?>
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