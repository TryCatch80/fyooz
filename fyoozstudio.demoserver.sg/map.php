<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
function myNavFun()
{
    // If it's an iPhone..
    if( (navigator.platform.indexOf("iPhone") != -1) 
        || (navigator.platform.indexOf("iPod") != -1)
        || (navigator.platform.indexOf("iPad") != -1))
         window.open("maps://maps.google.com/maps?daddr=lat,long&amp;ll=");
    else
         window.open("http://maps.google.com/maps?daddr=lat,long&amp;ll=");
}
?>
  	<H1>
   		<a href="geo:57.053824,9.961334999999963?z=8">Click here for maps</a>
	</h1>
   <BR><BR>
   		<a href="geo:53,-9?saddr=(53,-9)&daddr=(42,4)">Click here for route maps</a>
   <BR><BR>   
   		<a href="geo:50.066274, 10.754427;">Location here!</a>
   <BR><BR>
   Iphone
   <BR><BR>
		<a href="http://maps.apple.com/?daddr=San+Francisco,+CA&saddr=cupertino">Directions</a>
   <BR><BR>
   android
   <BR><BR>
		<a href="geo:57.053824,9.961334999999963;u=35">open map</a>
        <a href="geo:894%20Granville%20Street%20Vancouver%20BC%20V6Z%201K3">Find Us</a>

        <a style="cursor: pointer;" onclick="myNavFunc('31.046051','34.85161199999993')">Take me there!</a>

 </body>
</html>