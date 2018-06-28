$( document ).ready(function() {
    google.maps.event.addDomListener(window, 'load', initialize);
});

var position = new google.maps.LatLng(54.687157, 25.279652);
var tableRow = $('.table-striped tbody tr');
var showOnMap = $('.show-on-map');
var partners = [];
var markers = [];
var infowindows = [];

function Partner(id, link,latitude,longtitude,deviceId,destination) {
    this.id = id;
    this.link = link;
    this.latitude = latitude;
    this.longitude = longtitude;
    this.deviceId = deviceId;
    this.destination = destination;
}
function initialize() {
    tableRow.each(function () {
        partners[$(this).data('id')] = new Partner(
            $(this).data('id'),
            $(this).data('link'),
            $(this).data('latitude'),
            $(this).data('longitude'),
            $(this).data('deviceId'),
            $(this).data('destination')
        );
    });
}

//google maps default options
var myoptions = {
    zoom: 7,
    center: position,
    scrollwheel: true,
    mapTypeControl: true,
    mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControlOptions: { style: google.maps.ZoomControlStyle.SMALL},
    streetViewControl: false
};
//google map marker image
var image = new google.maps.MarkerImage('/images/marker.png',
    new google.maps.Size(15,15),
    new google.maps.Point(0,0)
);
var infoWindow = new google.maps.InfoWindow();
var map = new google.maps.Map(document.getElementById("map"), myoptions);

function getMarker(id) {return markers[id];}

function setMarkers(partners) {
    console.log('das');
    for (var i in partners) {
        var latLng = new google.maps.LatLng(partners[i].latitude,partners[i].longitude);
        var content = '<div class="map-content"><h3>' + partners[i].name + '</h3><p><strong>Address:</strong><br>' + partners[i].street + '<br>' + partners[i].zip + ', ' + partners[i].city + '<br><br><strong>Email:</strong><br>' + partners[i].email + '</p></div>';
        createMarker(i,partners[i].name,latLng,content);
    }
}

function createMarker(id,name,latlng,content) {
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: name,
        icon: image,
        animation: google.maps.Animation.DROP,
        zIndex: 1
    });

    markers[id] = marker;
    infowindows[id] = new google.maps.InfoWindow({content: content});

    google.maps.event.addListener(marker,'click',function(){
        if(infoWindow) infoWindow.close();
        infoWindow = new google.maps.InfoWindow({content: content});
        infoWindow.open(map,marker);
    });

    return marker;
}

function closeInfoWindows() {
    for (var i=0;i<infowindows.length;i++) {
        infowindows[i].close();
    }
}

//setMarkers(partners);

// scroll to map on 'show on map' link click action
showOnMap.click(function(){
    var id = $(this).data('href');
    closeInfoWindows();
    map.setZoom(15);
    position = markers[id].position;
    map.setCenter(markers[id].position);
    infowindows[id].open(map,markers[id]);
    $("body,html").animate({scrollTop: 365}, 600);
});
           

            

        