let originalHeight = $(".dropdown-btn").height();
let dropdownHeight = $(".dropdown-btn").height() + $(".dropdown-info").height() + 50;

$(document).ready(()=>{
    $(".dropdown").height(originalHeight);
});

$(".dropdown-btn").on("click", ()=>{
    console.log("Clicked");

    $(".dropdown-info").toggleClass("dropdown-hide");

    let targetHeight = dropdownHeight;

    if ($(".dropdown-info").hasClass("dropdown-hide"))
    {
        targetHeight = originalHeight;
    }

    $(".dropdown").height(targetHeight);
})