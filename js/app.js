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
    GetCookiesData();

        // .then(OpenCookies)
        // .catch(CloseCookies);

    // cookiesOpen ? OpenCookies() : CloseCookies();
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

function GetCookiesData()
{
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=>{
        if (xhr.readyState === 4)
        {
            switch (xhr.status)
            {
                case 200:
                    //Success
                    var data = JSON.parse(xhr.responseText);
                    DetermineCookiesPopup(data.cookiesOpen);
                    break;
                case 404:
                    //File not found
                    alert(`Error: 404 (File not found)`);
                    break;
                case 500:
                    //Server error
                    alert(`Error: 500 (Server error)`);
                    break;
                default:
                    alert(`Error: ${xhr.status}`);
                    break;
            }
        }
    };
    xhr.open("GET", "js/cookies.json", true);
    xhr.send();
}

function DetermineCookiesPopup(cookiesOpen)
{
    cookiesOpen ? OpenCookies() : CloseCookies();
}

//#endregion

//#endregion
