<?php
session_start();
include "config2.php";
	// any copy of this code must contain the following:
	// this code is public domain no warranty is implied this code can not be used for profit
	// fuck capitalism send all the bourgeois scum to gulag
	// made by cybergrunge.net 2021-22
?> <html>
<?php session_start(); 
//user panel
	$MyUsername = "<a style='background-color:" . strip_tags($_SESSION["bgcolor"]) . ";color:" . strip_tags($_SESSION["textcolor"]) . "'><font size=2>&nbsp;" . strip_tags($_SESSION["username"]) . "&nbsp;</font> </a>";
	if(isset($_SESSION['username'])){ echo '<div style="z-index:99999999;position:fixed;left:5px;bottom:5px;background-color:#444;padding:7	px;border-radius:10%;border:5px inset;line-height:1.7"><font size=3><span  class="aliasClass" ">Logged in as: </span> '.$MyUsername.'<br> <a class="aliasClass" href="http://cybergrunge.net/login stuff/welcome.php">user tasks</a> - <a class="aliasClass" href="http://cybergrunge.net/login stuff/logout.php">log out<br></a> </span></span></font></div>';}
?>
<head><title>~Productivity Suite by CGRU~</title>
<link href="https://fonts.googleapis.com/css?family=PT+Mono&display=swap" rel="stylesheet">
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<style>		
	.windowname {height:20px;width:100%;background:linear-gradient(to right, #00F, #005);padding:1px;color:#FFF;cursor:move;}		
	.exit{position:absolute;display:inline-block;right:0px}		
	.close{border:2px #BBB outset;background:linear-gradient(to top, gray, white);font-weight:bold;font-size:10;padding:1px;}
	.close:active{border:2px #BBB inset;background:linear-gradient(to top, gray, gray);font-weight:bold;font-size:10;padding:1px;}
	.close:hover{border:2px #BBB outset;background:linear-gradient(to top, #CCC, #CCC);font-weight:bold;font-size:10;padding:1px;}
	.window{position:absolute;background-color:#00F;color:white;width:350px;height:300px;border:2px white outset;overflow:hidden}
	.inside{position:relative;height:100%;background-color:#CCC;color:#111;padding:10px;bottom:0px;right:0px;overflow:scroll-y}
    	.divResize { z-index:21;border:outset 5px black;background-color:#aaa;position:absolute;}
 	 @font-face { font-family: Alias; src:url('http://cybergrunge.net/Alias.woff') format('woff');} 
	p1 {font-family: Alias, monospace;} 
	input {border:2px black ridge;}
	.aliasClass {  font-family: alias; color:#0f0; background-color:black;}
	.main{font-family: 'PT Mono', monospace;visibility:visible;position:absolute;left:30px;top:100;background-color:#aaa;padding:5px;border: 5px gray outset;width:350;z-index:55555;line-height:1}
</style>
	</head>
<body style="background-color:#996; font-family:monospace;overflow:hidden;cursor:crosshair">
<div class="main">

<form action="custom upload.php" method="post" enctype="multipart/form-data"><b>
<?php 
//if user is logged in let them know otherwise prompt to register or sign in
if(isset($_SESSION['username'])) {echo  '<font style="color:black;background-color:#aaa">You are logged in as '.$MyUsername;} else{ echo '<span style="background-color:black;color:#00f;font-family: "PT Mono", monospace;"><font style="background-color:#0FF;color:black;"><font size=2><b>Not logged in. <a href="../login%20stuff/login.php">login</a> or <a href="../login stuff/register.php">Register</a>For An Account if you want.</font></span></b>';} ?>

<br></font></font><font size=2><br>
<font style="color:black;">
Audio file (mp3,wav): 
	<input  type="file" id="fileToUpload" name="fileToUpload" id="fileToUpload"><br>
Album Art (png,jpg,gif,webp):<br>
	<input type="file" id="artToUpload" name="artToUpload" id="artToUpload"><br><br>
ARTIST: <br><input style="background-color:#888;color:#333" value="<? if(isset($_POST["artistname"])){echo $_POST["artistname"];};?>" maxlength="150" type="text" name="artistname" id="artistname"><br>
ALBUM NAME: <br><input style="background-color:#888;color:#333" value="<? if(isset($_POST["albumname"])){echo $_POST["albumname"];};?>" maxlength="150" type="text" name="albumname" id="albumname"><br><br>NOTE:<br>
<li>You can upload 1 (one) track at a time.</li>
<li>Song"titles"are identical to filename.</li>
<li>Tracks list in alphanumeric order.</li>
<li>MP3's prefered. WAV's upload very slow.</li>
<li>Re-enter album name for each track.</li>
</font><br></i></u>

<input type="submit" id="submit" value="Upload" name="submit" onclick="uploadfile(<? echo $_FILES['fileToUpload']['name']; ?>)" ><br></form>
</font></b><br></div></div></div></font></font></font></font>
<div style='position:fixed;background-color:red;top:0px;left:0px;color:black;'><font size=3>DEBUG INFO: 
<?php
	/*	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_SESSION["username"])){$sql = "INSERT INTO `reywre` (`owner`, `page`) VALUES ('".$_SESSION["username"]."', '".urlencode($_POST["artistname"])."/".urlencode($_POST["albumname"])."') ";
			if($stmt = mysqli_prepare($link, $sql)){
			// Attempt to execute the prepared statement
	    	if(mysqli_stmt_execute($stmt)){}else{echo "Something went wrongwith the sql bullshit. Please try again later.";}
    	    mysqli_stmt_close($stmt);}
			mysqli_close($link);
	}}*/

$uploadOk = 1;
$debugdiv = "";

$target_file = basename($_FILES["fileToUpload"]["name"]); 

$target_file = str_replace('"', "-", $target_file);
$target_file = str_replace("'", "-", $target_file);
$target_file = str_replace(',', "-", $target_file);
$target_file = str_replace(":", "-", $target_file);
$target_file = str_replace(";", "-", $target_file);
$target_file = str_replace("(", "-", $target_file);
$target_file = str_replace(")", "-", $target_file);
$target_file = str_replace("<", "x", $target_file);
$target_file = str_replace(">", "x", $target_file);
$target_file = str_replace("}", "_", $target_file);
$target_file = str_replace("{", "_", $target_file);
$target_file = str_replace("[", "_", $target_file);
$target_file = str_replace("]", "_", $target_file);
$target_file = str_replace("@", "_", $target_file);
$target_file = str_replace("&", "_", $target_file);
$target_file = str_replace("$", "_", $target_file);
$target_file = str_replace("^", "_", $target_file);
$target_file = str_replace("#", "_", $target_file);
$target_file = str_replace("*", "_", $target_file);
$target_file = str_replace("?", "_", $target_file);
$target_file = str_replace("`", "_", $target_file);
$target_file = str_replace("!", "_", $target_file);
$target_file = str_replace(".php", ".fuckyou", $target_file);
$target_file = str_replace(".html", ".fuckyou", $target_file);
$target_file = str_replace(".js", ".fuckyou", $target_file);
$target_file = str_replace(".cgi", ".fuckyou", $target_file);
$target_file = str_replace(" ", "_", $target_file);

  $file_name =  $_FILES['fileToUpload']['name'];
  $tmp_name = $_FILES['fileToUpload']['tmp_name'];
  $file_up_name = time().$file_name;

$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

$art_file = basename($_FILES["artToUpload"]["name"]);

$artFileType = pathinfo($art_file,PATHINFO_EXTENSION);

// Check file size
	if ($_FILES["fileToUpload"]["size"] > 900000000000) {$uploadOk = 0;}
/*
$filea = file_get_contents($_FILES["artToUpload"]["tmp_name"]);
if (preg_match("php", $filea)){$uploadOk=0; echo "<div style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;'><h2>potential malicious code was found in the file you uploaded. this may be in error, retry your upload in wav, ogg or mp3.</h2></div>";}
else {echo "<div style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;font-size:10px;'>thanks for not uploading malicious code! :D</div>";}

$fileaa = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
if (preg_match("php", $fileaa)){$uploadOk=0; echo "<div  style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;'><h2>potential malicious code was found in the file you uploaded. this may be in error, retry your upload in wav, ogg or mp3.</h2></div>";}
else {echo "<div style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;font-size:10px;'>thanks for not uploading malicious code! :D</div>";}
*/

	if ($uploadOk == 0) {echo "something terrible has happened";} 
// Allow certain file formats
	if($FileType != null && $FileType != "mp3" && $FileType != "wav" && $FileType != "zip" && $FileType != "rar" && $FileType != "iso" && $FileType != "ogg" && $FileType != "midi"&& $FileType != "flp"&& $FileType != "txt"&& $FileType != "dll") {
		$uploadOk = 0; echo "invalid filetype for album track. accepted filetypes: mp3 wav zip rar iso ogg midi flp txt dll <br>";}

	if($art_file != null && $artFileType != ("JPG"||"jpg"||"Jpg"||"png"||"PNG"||"bmp"||"BMP"||"gif"||"GIF"||"webp"||"webm")) {
		echo "invalid filetype for album art. accepted filetypes: jpg png bmp gif webp webm <br>"; $uploadOk = 0;}
else {
$albumname = str_replace("'", "-", $albumname);
$albumname = str_replace('"', "-", $albumname);
$albumname = str_replace(" ", "_", $albumname);
$albumname = str_replace('`', "-", $albumname);
$albumname = str_replace(',', "-", $albumname);
	$artistname = str_replace("'", "-", $artistname);
	$artistname = str_replace('"', "-", $artistname);
	$artistname = str_replace(" ", "_", $artistname);
	$artistname = str_replace('`', "-", $artistname);
	$artistname = str_replace(',', "-", $artistname);
	
$albumname = htmlspecialchars($_POST["albumname"]);
	$artistname = htmlspecialchars($_POST["artistname"]);
	$trackname = htmlspecialchars($_POST["tracktitle"]);
	$pathname = $artistname . "/" . $albumname;
	$newpagehead = ""; $artistexists = ""; //if the artist directory doesnt exist, make it and make a new file for the album.
	
	if (is_dir($artistname) == false && $uploadOk == 1) {
	    mkdir ($artistname);
	    $newpagehead = $createalbum;
		move_uploaded_file($_FILES["artToUpload"]["tmp_name"], $pathname . "/" . $art_file);
		}

$art_file = str_replace(".php",".fuckyou", $art_file);
$art_file = str_replace(".js",".fuckyou", $art_file);
$art_file = str_replace(".html",".fuckyou", $art_file);
$art_file = str_replace(".cgi",".fuckyou", $art_file);
//if the artist directory exists, continue with uploading
	if (is_dir($artistname) == true && $uploadOk == 1) {
echo "artist folder exists...";
//make a link to the album in the index
	move_uploaded_file($_FILES["artToUpload"]["tmp_name"], $pathname . "/" . $art_file);}
//if the album directory doesnt exist, make it.
	if (is_dir($pathname) == false && $uploadOk == 1) {mkdir ($pathname); $newpagehead = $createalbum; //move art
	move_uploaded_file($_FILES["artToUpload"]["tmp_name"], $pathname . "/" . $art_file);
	}
}

//if the album directory exists, continue with uploading
	if (is_dir($pathnamename) == true) {echo "album dir exists..."; }
//continue uploading
	if ($uploadOk == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $pathname . "/" . $target_file)){
// define stuff
	str_replace('"', "", $albumname);
	str_replace("'", "", $albumname);
	str_replace('"', "", $artistname);
	str_replace("'", "", $artistname);
    $albumname = $_POST["albumname"];
    $artistname = $_POST["artistname"];
    $trackname = $_POST["tracktitle"];
    $pathname = $albumname;
	// create or append album page
				
	$artistsrc = 'artist.php';
	$newartist = $artistname . '/artist.php';
				
	if (!copy($artistsrc, $newartist)) {echo "ERROR: failed to create artist.php <br>";}	
	//append index of albums
	//check and update index status
    echo $debugdiv . "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</font>";}

else {echo "". $pathname ." ". $target_file." failed to move uploaded file! ...";}
$datapath = $artistname . '/' . $albumname . '/userdata.txt'; 
$datatxt = fopen($datapath, 'w');
fwrite($datatxt,   "<font style='background-color:".$_SESSION["bgcolor"].";color:".$_SESSION["textcolor"].";' size=2>".$_SESSION["username"]."</font>"); fclose($fp);

if(isset($_POST["artistname"])){
echo "<div style='position:absolute;left:420;top:20;'>your album will appear here after uploading a track.<br>
from there u can edit style, delete/upload tracks etc.<br><iframe style='width:700;height:550;' src='../artists/" . htmlspecialchars($_POST["artistname"]) . "/" . htmlspecialchars($_POST["albumname"]) . "/editalbum'></iframe></div>";}else{
echo "<div style='position:absolute;left:420;top:20;'>your album will appear here after uploading a track.<br>
from there u can edit style, delete/upload tracks etc.<br><iframe style='width:700;height:550;' src=''></iframe></div>";} ;
echo "upload status = " . $uploadOk;
?>
