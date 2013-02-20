<?
	class HtmlfilterComponent extends Component {
		public $HtmlFilter;
		public $controller;
		/**
		 * Import the HTML Filter vendor files and instantiate the object.
		 */
		public function initialize($controller) {
			
			/**
			 * Import the Markdownify vendor files.
			 */
			App::uses('HtmlFilter', 'Vendor/HtmlFilter', array('file' => 'htmlfilter.php'));
			$this->controller = $controller;
			$this->HtmlFilter = new HtmlFilter;
		}
		
		public function filter($content) {
			return $this->HtmlFilter->filter($content);
		}
	}
?>