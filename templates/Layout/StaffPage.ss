<% if Content %>$Content<% end_if %>
<% if StaffCategories %>
	<div class="staff-categories">
		<% loop StaffCategories %>
			<div class="staff-category">
				<% if Title %><h2 class="staff-category-title">$Title</h2><% end_if %>
				<% if Description %><p>$Description</p><% end_if %>
				<ul class="staff-members">
					<% loop Staff %>
						<% include StaffMembers %>
					<% end_loop %>
				</ul><!-- staff-members -->
			</div><!-- staff-category -->
		<% end_loop %>
	</div><!-- .staff-categories -->
<% end_if %>
<% if UncategorizedStaff %>
	<% if MoreThanOneStaffCategory %><h2 class="staff-category-title">Other</h2><% end_if %>
	<ul class="staff-members">
		<% loop UncategorizedStaff %>
			<% include StaffMembers %>
		<% end_loop %>
	</ul><!-- staff-members -->
<% end_if %>



