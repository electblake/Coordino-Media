<?php
class MarkdownComponent extends Component {
		
	public $controller;
	
	/**
	 * Import the Markdownify vendor files and instantiate the object.
	 */
	public function initialize() {
		
		/**
		 * Import the Markdownify vendor files.
		 */
		//App::import('Vendor', 'markdown/markdown');
		App::uses('Markdown', 'Vendor/Markdownify', array('file' => 'markdown.php'));
	}
	
  /**
   * parse a Text string
   *
   * @param string $textInput
   * @return string markdown formatted
   */
	public function parseString($textInput) {
		return Markdown($textInput);
	}
}
?>