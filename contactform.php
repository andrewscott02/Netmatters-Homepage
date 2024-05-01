
<!-- 
    ?user_name=dgf
    &company_name=
    &user_email=olk%40a.com
    &user_phone_number=6765054678
    &user_message=Hi%2C+I+am+interested+in+discussing+a+Our+Offices+solution%2C+could+you+please+give+me+a+call+or+send+an+email%3F
    &user_acceptMarketing=on (will not appear if unchecked)
-->

<?php

session_start();

include_once("includes/connection.php");

$canSubmit = true;

#region Get Inputs

$user_name = "";

if (isset($_POST["user_name"]))
{
    $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
}
else
{
    $canSubmit = false;
}

$company_name = "";

if (isset($_POST["company_name"]))
{
    $company_name = filter_input(INPUT_POST, "company_name", FILTER_SANITIZE_STRING);
}

$user_email = "";

if (isset($_POST["user_email"]))
{
    $user_email = filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_STRING);
}
else
{
    $canSubmit = false;
}

$user_phone_number = "";

if (isset($_POST["user_phone_number"]))
{
    $user_phone_number = filter_input(INPUT_POST, "user_phone_number", FILTER_SANITIZE_STRING);
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

#endregion

function AddContact($user_name, $company_name, $user_email, $user_phone_number, $user_message, $user_acceptMarketing)
{
    global $db;

    if($db == null)
    {
        return false;
    }

    $sql = "INSERT INTO contacts(user_name, company_name, user_email, user_phone_number, user_message, user_acceptMarketing) VALUES(?, ?, ?, ?, ?, ?)";
        
    try
    {
        $results = $db->prepare($sql);
        $results->bindValue(1, $user_name, PDO::PARAM_STR);
        $results->bindValue(2, $company_name, PDO::PARAM_STR);
        $results->bindValue(3, $user_email, PDO::PARAM_STR);
        $results->bindValue(4, $user_phone_number, PDO::PARAM_STR);
        $results->bindValue(5, $user_message, PDO::PARAM_STR);
        $results->bindValue(6, $user_acceptMarketing, PDO::PARAM_INT);
        $results->execute();
    }
    catch (Exception $e)
    {
        return false;
    }
    
    return true;
}

$submit_status = '';
$submit_message = '';

if ($canSubmit)
{
    if (AddContact($user_name, $company_name, $user_email, $user_phone_number, $user_message, $user_acceptMarketing) === false)
    {
        $submit_message = 'Error adding to database';
    }
    else
    {
        $submit_status = 'success';
        $submit_message = 'Your message has been sent!';
    }
}

$status = [
    "sbmt_status" => $submit_status,
    "sbmt_message" => $submit_message
];

$_SESSION["submit_status"] = $submit_status;
$_SESSION["submit_message"] = $submit_message;

header("Location: contact.php");
exit();