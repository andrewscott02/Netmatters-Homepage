<?php

/*
web - purple
digital - green
bus-dev - orange
telecoms- red
it - blue
software - blue desaturated
*/

$initialValues =
[
    [
        "name" => "James & Ella - Website Build and Stock Management System",
        "tag" => "Case Studies",
        "description" => "Dogs are more than just a pet – they’re companions who support their owners through the good times and the bad times in life. James & Ella’s mission is to reward them for their love and loyalty by producing the best quality nutritious, raw dog food, available through either subscriptions, or one-time purchases. They produce everything in their UK-based kitchens using human-grade ingredients, so owners can be sure that their food is natural and safe.",
        "image" => "https://www.netmatters.co.uk/uploads/article/3768/jamed-ella-NyPW.png",
        "type" => "web",
        "read_time" => "5",
        "poster" => "Netmatters",
        "poster_pic" => "https://www.netmatters.co.uk/assets/images/thumbnails/article_contact_thumb/netmatters-ltd-VXAv.webp",
        "date" => "2024-04-23 00:00:00"
    ],
    [
        "name" => "Netmatters Achieves 2024 Gold Carbon Charter Award",
        "tag" => "News",
        "description" => "Netmatters is excited to announce that we have been awarded the Gold Carbon Charter Award for 2024! 

        This is the third time we have achieved the Carbon Charter Award, achieving Silver in 2019 and progressing to Gold in 2021.",
        "image" => "https://www.netmatters.co.uk/uploads/article/3764/were-gold-netmatters-kIaG.png",
        "type" => "digital",
        "read_time" => "4",
        "poster" => "Netmatters",
        "poster_pic" => "https://www.netmatters.co.uk/assets/images/thumbnails/article_contact_thumb/netmatters-ltd-VXAv.webp",
        "date" => "2024-04-22 00:00:00"
    ],
    [
        "name" => "Alder Hey Children’s Charity – Website Rebuild and Content Management Optimisation",
        "tag" => "Case Studies",
        "description" => "Alder Hey Children’s Charity is dedicated to raising crucial funds to transform Alder Hey Children’s Hospital into a world-class, patient-friendly facility for the 330,000 patients and families they serve annually.  

        Championing their vision to support the building of a healthier future for children and young people, Alder Hey focus their efforts to raise money to support life-saving medical equipment and facilities, ensuring that every child experiences the magic of Alder Hey during their hospital stay.",
        "image" => "https://www.netmatters.co.uk/uploads/article/3741/alder-hey-childrens-QCOS.png",
        "type" => "web",
        "read_time" => "5",
        "poster" => "Netmatters",
        "poster_pic" => "https://www.netmatters.co.uk/assets/images/thumbnails/article_contact_thumb/netmatters-ltd-VXAv.webp",
        "date" => "2024-04-17 00:00:00"
    ]

    
    // Templates

    // [
    //     "name" => "",
    //     "tag" => "",
    //     "description" => "",
    //     "image" => "",
    //     "type" => "",
    //     "read_time" => "",
    //     "poster" => "Netmatters",
    //     "poster_pic" => "https://www.netmatters.co.uk/assets/images/thumbnails/article_contact_thumb/netmatters-ltd-VXAv.webp",
    //     "date" => "2024-04-23 00:00:00"
    // ]
    
    // [
    //     "name" => "",
    //     "tag" => "",
    //     "description" => "",
    //     "image" => "",
    //     "type" => "",
    //     "read_time" => "",
    //     "poster" => "",
    //     "poster_pic" => "",
    //     "date" => "2024-04-23 00:00:00"
    // ]
];

function AddNews($name, $tag, $description, $imgsrc, $type, $read_time, $poster, $poster_pic, $date)
{
    include_once("includes/connection.php");

    global $db;

    if($db == null)
    {
        echo "AddNews: No database was found";
        return false;
    }

    $sql = "INSERT INTO news(name, tag, description, image, type, read_time, poster, poster_pic, date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
    try
    {
        $results = $db->prepare($sql);
        $results->bindValue(1, $name, PDO::PARAM_STR);
        $results->bindValue(2, $tag, PDO::PARAM_STR);
        $results->bindValue(3, $description, PDO::PARAM_STR);
        $results->bindValue(4, $imgsrc, PDO::PARAM_STR);
        $results->bindValue(5, $type, PDO::PARAM_STR);
        $results->bindValue(6, $read_time, PDO::PARAM_STR);
        $results->bindValue(7, $poster, PDO::PARAM_STR);
        $results->bindValue(8, $poster_pic, PDO::PARAM_STR);

        // $sqlDate = date('Y-m-d H:i:s', $date);
        $results->bindValue(9, $date, PDO::PARAM_STR);
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
        SeedNewsDatabase();
    }
}

function SeedNewsDatabase()
{
    global $initialValues;
    for ($i = 0; $i < count($initialValues); $i++)
    {
        AddNews(
            $initialValues[$i]["name"],
            $initialValues[$i]["tag"],
            $initialValues[$i]["description"],
            $initialValues[$i]["image"],
            $initialValues[$i]["type"],
            $initialValues[$i]["read_time"],
            $initialValues[$i]["poster"],
            $initialValues[$i]["poster_pic"],
            $initialValues[$i]["date"]
        );
    }
}

TrySeedDatabase();