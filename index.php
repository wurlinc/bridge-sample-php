<?
require_once('wurl-api.php');
$wurl_api = new WurlApi();
$wurl_api->access_token = $_ENV["WURL_ACCESS_TOKEN"]
/* Get the id we are requesting */
#$id = $wurl_api->bridge_get($_REQUEST['id']);



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Bridge API Query Demo</title>
</head>
<body>
  <p>This is a quick demo on the bridge API.</p>
  <? if($_REQUEST['id']) { ?>
  <p><?= var_dump($wurl_api->bridge_get($_REQUEST['id']));?></p>
  <? } ?>
  <form>
    <input type='text' name="id" value='24_live_another_day'>
    <input type='submit'>
  </form>
</body>
</html>
