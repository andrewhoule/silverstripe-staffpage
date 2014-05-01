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
	<% if Phone %>
		<li class="phone">
			<span class="label">Phone</span>
			<span class="definition">$Phone</span>
		</li><!-- phone -->
	<% end_if %>
	<% if Cell %>
		<li class="cell">
			<span class="label">Cell</span>
			<span class="definition">$Cell</span>
		</li><!-- cell -->
	<% end_if %>
	<% if Fax %>
		<li class="fax">
			<span class="label">Fax</span>
			<span class="definition">$Fax</span>
		</li><!-- fax -->
	<% end_if %>
	<% if OfficeLocation %>
		<li class="office-location">
			<span class="label">Office Location</span>
			<span class="definition">$OfficeLocation</span>
		</li><!-- office-location -->
	<% end_if %>
</ul><!-- meta -->