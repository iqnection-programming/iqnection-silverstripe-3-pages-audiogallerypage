<!-- template: IQnection/AudioGalleryPage/Layout/AudioGalleryPage.ss -->

<h1>$Title</h1>
$Content
<% loop $Audios %>
	<div class="audio">
		<div class="content">
			<div class="title">$Title <span></span></div>
			<div class="description">$Description</div>
		</div>
		<div class="buttons"> 
			<a href="javascript:;" class="play_btn" alt="$Title" data-file="<% if $MP3Files.First.Exists %>$MP3Files.First.AbsoluteURL<% else_if $OGGFiles.First.Exists %>$OGGFiles.First.AbsoluteURL<% end_if %>">
				<span class="text">Listen</span>
				<span class="loading">Loading <i></i></span>
			</a>
			<div class="download">
				<% if $MP3Files.First.Exists %>
					<a href="$MP3Files.First.AbsoluteURL" target="_blank">Download this MP3 file</a>
				<% else_if $OGGFiles.First.Exists %>
					<a href="$OGGFiles.First.AbsoluteURL" target="_blank">Download this OGG file</a>
				<% end_if %>
			</div>
		</div>
	</div>
<% end_loop %>