<?php
    $sql3 = "INSERT INTO statistics_analysis (name, x, y, description) 
            VALUES('{$_POST['name']}', '{$_POST['x']}','{$_POST['y']}','{$_POST['description']}');
    ";
    $result3 = mysqli_query($conn, $sql3);
    if($result3 === false)
    {
        echo "문제가 발생했습니다.";
        echo mysqli_error($conn);
    }
    else{
        echo "성공했습니다. <a href = 'analysis.php'>돌아가기</a>";
    }
    
?>