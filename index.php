<?

define('WURL_CLIENT_KEY', "26eff9b0ad7ff9a5163ca9d7d20d09ad61b7200a42c52232de59c7e78b0cbb03");
define('WURL_SECRET_KEY', "0d5f95b1c18e355fe915a8297c083d84646d7367f59140715bbacfac35b56d77");

require_once('wurl-api.php');
$wurl_api = new WurlApi(constant("WURL_CLIENT_KEY"), constant("WURL_SECRET_KEY"));

/* Get the id we are requesting */
#$id = $wurl_api->bridge_get($_REQUEST['id']);



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Bridge API Query Demo</title>
</head>
<body>
  <p>This is a quick demo on the bridge API.</p>
  <p><?= var_dump($wurl_api->bridge_get($_REQUEST['id']));?></p>
</body>
</html>
