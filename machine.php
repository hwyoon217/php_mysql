<?php
    $list ="";
    $conn = mysqli_connect("localhost","root","123456","project_db");
    $sql = "select * from machine_learning";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $list = $list."<li><a href = \"machine.php?id={$row['id']}\">{$row['class']}</a></li>";
    }

    $article = array(
        "class"=>"",
        "label"=>"",
        "ex"=> ""
    );

    if(isset($_GET['id']))
    {
        $sql = "select * from machine_learning where id = {$_GET['id']}";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $article['class'] = $row['class'];
        $article['label'] = $row['label'];
        $article['ex'] = $row['ex'];
    }
?>


<html>
    <head>
        <meta charset = "utf-8/">
        <style type="text/css">
            astyle{
                font-size: 19px;
                font-family: 명조;
                background-color: khaki;
            }
        </style>
    </head>

    <body bgcolor= "khaki">
    
    <h1>Machine Learning</h1>

<ol>
    <?php
        echo $list,"<br>";
    ?>
</ol>

<h2>
    <?php
        $name = "종류 : ";
        echo $name.$article["class"];
    ?>
</h2>
<h3>
    <?php
        $label = "라벨 : ";
        echo $label.$article["label"];
    ?>
</h3>
<h3>
    <?php
        $example = "예시 : ";
        echo $example.$article["ex"];
    ?>
</h3>

<form action = "machine_create.php" method = "post">
    <p><input type ="text" name = "class" placeholder  ="class"></p>
    <p><input type ="text" name = "label" placeholder  ="o/x"></p>
    <p><input type ="text" name = "ex" placeholder  ="ex"></p>
    <p><input type = "submit"></p>
</form>

<br>
    </body>
</html>