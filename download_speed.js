var imageAddr = "https://static.cineclick.com.br/sites/adm/uploads/banco_imagens/31/602x0_1446828744.jpg"; 
var downloadSize = 4995374; //bytes


function InitiateSpeedDetection() {
    window.setTimeout(MeasureConnectionSpeed, 1);
};    

/*if (window.addEventListener) {
    window.addEventListener('load', InitiateSpeedDetection, false);
} else if (window.attachEvent) {
    window.attachEvent('onload', InitiateSpeedDetection);
}*/

function MeasureConnectionSpeed(callback) {
    var startTime, endTime;
    var download = new Image();
    download.onload = function () {
        endTime = (new Date()).getTime();
        showResults();
    }
    
    download.onerror = function (err, msg) {
        ShowProgressMessage("Invalid image, or error downloading");
    }
    
    startTime = (new Date()).getTime();
    var cacheBuster = "?nnn=" + startTime;
    download.src = imageAddr + cacheBuster;
    
    function showResults() {
        var duration = (endTime - startTime) / 1000;
        var bitsLoaded = downloadSize * 8;
        var speedBps = (bitsLoaded / duration).toFixed(2);
        var speedKbps = (speedBps / 1024).toFixed(2);
        var speedMbps = (speedKbps / 1024).toFixed(2);
        callback(speedMbps);
        ShowProgressMessage([
            "Your connection speed is " + speedMbps + " Mbps"
        ]);
    }
}