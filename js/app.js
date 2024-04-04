$(document).ready(()=>{
    //Functions here called on page load
    GeneralJavaScriptSetup();
    CheckCookies();
});

//#region Enabling/Disabling JavaScript Elements

function GeneralJavaScriptSetup()
{
    $(".javascript-disabled").hide();
    $(".requires-javascript").show();
}

//#endregion

//#region Cookies Popup

var cookiesOpen = false;

function CheckCookies()
{
    //Check if cookies menu should be open through AJAX request
    cookiesOpen ? OpenCookies() : CloseCookies();
}

function OpenCookies()
{
    $('body').addClass('stop-scrolling');
    $("#CookiesPopup").show();
}

function CloseCookies()
{
    //Send cookies closed via AJAX

    $('body').removeClass('stop-scrolling');
    $("#CookiesPopup").hide();
}

$("#AcceptCookies").on("click", ()=>{
    CloseCookies();
});

//#endregion

//#region Carousel

//$("#Featured").addClass("java-enabled");

//Scales the overlay of the videos to their width so videos cannot be interacted with
//$(".featured-overlay-container").css("width", $(".featured-overlay-container").parent().css("width"));

$(".slides").slick({
    //fade:true,
    autoplay: false,
    autoplaySpeed: 15000,
    arrows: false,
    dots: true
});

//#endregion