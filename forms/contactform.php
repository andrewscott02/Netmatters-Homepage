
<!-- 
    ?user_name=dgf
    &company_name=
    &user_email=olk%40a.com
    &user_phone_number=6765054678
    &user_message=Hi%2C+I+am+interested+in+discussing+a+Our+Offices+solution%2C+could+you+please+give+me+a+call+or+send+an+email%3F
    &user_acceptMarketing=on (will not appear if unchecked)
-->

<?php

$canSubmit = true;

#region Get Inputs

$user_name = "";

if (isset($_POST["user_name"]))
{
    $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
    echo $user_name . "\n";
}
else
{
    $canSubmit = false;
}

$company_name = "";

if (isset($_POST["company_name"]))
{
    $company_name = filter_input(INPUT_POST, "company_name", FILTER_SANITIZE_STRING);
    echo $company_name . "\n";
}

$user_email = "";

if (isset($_POST["user_email"]))
{
    $user_email = filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_STRING);
    echo $user_email . "\n";
}
else
{
    $canSubmit = false;
}

$user_phone_number = "";

if (isset($_POST["user_phone_number"]))
{
    $user_phone_number = filter_input(INPUT_POST, "user_phone_number", FILTER_SANITIZE_STRING);
    echo $user_phone_number . "\n";
}
else
{
    $canSubmit = false;
}

$user_message = "";

if (isset($_POST["user_message"]))
{
    $user_message = filter_input(INPUT_POST, "user_message", FILTER_SANITIZE_STRING);
    // $user_message = $_POST["user_message"];
    echo $user_message . "\n";
}
else
{
    $canSubmit = false;
}

$user_acceptMarketing = false;

if (isset($_POST["user_acceptMarketing"]))
{
    $user_acceptMarketing = true;
}

if ($user_acceptMarketing === true)
{
    echo "accept marketing";
}

else if ($user_acceptMarketing === false)
{
    echo "does not accept marketing";
}

#endregion