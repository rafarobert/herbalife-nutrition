/**
 * Created by RaFaEl on 12/3/2017.
 */
var oPageFront = {
    documentReady:false,
    domains:{},
    host:'',
    hostname:'',
    protocol:'',
    port:'',
    origin:'',
    server:window.location.origin == 'http://localhost:4200' ? 'http://local.defensor.com/' : '',
    init: function(){
        readTextFile('/config/servers.json',function(json){
            oPageFront.domains = JSON.parse(json);
            $.each(oPageFront.domains, function(index, data){
                if(window.location.origin === data.origin){
                    oPageFront.dest = data.dest+'/';
                    oPageFront.origin = data.origin+'/';
                    oPageFront.port = data.port;
                    oPageFront.protocol = data.protocol;
                    oPageFront.hostname = data.hostname;
                    oPageFront.host = data.host;
                }
            });
        });
    },
    validateEmail: function( email )
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email) ? true : false;
    },
    everythingLoaded: function(){
        setInterval(function() {
            if (/loaded|complete/.test(document.readyState) && !oPageFront.documentReady) {
                clearInterval(oPageFront.everythingLoaded);
                console.log('everythingLoaded');
                oCanvas.init();
                oPageFront.documentReady = true;
                $('#trigger-aula-virtual').click(oSidePanel.sidePanel.open);
            }
        }, 10);
    }
}


function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

// $(document).wrap(function(){
//     setTimeout(oCanvas.init,100);
// });

setTimeout(oPageFront.everythingLoaded,5000);
