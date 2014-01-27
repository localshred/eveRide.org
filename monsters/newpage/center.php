<!-- Edit the dimensions of the below, plus background color-->
<div id="describe" style="text-align: left; vertical-align: middle; background-color: #FFFFFF; width: 320px; height: 110px; overflow: auto" onMouseover="clear_delayhide()" onMouseout="resetit(event)"></div>


<script language="JavaScript1.2">

/*
Tabs Menu (mouseover)- By Dynamic Drive
For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
This credit MUST stay intact for use
*/

var submenu=new Array()

//Set submenu contents. Expand as needed. For each content, make sure everything exists on ONE LINE. Otherwise, there will be JS errors.

submenu[0]='<h3 align="center">Welcome to monsters.eveRide.org</h3>'

//photo
submenu[1]='<h1 align="center">Photos are good</h1>'

//sponsors
submenu[2]='Click this link to see a list of all of our Incredible Sponsors. They are the means man, manly moon.'

// What
submenu[3]='The crew here at eveRide.org is dedicated to making the best snowparks in the word, called winterparks. The winterparks will be perfectly groomed, with the best park terrain for all skill levels, and we want you to ride them for less than twenty bills. Click <a href="tester.php">here</a> to find out more about winterparks. We also plan on creating some great <a href="tester.php">humanitarian programs</a> to help people in our communities and around the world.'

// How
submenu[4]='A website and a few broke snowriders are not going to build the winterparks on their own. What we\’re looking for are sponsors who love the ride more than the money. We\’ll hook our sponsors up the best we can, but we need a voice so they hear. You, the true for-the-love-of-the-ride snowriders, can be eveRide\’s voice. One voice will turn a few heads. Thousands of voices will start a revolution. If you are down for the cause sign the stoked list and tell seven other people to sign it and have them tell seven more people each. Every name on that list is a voice shouting in our sponsors\’ ears. They will get involved when we get loud enough. We would have 16,807 voices in ONE MONTH if you told seven people per week, and then they each told seven people, and so on. That’s one person a day. You can go the extra mile by becoming a rep, referring sponsors, donating, and getting involved in other ways.'

// Where
submenu[5]='The first winterpark location as of right now is secret. But we can tell you it will be in Utah, within an hour of Salt Lake City. Winterparks will be as close to urban areas as possible. This year we\’ll be working with what we\’ve got (a few rails, boxes, and a slope) at the Beta Project.'

// When
submenu[6]='This will all be going down when we get loud enough. It could be next year, it could be five years from now. It all depends on how many voices we get supporting this all... so tell your friends, your neighbors, your family, and whoever else you can. If seven people each told seven riders about eveRide in a week, and those seven each told seven more the following week, and so on, we would have 16,807 voices in ONE MONTH.'

// Why
submenu[7]='Because we love to ride, and we want to help people. Nobody will be getting rich from this. The money earned will go to building more winterparks, skateparks, and to humanitarian programs around the globe. Find out how a little bit of money can go a long way.'

// Who
submenu[8]='We, the eveRide crew, are just a bunch of moron snowriders. We\’re not in it for the money or the props, and we\’re definitely not pro material. We, like you, just want to ride at a better snowpark for less. Give us an email at <a href="mailto:founders@everide.org">founders@everide.org</a>, or meet us on the founders page. However, we are just starting the fire... you\’ve gotta help spread it.'

// What does this mean?
submenu[9]='<div>Opener Info'

//Set delay before submenu disappears after mouse moves out of it (in milliseconds)
var delay_hide=500

/////No need to edit beyond here

var menuobj=document.getElementById? document.getElementById("describe") : document.all? document.all.describe : ""

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
delayhide=setTimeout("showit(0)",delay_hide)
else if (document.getElementById&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhide=setTimeout("showit(0)",delay_hide)
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
showit (0)
}

showdefault()

</script>