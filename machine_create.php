<?php
   
    $sql = "INSERT INTO machine_learning (class, label, ex) VALUES('{$_POST['class']}', '{$_POST['label']}','{$_POST['ex']}');
    ";
    $result = mysqli_query($conn, $sql);
    if($result === false)
    {
        echo "문제가 발생했습니다.";
        echo mysqli_error($conn);
    }
    else{
        echo "성공했습니다. <a href = 'machine.php'>돌아가기</a>";
    }

    
?>