<div class="staff-member-full">
	<% loop Staff %>
		<% if FullName %><h2>$FullName</h2><% end_if %>
		<% if PhotoSized %><img src="$PhotoSized(400).URL" alt="$FullName" class="full staff-img"><% end_if %>
		<% if Meta %><% include StaffMeta %><% end_if %>
		<% if Bio %>
			<p>$Bio</p>
		<% end_if %>
	<% end_loop %>
</div><!-- staff-member-full -->
<p><a href="$Link" class="button">Back to $MenuTitle</a></p>