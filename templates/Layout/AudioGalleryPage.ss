<h1>$MenuTitle</h1>
$Content
<% loop Audios %>
	<div class="audio">
		<a href="javascript:;" class="play_btn" alt="$Title" style="display:none;">Play</a>
		<div class="title">$Title <span></span></div>
		<div class="description">$Description</div>
		<div class="listen">
			$AudioPlayer
		</div>		
	</div>
<% end_loop %>