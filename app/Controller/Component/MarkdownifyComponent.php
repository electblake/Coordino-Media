<?
	class MarkdownifyComponent extends Component {
		
		/**
		 * Define the Markdownify varaible.
		 */
		public $markdownify;
		public $controller;

		public function __construct(ComponentCollection $collection, $settings = array()) {
			parent::__construct($collection, $settings);
		}

		/**
		 * Import the Markdownify vendor files and instantiate the object.
		 */
		public function initialize($controller) {
			//App::import('Vendor', 'markdownify/markdownify');
			App::uses('Markdownify', 'Vendor/Markdownify', array('file' => 'markdownify.php'));
			$this->controller = $controller;
			/**
			 * instantiate the Mardownify object.
			 */
			$this->markdownify = new Markdownify;
		}
		
	  /**
	   * parse a HTML string
	   *
	   * @param string $html
	   * @return string markdown formatted
	   */
		public function parseString($htmlInput) {
			return $this->markdownify->parseString($htmlInput);
		}
	}
?>