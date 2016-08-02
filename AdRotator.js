
//calendar vars
var divOpen = false;
var added= false;
var old= null;

//ad vars
var current_img = 0;
var previous_img= 0;
var num_img=2;
var imgList =new Array("oscar.jpg", "ice.jpg", "bowl.jpg");
var timeDuration= new Array(5000, 7000,3000);
var hrefs= new Array("http://sua.umn.edu/events/calendar/event/14601/", "http://sua.umn.edu/events/calendar/event/14617/",
					"http://sua.umn.edu/events/calendar/event/14616/");
var tooltips= new Array("A Night at the Oscar Sat, Feb 27 5-11pm", "Art of Winter: Ice Extravaganza, Mon, Feb 29 11:00AM",
					"Beach Bowl, Fri, Mar 4 7-10pm");
var timer;

$(document).ready(function () {

	startAdRotator();
});

//CALENDAR
function show(building) {

	var url;
	var imgTitle;
	if(building=='keller1' || building=='keller2' || building=='keller3' || building=='keller4'
		|| building=='keller5' || building=='keller6' || building=='keller7')
	{
		url ='keller.html';
		imgTitle = 'Keller Hall';
	}
	else if (building=='fraser1'|| building=='fraser2')
	{
		url ='fraser.html';
		imgTitle = 'Fraser Hall';

	}
	else if (building == 'mech1')
	{
		url ='mech.html';
		imgTitle = 'Mech Hall';

	}
	else if (building == 'anderson1' || building == 'anderson2')
	{
		url ='anderson.html';
		imgTitle = 'Anderson Hall';

	}
	else if (building == 'bruininks1'|| building == 'bruininks2')
	{
		url ='bruininks.html';
		imgTitle = 'Bruininks Hall';

	}
	else
	{
		alert("Error in building name")

	}

    var newDiv = document.createElement('div');
    document.getElementById(building).appendChild(newDiv);
    newDiv.id= 'ddiv';
    var img = document.createElement('IMG');

    //AJAX
	if(window.XMLHttpRequest)
    { 
    	// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
    	//Code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () 
    {
    	var content = xmlhttp.responseText;
    	img.id= 'dimg';
	    img.setAttribute('title', imgTitle);
      	img.setAttribute('src', content);
    	document.getElementById('ddiv').appendChild(img);


    };

    xmlhttp.open("GET",url, true);
    xmlhttp.send(null);
    document.getElementById(building).appendChild(newDiv);
	   
}

function removeDiv() //Function to remove  a div element
{	
	var div = document.getElementById('ddiv')
	if(div)
	{
	  	div.parentNode.removeChild(div);
	  	divOpen= false;
	}
}


//AD-ROTATOR

function rotateAd()
{  
	activateDot();
    var banner = document.getElementById("banner"); // Get the banner image elementx

    $("#banner").fadeOut(500, function(){
    	banner.parentNode.setAttribute('href', hrefs[current_img]);
   		banner.setAttribute('title', tooltips[current_img]);
		$(this).attr('src','Images/' + imgList[current_img]).bind('onreadystatechange load', function(){
		 if (this.complete) $(this).fadeIn(500);
		});
   });
    current_img+=1;
    if(current_img>2) 
   	{
   	 	current_img=0;
   	}
   	var time = timeDuration[current_img];
	timer= setTimeout(rotateAd, time);
	
} 

function startAdRotator(){
	clearTimeout(timer);
	rotateAd();
}
function activateDot()
{
	for(var i=0; i <3; i++)
	{
		if (i==(current_img)) {
			document.getElementById('dot'+i).setAttribute('src', "Images/bullet_blue.png");
		}
		else
		{
			document.getElementById('dot'+i).setAttribute('src', "Images/bullet_gray.png");
		}
	}
}
function makeGray(num)
{
	if(!((document.getElementById('dot'+num).getAttribute('src')) === "Images/bullet_blue.png"))
	{
		document.getElementById('dot'+num).setAttribute('src', "Images/bullet_gray.png");
	}
}
function makeOrange (num) {
	if(!((document.getElementById('dot'+num).getAttribute('src')) === "Images/bullet_blue.png"))
	{
		document.getElementById('dot'+num).setAttribute('src', "Images/bullet_orange.png");
	}
}
function moveTo (num) {
	current_img= num;
	startAdRotator();

}
function moveRight() {
	startAdRotator();
}
function moveLeft() {

	current_img= current_img-1;
	if(current_img<0)
	{
		current_img=num_img;
	}
	current_img-=1;
	if(current_img<0)
	{
		current_img=num_img;
	}
	startAdRotator();
}

