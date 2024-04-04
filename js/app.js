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

$(".maincontent-inner").on('scroll', CheckScroll);

function CheckScroll(event)
{
    let scroll = $(".maincontent-inner").scrollTop();

    if (scroll > prevScroll)
    {
        //Show header
        console.log("scroll down");

        if ($(".sticky-header").hasClass("sticky"))
        {
            AnimateHeader(false);

            setTimeout(() => {
                $(".sticky-header").removeClass("sticky");
            }, 500);
        }
    }
    else
    {
        //Hide header
        console.log("scroll up");

        if (!$(".sticky-header").hasClass("sticky"))
        {
            $(".sticky-header").addClass("sticky");
            AnimateHeader(true);
        }
    }

    prevScroll = scroll;
}

function AnimateHeader(down)
{
    from = "0";
    to = "-100%";
    if (down)
    {
        from = "-100%";
        to = "0";
    }

    $(".sticky-header").css("transition", "all 0s");
    $(".sticky-header").css("top", from);

    setTimeout(() => {
        $(".sticky-header").css("transition", "all 1s");
        $(".sticky-header").css("top", to);
    }, 10);
}

//#region Side Panel

/** TODO
 * Content and styling for elements in side panel
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
