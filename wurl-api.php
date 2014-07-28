<?php


/** Sample Wurl API Access using http */
class WurlApi {
  public $access_token;

  const WURL_API_ENDPOINT = "https://api.wurl.com/api";

  function WurlApi() {
  }

  function bridge_get($id) {
    $opts = array(
      "http"=>array(
        "method"=>"GET"
      )
    );
    $context = stream_context_create($opts);

    $url = self::WURL_API_ENDPOINT."/search?type=episode&fields=bridge_tags&q=".urlencode($id)."&access_token={$this->access_token}";
    $file = file_get_contents($url,false, $context);
    return json_decode($file);
  }

}
?>
