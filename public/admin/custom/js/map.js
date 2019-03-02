function initialize() {
    var input = document.getElementById('searchTextField');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        // document.getElementById('city2').value = place.name;
        document.getElementById('city_latitude').value = place.geometry.location.lat();
        document.getElementById('city_longtude').value = place.geometry.location.lng();
        //alert("This function is working!");
        //alert(place.name);
        // alert(place.address_components[0].long_name);

    });
}