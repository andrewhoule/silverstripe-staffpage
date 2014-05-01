<% if Staff %>
	<ul class="staff-members">
		<% loop Staff %>
			<li class="staff-member">
				<% if PhotoSized %><img src="$PhotoSized(130).URL" alt="$FullName" class="staff-img right"><% end_if %>
				<% if FullName %><h3>$FullName</h3><% end_if %>
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
								<span class="definition"><span class="defuscate-email">$ObfuscatedEmail</span></span>
							</li><!-- email -->
						<% end_if %>
					</ul><!-- meta -->
				<% end_if %>
				<% if BioExcerpt %>
					<p>$BioExcerpt(300) <a href="$Link">Read more &rarr;</a></p>
				<% end_if %>
			</li><!-- staff-member -->
		<% end_loop %>
	</ul><!-- staff-members -->
<% end_if %>