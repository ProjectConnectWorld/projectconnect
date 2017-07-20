<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Starter Template for Bootstrap</title>
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

  <!-- Bootstrap core CSS -->
  <link href="../bootstrap4/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/starter-template.css" rel="stylesheet">
  <!-- Leaflet css -->
  <link rel="stylesheet" href="../node_modules/leaflet/dist/leaflet.css"/>
  <!-- leaflet js file -->
  <script src= "../node_modules/leaflet/dist/leaflet.js"></script>
  <!-- mapbox file -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.css' rel='stylesheet' />

  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-compare/v0.1.0/mapbox-gl-compare.js'></script>
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-compare/v0.1.0/mapbox-gl-compare.css' type='text/css' />
  <link rel='stylesheet' href='../css/slider.css' type='text/css' />

  <!-- Ant Line -->
  <!-- <link rel="stylesheet" href="../node_modules/leaflet-ant-path/dist/leaflet.css"/>
  <script src= "../node_modules/leaflet-ant-path/dist/leaflet-ant-path.js"></script> -->
  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/5b36c1571c.js"></script>
  <script type="text/javascript" src ="../data/contgeo.js"></script>
  <script type="text/javascript" src ="../data/centercont.js"></script>
  <script type="text/javascript" src ="../data/countrygeo.js"></script>
  <script type="text/javascript" src ="../data/allcountries.js"></script>




  <style >

  .map {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 100%;
  }


  </style>



</head>
<script type="text/javascript">
function regionselected(event){
  var region =this.options[this.selectedIndex].text;
  // alert(region);
  $.ajax({
    type: "POST",
    url: 'region.php',
    data:{'region':region},
    dataType: "json",
    success:function(data){
      document.getElementById('sel2').innerHTML = "<option value='' disabled selected>Select Country</option>"
      $.each(data, function(){
        // alert(this.country);
        var x = document.getElementById("sel2");
        var option = document.createElement("option");
        option.text = this.countrycode+"-"+this.countryname;
        x.add(option);

      });
      removecontinent();
      removecountry();
      removegeo();
      highlight(region);

    }

  });
}

function countryselected(event){
  var country =this.options[this.selectedIndex].text;
  plotcountry(country);
  removecontinent();

}

</script>


<body>
  <i class="fa fa-arrow-down down-menu"> </i>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded navb">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Country Info</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="min-width:100%; ">
        <li class="nav-item " style="min-width:20%;">
          <select class="form-control " id="sel1" onchange="regionselected.call(this, event)">
            <option value="" disabled selected>Select your region</option>
            <option value="">Africa</option>
            <option value="">Asia</option>
            <option value="">Europe</option>
            <option value="">North America</option>
            <option value="">South America</option>
            <option value="">Oceania</option>
          </select>

        </li>
        <li class="nav-item" style="padding:10px">

        </li>
        <li class="nav-item" style="min-width:20%;">
          <select class="form-control " id="sel2" onchange="countryselected.call(this, event)">
            <option value="" disabled selected>Select Country</option>
            <?php
            // require_once "getcountries.php";
            // $arr= getAllCountries();
            // foreach ($arr as $key => $value) {
            // echo "<option>" .$value."</option>";
            // }
            ?>
          </select>
        </li>
        <li class="nav-item" style="padding:10px">

        </li>
        <li class="nav-item" style="min-width:20%;">
          <select class="form-control " id="sel3">
            <option value="" disabled selected>States/Counties/Province</option>
            <option value="">ONE</option>
            <option value="">TWO</option>
            <option value="">THREE</option>
          </select>
        </li>


      </ul>
    </div>
    <i class="fa fa-times pull-right  fa-nav"> </i>
  </nav>
  <i class="fa fa-bars togglel"></i>
  <i class="fa fa-bars toggler"></i>

  <div class="left-side">
    <i class="fa fa-times pull-right fa-times pull-right fa-funcl"> </i>
    <div >
      <center>
        <h1 class="movedown">Left Side</h1>

      </center>
      <div class="col-sm-12">
        <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/>
      </div>

      </div>
    </div>

    <div class="map" id="mapid"></div>
    <div class="right-side">
      <i class="fa fa-times pull-right fa-times pull-left fa-funcr"> </i>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../bootstrap4/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap4/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="../node_modules/geojson/geojson.min.js"></script>
    <script type="text/javascript" src ="../js/close.js"></script>
    <script type="text/javascript" src ="../js/bootstrap-slider.js"></script>





    <script type="text/javascript">


    function getColor(num){
      var num = parseInt(num);

      if( num <50){
        return "#14D812"
      }
      if( num < 150){
        return "#70D10D"
      }
      if( num < 400){
        return "#CACB08"
      }
      if( num < 800){
        return "#C56604"
      }
      else{
        return "#BF0100"
      }

    }
    function getClass(){
      var ran= Math.floor(Math.random() * 9);
      if(ran<1){
        return "pulse1";
      }
      if(ran<2){
        return "pulse2";

      }
      if(ran<3){
        return "pulse3";

      }
      if(ran<4){
        return "pulse3";

      }
      if(ran<5){
        return "pulse3";

      }
      if(ran<6){
        return "pulse3";

      }
      if(ran<7){
        return "pulse3";
      }
      else{
        return "pulse4";
      }

    }

    var mymap = L.map('mapid',{
      zoomControl:false
    }).setView([0, 0], 4);


    L.control.zoom({
      position: 'bottomleft'
    }).addTo(mymap);

    var streetlayer= L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
      maxZoom: 20,
      minZoom:3,
      id: 'mapbox.streets',
      accessToken: 'pk.eyJ1IjoiYXlhbmV6IiwiYSI6ImNqNHloOXAweTFveWwzM3A4M3FkOWUzM2UifQ.GfClkT4QxlFDC_xiI37x3Q'
    });

    var darklayer= L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
      maxZoom: 20,
      minZoom:3,
      id: 'mapbox.dark',
      accessToken: 'pk.eyJ1IjoiYXlhbmV6IiwiYSI6ImNqNHloOXAweTFveWwzM3A4M3FkOWUzM2UifQ.GfClkT4QxlFDC_xiI37x3Q'
    });

    var satillitelayer= L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
      maxZoom: 20,
      minZoom:3,
      id: 'mapbox.satellite',
      accessToken: 'pk.eyJ1IjoiYXlhbmV6IiwiYSI6ImNqNHloOXAweTFveWwzM3A4M3FkOWUzM2UifQ.GfClkT4QxlFDC_xiI37x3Q'
    });

    darklayer.addTo(mymap);

    var baseLayers = {
      "Dark Layer": darklayer,
      "Street Layer": streetlayer,
      "Satellite Layer": satillitelayer
    };

    control= L.control.layers(baseLayers,null,{
      position: 'bottomright'
    }).addTo(mymap);

    var continentLayer = L.geoJson();

    function highlight(region){
      name=region.replace(/\s/g,'').toLowerCase();
      continentLayer=L.geoJson(contdata,{
        filter: function (geoJsonFeature) {
          if(geoJsonFeature.properties.continent===name){
            return true;
          }else{
            return false;
          }
        },
        style:function (geoJsonFeature) {
          return {fillColor:"green",color:"green"}
        }
      }).bindPopup(function (layer) {
        return layer.feature.properties.name;
      }).addTo(mymap);
      mymap.setView(centerconts[name],3);

    }


    var geolayer = L.geoJson();
    var countryLayer = L.geoJson();

    function plotcountry(country){
      var tot_points=0;
      var tot_lat=0;
      var tot_lng=0;
      removecountry();
      countryLayer=L.geoJson(allcountries,{
        filter: function (geoJsonFeature) {
          if(geoJsonFeature.properties.name.replace(/\s/g,'').toLowerCase()==country.replace(/\s/g,'').split('-')[1].toLowerCase()){
            return true;
          }else{
            return false;
          }
        },
        style:function (geoJsonFeature) {
          return {fill:false ,color:"red"}
        }
      }).addTo(mymap);
      $.ajax({
        type: "POST",
        url: 'getdata.php',
        dataType: "json",
        data:{'country':country},
        success:function(data){
          removegeo();

          var dnewdata= [];

          $.each(data, function(){
            p_lat= parseFloat(this.lat);
            p_lng= parseFloat(this.lng);

            if (this.lat != 'null' && this.lng !='null' && !isNaN(p_lat) && !isNaN(p_lng) && between(p_lat, -90, 90) && between(p_lng, -180, 180)){
              tot_points+=1;
              tot_lat+= parseFloat(this.lat);
              tot_lng+= parseFloat(this.lng);

              var school = new Object();
              school.name = this.name;
              school.lat = parseFloat(this.lat);
              school.lng = parseFloat(this.lng);
              school.num = parseInt(this.num);
              dnewdata.push(school);
            }
          });
          geoj= GeoJSON.parse(dnewdata,{Point: ['lat', 'lng']
        });
        mymap.removeLayer(geolayer);

        geolayer = L.geoJSON(geoj, {
          pointToLayer: function(feature, latlng) {
            return new L.CircleMarker(latlng, {stroke: false, radius: 3, fillOpacity: 0.65, color: getColor(feature.properties.num,feature.properties.range)});
          }
        }).bindPopup(function (layer) {
          return layer.feature.properties.name;
        });

        mymap.addLayer(geolayer);

        //alert(tot_lat + "   " + tot_lng +"  "+ tot_points);
        //alert( tot_lat/tot_points+ "  " +tot_lng/tot_points)
        mymap.setView([tot_lat/tot_points, tot_lng/tot_points],6);
      }
    });





  }

  function between(x, min, max) {
    return x >= min && x <= max;
  }
  function removegeo(){
    if(mymap.hasLayer(geolayer)){
      mymap.removeLayer(geolayer);

    }
  }
  function removecountry(){
    if(mymap.hasLayer(countryLayer)){
      mymap.removeLayer(countryLayer);

    }
  }



  function removecontinent(){
    if(mymap.hasLayer(continentLayer)){
      mymap.removeLayer(continentLayer);

    }
  }


  </script>
</body>
</html>
