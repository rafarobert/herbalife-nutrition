var oGeoLocation = {
    getLocation: function () {
        if (navigator.geolocation) {
            var vm = this;
            navigator.geolocation.getCurrentPosition(function(position)
            {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });

                vm.autocomplete.setBounds(circle.getBounds());
            });
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    },
    showPosition: function (position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
}
