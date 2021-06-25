   <?php
         var mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');

            mapboxgl.accessToken = 'pk.eyJ1IjoieXVqaW5zc2kiLCJhIjoiY2ttZ3hraDg1MDF5bjJwbDg2MmM0MjhicyJ9.Jw_Nrnu9OrvjVQ49067KLg';
            var map = new mapboxgl.Map({
              container: 'YOUR_CONTAINER_ELEMENT_ID',
              style: 'mapbox://styles/mapbox/streets-v11'
            });

    ?>