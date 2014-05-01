<% if Staff %>
	<ul class="staff-members">
		<% loop Staff %>
			<li class="staff-member">
				<% if PhotoCropped %><img src="$PhotoCropped(200,200).URL" alt="$FullName" class="thumbnail staff-img"><% end_if %>
				<% if FullName %><h3><a href="$Link">$FullName</a></h3><% end_if %>
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
					<div class="bio-excerpt">
						<p>$BioExcerpt(300) <span><a href="$Link">Read more &rarr;</a></span></p>
					</div><!-- .bio-excerpt -->
				<% end_if %>
			</li><!-- staff-member -->
		<% end_loop %>
	</ul><!-- staff-members -->
<% end_if %>