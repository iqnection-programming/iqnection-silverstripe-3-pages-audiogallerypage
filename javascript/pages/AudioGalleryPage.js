$("html").addClass('js');

$("body").append('<div id="global_player"><h4></h4><audio controls="controls" preload="metadata"><source src=""></audio></div>');

$(document).ready(function(){
	var global_player = $("#global_player > audio");
	$("div.audio").each(function(i){
		var a_tag = $('<a href="javascript:;" class="play_btn" alt="'+$(this).find('.title').text()+'">Play</a>');
		$(this).prepend(a_tag).find('audio').hide();
		a_tag.click(function(){
			$(global_player).siblings('h4').text($(this).attr('alt'));
			global_player.prop('src',$(this).parent().find('audio > source').first().attr('src'));
			global_player.trigger('load');
			global_player.trigger('play');
		});
	});
	setTimeout(function(){
		$("div.audio").each(function(i){
			var a_tag = $(this).find('a.play_btn');
			var length = Math.round($(this).find('audio').prop('duration'));
			var mins = Math.floor(length/60);
			var secs = length - (mins*60);
			$(this).find('.title > span').text('('+mins+':'+secs+')');
			a_tag.attr('alt',$(this).find('.title').text());
			if (!i){
				$(global_player).siblings('h4').text($(this).find('.title').text());
				global_player.prop('src',$(this).parent().find('audio > source').first().attr('src'));
				global_player.prop('load');
			}
		});
	},500);
});