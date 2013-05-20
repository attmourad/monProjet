<?php
class I18nData extends XmlData {
	public function readDataIntoArray($lan="") {
		$stringsDoc = $this -> getXmlDoc();
		$groupElts = $stringsDoc -> getElementsByTagName("group");
		// Produire un tableau associatif PHP contenant toutes les valeurs textuelles
		$s = array();
		for ($i=0; $i < $groupElts->length; $i++) { 
			$currGroup = $groupElts->item($i);
			$currGroupName = $currGroup->getAttribute('name');
			$s[$currGroupName] = array();
			$groupStrings = $currGroup -> getElementsByTagName('string');
			for ($j=0; $j < $groupStrings->length; $j++) { 
				$currString = $groupStrings->item($j);
				$s[$currGroupName][$currString->getAttribute('name')] = 
					$currString->nodeValue;
			}
		}
		return $s;
	}
}

?>