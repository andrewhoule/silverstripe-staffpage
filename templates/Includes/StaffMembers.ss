<li class="staff-member">
	<% if PhotoCropped %><img src="$PhotoCropped(200,200).URL" alt="$FullName" class="thumbnail staff-img"><% end_if %>
	<% if FullName %><h3><a href="$Link">$FullName</a></h3><% end_if %>
	<% if Meta %><% include StaffMeta %><% end_if %>
	<% if BioExcerpt %>
		<div class="bio-excerpt">
			<p>$BioExcerpt(300) <span><a href="$Link">Read more &rarr;</a></span></p>
		</div><!-- .bio-excerpt -->
	<% end_if %>
</li><!-- staff-member -->