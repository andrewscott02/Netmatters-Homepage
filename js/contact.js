let originalHeight = $(".dropdown-btn").height() + 30;

$(document).ready(()=>{
    $(".dropdown").height(originalHeight);
});

$(".dropdown-btn").on("click", ()=>{
    console.log("Clicked");

    $(".dropdown-info").toggleClass("dropdown-hide");

    let targetHeight = originalHeight;

    if (!$(".dropdown-info").hasClass("dropdown-hide"))
    {
        targetHeight = $(".dropdown-btn").height() + $(".dropdown-info").height() + 50;
    }

    $(".dropdown").height(targetHeight);
})