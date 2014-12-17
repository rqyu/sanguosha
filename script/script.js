var new_game=function(from_sel,delay){
	delay = delay || 150;
	from_sel = from_sel || "new_game_sel";
	var value=$("#"+from_sel).val();
	if($("#game_container").css('display')!='block') {
	return $("#main").fadeOut(delay,function(){
				$.get('php/run.php',{'m':'w','n':0},function(data){$('#weather_des').html(data);});
  				$.get('php/run.php',{'m':'sc','n':value},function(data){$("#sc_des").html(data);});
  				$('body').css({background:'url(resource/image/game_background.jpg)'});
        		$('body').css({"background-size":"cover"});
  				$("#game_container").fadeIn(delay);
  			});
	}
};

var cont_new_game=function(value,delay){
	delay = delay||150;
	value = value||0;
	return $("#game_container").fadeOut(delay, function() {
		$.get('php/run.php',{'m':'w','n':0},function(data){$('#weather_des').html(data);});
		$.get('php/run.php',{'m':'sc','n':value},function(data){$("#sc_des").html(data);});
		$("#game_container").fadeIn(delay);
	});
};

var back_to_main=function(delay){
	delay = delay || 150;
	return $("#game_container").fadeOut(delay,function(){
				$('body').css({background: "url(resource/image/welcome4cc.png)"});
				$('body').css({"background-size":"cover"});
  				$("#main").fadeIn(delay);});
};

var w=function(from_sel, delay){
	delay=delay||5;
	from_sel = from_sel || "w_chg_btn";
	var n = $('#'+from_sel).val();
	return $("#weather_des").fadeOut(delay,function(){
		$.get('php/run.php',{'m':'w','n':n},function(data){$('#weather_des').html(data);});
		$("#weather_des").fadeIn();});
}
