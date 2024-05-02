$(document).ready(()=>{
    //Functions here called on page load
    GeneralJavaScriptSetup();
    CheckCookiesData();
    RefreshCheckboxSize();
});

//#region Enabling/Disabling JavaScript Elements

function GeneralJavaScriptSetup()
{
    $(".javascript-disabled").hide();
    $(".requires-javascript").show();
}

//#endregion

//#region Sticky Navigation

const navThreshold = 100;

let prevScroll = 0;
let stickyHeaderActive = true;

let scrollUpTimeout;

//Adds CheckScroll to scroll event
$(".maincontent-inner").on('scroll', CheckScroll);

//Determines whether header should be sticky when scrolling
function CheckScroll(event)
{
    let scroll = $(".maincontent-inner").scrollTop();

    //Checks if scroll direction was up or down
    if (scroll > prevScroll)
    {
        //Show header
        // console.log("scroll down");

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
        // console.log("scroll up");

        if (scroll > navThreshold)
        {
            if (!stickyHeaderActive)
            {
                stickyHeaderActive = true;
                clearTimeout(scrollUpTimeout);

                $(".sticky-header").addClass("sticky");
                AnimateHeader(true, 0.6);
            }
        }
    }

    prevScroll = scroll;
}

//Animates the header so it slides up or down
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

function ForceRemoveHeader()
{   
    clearTimeout(scrollUpTimeout);
    $(".sticky-header").removeClass("sticky");
}

//#endregion

//#region Side Panel

let canClose = false;

//Opens side menu when button is clicked
$(".sidepanel-btn").on("click", (event)=>{
    $("#MainContentContainer").toggleClass("sidepanel-open");
    $(".btn-nav").toggleClass("sidepanel-open");
    setTimeout(()=>{
        $(".btn-nav").toggleClass("sidepanel-open-rotate");
    }, 100)
    setTimeout(()=>{canClose = true}, 100);
});

//Closes side menu when main content container is clicked
$("#MainContentContainer").on("click", (event)=>{
    if (canClose)
    {
        $("#MainContentContainer").removeClass("sidepanel-open");
        $(".btn-nav").removeClass("sidepanel-open-rotate");
        setTimeout(()=>{
            $(".btn-nav").toggleClass("sidepanel-open");
        }, 150)
        canClose = false;
    }
});

//#endregion

//#region Carousel

//$("#Featured").addClass("java-enabled");

//Adds RefreshCarousel function to window resize event
$(window).resize(function(){
    RefreshCarousel();
    setTimeout(RefreshCarousel, 500); //Adds a short delay to also refresh after transition animations
});

//Refreshes carousel size
function RefreshCarousel()
{
    $( ".slides" ).each(function( index )
    {
        $('.slides')[index].slick.refresh();
    });
}

//Slick setup
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

/** Checks whether the Cookies Popup menu should appear
 * 
 * @returns {bool} Boolean value of whether cookies popup should appear
 */
function CheckCookiesData()
{
    if (!document.cookie.toString().includes("cookiesAccepted=true"))
    {
        OpenCookies();
        return true;
    }
    else
    {
        // console.log("Cookies data is " + document.cookie);
        return false;
    }
}

/**Opens Cookies Popup */
function OpenCookies()
{
    // console.log("Opening Cookies Popup, data is " + document.cookie);

    $('body').addClass('stop-scrolling');
    $("#CookiesPopup").show();
}

//Add click event to accept cookies button
$("#AcceptCookies").on("click", ()=>{
    CloseCookies();
});

/**Closes Cookies Popup */
function CloseCookies()
{
    //Send cookies closed via AJAX
    // console.log("Closing Cookies Popup");
    SetCookiesData(true);

    $('body').removeClass('stop-scrolling');
    $("#CookiesPopup").hide();

    // console.log("Cookies data is " + document.cookie);
}

/** Sets Cookies Accepted Value
 * 
 * @param {bool} value Boolean value for if the cookies have been accepted
 * 
 * @returns {string} String value representing the new cookies data
 */
function SetCookiesData(value)
{
	document.cookie = `cookiesAccepted=${value}`;
    return document.cookie;
}

/** Deletes all cookies generated
 *  || Not called here, intended to be used in console
 */
function DeleteAllCookies()
{
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;

        //Sets expiry date in past so it will be deleted
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

//#endregion

