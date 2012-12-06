<?php
require_once 'config.php';
require_once 'gapi.class.php';
$ga = new gapi($ga_username,$ga_password);

date_default_timezone_set('UTC');
$today = date('Y-m-d');

$ga->requestReportData(65923861,array('searchKeyword'),array('pageviews','visits'),array('-pageviews'),null,$today,$today,null,5);
  echo "Trending searches: ";
foreach($ga->getResults() as $result)
{
  echo '<a href="?hashtag='.urlencode($result).'">'.$result.'</a> ';
}
?>
