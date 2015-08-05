// function to add,save,create and place markers
var map = null;
var geocoder = null;

var xmlhttp = null;
if (window.XMLHttpRequest) {
	xmlhttp = new XMLHttpRequest();
} else if (window.ActiveXObject) {
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
	
function load() 
{
	if (GBrowserIsCompatible()) 
	{
		map = new GMap2(document.getElementById("map"));
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());
		map.addControl(new GScaleControl());
		placeMarkers();
   }
}
function addMarker(address,address2){
	var address = document.getElementById("address").value;

	var daddress=document.getElementById("address2").value;
    geocoder = new GClientGeocoder();
	geocoder.getLatLng(address, function(point) {
		if (!point) {
			alert(address + " address not found");
		} 
		else{
			map.setCenter(point, 12);
			map.addOverlay(createMarker(point, address));
			saveMarker(point, address);
		}
	});

geocoder.getLatLng(address2, function(point) {
		if (!point) {
			alert(address2 + " address not found");
		} 
		else{
			map.setCenter(point, 12);
			map.addOverlay(createMarker(point, address2));
			saveMarker(point, address2);
		}
	});
}


function placeMarkers()
{
	GDownloadUrl("data.php", function(data, responseCode) {
		if(responseCode == 200){
			var xml = GXml.parse(data);  //warning: will get from cache if not cleared
			var markers = xml.documentElement.getElementsByTagName("marker");
			for (var i = 0; i < markers.length; i++) {
				var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
										parseFloat(markers[i].getAttribute("lng")));
				map.setCenter(point, 12);   //fails if this not used
				map.addOverlay(createMarker(point, markers[i].getAttribute("address")));
								map.addOverlay(createMarker(point, markers[i].getAttribute("address2")));

			}
		}
		else if(responseCode == -1) {
		    alert("Data request timed out. Please try later.");
  		}
		else { 
    		geocoder = new GClientGeocoder();
			geocoder.getLatLng("Paris", function(point){map.setCenter(point, 13)}); 
  		}

	});
}

function createMarker(point, address) {  
	var marker = new GMarker(point); 
	GEvent.addListener(marker, "click", function() {
		marker.openInfoWindowHtml(address);  });  
	return marker;
}

function saveMarker(point, address){
	var lat = point.lat();
	var lng = point.lng();
	var url = "markers.php?lat=" + lat + "&lng=" + lng + "&address=" + address;
	if (xmlhttp.overrideMimeType) {
		xmlhttp.overrideMimeType("text/xml");
	}

	xmlhttp.open("GET", url, true); 
	xmlhttp.onreadystatechange = getConfirm;  //no response required 
	//xmlhttp.setRequestHeader("Content-Type", "text/xml" );
	xmlhttp.send(null); 
	
}

function getConfirm(){
	if ((xmlhttp.readyState == 4) &&(xmlhttp.status == 200))
    {
        var markerAddConfirm = xmlhttp.responseText;
		var spantag = document.getElementById("markerConfirm");
        spantag.innerHTML = markerAddConfirm;
    }
}
