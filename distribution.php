<?php
        $list = "";
        $conn = mysqli_connect("localhost","root","123456","project_db");    
        $sql = "select * from distribution";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) 
        {
            $list = $list."<li><a href = \"distribution.php?id={$row['id']}\">{$row['name']}</a></li>";
        }



        $article = array(
            "name" =>  "분포이름",
            "probability_function" => "이산형 / 연속형",
            "description"=> "explain"  
        );
    

        if(isset($_GET["id"]))
        {
            $sql = "select * from distribution where id = {$_GET['id']}";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $article ["name"] = $row["name"];
            $article["probability_function"] = $row["probability_function"];
            $article ["description"] = $row["description"];
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

    <body bgcolor= "khaki">
    <h1>분포</h1>
        <ol>
            <?php
                echo $list,"<br>";
            ?>
        </ol>

        <h2>
            <?php
                echo $article["name"];
            ?>
        </h2>
        <h3>
            <?php
                echo $article["probability_function"];
            ?>
        </h3>
        <h3>
            <?php
                echo $article["description"];
            ?>
        </h3>

        <form action = "distribution_create.php" method = "post">
            <p><input type ="text" name = "name" placeholder  ="title"></p>
            <p><input type ="text" name = "probability_function" placeholder  ="pmf/pdf"></p>
            <p><textarea name = "description" placeholder = "description"></textarea></p>
            <p><input type = "submit"></p>

        </form>
        <br>
    </body>
    </body>
</html>