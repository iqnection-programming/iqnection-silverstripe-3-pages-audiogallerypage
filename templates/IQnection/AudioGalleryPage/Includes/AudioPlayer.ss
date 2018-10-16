<audio controls="controls" preload="auto">";
	<% if $MP3File.Exists %>
		<source src="$MP3File.AbsoluteURL" type="audio/mpeg">
	<% end_if %>
	<% if $OGGFile.Exists %>
		<source src="$OGGFile.AbsoluteURL" type="audio/ogg">
	<% end_if %>
	Your browser does not support the audio tag
</audio>