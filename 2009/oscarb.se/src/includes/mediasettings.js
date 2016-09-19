/*  JavaScript Media Settings
	Shadowbox
	Audioplayer

    www.oscarb.se

	behavior.js

*/

/*
	SHADOWBOX 2.0

*/

Shadowbox.loadSkin('oscarb08', 'includes/shadowbox-2.0/src/skin');
Shadowbox.loadLanguage('en', 'includes/shadowbox-2.0/src/lang');
Shadowbox.loadPlayer(['img', 'iframe'], 'includes/shadowbox-2.0/src/player');

/*
	Audio Player (Wordpress) plugin
	http://wpaudioplayer.com/
	http://www.1pixelout.net/code/audio-player-wordpress-plugin/
*/

AudioPlayer.setup("includes/audio-player/player.swf", {
			width: 420,
			initialvolume: 100,
			transparentbg: "yes",

			bg:					"ffffff",
			leftbg:				"ffffff",
			lefticon:			"184b81",
			voltrack:			"e8e8e8",
			volslider:			"184b81",
			rightbg:			"e8e8e8",
			rightbghover:		"48b36d",
			righticon:			"ffffff",
			righticonhover:		"ffffff",
			loader:				"48b36d",
			track:				"ffffff",
			tracker:			"e8e8e8",
			border:				"ffffff",
			skip:				"536880",
			text:				"333333"

});