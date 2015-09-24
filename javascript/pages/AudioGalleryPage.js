$("html").addClass('js');

var global_player = $('<div id="global_player"><h4><span class="time"></span></h4><audio controls="controls" preload="metadata" src=""></audio></div>');
$("body").append(global_player);

$(document).ready(function(){
	$("div.audio").each(function(i){
		var a_tag = $(this).find('a.play_btn');
		a_tag.click(function(){
			showLoading(a_tag);
			$(global_player).find('h4').text($(this).attr('alt'));
			global_player.find('audio').prop('src',$(this).attr('data-file'));
			global_player.find('audio').trigger('load');
			global_player.find('audio').trigger('play');
			showAudioTime(global_player.find('audio'));
			hideLoading(global_player.find('audio'),a_tag);
		});
	});
});

var a_tag_html;
function showLoading(a_tag){
	a_tag_html = a_tag.html();
	a_tag.empty().prepend('Loading <span class="dot off">.</span><span class="dot off">.</span><span class="dot off">.</span>');
	setInterval(function(){
		loadingStep(a_tag);
	},500);
}
function loadingStep(a_tag){
	if (!$(a_tag).find('span.dot.off').length){
		a_tag.find('span.dot').addClass('off');
		return;
	}
	$(a_tag).find('span.dot.off').first().removeClass('off');
}
function hideLoading(audio,a_tag){
	if (audio != 'undefined' && audio[0].readyState != 4){
		setTimeout(function(){
			hideLoading(audio,a_tag);
		},500);
		return false;
	}
	a_tag.empty().html(a_tag_html);
}
function showAudioTime(audio){
	if (audio != 'undefined' && audio[0].readyState != 4){
		setTimeout(function(){
			showAudioTime(audio);
		},500);
		return false;
	}
	var length = Math.round(audio.prop('duration'));
	var mins = Math.floor(length/60);
	var secs = length - (mins*60);
	global_player.find('h4').append('<span class="time"> ('+mins+':'+secs+')</span>');
}

