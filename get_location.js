function getLocation(callback) {
    if (navigator.geolocation) {
    	//navegador suporta geolocalizacao
        navigator.geolocation.getCurrentPosition(
            function (position){
                var x = {
                    latitude : position.coords.latitude,
                    longitude : position.coords.longitude
                }

                callback(x);
                
        },  function (error){   
            //funcao que trata possiveis erros da funcao getCurrentPosision()
    
            switch(error.code) {
                case error.PERMISSION_DENIED:
                //User denied the request for Geolocation."
                break;
                case error.POSITION_UNAVAILABLE:
                alert("bug do firefox heuehue");
                //Location information is unavailable."
                break;
                case error.TIMEOUT:
                //The request to get user location timed out."
                break;
                case error.UNKNOWN_ERROR:
                //An unknown error occurred."
                 break;
            }
            
            callback(false);
    },  {

            //variavel que armazena os parametros para a func getCurrentPosition()
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        });
    } 

    else { 
        callback(false);
    }
}