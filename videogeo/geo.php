<?php
/* 
   Helper: Geolocalization
   ***
   08/08/2020 - Roger Maia - Creation
   **
*/

class Geo
{
  protected
    $ip,
    $response;

  function __construct($ip)
  {
    $this->getByIp($ip);
  }

  function getByIp($ip)
  {
    $api_url  = 'https://freegeoip.app/json/' . $ip;
    $response = call($api_url, '', 'GET');

    // loads 
    if (is_inside($response, 'country_code')) {
      $this->response = json_decode($response);
    } else {
      $this->response = new stdClass();
    }
  }

  // Return one of the fields below or $field = '', return city, state, and country
  function get($field = '')
  {
    $tabFields = array(
      'country_name',
      'region_name',
      'city',
      'zip_code',
      'country_code',
      'region_code',
      'time_zone',
      'latitude',
      'longitude',
      'metro_code'  
    );

    $result = '';

    if (strlen($field) == 0) {
      for ($i = 2; $i > -1; $i--) {
        $field = $tabFields[$i];
        $result .= ($i == 2 ? '' : ', ') . $this->response->$field;
      }
    } else {
      if (in_array($field, $tabFields)) {
        $result = $this->response->$field;
      }
    }

    return $result;
  }
}

function call($url, $data, $type = 'POST', $header = array())
{
    try {
        $ch = curl_init($url);

        if ($type == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  

        $response = curl_exec($ch);
        curl_close($ch);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $response;
}

function is_inside($text, $find)
{
   return (substr_count(strToLower($text), strToLower($find)) == 0) ? false : true;
}