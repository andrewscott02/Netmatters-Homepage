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

//#region Side Panel

/** TODO
 * Low opacity overlay on page
 * Clicking on main page removes class
 * Content and styling for elements in side panel
 */

$(".sidepanel-btn").on("click", (event)=>{
    $("#MainContentContainer").toggleClass("sidepanel-open");
})

//#endregion

//#region Carousel

//$("#Featured").addClass("java-enabled");

$(window).resize(function(){
    RefreshCarousel();
    setTimeout(RefreshCarousel, 500);
});

function RefreshCarousel()
{
    $('.slides')[0].slick.refresh();
}

$(".slides").slick({
    //fade:true,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 300,
    arrows: false,
    dots: true
});

//#endregion

//#region Cookies Popup

var cookiesOpen = false;

function CheckCookies()
{
    //Check if cookies menu should be open through AJAX request
    // GetCookies()
    //     .then(OpenCookies)
    //     .catch(CloseCookies);

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

//#region Cookies - AJAX Requests

function GetCookies()
{
    return fetch("cookies.js")
                .then(CheckStatus)
                .then(res => res.json())
                .catch(err => console.log("Something went wrong", err));
}

function CheckStatus(response)
{
    if (response.ok)
    {
        return Promise.resolve(response);
    }
    else
    {
        return Promise.reject(new Error(response.statusText));
    }
}

function sendAJAX(){
    xhr.send(); //Sends the request via function, could be called on button click
    /* Can call function from button in HTML like this
    <button id="load" onclick="sendAJAX()">AJAX button</button>
    */
}

//#endregion

//#endregion
