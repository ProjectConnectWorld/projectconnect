<?php
require_once "../../../db.php";
$arr= array();
$query = 'SELECT * FROM schools ';
$result = pg_query($dbconn,$query) or die('Query failed: ' . pg_last_error());
$geojson = array(
  'type'      => 'FeatureCollection',
  'features'  => array()
);

while ($line = pg_fetch_object($result)) {

    if($line->name != 'null' && $line->lat != 'null' && $line->lon !='null' && $line->num_students !='null') {
      //if lat lng is zero
      if($line->lat != '0' && $line->lon != '0'){
        $response = new stdClass;
        $response->{'name'}= $line->name;
        // $response->{'num'}= $line->num_students;
        $properties=$line;
        $feature = array(
          'type' => 'Feature',
          'geometry' => array(
            'type' => 'Point',
            'coordinates' => array(
              $line->lon,
              $line->lat
            )
          ),
          'properties' => $response
        );
        # Add feature arrays to feature collection array
        array_push($geojson['features'], $feature);

      }
    }

}



header('Content-type: application/json');
echo json_encode($geojson, JSON_NUMERIC_CHECK);









?>
