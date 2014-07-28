<?php


/** Sample Wurl API Access using http */
class WurlApi {
  var $client_id;
  var $client_secret;

  const WURL_API_ENDPOINT = "https://api.wurl.com/api";

  function WurlApi($client_id, $client_secret) {
    $this->client_id;
    $this->client_secret;

  }

  function bridge_get($id) {
    $opts = array(
      "http"=>array(
        "method"=>"GET"
      )
    );
    $context = stream_context_create($opts);

    $url = self::WURL_API_ENDPOINT."/search?type=episode&fields=bridge_tags&q=".urlencode($id)."&appid=26eff9b0ad7ff9a5163ca9d7d20d09ad61b7200a42c52232de59c7e78b0cbb03&secret=0d5f95b1c18e355fe915a8297c083d84646d7367f59140715bbacfac35b56d77";
    $file = file_get_contents($url,false, $context);
    return json_decode($file);
  }

}
?>
