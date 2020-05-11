function getLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        console.log("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {

    console.log(position);

    document.querySelector(".longitude").value=position.coords.longitude;
    document.querySelector(".latitude").value=position.coords.latitude;

}

function init(){

    setInterval(getLocation,1000);
    getLocation();
}

document.addEventListener("DOMContentLoaded",init);