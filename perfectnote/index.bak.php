<html>
<head>
<title>Perfect Note || Guitar Schools</title>
<link rel="stylesheet" href="style.css" type="text/css">

<script language="JavaScript1.2">

/*
Tabs Menu (mouseover)- By Dynamic Drive
For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
This credit MUST stay intact for use
*/

var submenu=new Array()

//Set submenu contents. Expand as needed. For each content, make sure everything exists on ONE LINE. Otherwise, there will be JS errors.
 
//classes
submenu[0]='Click here to get information about our classes, view our class calendar and schedule, and to get to your student login.'

//instructors
submenu[1]=''

//Signup
submenu[2]='Once you know which class schedule you would like to take, <a href="signup.php">CLICK HERE</a> to sign up for it!'

//Goals
submenu[3]=''

//Set delay before submenu disappears after mouse moves out of it (in milliseconds)
var delay_hide=1000

function getdiv(divelement) {
return document.getElementById? document.getElementById(divelement) : document.all? eval("document.all." + divelement) : document.layers? document.dep1.document.dep2 : "";
}

function showit(which,menuobj){
clear_delayhide()
thecontent=(which==-1)? "" : submenu[which]
if (document.getElementById||document.all){
	menuobj.innerHTML=thecontent
}
else if (document.layers){
	menuobj.document.write(thecontent)
	menuobj.document.close()
}
}

function resetit(e,menuobj){
if (document.all)
delayhide=setTimeout("showit(-1,getdiv('" + menuobj + "'))",delay_hide)
else if (document.getElementById&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhide=setTimeout("showit(-1,getdiv('" + menuobj + "'))",delay_hide)
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


function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

</script>

</head>

<body onLoad="MM_preloadImages('images/instructors_over.gif','images/signup_over.gif','images/classes_over.gif','images/goals_over.gif')">

<table border="0" cellspacing="0" cellpadding="3" align="center" width="800">
<tr>
	<td height="202" width="395" align="center" valign="top"><?php include("includes/class.php"); ?></td>
	<td align="center" width="10"><img src="images/vert_line.gif"></td>
	<td width="395" align="center" valign="top"><?php include("includes/teach.php"); ?></td>
</tr>
<tr>
	<td colspan="3">
		<table border="0" cellspacing="0" cellpadding="3" align="center" width="800">
		<tr>
			<td><img src="images/horz_line.gif"></td>
			<td width="323" align="center"><img src="images/logo-1.gif"></td>
			<td><img src="images/horz_line.gif"></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td height="202" width="395" align="center" valign="bottom"><?php include("includes/signup.php"); ?></td>
	<td align="center" width="10"><img src="images/vert_line.gif"></td>
	<td width="395" align="center" valign="bottom"><?php include("includes/goals.php"); ?></td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><a href="contact.php">Contact Us</a></td>
</tr>
</table>
</body>
</html>