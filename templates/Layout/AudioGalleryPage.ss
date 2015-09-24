<h1>$Title</h1>
$Content
<% loop Audios %>
	<div class="audio">
		<div class="buttons"> 
			<a href="javascript:;" class="play_btn" alt="$Title" data-file="<% if MP3FileURL %>$MP3FileURL<% else_if OGGFileURL %>$OGGFileURL<% end_if %>">Listen</a>
		</div>
		<div class="title">$Title <span></span></div>
		<div class="description">$Description</div>
		<div class='download'>
			<% if MP3FileURL %>
				<a href='$MP3FileURL' target='_blank'>Download this MP3 file</a>
			<% else_if OGGFileURL %>
				<a href='$OGGFileURL' target='_blank'>Download this OGG file</a>
			<% end_if %>
		</div>
	</div>
<% end_loop %>