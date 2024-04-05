$(document).ready(()=>{
    //Functions here called on page load
    GeneralJavaScriptSetup();
    CheckCookiesData();
});

//#region Enabling/Disabling JavaScript Elements

function GeneralJavaScriptSetup()
{
    $(".javascript-disabled").hide();
    $(".requires-javascript").show();
}

//#endregion

//#region Sticky Navigation

//TODO Fix issue with navbar not animating first time it appears

const navThreshold = 100;

let prevScroll = 0;
let stickyHeaderActive = true;

let scrollUpTimeout;

$(".maincontent-inner").on('scroll', CheckScroll);

function CheckScroll(event)
{
    let scroll = $(".maincontent-inner").scrollTop();

    if (scroll > prevScroll)
    {
        //Show header
        console.log("scroll down");

        if (scroll > navThreshold)
        {
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
            $(".sticky-header").removeClass("sticky");
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
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 300,
    arrows: false,
    dots: true
});

//#endregion

//#region Cookies Popup

function CheckCookiesData()
{
    if (!document.cookie.toString().includes("cookiesAccepted=true"))
    {
        OpenCookies();
    }
    else
    {
        console.log("Cookies data is " + document.cookie);
    }
}

function OpenCookies()
{
    console.log("Opening Cookies Popup, data is " + document.cookie);

    $('body').addClass('stop-scrolling');
    $("#CookiesPopup").show();
}

$("#AcceptCookies").on("click", ()=>{
    CloseCookies();
});

function CloseCookies()
{
    //Send cookies closed via AJAX
    console.log("Closing Cookies Popup");
    SetCookiesData(true);

    $('body').removeClass('stop-scrolling');
    $("#CookiesPopup").hide();

    console.log("Cookies data is " + document.cookie);
}

/**
 * Sets Cookies Accepted to the value
 * @param {bool} value Value to set cookiesAccepted to 
 */
function SetCookiesData(value)
{
	document.cookie = `cookiesAccepted=${value}`;
}

function DeleteAllCookies()
{
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

//#endregion

