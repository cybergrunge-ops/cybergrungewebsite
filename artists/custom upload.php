<?php
session_start();
include "config2.php";
// this code is made for my use. it is put in public domain. only i accept risks for problems in my own use.
// u are free to use it but im not responsible if the code sucks do your own research - cybergrunge.net
// january 2022
// this just handles users uploads. i kinda need to cut this down a lot more and fix my sql database up
?>

<html>
  
<?php 
    //user panel bullshit. bgcolor, textcolor are stored as varchar(3) so a # has to be added when using them
    //i almost always use only 3 hex values for colors because noone actually needs more colors than that

$MyUsername = "<a style='background-color:#" . strip_tags($_SESSION["bgcolor"]) . ";
color:#" . strip_tags($_SESSION["textcolor"]) . "'><font size=2>
&nbsp;" . strip_tags($_SESSION["username"]) . "&nbsp;</font> </a>";

    // sorry for using inline styles, sue me.
if(isset($_SESSION['username'])){ echo '
<style> @font-face {  font-family: alias; src: url("http://cybergrunge.net/alias.woff");} .aliasClass {  font-family: alias; color:#0f0; background-color:black;}</style><div style="z-index:99999999;position:fixed;left:5px;bottom:5px;background-color:#444;padding:7px;border-radius:10%;border:5px inset;line-height:1.7">
<font size=3><span class="aliasClass" ">Logged in as: </span> '.$MyUsername.'<br> <a class="aliasClass" href="../login stuff/welcome.php">user tasks</a> - 
<a class="aliasClass" href="../login stuff/logout.php">log out<br></a> </span></span></font></div>';}
?>
    
<head><title>~Productivity Suite for Artists by cgru.net~</title>
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
</style>
<script> $(document).ready(function() { $(".divResize").draggable(); $(".resize").resizable();});
function showr(){document.getElementById("rtfmtxt").style.visibility = "visible"}
function hider(){document.getElementById("rtfmtxt").style.visibility = "hidden"}
</script>

</head>
<body style="background-color:#996; font-family:monospace;overflow:hidden;cursor:crosshair">

<? 
    if(!isset($_SESSION['username'])){ echo'<a href="../login%20stuff/login.php"><img  src="https://cybergrunge.net/icon2.png"></a> ';} 
?>

    <a onclick="showr()"><img src="https://cybergrunge.net/icon3.png" style="cursor:help"></a>

<div class="divResize"  id="rtfmtxt" style="position:absolute;left:550px;top:20px;height:350px;width:495px;visibility:hidden">
    <div class="windowname">README.html<div class="exit"><button class="close" onclick="hider()">X</button></div></div>
<div style="width:95%;height:85%;padding:10px;overflow-y:scroll;line-height:1;"></font></span></font></span>
    <font size=4 style="background-color:yellow;"><b><u>NOTES:</font></b></u><br><font size=3></font></span> 
<br><br>
Please ensure when uploading multiple tracks the album Name you are adding tracks to matches identically with existing album title (capitalization etc) Autocomplete usually will do this for you<br><br>
your trakcs will be listed in alphabetical order to make set track list please name your files with "01", "02", "03" etc at the beginning for proper order. 
this will be changed later so that you can title individual tracks and whatever. <br><br></font>
</div></div>

<div style="font-family: 'PT Mono', monospace;visibility:visible;position:absolute;left:30px;top:100;background-color:#aaa;padding:5px;border: 5px gray outset;width:350;z-index:55555;line-height:1">
	
	<form action="custom upload.php" method="post" enctype="multipart/form-data"><b>
<?php  
if(isset($_SESSION['username'])) {echo '<font style="color:black;background-color:#aaa">You are logged in as '.$MyUsername; } 
else{ echo '<span style="background-color:black;color:#00f;font-family: "PT Mono", monospace;"><font style="background-color:#0FF;color:black;"><font size=2><b>Not logged in. <a href="../login stuff/register">Register</a>For An Account if you want.</font></span></b>';} 
?>

<br></font></font></font><font size=2><br>
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
</font> 
</b><i><br></div></div></div></font></font></font></font>



<div id="donate" style="position:absolute;cursor:move;z-index:1111;top:100px;left:1099px;width:150px;background-color:#0FF;line-height:1;border-radius:60%;border: double black 9px;padding:15px;">
insert crying about how poor i am here<br>
insert nagging donate button here
</div>
</body>
</html>




<?php



	/*
not sure why this is commented out tbh
* oh. because it doesnt work. why doesnt it work.... hmmm.... i feel dizzy and nauseous...
* sigh.

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_SESSION["username"])){
$sql = "INSERT INTO `reywre` (`owner`, `page`) VALUES ('".$_SESSION["username"]."', '".urlencode($_POST["artistname"])."/".urlencode($_POST["albumname"])."') ";
			if($stmt = mysqli_prepare($link, $sql)){
			// Attempt to execute the prepared statement
	    	if(mysqli_stmt_execute($stmt)){}else{echo "Something went wrongwith the sql bullshit. Please try again later.";}
    	    mysqli_stmt_close($stmt);}
			mysqli_close($link);


	}}
	* 
	* 
	** i really want this to work because i want to create a SQL entry when album is created so people dont have to
* manually create an SQL table entry by using createstyle.php....
* oh well.
* 
* */

$uploadOk = 1;
$debugdiv = "<div style='position:fixed;background-color:red;top:0px;left:0px;color:black;'><font size=3>DEBUG INFO: ";

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
$target_file = str_replace(".php", ".nope", $target_file);
$target_file = str_replace(".html", ".nope", $target_file);
$target_file = str_replace(".js", ".nope", $target_file);
$target_file = str_replace(".cgi", ".nope", $target_file);
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
//crappy simple "malicious php" code detector that is not feasible for large files like wavs

$filea = file_get_contents($_FILES["artToUpload"]["tmp_name"]);
if (preg_match("php", $filea)){$uploadOk=0; echo "<div style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;'><h2>potential malicious code was found in the file you uploaded. this may be in error, retry your upload in wav, ogg or mp3.</h2></div>";}
else {echo "<div style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;font-size:10px;'>thanks for not uploading malicious code! :D</div>";}

$fileaa = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
if (preg_match("php", $fileaa)){$uploadOk=0; echo "<div  style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;'><h2>potential malicious code was found in the file you uploaded. this may be in error, retry your upload in wav, ogg or mp3.</h2></div>";}
else {echo "<div style='z-index:999;position:absolute;bottom:0px;background-color:#0F0;font-size:10px;'>thanks for not uploading malicious code! :D</div>";}
*/






// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {} 
// check file format
	if($FileType != null && $FileType != "mp3" && $FileType != "wav" && $FileType != "zip" && $FileType != "rar" && $FileType != "iso" && $FileType != "ogg" && $FileType != "midi"&& $FileType != "flp"&& $FileType != "txt"&& $FileType != "dll") {
		$uploadOk = 0; echo $debugdiv . "<font size=7>HELLO AS I PREVIEOUSLY SAID<br> ONYL THESE ACCEPTED FILETYPES:  MP3 WAV FLP MIDI OGG ZIP ISO TXT RAR -FILES ARE ACCEPTED <br>PLEASE ENSURE YOU READ INSTRUCTIONS <br> THANK YOU VERY MUCH =]<br> HAVE A NICE DAY";}

	if($art_file != null && $artFileType != ("JPG"||"jpg"||"Jpg"||"png"||"PNG"||"bmp"||"BMP"||"gif"||"GIF"||"webp"||"webm")) {
		echo $debugdiv . "only .JPG, png, bmp or GIF allowed.</font><br></div>"; $uploadOk = 0;}
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
	if (is_dir($artistname) == true && $uploadOk == 1) {echo "artist folder exists";
//make a link to the album in the index
	move_uploaded_file($_FILES["artToUpload"]["tmp_name"], $pathname . "/" . $art_file);}
//if the album directory doesnt exist, make it.
	if (is_dir($pathname) == false && $uploadOk == 1) {mkdir ($pathname); $newpagehead = $createalbum; //move art
	move_uploaded_file($_FILES["artToUpload"]["tmp_name"], $pathname . "/" . $art_file);
	}
}




//if the album directory exists, continue with uploading
	if (is_dir($pathnamename) == true) {echo $debugdiv . "album dir exists<br></font>"; }
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
		
		
	//append index of albums
	//check and update index status
    echo $debugdiv . "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</font>";}



//userdata.txt contains info about the person that uploaded (if they are logged in)
//was a crappy makeshift way to store data before i knew how to do SQL, and still implemented because i still dont really know how to do SQL
else {echo $debugdiv . "". $pathname ." ". $target_file." failed.</div>";}
$datapath = $artistname . '/' . $albumname . '/userdata.txt'; 
$datatxt = fopen($datapath, 'w');
fwrite($datatxt,   "<font style='background-color:#".$_SESSION["bgcolor"].";color:#".$_SESSION["textcolor"].";' size=2>".$_SESSION["username"]."</font>"); fclose($fp);


//ope. looks like i was using htmlspecialchars instead of urlencode i guess im a dumbass.



if(isset($_POST["artistname"])){
echo "<div style='position:absolute;left:420;top:20;'>Here is your album so far. You can edit it convniently from here or continue uploading more tracks.<br><iframe style='width:700;height:550;' src='" . htmlspecialchars($_POST["artistname"]) . "/" . htmlspecialchars($_POST["albumname"]) . "/editalbum'></iframe></div>";
}

else{
echo "<div style='position:absolute;left:420;top:20;'>your album will appear here after uploading a track.<br>
from there u can edit style, delete/upload tracks etc.<br><iframe style='width:700;height:550;' src=''></iframe></div>";
}
;

echo $uploadOk;


?>




































