<div class="staff-member-full">
	<% loop Staff %>
		<% if PhotoSized %><img src="$PhotoSized(130).URL" alt="$FullName" class="staff-img right"><% end_if %>
		<% if FullName %><h2>$FullName</h2><% end_if %>
		<% if Meta %>
			<ul class="meta">
				<% if JobTitle %>
					<li class="position">
						<span class="label">Position</span>
						<span class="definition">$JobTitle</span>
					</li><!-- position -->
				<% end_if %>
				<% if Email %>
					<li class="email">
						<span class="label">Email</span>
						<span class="definition">$ObfuscatedEmail</span>
					</li><!-- email -->
				<% end_if %>
				<% if Phone %>
					<li class="phone">
						<span class="label">Phone</span>
						<span class="definition">$Phone</span>
					</li><!-- phone -->
				<% end_if %>
			</ul><!-- meta -->
		<% end_if %>
		<% if Bio %>
			<p>$Bio</p>
		<% end_if %>
	<% end_loop %>
</div><!-- staff-member-full -->
<p><a href="$Link" class="button">Back to $MenuTitle</a></p>