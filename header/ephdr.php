<table class="body" border="0" cellspacing="0" cellpadding="3" width="100%">
   <tr>
     <td colspan="2" align="center">:: <a href="donate_f.php" onMouseover="showit(1)">donate</a> : <a href="sponsor_f.php" onMouseover="showit(2)">sponsor eveRide</a> : <a href="represent_f.php" onMouseover="showit(3)">become a rep</a> : <a href="vc_f.php" onMouseover="showit(4)">vision &amp; concept</a> : <a href="everpark_f.php" onMouseover="showit(5)">what is an everpark?</a> : <a href="survey_f.php" onMouseover="showit(6)">take a survey</a> ::</td>
   </tr>

   <tr>
    <td class="linkbar" align="center" valign="top">

<!-- Edit the dimensions of the below, plus background color-->
<ilayer width="680" height="10" name="dep1" bgColor="#1a5c8a">
<layer name="dep2" width="680" height="10">
</layer>
</ilayer>
<div id="describe" style="background-color: #1a5c8a; width: 680px; height: 10px" onMouseover="clear_delayhide()" onMouseout="resetit(event)"></div>


<script language="JavaScript1.2">

/*
Tabs Menu (mouseover)- By Dynamic Drive
For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
This credit MUST stay intact for use
*/

var submenu=new Array()

//Set submenu contents. Expand as needed. For each content, make sure everything exists on ONE LINE. Otherwise, there will be JS errors.

//default
submenu[0]=''

//donate
submenu[1]=''

//sponsor
submenu[2]='&middot; <a class="menubar" href="sponsor_f.php#ben">Benefits of Sponsorship</a> &middot; <a class="menubar" href="sponsor_f.php#howto">How to Sponsor</a> &middot; <a class="menubar" href="sponsor_f.php#banner">Get a Banner</a> &middot; <a class="menubar" href="sponsor_f.php#ad">Ad Swap</a> &middot; <a class="menubar" href="sponsor_f.php#dd">Donation Destinations</a> &middot;'

//represent
submenu[3]='&middot; <a class="menubar" href="represent_f.php#get">Get Sponsored</a> &middot; <a class="menubar" href="represent_f.php#rep">Become a Rep</a> &middot; <a href="represent_f.php#teamrep" class="menubar">eveRide everpark Team</a> &middot; <a class="menubar" href="https://www.everide.org/~everideo/evereps/" target=\"_new\">Rep/Rider Login</a> &middot;'

//vision and concept
submenu[4]='&middot; <a class="menubar" href="vc_f.php#fp">Future Plans</a> &middot; <a class="menubar" href="vc_f.php#hp">Humanitarian Programs</a> &middot; <a class="menubar" href="vc_f.php#founder">Meet the Founders</a> &middot;'

//everpark
submenu[5]='&middot; <a class="menubar" href="everpark_f.php#rev">Revolutions</a> &middot; <a class="menubar" href="everpark_f.php#anti">Anti-Lift</a> &middot; <a class="menubar" href="everpark_f.php#wgg">White Glove Groomers</a> &middot; <a class="menubar" href="everpark_f.php#ter">Terrain Types</a> &middot; <a class="menubar" href="everpark_f.php#pro">Projections</a> &middot;'

//survey
submenu[6]=''

//Set delay before submenu disappears after mouse moves out of it (in milliseconds)
var delay_hide=5000

/////No need to edit beyond here

var menuobj=document.getElementById? document.getElementById("describe") : document.all? document.all.describe : document.layers? document.dep1.document.dep2 : ""

function showit(which){
clear_delayhide()
thecontent=(which==-1)? "" : submenu[which]
if (document.getElementById||document.all)
menuobj.innerHTML=thecontent
else if (document.layers){
menuobj.document.write(thecontent)
menuobj.document.close()
}
}

function resetit(e){
if (document.all&&!menuobj.contains(e.toElement))
delayhide=setTimeout("showit(5)",delay_hide)
else if (document.getElementById&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhide=setTimeout("showit(5)",delay_hide)
}

function clear_delayhide(){
if (window.delayhide)
clearTimeout(delayhide)
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function showdefault() {
showit (5)
}

showdefault()
</script>

    </td>
   </tr>
  </table>