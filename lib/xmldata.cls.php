<?php 
abstract class XmlData {
	private $xmlFile;

	function __construct($pFile) {
		$this -> setFile($pFile);
	}

	public function setFile($pFile) {
		if(is_file($pFile)) {
			$this -> xmlFile = $pFile;
		}
	}

	protected function getXmlDoc() {
		$doc = new DOMDocument();
		$doc -> load($this->xmlFile);
		return $doc;
	}

	public abstract function readDataIntoArray($lan);
}

?>