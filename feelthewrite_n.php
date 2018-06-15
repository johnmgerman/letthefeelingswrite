<?php

namespace johngerman\writing\poetic
{
	require "PoetryStuff.php";
	
	class FeelTheWrite_n {
		const SECTION = 'stuff';
		private $_fileName;
		private $_pArray;
		
		public function kweruower() {
			$keher = array_rand($this->_pArray, 3);
			return [$this->_pArray[$keher[0]], $this->_pArray[$keher[1]], $this->_pArray[$keher[2]]];
		}
		
		function __construct() {	
			$this->listDirByDate();
		}
		
		public static function sieri($whereToGo) {
			$instance = new self();
			$instance->SECTION = $whereToGo;
			return $instance;
		}
		
		public function listDirByDate() {
			$_poetryStuff = new PoetryStuff();
			$path = self::SECTION . '/' . $this->sectionFolder();
			$dir = opendir($path);
			while($file = readdir($dir)){
				if ($file != '.' and $file != '..'){
					$_poetryStuff = new PoetryStuff();
					$title = $this->ucTitle($file);
					
					$_poetryStuff->setTitle($title);
					$_poetryStuff->setSection($this->titleContents(true));
					$_poetryStuff->setFileName($file);
					$_poetryStuff->setFolder($this->sectionFolder());
					
					$this->_pArray[] = $_poetryStuff;
				}
			}
			closedir($dir);
		}
		
		public function sectionFolder() : string {
			$n = $_GET["fogjw"] ?? 'poetry';
			return is_dir(self::SECTION . '/' . $n) ? $n : 'poetry';
		}
		
		public function ucSectionDisplay($fileInfo = null) : string {
			if ($fileInfo == null)
				$fileInfo = $this->sectionFolder();
			
			return ucwords(str_replace("songish", "Song'ish", $fileInfo));
		}
		
		public function ucTitle($fileName) : string {
			$this->_fileName = $fileName;
			return ucwords(str_replace('_', ' ', str_replace('.html', '', $fileName)));
		}
		
		public function titleContents($l) :string {
			$section = file_get_contents(self::SECTION . '/' . $this->sectionFolder() . '/' . $this->_fileName);
			
			if ($l)
				$section = substr($section, 0, strpos($section, '<'));
			
			return $section;
		}
		
		public function setupTitle($fileName = '') : string {
			if ($fileName == '') {
				$fileName = $_GET["feelme"] ?? 'a_photograph.html';
				$fogjw = $this->sectionFolder();
				
				if (file_exists(self::SECTION . '/' . $fogjw . '/' . $fileName) == false)
				{
					if ($fogjw == 'poetry')
						$fileName = 'a_photograph.html';
					else
						$fileName = 'im_home.html';
				}
			}
			
			$this->_fileName = $fileName;
			
			return $this->ucTitle($fileName);
		}
		
		public function kenero() {
			return round(count($this->_pArray) / 4);
		}
		
		public function getCount() {
			return count($this->_pArray);
		}
		
		public function kerjlwer($a, $o, $n) {
			$k = '';
			
			for($i=$o; $i <= $n; $i++)
			{		
				$k = $k . $this->doOpenStream($a . '.phtml', ['feelme' => $this->_pArray[$i]->getFileName(), 'fogjw' => $this->_pArray[$i]->getFolder(), 'title' => $this->_pArray[$i]->getTitle()]);
			}
			
			return $k;
		}
		
		private function doOpenStream($m, $params)
		{
			$i = file_get_contents('templates/' . $m);
			
			foreach ($params as $key => $value) {
				$i = str_replace('{{ ' . $key . ' }}', $value, $i);
			}
			
			return $i;
		}
	}
}

?>