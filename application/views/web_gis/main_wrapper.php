
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Protected Area Web GIS</title>
<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
  <!-- Bootstrap -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">


  <link rel="stylesheet" href="<?php echo base_url();?>assets_gis/css/BootSideMenu.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets_gis/leaflet/leaflet.css" />

<style type="text/css">
  .user{
    padding:5px;
    margin-bottom: 5px;
  }

  #mapid {
    height: 480px;
  }
</style>
</head>
<body>

  <!--Test -->
  <div id="test">
    <h2>Web GIS Side Menu</h2>
    <div class="list-group">
      <a href="#" class="list-group-item active">Menu 1</a>
      <a href="#" class="list-group-item">Menu 2</a>
    </div>
  </div>
  <!--/Test -->

  <!--Test 2 -->
  <!-- <div id="test2">
    <div class="list-group">
      <a href="#" class="list-group-item active">Cras justo odio</a>
    </div>

    <div class="list-group submenu" id="subRight">
      <a href="#" class="list-group-item">a destra</a>
      <a href="#subRight2" class="list-group-item">Sub right 2</a>
    </div> 

      <div class="list-group submenu" id="subRight2">
      <a href="#" class="list-group-item">Porta ac consectetur ac</a>
      <a href="#" class="list-group-item">Vestibulum at eros</a>
    </div> 
  </div> -->
  <!--/Test 2-->


  <!--Normale contenuto di pagina-->
  <div class="container">
    

    <div class="row">
      <div class="col-md-12">
          <h1>Protected Area Web GIS</h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
          <div id="mapid"></div>
        </div>
      </div>
    </div>


  </div>
  <!--Normale contenuto di pagina-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets_gis/js/BootSideMenu.js"></script>
  <script src="<?php echo base_url();?>assets_gis/leaflet/leaflet.js"></script>

  <script type="text/javascript">
    $('#test').BootSideMenu({side:"left", autoClose:false});
    // $('#test2').BootSideMenu({side:"right"});
  </script>
  <script type="text/javascript">
    var mymap = L.map('mapid').setView([16.9966148, 120.62931], 13);
    var base_url="<?= BASE_URL(); ?>";
   L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    accessToken: 'pk.eyJ1Ijoib2thbW90bzAxIiwiYSI6ImNrNjNoaDZxbDA0d2wzam1wYWNlODNqaWwifQ.n0OqcLAjqIfZz1oar7EKaA'
}).addTo(mymap);

   var myFeatureGroup = L.featureGroup().addTo(mymap).on("click",groupClick);
   var mapMarker;
   $.getJSON(base_url+"pasu/web_gis/ctrl_gis",function(datas){
    $.each(datas, function(i, field){
      var v_lat = parseFloat(datas[i].y_lat);
      var v_long = parseFloat(datas[i].x_long);
      var icon_map = L.icon({
        iconUrl: base_url+'bmb_assets2/img/memorial.png',
        iconSize:[30,30]
      });

      mapMarker = L.marker([v_lat,v_long],{icon:icon_map})
                  .addTo(myFeatureGroup)
                  .bindPopup(datas[i].pa_name);
      mapMarker.id = datas[i].id_threat;
       // mapMarker = L.marker([v_lat,v_long],{icon:icon_map}).addTo(mymap).bindPopup('<center>'+datas[i].pa_name+'</center>').openPopup();

    });
   });

   function groupClick(event){
    console.log("Click on marker " + event.layer.id);
   }

    $.getJSON(base_url+"bmb_assets2/upload/upload_geojson_map/map.geojson",function(datas){
        geoLayer = L.geoJson(datas,{
            style: function(feature){
              var category = feature.properties.generatedcode;

              return {
                fillOpacity:0.0,
                weight: 1,
                opacity:1,
                color:"#008cff"
              };
            },

            onEachFeature: function(feature,layer){
              var name = feature.properties.pa_name;
              var information =name;
              layer.bindPopup(information,{
                maxWidth:260,
                closeButton: true,
                offset: L.point(0,0)
              });
              layer.on('click',function(){
                layer.openPopup();
              });
            }
        }).addTo(mymap);
    });
  </script>

</body>
</html>