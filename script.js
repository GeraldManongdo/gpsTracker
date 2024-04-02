//SCROLLING ANIMATION
$(document).ready(function() {
  // Smooth scrolling when clicking on links
  $('a[href^="#"]').on('click', function(event) {
      var target = $($(this).attr('href'));

      if (target.length) {
          event.preventDefault();
          $('html, body').animate({
              scrollTop: target.offset().top
          }, 1000); // Adjust the duration as needed
      }
  });
});

//TIME SPAN
function updatePHTime() {
    // Set the time zone to Asia/Manila (Philippines)
    const phTimezone = 'Asia/Manila';
    const currentDateTime = new Date().toLocaleString('en-US', {
      timeZone: phTimezone
    });

    // Display the current date and time
    document.querySelector('.time').textContent = currentDateTime;
  }

  // Update the time every second
  setInterval(updatePHTime, 1000);

  // Initial call to set the time immediately
  updatePHTime();





//THE MAPS SCRIPT
// Coordinates of Lagro High School
const lagroHighSchoolCoordinates = {
    latitude: 14.7268,
    longitude: 121.0665
  };
  
  // To calculate the distance between two points using the Haversine formula
  function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius of the Earth in kilometers
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a =
      Math.sin(dLat / 2) * Math.sin(dLat / 2) +
      Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
      Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    const distance = R * c; // Distance in kilometers
    return distance;
  }
  
  // To know if the student is inside the geofence
  function checkGeofence(userLatitude, userLongitude) {
    getUserLocation();
    const distance = calculateDistance(userLatitude, userLongitude, lagroHighSchoolCoordinates.latitude, lagroHighSchoolCoordinates.longitude);
    // To specify a radius for the geofence (in kilometers)
    const geofenceRadius = 1; 
    
      // To trigger a notification
    if (distance <= geofenceRadius) {
      console.log("Student is inside of Lagro High School.");
    } else {
      console.log("Student is not at Lagro High School.");
    }
  }
  
  function initMap() {
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 15});

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            map.setCenter(userLocation);
            var marker = new google.maps.Marker({position: userLocation, map: map});
            checkGeofence(userLocation.lat, userLocation.lng);
            

        }, function() {
            // Handle geolocation error
            handleLocationError(true, map.getCenter());
        });
    } else {
        handleLocationError(false, map.getCenter());
    }
}

function getUserLocation() {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
          var userLocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
          };
          sendLocationToPHP(userLocation.lat, userLocation.lng);
      }, function() {
          // Handle geolocation error
          console.error("Geolocation failed");
      });
  } else {
      console.error("Geolocation is not supported by this browser");
  }
}

function sendLocationToPHP(latitude, longitude) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "location.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              console.log("Location sent to PHP successfully");
          } else {
              console.error("Failed to send location to PHP");
          }
      }
  };

  var params = "latitude=" + latitude + "&longitude=" + longitude; // Added & between latitude and longitude
  xhr.send(params);
}
//SLIDER SCRIPT

document.addEventListener("DOMContentLoaded", function () {
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");
  const slider = document.querySelector(".cardContainer");
  const cards = document.querySelectorAll(".card");

  let currentIndex = 0;
  let intervalId;

  function showSlide(index) {
    const offset = -index * 380; // Scroll by 250px width
    slider.style.transform = `translateX(${offset}px)`;

    if (index === 0) {
      prevBtn.style.display = "none";
    } else {
      prevBtn.style.display = "block";
    }

    if (index === cards.length - 1) {
      nextBtn.style.display = "none";
    } else {
      nextBtn.style.display = "block";
    }
  }

  function nextSlide() {
    currentIndex++;
    if (currentIndex >= cards.length) {
      currentIndex = 0;
    }
    showSlide(currentIndex);
  }

  function startAutoSlide() {
    intervalId = setInterval(nextSlide, 4000); // Change slide every 4 seconds (adjust as needed)
  }

  function stopAutoSlide() {
    clearInterval(intervalId);
  }

  showSlide(currentIndex);
  startAutoSlide();

  prevBtn.addEventListener("click", function () {
    stopAutoSlide();
    currentIndex--;
    if (currentIndex < 0) {
      currentIndex = cards.length - 1;
    }
    showSlide(currentIndex);
    startAutoSlide();
  });

  nextBtn.addEventListener("click", function () {
    stopAutoSlide();
    nextSlide();
    startAutoSlide();
  });

  let startX = 0;
  let endX = 0;

  slider.addEventListener("touchstart", function (event) {
    stopAutoSlide();
    startX = event.touches[0].clientX;
  });

  slider.addEventListener("touchmove", function (event) {
    endX = event.touches[0].clientX;
  });

  slider.addEventListener("touchend", function () {
    const diffX = startX - endX;
    if (Math.abs(diffX) > 50) {
      if (diffX > 0) {
        nextSlide();
      } else {
        currentIndex--;
        if (currentIndex < 0) {
          currentIndex = cards.length - 1;
        }
      }
      showSlide(currentIndex);
      startAutoSlide();
    }
  });
});