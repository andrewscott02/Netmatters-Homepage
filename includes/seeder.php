<?php

/*
web - purple
digital - green
bus-dev - orange
telecoms- red
it - blue
software - blue desaturated
*/

$initialNews =
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
        "description" => "We’re Gold! Netmatters Achieves 2024 Gold Carbon Charter Award Netmatters is excited to announce that we have been awarded the Gold Carbon Charter Award for 2024! 

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
    ],
    [
        "name" => "Telemarketer",
        "tag" => "Careers",
        "description" => "Salary Range £24,960 - £26,000. Potential OTE at £6k -£8k Hours 40 hours per week, Monday – Friday. Minimum 20 hours a week Part Time Location Wymondham, Norfolk",
        "image" => "https://www.netmatters.co.uk/uploads/image/generic-ihz8.png",
        "type" => "telecoms",
        "read_time" => "0",
        "poster" => "Rebecca Moore",
        "poster_pic" => "https://www.netmatters.co.uk/assets/images/thumbnails/article_contact_thumb/rebecca-moore-1fh7.webp",
        "date" => "2024-04-11 00:00:00"
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

$initialOffices = 
[
    [
        "name" => "London Office",
        "address" => "Unit G6 <br> Pixel Business Centre, <br> 110 Brooker Road, Waltham Abbey, <br> London, <br> EN9 1JH",
        "phone" => "02045 397354",
        "image" => "https://www.netmatters.co.uk/assets/images/offices/london.jpg",
        "x_coord" => 51.681706924049394,
        "y_coord" => -0.003072431170442258
    ],
    [
        "name" => "Cambridge Office",
        "address" => "Unit 1.31 <br> St John's Innovation Centre, <br> Cowley Road, Milton, <br> Cambridge, <br> Cb4 0WS",
        "phone" => "01223 37 57 72",
        "image" => "https://www.netmatters.co.uk/assets/images/offices/cambridge.jpg",
        "x_coord" => 52.23534356510281,
        "y_coord" => 0.1544504863609335
    ],
    [
        "name" => "Wymondham Office",
        "address" => "Unit 15 <br> Penfold Drive, <br> Gateway 11 Business Park, <br> Wymondham, Norfolk, <br> NR18 0WZ",
        "phone" => "01603 70 40 20",
        "image" => "https://www.netmatters.co.uk/assets/images/offices/wymondham.jpg",
        "x_coord" => 52.575984732062736,
        "y_coord" => 1.1366990688743508
    ],
    [
        "name" => "Great Yarmouth Office",
        "address" => "Suite F23, <br> Beacon Innovation Centre, <br> Beacon Park, Gorleston, <br> Great Yarmouth, Norfolk, <br> NR31 7RA",
        "phone" => "01493 60 32 04",
        "image" => "https://www.netmatters.co.uk/assets/images/offices/yarmouth-2.jpg",
        "x_coord" => 52.55583958709729,
        "y_coord" => 1.7129253075019553
    ]
];

function AddNews($name, $tag, $description, $imgsrc, $type, $read_time, $poster, $poster_pic, $date)
{
    global $db;

    if($db == null)
    {
        echo "No database was found";
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

function AddOffice($name, $address, $phone, $imgsrc, $x, $y)
{
    global $db;

    if($db == null)
    {
        echo "No database was found";
        return false;
    }

    $sql = "INSERT INTO offices(name, address, phone, image, x_coord, y_coord) VALUES(?, ?, ?, ?, ?, ?)";
        
    try
    {
        $results = $db->prepare($sql);
        $results->bindValue(1, $name, PDO::PARAM_STR);
        $results->bindValue(2, $address, PDO::PARAM_STR);
        $results->bindValue(3, $phone, PDO::PARAM_STR);
        $results->bindValue(4, $imgsrc, PDO::PARAM_STR);
        $results->bindValue(5, $x, PDO::PARAM_STR);
        $results->bindValue(6, $y, PDO::PARAM_STR);
        $results->execute();
    }
    catch (Exception $e)
    {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    
    return true;
}

function GetTableEntryCount($table)
{
    global $db;

    if($db == null)
    {
        echo "No database was found";
        return false;
    }

    $sql = "SELECT COUNT(*) AS count FROM " . $table;
        
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

function TrySeedDatabases()
{
    $newsCount = GetTableEntryCount("news");

    if ($newsCount["count"] === 0)
    {
        SeedNewsDatabase();
    }

    $officeCount = GetTableEntryCount("offices");

    if ($officeCount["count"] === 0)
    {
        SeedOfficeDatabase();
    }
}

function SeedNewsDatabase()
{
    global $initialNews;
    for ($i = 0; $i < count($initialNews); $i++)
    {
        AddNews(
            $initialNews[$i]["name"],
            $initialNews[$i]["tag"],
            $initialNews[$i]["description"],
            $initialNews[$i]["image"],
            $initialNews[$i]["type"],
            $initialNews[$i]["read_time"],
            $initialNews[$i]["poster"],
            $initialNews[$i]["poster_pic"],
            $initialNews[$i]["date"]
        );
    }
}

function SeedOfficeDatabase()
{
    global $initialOffices;
    for ($i = 0; $i < count($initialOffices); $i++)
    {
        AddOffice(
            $initialOffices[$i]["name"],
            $initialOffices[$i]["address"],
            $initialOffices[$i]["phone"],
            $initialOffices[$i]["image"],
            $initialOffices[$i]["x_coord"],
            $initialOffices[$i]["y_coord"]
        );
    }
}

TrySeedDatabases();