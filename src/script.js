function getLocation() {
    if (navigator.geolocation) {
        return navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert("Geolocation is not supported by this browser.");
    }


}

function showPosition(position) {

    console.log(position);

    document.querySelector(".longitude").value=position.coords.longitude;
    document.querySelector(".latitude").value=position.coords.latitude;


}

function init(){

    getLocation();
}

document.addEventListener("DOMContentLoaded",init);