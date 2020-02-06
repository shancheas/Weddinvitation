{!! $content !!}
<div class="row">
    <div class="col">
        <div class="card shadow border-0">
            <div id="map-canvas" class="map-canvas" data-lat="{{ $data['lat'] }}" data-lng="{{ $data['lng'] }}" style="height: 600px;"></div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ $data['id'] }}" id="invitation-id">
@include('layouts.footers.feedback')
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaWG5cfOZH_-sRh1r3YJMTH9a3BSMtssg"></script>
<script>
    var $map = document.getElementById('map-canvas'),
        map,
        lat,
        lng,
        color = "#5e72e4";

    function initMap() {

        map = document.getElementById('map-canvas');
        lat = map.getAttribute('data-lat');
        lng = map.getAttribute('data-lng');

        var myLatlng = new google.maps.LatLng(lat, lng);
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: myLatlng,
            location: {
                latitude: lat,
                longitude: lng
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{"color": "#444444"}]
            }, {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{"color": "#f2f2f2"}]
            }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
                "featureType": "road",
                "elementType": "all",
                "stylers": [{"saturation": -100}, {"lightness": 45}]
            }, {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{"visibility": "simplified"}]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [{"visibility": "off"}]
            }, {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{"visibility": "off"}]
            }, {"featureType": "water", "elementType": "all", "stylers": [{"color": color}, {"visibility": "on"}]}]
        }

        map = new google.maps.Map(map, mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            animation: google.maps.Animation.DROP,
            title: 'Hello World!'
        });

        var contentString = '<div class="info-window-content"><h2>Argon Dashboard</h2>' +
            '<p>A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</p></div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });
        $('#map-canvas').locationpicker(mapOptions);
    }

    const frame = document.getElementsByTagName('iframe')[0];
    frame.parentNode.removeChild(frame);

    let response = 0;
    $('.btn-choice').on('click', (ev) => {
        response = $(ev.target).data('value');
    })

    $('#send').click(() => {
        const name = $('#feedback-name').val();
        const comment = $('#message').val();
        const id = $('#invitation-id').val();
        const data = {
            response: response,
            name: name,
            comment: comment,
            invitation_id: id,
            is_show: 1
        }
        console.log(data)
        $.post('/api/invitation/response', data).then(response => {
            console.log(response);
            $("#send").attr("disabled", true);
            Swal.fire('', response.message, 'success')
        })
    })
    initMap()
</script>
