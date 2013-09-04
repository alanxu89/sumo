<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
 <title>SUMO - Planet SUMO</title>
 <link rel="stylesheet" type="text/css" href="sumo.css"/>

  <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
  <META NAME="DC.Title" CONTENT="SUMO - Planet SUMO">
  <META NAME="DC.Subject" CONTENT="road traffic simulation package SUMO (Simulation of Urban MObility)">
  <META NAME="DC.Description" CONTENT="">
  <META NAME="DC.Publisher" CONTENT="Institute of Transportation Systems at the German Aerospace Center">
  <META NAME="DC.Type" CONTENT="Text">
  <META NAME="DC.Format" SCHEME="IMT" CONTENT="text/html">
  <META NAME="DC.Identifier" CONTENT="http://sumo-sim.org">
  <META NAME="DC.Language" SCHEME="ISO639-1" CONTENT="en">
  <META NAME="DC.Relation" SCHEME="URL" CONTENT="http://sumo-sim.org/index.html">
  <META NAME="DC.Rights" CONTENT="(c) ITS/DLR">
  <META NAME="DC.Date.X-MetadataLastModified" SCHEME="ISO8601" CONTENT="2011-03-04">
  <META http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>

<body id="bmission">
<div id="container">



 <div id="logo" align="left"><img src="logo.png" width="128" height="128" align="left"
     alt="SUMO-Simulation of Urban Mobility" style="margin-left:10px;
     margin-right:20px;"/>
     <div id="logo_text1"> SUMO </div>
     <div id="logo_text2"> Simulation of Urban MObility</div>
 </div>

 <div id="subsMenu"><ul>
  <li class="sub"><a href="/">Home</a></li>
  <li class="sub"><a href="/wiki/Downloads">Download</a></li>
  <li class="sub"><a href="/userdoc/">Documentation</a></li>
  <li class="sub"><a href="/wiki/">Wiki</a></li>
  <li class="sub"><a href="/trac/">Trac</a></li>
  <li class="sub"><a href="/blog/">Blog</a></li>
  <li class="sub"><a href="/userdoc/Contact.html">Contact</a></li>
  <li class="sub"><a href="http://sourceforge.net/projects/sumo/">SF-Project</a></li>
 </ul></div>

<h2>Planet SUMO</h2>
<p>This is the place where you can upload your scenarios to make them available to the community and
have them executed regularly with the most recent version of sumo. If you prefer to follow all the scenarios
you can head over to the <a href="https://github.com/planetsumo/sumo/tree/planet">Planet SUMO GitHub repository</a>. You can of course also submit your
scenario there via a pull request.
</p>
<h3>What to submit</h3>
<p>The minimal scenario consists of three files:
<ul><li>a network file (.net.xml),</li><li>a route file (.rou.xml), and</li><li>a configuration (.sumocfg).</li></ul>
You can also provide additional files for instance the sources of the network file or additional detector files and
even Python scripts if you use TraCI. Please be aware that we only accept the following file extensions for uploaded
files:
<?php
$allowedExts = array("zip", "gz", "bz2", "7z", "xml", "cfg", "txt", "sumocfg", "netccfg");
foreach (array_values($allowedExts) as $ext) {
    print " " . $ext
}
?>
. So if you include Python files, you will need to zip your contribution.</p>
<h3>How to submit</h3>
<p>Please use the form below to submit at most three files together with a license. Please use a short but descriptive name
consisting preferrably of letters, numbers and underscores only. If you have README.txt accompanying your scenario you
can safely leave the description open. Please provide an email address which lets us keep in touch.
<emph>Thank you very much in advance for sharing your scenario!</emph>
</p>
<?php
if (isset($_FILES["file1"])):
    $extension = end(explode(".", $_FILES["file"]["name"]));
    if (($_FILES["file"]["size"] < pow(2, 20)) && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
#            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
#                echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            }
        }
    } else {
        echo "Invalid file";
    }
endif;
?>
<form action="planetsumo.php" method="post" enctype="multipart/form-data">
    <label for="file1">Filename:</label>
    <input type="file" name="file1" id="file1">
    <input type="file" name="file2" id="file2">
    <input type="file" name="file3" id="file3"><br>
    <label for="license">License:</label>
    <select name="license">
        <option value="CC-BY-SA">Creative Commons Attribution Share Alike</option>
        <option value="GPL3">GNU General Public License v3.0</option>
        <option value="PD">Public Domain</option>
    </select>
    <label for="description">Description:</label>
    <textarea name="description" cols="50" rows="10"/>
    <input type="submit" name="submit" value="Submit">
</form>

 <div id="footer">
   <div>(c) 2011-2013, German Aerospace Center, Institute of Transportation Systems</div>
   <div>Layout based on <a href="http://www.oswd.org/design/preview/id/3365">"Three Quarters"</a> by "SimplyGold"</div>
 </div>
 
</div></body>

</html>
