<?php require_once "includes/config.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo "http://$host$path/";?>styles/styles.css" />
<link rel="icon" type="image/png" href="http://<?php echo "$host$path/";?>styles/favicon.png" />
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="<?php echo "http://$host$path/";?>includes/js/js.js" type="text/javascript"></script>
<script>
if($("#showMore")){$(window).scroll(function(){if($(window).scrollTop()>=$(document).height()-$(window).height()-300){$("#showMore").click();}});}
</script>
<title><?php if(isset($_GET['q']) && $_GET['q']!=""){echo $_GET['q']." - Søgning af ";}else{echo "";} ?>Brugere<?php echo "$webTitle";?></title>
</head>
<body>
<?php
protection();

if(isset($_GET['appr']) && !empty($_GET['userid'])){
mysql_query("UPDATE users SET approval='$_GET[appr]' WHERE id='$_GET[userid]'") or die(mysql_error());
$msg[] = $_GET[appr] == 0 ? "Kontoen er deaktiveret." : "Kontoen er aktiveret.";
}
require_once "includes/header.php";
?>
<div id="globalContentContainer">

<div id="globalSearch">
<form action="" method="get">
<div id="globalSearchContainer">
<input type="text" id="q" class="fq" name="q" autocomplete="off" spellcheck="false" onkeyup="getInstant(this);" value="<?php echo $_GET['q'];  ?>" />
<input type="submit" id="search" name="search" value="" title="Søg" />
<div id="qReset"></div>
</div>
<div align="left" style="font-weight:normal;font-size:9px;">Søg på: Navn, brugernavn, email, telefon nr., website, geografi eller kompetencer</div>
</form>
</div>
<div id="globalRsList">
<div class="globalListContent">
<ul id="globalListContentRs">
<?php include "includes/fs.php";?>
</ul>
</div>
</div>

</div>
<?php require_once "includes/footer.php";?>
</div>
</body>
</html>