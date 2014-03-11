<div class="staff-member-full">
	<% loop Staff %>
		<% if PhotoSized %><img src="$PhotoSized(130).URL" alt="$FullName" class="staff-img right"><% end_if %>
		<% if FullName %><h2>$FullName</h2><% end_if %>
		<% if Meta %>
			<dl class="info-list">
				<% if JobTitle %>
					<div class="info-list-item">
						<dt>Position</dt>
						<dd>$JobTitle</dd>
					</div><!-- info-list-item -->
				<% end_if %>
				<% if Email %>
					<div class="info-list-item">
						<dt>Email</dt>
						<dd><span class="email">$ObfuscatedEmail</span></dd>
					</div><!-- info-list-item -->
				<% end_if %>
			</dl><!-- info-list -->
		<% end_if %>
		<% if Bio %>
			<p>$Bio</p>
		<% end_if %>
	<% end_loop %>
</div><!-- staff-member-full -->
<p><a href="$Link" class="button">Back to $MenuTitle</a></p>