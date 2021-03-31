$(document).ready(function()
{
    $("#user-menu").on("click", function()
    {
        $(".options").toggle();
    });

    $("#mobile-menu").on("click", function()
    {
        $("#submenu").toggle();
    });
});