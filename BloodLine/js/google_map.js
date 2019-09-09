function loadMap() {
        var bengal = {lat: 22.5726, lng: 88.3639};
        var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 7,
          		center: bengal
        });
        var marker = new google.maps.Marker({
          position: bengal,
          map: map
        });
      }
      
   
        
      