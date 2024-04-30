<?php

function GetNewsArticles()
{
    global $db;

    if($db == null)
    {
        echo "No database was found";
        return false;
    }

    $sql = "
            SELECT * FROM news
            ORDER BY date DESC
            LIMIT 3
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

$articles = GetNewsArticles();

$descriptionCharLimit = 93;

foreach ($articles as $item)
{
    global $descriptionCharLimit;
    $shortDescription = $item["description"];

    if (strlen($shortDescription) >= $descriptionCharLimit) 
    {
        $lastword = strpos($shortDescription, " ", $descriptionCharLimit);
        $shortDescription = substr($shortDescription, 0, $lastword) . "...";
    }

    echo '
        <li class="flex-container vertical">
            <a href="#" class="news news-' . $item["type"] . '">
                <div class="flex-item img-container img-news">
                    <div class="news-popup">
                        <p>' . $item["tag"] . '</p>
                    </div>
                    <img src="' . $item["image"] . '" alt="' . $item["name"] . '">
                </div>
                <h3 class="flex-item">
                ' . $item["name"];

                if ($item["read_time"] > 0)
                {
                    echo '<span class="read-time">- 4 MINUTE READ</span>';
                }
                
    echo '       </h3>
                <p class="flex-item">' . $shortDescription . '</p>
                <span class="flex-item btn">READ MORE</span>
                
                <div class="news-poster-container">
                    <div class="news-poster">
                        <img class="icon-news" src="' . $item["poster_pic"] . '" alt="Profile picture">
                        <div>
                            <p>
                            <strong>Posted by ' . $item["poster"] . '</strong>
                            <br>
                            ' . $item["date"] . '
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </li>';
}