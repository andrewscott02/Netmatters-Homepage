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

//#region Sticky Navigation

let prevScroll = 0;
let stickyHeaderActive = false;

let scrollUpTimeout;

$(".maincontent-inner").on('scroll', CheckScroll);

function CheckScroll(event)
{
    let scroll = $(".maincontent-inner").scrollTop();

    if (scroll > prevScroll)
    {
        //Show header
        console.log("scroll down");

        if (stickyHeaderActive)
        {
            stickyHeaderActive = false;
            AnimateHeader(false, 1.3);

            scrollUpTimeout = setTimeout(() => {
                $(".sticky-header").removeClass("sticky");
            }, 500);
        }
    }
    else
    {
        //Hide header
        console.log("scroll up");

        if (!stickyHeaderActive)
        {
            stickyHeaderActive = true;
            clearTimeout(scrollUpTimeout);

            $(".sticky-header").addClass("sticky");
            AnimateHeader(true, 0.6);
        }
    }

    prevScroll = scroll;
}

function AnimateHeader(down, transitionTime)
{
    from = "0";
    to = "-100%";
    if (down)
    {
        from = $(".sticky-header").css("top");
        to = "0";
    }

    $(".sticky-header").css("transition", "all 0s");
    $(".sticky-header").css("top", from);

    setTimeout(() => {
        $(".sticky-header").css("transition", `all ${transitionTime}s`);
        $(".sticky-header").css("top", to);
    }, 200);
}

//#endregion

//#region Side Panel

/** TODO
 * Content and styling for elements in side panel
 * Breakpoint for buttons to appear differently, with >> symbol before
 */

let canClose = false;

$(".sidepanel-btn").on("click", (event)=>{
    $("#MainContentContainer").toggleClass("sidepanel-open");
    setTimeout(()=>{canClose = true}, 100);
});

$("#MainContentContainer").on("click", (event)=>{
    if (canClose)
    {
        $("#MainContentContainer").removeClass("sidepanel-open");
        canClose = false;
    }
});

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
    // GetCookiesData();
    OpenCookies();
}

function OpenCookies()
{
    console.log("Opening Cookies Popup");
    $('body').addClass('stop-scrolling');
    $("#CookiesPopup").show();
}

function CloseCookies()
{
    //Send cookies closed via AJAX
    console.log("Closing Cookies Popup");
    $.post(cookiesURL, {cookiesOpen:'false'});
    $('body').removeClass('stop-scrolling');
    $("#CookiesPopup").hide();
}

$("#AcceptCookies").on("click", ()=>{
    CloseCookies();
});

//#region Cookies - AJAX Requests

const cookiesURL = "data/cookies.json";

function GetCookiesData()
{
    fetch(cookiesURL)
        .then(CheckStatus)
        .then(res=> res.json())
        .then(data=> DetermineCookiesPopup(data.cookiesOpen))
        .catch(err => {
            console.log("Something went wrong", err);
            OpenCookies();
        });
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

function DetermineCookiesPopup(cookiesOpen)
{
    console.log(`Data fetch success, cookie popup will appear: ` + cookiesOpen);
    cookiesOpen ? OpenCookies : CloseCookies;
}

//#endregion

//#endregion
