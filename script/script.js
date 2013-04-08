var new_game=function(from_sel,delay){
	delay = delay || 150;
	from_sel = from_sel || "new_game_sel";
	if(document.getElementById("game_container").style.display!='block') {
	return $("#main").fadeOut(delay,function(){
				nextWeather();
  				loadscenario(from_sel);
  				$("#game_container").fadeIn(delay);
  			});
	} else {
	return $("#game_container").fadeOut(delay,function(){
				nextWeather();
  				loadscenario(from_sel);
  				$("#game_container").fadeIn(delay);
  			});
	}
};

var back_to_main=function(delay){
	delay = delay || 150;
	return $("#game_container").fadeOut(delay,function(){
  				$("#main").fadeIn(delay);});
};

var w=function(delay){
	delay=delay||5;
	return $("#w_des").fadeOut(delay,function(){nextWeather();$("#w_des").fadeIn();});
}

function nextWeather() {
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("w_des").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","php/run.php?m=w",true);
	xmlhttp.setRequestHeader('Content-type','text/html','charset=UTF-8');
	xmlhttp.send();
}

function loadscenario(from_sel) {
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("s_des").innerHTML=xmlhttp.responseText;
	    }
	  }
	var s=document.getElementById(from_sel);
	var n=s.value;
	xmlhttp.open("GET","php/run.php?m=sc&n="+n,true);
	document.getElementById(from_sel).value=0;
	xmlhttp.setRequestHeader('Content-type','text/html','charset=UTF-8');
	xmlhttp.send();
}
