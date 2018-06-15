<?php
namespace johngerman\writing\poetic
{
	class PoetryStuff {
		private $_fileName;
		private $_title;
		private $_section;
		private $_folder;
		private $_time;
		
		function __construct() {
			$_fileName = $_title = $_section = $_folder = '';
		}
		
		public function setFileName($value) {
			$this->_fileName = $value;
		}
		
		public function setTitle($value) {
			$this->_title = $value;
		}
		
		public function setSection($value) {
			$this->_section = $value;
		}
		
		public function setFolder($value) {
			$this->_folder = $value;
		}
		
		public function setTime($value) {
			if ($value) {
				$d = date_create(date("Y-m-d", $value));
				$g = date_create(date("Y-m-d", time()));
			
				$this->_time = date_diff($d, $g)->format("%R%a");
			} else {
				$this->_time = -1;
			}
		}
		
		public function getFileName() : string {
			return $this->_fileName;
		}
		
		public function getTitle() : string {
			return $this->_title;
		}
		
		public function getSection() : string {
			return $this->_section;
		}
		
		public function getFolder() : string {
			return $this->_folder;
		}
		
		public function getTime() : string {
			return ($this->_time <= 22) ? 'visible' : 'hidden';
		}
	}
}
