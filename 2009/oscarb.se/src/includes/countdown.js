// http://forums.aspfree.com/code-bank-54/javascript-countdown-timer-89373.html
var _countDowncontainer = 0;
var _currentSeconds = 0;

function d2h(d) {return d.toString(16);}
function h2d(h) {return parseInt(h,16);}
/*
function d2h (dec) {
    var a = dec % 16;
    var b = (dec - a)/16;
    var hex = "" + hexChars.charAt(b) + hexChars.charAt(a);
    return hex;
}*/

function ActivateCountDown(strContainerID, initialValue) {
	_countDowncontainer = document.getElementById(strContainerID);

	if (!_countDowncontainer) {
		alert("count down error: container does not exist: " + strContainerID+
			"\nmake sure html element with this ID exists");
		return;
	}

	SetCountdownText(initialValue);
	window.setTimeout("CountDownTick()", 1000);
}

function CountDownTick() {
	if (_currentSeconds == 0) {
		window.location.reload();
		return;
	}

	SetCountdownText(_currentSeconds-1);
	window.setTimeout("CountDownTick()", 1000);
}

function SetCountdownText(seconds) {
	//store:
	_currentSeconds = seconds;

	//get days...
	var days = parseInt(_currentSeconds / (60*60*24));

	//get minutes:
	var minutes=parseInt(seconds/60);

	//shrink:
	seconds = (seconds%60);

	//get hours:
	var hours = parseInt(minutes/60);
	hours = hours % 24;

	//shrink:
	minutes = (minutes%60);

	//build text:
	//var strText = AddZero(hours) + ":" + AddZero(minutes) + ":" + AddZero(seconds);

	var strText = AddZero(days) + ":" + AddZero(hours) + ":" + AddZero(minutes) + ":" + AddZero(seconds);

	var lastSeconds = 60;

	// build background
	if (_currentSeconds >= 0 && _currentSeconds <= lastSeconds) {
		// 59 -> 0
		// 0 -> 255
		var rgb = (lastSeconds - Math.abs(_currentSeconds)) / lastSeconds * 255;
		var rgb = Math.round(rgb);
	} else {
		var val = Math.abs(_currentSeconds) % 43200/43200 * 255;
		var rgb = (Math.abs(_currentSeconds) % 86400 < 43200) ? val : 255 - val;
		var rgb = Math.round(rgb);
	}

	document.body.style.background = "rgb(" + rgb + ", " + rgb + ", " + rgb + ")";


	//apply:
	if(_currentSeconds >= 0)
		_countDowncontainer.innerHTML = strText;
}

function AddZero(num) {
	return ((num >= 0)&&(num < 10))?"0"+num:num+"";
}
