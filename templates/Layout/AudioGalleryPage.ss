<h1>$MenuTitle</h1>
$Content
<% loop Audios %>
	<div class="audio">
		<div class="title">$Title <span></span></div>
		<div class="description">$Description</div>
		<div class="listen">
			$AudioPlayer
		</div>		
		<div class='download'>
			<% if MP3FileURL %>
				<a href='$MP3FileURL' target='_blank'>Download this MP3 file</a>
			<% else_if OGGFileURL %>
				<a href='$OGGFileURL' target='_blank'>Download this OGG file</a>
			<% end_if %>
		</div>
	</div>
<% end_loop %>