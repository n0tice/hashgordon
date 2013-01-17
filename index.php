<?php

require_once ('header.php');

if (empty($_GET['hashtag'])) {
  $hashtag = "";
} else {
  $hashtag = htmlspecialchars($_GET['hashtag']);
}
if (empty($_GET['limit'])) {
  $limit = 16;
} else {
  $limit = $_GET['limit'];
}
if (empty($_GET['imagesize'])) {
  $imagesize = 230;
} else {
  $imagesize = $_GET['imagesize'];
}
if (empty($_GET['gutter'])) {
  $gutter = 0;
} else {
  $gutter = $_GET['gutter'];
}
if (empty($_GET['pagination'])) {
  $pagination = "infinite";
} else {
  $pagination = $_GET['pagination'];
}
if (empty($_GET['caption'])) {
  $caption = "hover";
} else {
  $caption = $_GET['caption'];
}
if (empty($_GET['user'])) {
  $username = "";
} else {
  $username = $_GET['user'];
}
if (empty($_GET['noticeboard'])) {
  $noticeboard = "";
} else {
  $noticeboard = $_GET['noticeboard'];
}
if (empty($_GET['votedby'])) {
  $votedby = "";
} else {
  $votedby = $_GET['votedby'];
}
if (empty($_GET['flags'])) {
  $maxflags = "3";
} else {
  $maxflags = $_GET['flags'];
}
$embed_base = "<a href=\"http://n0tice.com\" class=\"n0tice-gallery\" ";
if ($hashtag) {$embed_q = "data-search=\"" . $hashtag . "\" ";} else {$embed_q = "";}
if ($noticeboard) {$embed_noticeboard = "data-noticeboard=\"" . $noticeboard . "\" ";} else {$embed_noticeboard = "";}
if ($username) {$embed_user = "data-user=\"" . $username . "\" ";} else {$embed_user = "";}
if ($votedby) {$embed_votedby = "data-voted-by-user=\"" . $votedby . "\" ";} else {$embed_votedby = "";}
if ($location) {$embed_location = "data-location=\"" . $location . "\" ";} else {$embed_location = "";}
if ($limit) {$embed_limit = "data-limit=\"" . $limit . "\" ";} else {$embed_limit = "";}
if ($imagesize) {$embed_imagesize = "data-image-size=\"" . $imagesize . "\" ";} else {$embed_imagesize = "";}
if ($gutter) {$embed_gutter = "data-gutter=\"" . $gutter . "\" ";} else {$embed_gutter = "";}
if ($pagination) {$embed_pagination = "data-pagination=\"" . $pagination . "\" ";} else {$embed_pagination = "";}
if ($caption) {$embed_caption = "data-caption-type=\"" . $caption . "\" ";} else {$embed_caption = "";}
$embed_close = ">";
$embed_title = " ";
$embed_end = "</a>";
$embed_script = "<script src=\"http://platform.n0tice.com/embed.js\" charset=\"utf-8\"></script>";
$embed_code = $embed_base . $embed_q . $embed_noticeboard . $embed_user . $embed_votedby . $embed_caption . $embed_location . $embed_limit . $embed_imagesize . $embed_gutter . $embed_pagination . $embed_close . $embed_title . $embed_end . $embed_script;
$api_url_json = "http://n0ticeapis.com/2/search?q=".$hashtag."&noticeboard=".$noticeboard."&user=".$username."&votedInterestingBy=".$votedby;
$api_url_rss = "http://n0ticeapis.com/2/search?q=".$hashtag."&noticeboard=".$noticeboard."&user=".$username."&votedInterestingBy=".$votedby."&format=rss";

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
  <label class="control-label" for="limit"><strong>Display</strong><br><small>Results per page</small></label>
     <div class="controls"><input type="text" id="limit" class="input-mini" <?php if ($_GET['limit']) { echo "placeholder=\"".$limit."\" value=\"".$limit."\""; } else { echo "placeholder=\"16\""; } ?> name="limit"></div>
  <label class="control-label" for="imagesize"><small>Image size</small></label>
     <div class="controls"><input type="text" id="imagesize" class="input-small" <?php if ($_GET['imagesize']) { echo "placeholder=\"".$imagesize."\" value=\"".$imagesize."\""; } else { echo "placeholder=\"230\""; } ?> name="imagesize"></div>
  <label class="control-label" for="gutter"><small>Gutter</small></label>
     <div class="controls"><input type="text" id="gutter" class="input-small" <?php if ($_GET['gutter']) { echo "placeholder=\"".$gutter."\" value=\"".$gutter."\""; } else { echo "placeholder=\"0\""; } ?> name="gutter"></div>
  <br>
  <label class="control-label radio" for="pagination"><small>Pagination</small></label>
     <div class="controls">
  <label class="radio">
    <input type="radio" name="pagination" id="optionsRadios1" value="pages" <?php if ($pagination == "pages") {echo "checked";} ?>>
    <small>Left-to-right</small>
  </label><br>
  <label class="radio">
    <input type="radio" name="pagination" id="optionsRadios2" value="infinite" <?php if ($pagination == "infinite") {echo "checked";} ?>>
    <small>Infinite scroll</small>
  </label>
  </div>  
  <br>
  <label class="control-label radio" for="caption"><small>Caption</small></label>
     <div class="controls">
  <label class="radio">
    <input type="radio" name="caption" id="optionsRadios2" value="under" <?php if ($caption == "under") {echo "checked";} ?>>
    <small>Under</small>
  </label><br>
  <label class="radio">
    <input type="radio" name="caption" id="optionsRadios1" value="hover" <?php if ($caption == "hover") {echo "checked";} ?>>
    <small>Hover</small>
  </label>
  </div>  
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
<a href="http://n0tice.org/for-publishers/moderation-tools-for-publishers/" class="btn btn-small btn-primary disabled"><i class="icon-info-sign icon-white"></i> Getting Started Guide</a>

    </div>
    <div class="span10">
      <!--Body content-->
<ul class="nav nav-pills pull-right">
<li class="active"><a href="">Gallery</a></li>
<li><a href="mapview.php?hashtag=<?php echo $_GET['hashtag']; ?>">Map</a></li>
</ul>
<div class="control-group">
  <div class="controls">
  <input type="text" id="hashtag" class="input-medium search-query span4" <?php if ($_GET['hashtag']) { echo "placeholder=\"".$hashtag."\" value=\"".$hashtag."\""; } else { echo "placeholder=\"tag or keyword\""; } ?> name="hashtag">
  <button type="submit" class="btn btn-primary">Search</button>
  </div>
</div>
<div class="control-group">
  <div class="controls">
<?php
require_once 'trending.php';
?>
  </div>
</div>

<?php
echo "<div class=\"row-fluid\">";
echo $embed_code;
echo "</div>";
echo "<br><br>";
echo "<div class=\"well\"><h3>Embed code</h3>";
echo htmlspecialchars($embed_code, ENT_QUOTES, "UTF-8");
echo "</div>";
echo "<p align=\"right\"><a href=\"".$api_url_json."\">JSON</a> | <a href=\"".$api_url_rss."\">RSS</a></p>";
?>

</form>
  </div>
</div>
<?php include_once("analytics.php") ?>
  </body>
</html>
