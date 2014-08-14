<ul class="meta">
	<% if $JobTitle %>
		<li class="position">
			<span class="label">Position</span>
			<span class="definition">$JobTitle</span>
		</li><!-- position -->
	<% end_if %>
	<% if $Email %>
		<li class="email">
			<span class="label">Email</span>
			<span class="definition"><span class="defuscate-email">$ObfuscatedEmail</span></span>
		</li><!-- email -->
	<% end_if %>
	<% if $Phone %>
		<li class="phone">
			<span class="label">Phone</span>
			<span class="definition">$Phone</span>
		</li><!-- phone -->
	<% end_if %>
	<% if $Cell %>
		<li class="cell">
			<span class="label">Cell</span>
			<span class="definition">$Cell</span>
		</li><!-- cell -->
	<% end_if %>
	<% if $Fax %>
		<li class="fax">
			<span class="label">Fax</span>
			<span class="definition">$Fax</span>
		</li><!-- fax -->
	<% end_if %>
	<% if $OfficeLocation %>
		<li class="office-location">
			<span class="label">Office Location</span>
			<span class="definition">$OfficeLocation</span>
		</li><!-- office-location -->
	<% end_if %>
	<% if $Website %>
		<li class="website">
			<span class="label">Website</span>
			<span class="definition"><a href="$Website">$Website</a></span>
		</li><!-- website -->
	<% end_if %>
	<% if $Facebook %>
		<li class="facebook">
			<span class="label">Facebook</span>
			<span class="definition"><a href="$Facebook">$Facebook</a></span>
		</li><!-- facebook -->
	<% end_if %>
	<% if $Twitter %>
		<li class="twitter">
			<span class="label">Twitter</span>
			<span class="definition"><a href="$Twitter">$Twitter</a></span>
		</li><!-- twitter -->
	<% end_if %>
</ul><!-- meta -->