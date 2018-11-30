
function startTime() {
    var today = new Date();
    var h = today.getHours();


    var ampm = 'AM';
    if (h > 12) {
	h = h - 12;
	ampm = 'PM';
    }
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML = h + ":" + m + "<span id='ampm'>" + ampm + "</span>";
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}
