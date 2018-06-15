<?php

namespace johngerman\writing\poetic
{	
	static class Tempatlish {
		private $_template;
		private $_section;
		
		public static final function create($section) {
			$this->_section = $section;
		}
		
		public static final function loadTemplate($m) {
			$this->_template = $m;
		}
		
		public static final function renderTemplate($params, $m = null)
		{
			if ($m == null)
				$m = $this->_template;
			
			if ($this->_section == null)
				$this->_section = 'templates';
			
			$i = file_get_contents($this->_section . '/' . $m);
			
			foreach ($params as $key => $value) {
				$i = str_replace('{{ ' . $key . ' }}', $value, $i);
			}
			
			return $i;
		}
	}
}

?>