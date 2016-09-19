/*  JavaScript functions
    www.oscarb.se

	behavior.js

*/


/* INITITE WEBPAGE */

window.onload = init;

function init() {
	// Initiates the document

	loadData();
    Shadowbox.init();

    ap_noflash();

    ShadowboxMediaLoader();

};


/*
	CHANGE PAGE FUNCTIONS
*/

function nextPage(section) {
	// Jump to next page in section
	changePage(window[section + 'Page'] + 1, section);

}

function shadowboxToPage(key) {
	// Synchronize view in Shadowbox with page view on site
	changePage(Math.ceil(key / window.artImagesPerPage), 'art');

}

function changePage(p, section) {
	// Change to page p in section

	// Current page number and numbers of pages in section
	var page = section + 'Page';
	var pages = window[section + 'Pages'];

	// Update global data
	window[page] = p;
	window[page] = window[page] % pages;
	window[page] = (window[page] == 0) ? pages : window[page];

	// Hide all pages
	for (var i = 1; i <= pages; i++) {
		document.getElementById(section.substr(0, 1) + i).style.display = "none";
	}

	// Display current page
	document.getElementById(section.substr(0, 1) + window[page]).style.display = "block";

	// Update counter
	//document.getElementById(section).getElementsByTagName('div')[0].innerHTML = window[page] + "/" + pages;
	document.getElementById(section).getElementsByTagName('div')[0].innerHTML = pageSelector(window[page], pages, section);

}

function pageSelector(page, pages, section) {
	var html = "";
	for(var i = 1; i <= pages; i++) {
		if(i == page) {
			html += "&bull; ";
		} else {
			html += '<a href="#" onclick="changePage(' + i + ', \'' + section + '\'); return false;">&bull; </a>';
		}
	}
	return html;
}
	

/*
	AUDIOPLAYER FUNCTIONS
*/

function nextAudioPlayer() {
	// Closes the currently (playing) Audioplayer when user changes page

	// After one loop of pages Opera seems to fail closing Audioplayer.
	// Only IE actually closes the player, other browsers disables the music by hiding the parent div
	if (navigator.appName != "Opera" && ap_available()) {
		AudioPlayer.getPlayer('audioplayer_' + (window.musicPage)).close();
	}

	// Loads the next page in music
	nextPage('music');

	// Notice user if Flash isn't enabled
	ap_noflash();

}

function ap_noflash() {
	// Notifies user if Flash is not available
	if (ap_available() == false)
		document.getElementById('audioplayer_' + window.musicPage).innerHTML = "<p>Install <strong><a href=\"http://get.adobe.com/flashplayer/\" target=\"_blank\">Adobe Flash Player<\/a><\/strong> to play media directly in your browser.<\/p>";

}


function ap_available() {
	// Check if current AudioPlayer is available, ie check if Flash is enabled
	if (document.getElementById('audioplayer_' + window.musicPage).innerHTML.toLowerCase().indexOf("param") == -1)
		return false;
	else
		return true;
}
