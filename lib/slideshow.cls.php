<?php
class SlideShow extends XmlData {
	
	/*
		Cette méthode n'est pas utilisée dans cette classe
	*/
	public function readDataIntoArray($lan) {
		return false;
	}

	/*
		Retourne un fragment de code HTML représentant le diaporama de la page d'accueil
		Le code HTML est généré par transformation du document XML qui contient les données du diaporama

		Argument : $lan - String - Chaîne de caractères représentant la langue courante du site

		Retourne : String - Une chaîne contenant un frangment de code HTML
	*/
	public function show($lan) {
		$slidesDoc = $this -> getXmlDoc();
		$xsltDoc = new DomDocument();
		$xsltDoc -> load("data/slideshow/xslt/slides2html.xslt");
		$xsltProcessor = new XSLTProcessor();
		$xsltProcessor -> importStyleSheet($xsltDoc);
		$xsltProcessor -> setParameter('','lang',$lan);
		return $xsltProcessor -> transformToXML($slidesDoc);
	}
}

?>