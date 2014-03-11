<% if Staff %>
	<ul class="staff-members">
		<% loop Staff %>
			<li class="staff-member">
				<% if PhotoSized %><img src="$PhotoSized(130).URL" alt="$FullName" class="staff-img right"><% end_if %>
				<% if FullName %><h3>$FullName</h3><% end_if %>
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
				<% if BioExcerpt %>
					<p>$BioExcerpt(300) <a href="$Link">Read more &rarr;</a></p>
				<% end_if %>
			</li><!-- staff-member -->
		<% end_loop %>
	</ul><!-- staff-members -->
<% end_if %>