var  oSidenavOficinas = {

    init: function() {

    },

    openNav: function () {
        document.getElementById("sidenavOficinas").style.width = "250px";
        // document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    },

    closeNav: function () {
        document.getElementById("sidenavOficinas").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }
}