
// Tout le code quand le DOM est prêt
$(function() {loadSlideShow();});

function loadSlideShow() {
	$.ajax({url:'data/slideshow/json/slideshow.json', 'type':'GET', dataType:'json',success:displaySlideShow});
}

function displaySlideShow(data,status,xhr) {
	if(data) {
/*
	MODIF 3 (i18n : voir la balise <html> dans le fichier 'header')
*/
		var lan = $("html").attr("lang");
		var article,img,labelDiv,subLabelDiv;
		for(var i=0; i<data.length; i++) {
			var cData = data[i];
			article = document.createElement("article");
			img = document.createElement("img");
			img.setAttribute("src","data/slideshow/images/"+cData.img);
/*
	MODIF 4 (i18n : voir aussi toutes les autres places similaires dans ce fichier)
*/
			img.setAttribute("alt",cData.texts[lan].alt);
			article.appendChild(img);
			if(cData.texts[lan].label) {
				labelDiv = document.createElement("div");
				labelDiv.setAttribute("class","label");
/*
	MODIF 2 (mise en page dans les valeurs stockées en JSON)
*/
				// UNE AUTRE CORRECTION : utilisation d'innerHTML à la place de createTextNode()
				// Si jamais la valeur du champs contient du HTML
				labelDiv.innerHTML = cData.texts[lan].label;
				if(cData.texts.fr.sublabel) {
					subLabelDiv = document.createElement("div");
					subLabelDiv.setAttribute("class","sublabel");
					subLabelDiv.appendChild(document.createTextNode(cData.texts[lan].sublabel));
					labelDiv.appendChild(subLabelDiv);
				}
				article.appendChild(labelDiv);
			}
/*
	MODIF 1 (l'erreur de CSS rencontrée en classe)
*/			
			// L'ERREUR ÉTAIT ICI !!!!! J'UTILISAI before() au lieu d'append(),
			// ce qui plaçait les articles AVANT le <div class="slides"> et
			// donc les éléments étaient mal imbriqués pour le CSS que nous avons ...
			$(".slides").append(article);
		}
	}
}
