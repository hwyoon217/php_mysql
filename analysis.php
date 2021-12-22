<?php
    $list ="";
    $conn = mysqli_connect("localhost","root","123456","project_db");
    $sql = "select * from statistics_analysis";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $list = $list."<li><a href=\"analysis.php?id={$row['id']}\">{$row['name']}</a></li>";
    }

    $article = array(
        "name"=>"",
        "x"=>"",
        "y"=>"",
        "description"=>"설명"
    );

    if(isset($_GET['id']))
    {
        $sql = "select * from statistics_analysis where id = {$_GET['id']}";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $article['name']=$row['name'];
        $article['x'] = $row['x'];
        $article['y'] = $row['y'];
        $article['description'] = $row['description'];
    }
?>


<html>
    <head>
        <meta charset = "utf-8/">
        <style type="text/css">
            astyle{
                font-size: 19px;
                font-family: 명조;
            }
        </style>
    </head>

    <body bgcolor= "khaki" >
    <h1>statistics_analysis</h1>

        <ol>
            <?php           
                echo $list,"<br>";
            ?>
        </ol>
        
        <h2>
            <?php
                $name = "종류 : ";
                echo $name.$article["name"];
            ?>
        </h2>
        <h4>
            <?php
                $x = "독립변수 : ";
                echo $x.$article["x"];
            ?>
        </h4>
        <h4>
            <?php
                $y = "종속변수 : ";
                echo $y.$article["y"];
            ?>
        </h4>
        <h4>
            <?php
                echo $article["description"];
            ?>
        </h4>

        <form action = "analysis_create.php" method = "post">
            <p><input type ="text" name = "name" placeholder  ="name"></p>
            <p><input type ="text" name = "x" placeholder  ="이산형/연속형"></p>
            <p><input type ="text" name = "y" placeholder  ="이산형/연속형"></p>
            <p><textarea name = "description" placeholder = "description"></textarea></p>
            <p><input type = "submit"></p>
        </form>

        <br>
    </body>
</html>