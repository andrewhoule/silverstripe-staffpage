<% if $Content %>$Content<% end_if %>
<% if $StaffCategory %>
  <div class="staff-categories">
    <% loop StaffCategory %>
      <div class="staff-category">
        <% if $Title %><h2 class="staff-category-title">$Title</h2><% end_if %>
        <% if $Description %><p>$Description</p><% end_if %>
        <ul class="staff-members">
          <% loop Staff %>
            <% include StaffMembers %>
          <% end_loop %>
        </ul><!-- staff-members -->
      </div><!-- staff-category -->
    <% end_loop %>
  </div><!-- .staff-categories -->
<% end_if %>
<% if $AfterContent %>$AfterContent<% end_if %>