var http = new XMLHttpRequest();
var startTime, endTime;
var url = "script_that_whill_handle_post.php";
var myData = "d="; // the raw data you will send
for(var i = 0 ; i < 1022 ; i++) //if you want to send 1 kb (2 + 1022 bytes = 1024b = 1kb). change it the way you want
{
    myData += "k"; // add one byte of data;
}

http.open("POST", url, true);

http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.setRequestHeader("Content-length", myData .length);
http.setRequestHeader("Connection", "close");

http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
        endTime = (new Date()).getTime();
        ShowData();
    }
}
startTime = (new Date()).getTime();
http.send(myData);