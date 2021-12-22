<?php
    $conn = mysqli_connect("localhost","root","123456","project_db");   

    $sql1 = "INSERT INTO distribution (name, probability_function, description) VALUES('{$_POST['name']}','{$_POST['probability_function']}', '{$_POST['description']}');
    ";
    $result1 = mysqli_query($conn, $sql1);
    if($result1 === false)
    {
        echo "문제가 발생했습니다.";
        echo mysqli_error($conn);
    }
    else{
        echo "성공했습니다. <a href = 'distribution.php'>돌아가기</a>";
    }
    
?>