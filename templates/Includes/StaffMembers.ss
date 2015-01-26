<li class="staff-member">
  <% if $PhotoCropped %><img src="$PhotoCropped(200,200).URL" alt="$FullName" class="thumbnail staff-img"><% end_if %>
  <% if $FullName %><h3><% if $HasProfileLink %><a href="$Link"><% end_if %>$FullName<% if $HasProfileLink %></a><% end_if %></h3><% end_if %>
  <% if $Meta %><% include StaffMeta %><% end_if %>
  <% if $BioExcerpt %>
    <div class="bio-excerpt">
      <p>$BioExcerpt(300)<% if $HasProfileLink %> <span><a href="$Link">Read more &rarr;</a></span><% end_if %></p>
    </div><!-- .bio-excerpt -->
  <% end_if %>
</li><!-- staff-member -->