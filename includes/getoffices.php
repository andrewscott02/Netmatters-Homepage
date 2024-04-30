<?php

function GetOffices()
{
    global $db;

    if($db == null)
    {
        echo "No database was found";
        return false;
    }

    $sql = "
        SELECT * FROM offices
    ";
        
    try
    {
        $results = $db->query($sql);
    }
    catch (Exception $e)
    {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    
    $count = ($results->fetchall(PDO::FETCH_ASSOC));
    return $count;
}

$offices = GetOffices();

$descriptionCharLimit = 93;

foreach ($offices as $item)
{
    echo '
        <div class="office">
            <div class="office-info">
                <img class="header-title" src="' . $item["image"] . '" alt="London Office">
                <div class="office-details">
                    <p class="office-name">
                        <a href="">' . $item["name"] . '</a>
                    </p>
                    <p class="office-address">
                        ' . $item["address"] . '
                    </p>
                    <p class="office-phone">
                        <a href="">' . $item["phone"] . '</a>
                    </p>
                    <a class="btn">VIEW MORE</a>
                </div>
            </div>
            <div class="map"></div>
        </div>
    ';
}