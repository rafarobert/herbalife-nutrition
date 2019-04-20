var oSidenavAulaVirtual = {

    init: function(){

    },

    openNav: function () {
        document.getElementById("sidenavAula").style.width = "250px";
        // document.getElementById("main").style.marginRight = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    },

    closeNav: function () {
        document.getElementById("sidenavAula").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
        document.body.style.backgroundColor = "white";
    }
}