<html>
<head>
<title>Perfect Note || Guitar Schools</title>
<link rel="stylesheet" href="style.css" type="text/css">

<script type="text/javascript">

var submenu=new Array()
 
//classes
submenu[0]=	'<p><strong>Perfect Note Classes</strong></p>'
			+'<p style="text-indent: 35px">This section has all the info pertaining to our classes, including: Group and Private class info, pricing, schedules, and more. Existing Perfect Note Students can come here to sign in as well.</p>'
			+'<p style="text-indent: 35px">Do we have the Class for you? Click Here to Find Out.</p>'

//instructors
submenu[1]='<p><strong>Perfect Note Instructors</strong></p>'
			+'<p style="text-indent: 35px">If You\'re wanting to know who will be teaching your class, come to our Instructors Section to learn about us.</p>'

//Signup
submenu[2]=	'<p><strong>Perfect Note Class Sign Up</strong></p>'
			+'<p style="text-indent: 35px">Signing up for our classes is easy! We\'ve created the signup process to be done in 3 easy steps. First you will need to select either Group or Private Lessons. The Second step is to select your Skill level. And for the Third step, all we need is your personal information and which Session you\'d like to sign up for.</p>'
//Goals
submenu[3]=	'<p><strong>Perfect Note Goals</strong></p>'
			+'<p style="text-indent: 35px">Please check back soon for more information</p>'

//default showing
submenu[4]='<p style="text-align: center;"><img src="images/teaching_home.jpg"></p>'

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
	delayhide=setTimeout("showit(4,getdiv('" + menuobj + "'))",delay_hide)
	else if (document.getElementById&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
	delayhide=setTimeout("showit(4,getdiv('" + menuobj + "'))",delay_hide)
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
	showit (4, getdiv('main'))
}

//Image Mouseover Script
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

<table border="0" cellspacing="0" cellpadding="3" align="center" width="758">
<tr>
	<td width="421" height="100" valign="bottom"><blockquote><img src="images/site_add.gif"></blockquote></td>
	<td width="337" height="100" align="right"><img src="images/logo-2.gif"></td>
</tr>
<tr>
	<td colspan="2" height="58" style="background-image: url('images/top_line.gif'); background-repeat: no-repeat">&nbsp;</td>
</tr>
<tr>
	<td width="50%"><a href="classes.php" onMouseOut="MM_swapImgRestore()" onMouseover="showit(0,getdiv('main'));MM_swapImage('class_info','','images/classes_over.gif',1)"><img name="class_info" src="images/classes.gif"></a></td>
	<td width="50%" align="right"><a href="instruct.php" onMouseOut="MM_swapImgRestore()" onMouseOver="showit(1,getdiv('main'));MM_swapImage('instructors','','images/instructors_over.gif',1)"><img name="instructors" src="images/instructors.gif"></a></td>
</tr>
  <tr>
  	<td align="center" colspan="2">
		<table border="0" align="center" width="450">
		<tr>
			<td colspan="2" id="main" style="vertical-align: middle; background-color: #FFFFFF; height: 150px" onMouseover="clear_delayhide()" onMouseout="resetit(event,this.id)"></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td width="50%"><a href="signup.php" onMouseOut="MM_swapImgRestore()" onMouseover="showit(2,getdiv('main'));MM_swapImage('signup','','images/signup_over.gif',1)"><img name="signup" src="images/signup.gif"></a></td>
	<td width="50%" align="right"><a href="goals.php" onMouseOut="MM_swapImgRestore()" onMouseover="showit(3,getdiv('main'));MM_swapImage('goals','','images/goals_over.gif',1)"><img name="goals" src="images/goals.gif"></a></td>
</tr>
<tr>
	<td colspan="2" height="58" style="background-image: url('images/btm_line.gif'); background-repeat: no-repeat">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><a class="menu" href="contact.php">Contact Us</a> <a class="menu" href="schedule.php">Class Schedules</a> <a class="menu" href="tellafriend.php">Tell a Friend</a></td>
</tr>
</table>
<script type="text/javascript">
	showdefault();
</script>
</body>
</html>