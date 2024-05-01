//#region Out of Hours IT Support Dropdown

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

//#endregion

//#region Form Validation

$(".form-sbmt").on("click", (event)=>{
    CheckFormFields(event);
})

$("input").on("keypress", (event)=>{
    if (event.which == 13)
    {
        CheckFormFields(event);
    }
})

function CheckFormFields(event)
{
    let canSubmit = true;
    let message = "Please fill out all required form fields";

    $(event.target).closest('fieldset').find(">:first-child").children().each((index, element)=>{
        inputElement = $(element).find(">:last-child");
        labelElement = $(inputElement).prev().prev();

        if ($(labelElement).hasClass("required"))
        {
            if ($(inputElement).attr("type") === "email")
            {
                let emailMessage = GetEmailMessage($(inputElement).val());
                if(emailMessage !== "")
                {
                    message = emailMessage;
                    canSubmit = false;
                }
            }
            else if ($(inputElement).attr("type") === "tel")
            {
                let phoneMessage = GetPhoneMessage($(inputElement).val());
                if(phoneMessage !== "")
                {
                    message = phoneMessage;
                    canSubmit = false;
                }
            }

            const content = $(inputElement).val();
            if (content == "")
            {
                // alert("success: " + $(element) + " => " + content);
                canSubmit = false
            }
        }
    });

    if (canSubmit)
    {
        alert("Form submission is in progress");
    }
    else
    {
        event.preventDefault();
        alert(message);
    }
}

function ClearFormFields()
{
    $("input").each((index, element)=>{
        $(element).val("");
    });
}

const emailChecks =
[
    //Does not end on .
    {
        message: "'.' is used at the wrong position in the email address",
        regexCheck: [/\.$/, /@+\./],
        required: false
    },

    //Text after @
    {
        message: "Please enter some text after the '@' in the email address",
        regexCheck: [/@+\S/],
        required: true
    },

    //Includes @
    {
        message: "Please include an '@' in the email address",
        regexCheck: [/\S+@/],
        required: true
    }
]

function GetEmailMessage(input)
{
    message = "";

    for (let i= 0; i < emailChecks.length; i++)
    {
        let success = true;

        for (let j = 0; j < emailChecks[i].regexCheck.length; j++)
        {
            let match = input.match(emailChecks[i].regexCheck[j]) ? true : false;
            match = match == emailChecks[i].required;

            if (match == false)
            {
                success = false;
            }
        }

        if (!success)
        {
            //alert(emailChecks[i].message);
            message = emailChecks[i].message;
        }
    }

    if (input === "")
    {
        message = "Please include an email address";
    }
    
    return message;
}

function GetPhoneMessage(input)
{
    message = "";

    let valid = input.search(/^(\+{1}\d{2,3}\s?[(]{1}\d{1,3}[)]{1}\s?\d+|\+\d{2,3}\s{1}\d+|\d+){1}[\s|-]?\d+([\s|-]?\d+){1,2}$/) ? false : true;

    if (valid == false)
    {
        message = "Phone number is not valid. Please include a valid phone number";
    }

    if (input === "")
    {
        message = "Please include a phone number";
    }
    
    return message;
}

//#endregion