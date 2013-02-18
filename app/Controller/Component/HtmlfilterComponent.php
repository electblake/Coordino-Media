<?
	class HtmlfilterComponent extends Object {
		public $htmlFilter;
		public $controller;
		/**
		 * Import the HTML Filter vendor files and instantiate the object.
		 */
		public function initialize($controller) {
			
			/**
			 * Import the Markdownify vendor files.
			 */
			//App::import('Vendor', 'htmlfilter/htmlfilter');
			//$this->htmlFilter = new HtmlFilter;
			

			App::uses('HtmlFilter', 'Vendor/HtmlFilter', array('file' => 'htmlfilter.php'));
			$this->controller = $controller;
			$this->controller->htmlFilter = new HtmlFilter;
		}
		public function startup($controller) {
			$this->controller = $controller;
		}
		public function filter($content) {
			return $this->htmlFilter->filter($content);
		}

		public function beforeRender() {
			
		}
	}
?>