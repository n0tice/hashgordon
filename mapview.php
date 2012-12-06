<?php

require_once ('header.php');

if (!$_GET['hashtag']) {
	$hashtag = "*";
} else {
	$hashtag = htmlspecialchars($_GET['hashtag']);
}
if (!$_GET['limit']) {
	$limit = 100;
} else {
	$limit = $_GET['limit'];
}
if (!$_GET['user']) {
	$username = "";
} else {
	$username = $_GET['user'];
}
if (!$_GET['noticeboard']) {
	$noticeboard = "";
} else {
	$noticeboard = $_GET['noticeboard'];
}
if (!$_GET['votedby']) {
	$votedby = "";
} else {
	$votedby = $_GET['votedby'];
}
if (!$_GET['flags']) {
	$maxflags = "3";
} else {
	$maxflags = $_GET['flags'];
}
if (!$_GET['zoom']) {
	$zoom = "6";
} else {
	$zoom = $_GET['zoom'];
}
if (!$_GET['centerpoint']) {
	$centerpoint = "51.412912,-0.142822";
} else {
	$centerpoint = $_GET['centerpoint'];
}
if (!$_GET['width']) {
	$width = "640";
} else {
	$width = $_GET['width'];
}
if (!$_GET['height']) {
	$height = "480";
} else {
	$height = $_GET['height'];
}
$embed_base = "http://n0ticeapis.com/2/search?format=kml";
if ($hashtag) {$embed_q = "&q=" . $hashtag;} else {$embed_q = "";}
if ($noticeboard) {$embed_noticeboard = "&noticeboard=" . $noticeboard;} else {$embed_noticeboard = "";}
if ($username) {$embed_user = "&user=" . $username;} else {$embed_user = "";}
if ($votedby) {$embed_votedby = "&votedInterestingBy=" . $votedby;} else {$embed_votedby = "";}
if ($location) {$embed_location = "&location=" . $location;} else {$embed_location = "";}
if ($limit) {$embed_limit = "&limit=" . $limit ;} else {$embed_limit = "";}
$n0ticeurl_kml = $embed_base . $embed_q . $embed_noticeboard . $embed_user . $embed_votedby . $embed_location . $embed_limit;

$embed_code = "<iframe width=\"" . $width . "\" height=\"" . $height . "\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=" . urlencode($n0ticeurl_kml) . "&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=55.323926,107.753906&amp;ie=UTF8&amp;t=m&amp;ll=" . $centerpoint . "&amp;spn=53.000287,149.77377&amp;z=" . $zoom . "&amp;output=embed\"></iframe><br /><small><a href=\"https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=" . urlencode($n0ticeurl_kml) . "&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=55.323926,107.753906&amp;ie=UTF8&amp;t=m&amp;ll=" . $centerpoint . "&amp;spn=53.000287,149.77377&amp;z=" . $zoom . "\" style=\"color:#0000FF;text-align:left\">View Larger Map</a></small>";
?>

<body>

<div class="navbar">
        <div class="navbar-inner navbar-fixed-top">
            <div class="container-fluid">
            <a href="http://n0tice.com/"><img src="http://n0tice.org/wp-content/uploads/2012/07/poweredby-n0tice-80x461.png" align="right" border="0" vspace="20"></a>
            <a href="/"><img src="hashgordon-full-logo.png" align="left" border="0" width="250"></a>
            </div>
        </div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">

<form class="form-inline" method="GET" action="">
<div class="control-group well">
  <label class="control-label" for="limit"><strong>Display</strong><br><small>Results (up to 100)</small></label>
     <div class="controls"><input type="text" id="limit" class="input-mini" <?php if ($_GET['limit']) { echo "placeholder=\"".$limit."\" value=\"".$limit."\""; } else { echo "placeholder=\"100\""; } ?> name="limit"></div>
  <label class="control-label" for="zoom"><small>Zoom level</small></label>
     <div class="controls"><input type="text" id="zoom" class="input-small" <?php if ($_GET['zoom']) { echo "placeholder=\"".$zoom."\" value=\"".$zoom."\""; } else { echo "placeholder=\"5\""; } ?> name="zoom"></div>
  <label class="control-label" for="centerpoint"><small>Centerpoint</small></label>
     <div class="controls"><input type="text" id="centerpoint" class="input-small" <?php if ($_GET['centerpoint']) { echo "placeholder=\"".$centerpoint."\" value=\"".$centerpoint."\""; } else { echo "placeholder=\"lat,long\""; } ?> name="centerpoint"></div>
  <label class="control-label" for="width"><small>Width</small></label>
     <div class="controls"><input type="text" id="width" class="input-small" <?php if ($_GET['width']) { echo "placeholder=\"".$width."\" value=\"".$width."\""; } else { echo "placeholder=\"640\""; } ?> name="width"></div>
  <label class="control-label" for="height"><small>Height</small></label>
     <div class="controls"><input type="text" id="height" class="input-small" <?php if ($_GET['height']) { echo "placeholder=\"".$height."\" value=\"".$height."\""; } else { echo "placeholder=\"480\""; } ?> name="height"></div>
</div>
<div class="control-group well">
  <label class="control-label" for="user"><strong>Premoderate</strong><br><small>Posted by User</small></label>
     <div class="controls"><input type="text" id="user" class="input-small" <?php if ($_GET['user']) { echo "placeholder=\"".$username."\" value=\"".$username."\""; } else { echo "placeholder=\"username\""; } ?> name="user"></div>
  <label class="control-label" for="votedby"><small>n0ticed by User</small></label>
     <div class="controls"><input type="text" id="votedby" class="input-small" <?php if ($_GET['votedby']) { echo "placeholder=\"".$votedby."\" value=\"".$votedby."\""; } else { echo "placeholder=\"username\""; } ?> name="votedby"></div>
  <label class="control-label" for="noticeboard"><small>noticeboard only</small></label>
     <div class="controls">
       <input type="text" id="noticeboard" class="input-small" <?php if ($_GET['noticeboard']) { echo "placeholder=\"".$noticeboard."\" value=\"".$noticeboard."\""; } else { echo "placeholder=\"noticeboard\""; } ?> name="noticeboard">
     </div>
</div>
<div class="control-group well">
  <label class="control-label" for="flags"><strong>Postmoderate</strong><br><small>Max flags</small></label>
     <div class="controls"><input type="text" id="flags" class="input-small" <?php if ($_GET['flags']) { echo "placeholder=\"".$maxflags."\" value=\"".$maxflags."\""; } else { echo "placeholder=\"0\""; } ?> name="flags"></div>
</div>
    </div>
    <div class="span10">
      <!--Body content-->
<ul class="nav nav-pills pull-right">
<li><a href="/">Gallery</a></li>
<li class="active"><a href="">Map</a></li>
</ul>
<div class="control-group">
  <div class="controls">
	<input type="text" id="hashtag" class="input-medium search-query span4" <?php if ($_GET['hashtag']) { echo "placeholder=\"".$hashtag."\" value=\"".$hashtag."\""; } else { echo "placeholder=\"tag or keyword\""; } ?> name="hashtag">
  <button type="submit" class="btn btn-primary">Search</button>
  </div>
</div>
<?php

echo "<div class=\"row-fluid\">";
echo $embed_code;
echo "</div>";
echo "<br><br>";
echo "<div class=\"well\"><h3>Embed code</h3>";
echo htmlentities($embed_code);
echo "</div>";

?>

</form>
	</div>
</div>
<?php include_once("analytics.php") ?>
  </body>
</html>
