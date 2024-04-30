<?php

$initialValues = [
    ["test news piece", "test description", "srchere", "red", "01-02-03"]
];

function AddNews($name, $description, $imgsrc, $type, $date)
{
    include_once("includes/connection.php");

    global $db;

    if($db == null)
    {
        echo "AddNews: No database was found";
        return false;
    }

    $sql = "INSERT INTO news(name, description, image, type, date) VALUES(?, ?, ?, ?, ?)";
        
    try
    {
        $results = $db->prepare($sql);
        $results->bindValue(1, $name, PDO::PARAM_STR);
        $results->bindValue(2, $description, PDO::PARAM_STR);
        $results->bindValue(3, $imgsrc, PDO::PARAM_STR);
        $results->bindValue(4, $type, PDO::PARAM_STR);
        $results->bindValue(5, $date, PDO::PARAM_STR);
        $results->execute();
    }
    catch (Exception $e)
    {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    
    return true;
}

function GetNewsCount()
{
    include_once("includes/connection.php");

    global $db;

    if($db == null)
    {
        echo "AddNews: No database was found";
        return false;
    }

    $sql = "SELECT COUNT(*) AS count FROM news";
        
    try
    {
        $results = $db->query($sql);
    }
    catch (Exception $e)
    {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    
    $count = ($results->fetch(PDO::FETCH_ASSOC));
    return $count;
}

function TrySeedDatabase()
{
    $newsCount = GetNewsCount();

    if ($newsCount["count"] === 0)
    {
        global $initialValues;
        for ($i = 0; $i < count($initialValues); $i++)
        {
            AddNews($initialValues[$i][0], $initialValues[$i][1], $initialValues[$i][2], $initialValues[$i][3], $initialValues[$i][4]);
        }
    }
}

TrySeedDatabase();