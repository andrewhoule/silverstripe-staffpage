$(document).ready(function(){


/* ==========================================================================
   Defuscate Email Addresses (To deal with spam)
   ========================================================================== */

jQuery.fn.defuscate = function() {
    return this.each(function(){
        var email = String($(this).html()).replace(/\s*\(.+\)\s*/, "@");
        $(this).before('<a href="mailto:' + email + '">' + email + "</a>").remove();
    });
}; 
$(".defuscate-email").defuscate();


}); // End of Doc Ready