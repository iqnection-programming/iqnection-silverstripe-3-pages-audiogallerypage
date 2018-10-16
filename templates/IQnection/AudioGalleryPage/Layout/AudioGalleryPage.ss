<!-- template: IQnection/AudioGalleryPage/Layout/AudioGalleryPage.ss -->

<h1>$Title</h1>
$Content
<% loop $Audios %>
	<div class="audio">
		<div class="buttons"> 
			<a href="javascript:;" class="play_btn" alt="$Title" data-file="<% if $MP3File.Exists %>$MP3File.AbsoluteURL<% else_if $OGGFile.ExistsL %>$OGGFile.AbsoluteURL<% end_if %>">Listen</a>
		</div>
		<div class="title">$Title <span></span></div>
		<div class="description">$Description</div>
		<div class="download">
			<% if $MP3File.Exists %>
				<a href="$MP3File.AbsoluteURL" target="_blank">Download this MP3 file</a>
			<% else_if $OGGFile.Exists %>
				<a href="$OGGFile.AbsoluteURL" target="_blank">Download this OGG file</a>
			<% end_if %>
		</div>
	</div>
<% end_loop %>