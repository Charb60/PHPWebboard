<?php 
    $topic = $_POST["topic"];
    $detail = $_POST["detail"];
    $name = $_POST["name"];
        
    $conn = new mysqli('localhost', 'root', 'root', 'webboard');
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql = "SELECT * FROM question";    
    $result = $conn->query($sql);

    $count = 0;
        while ($dbarr = mysqli_fetch_array($result)){
            $count ++;
        }
        $itemno = $count+1 ;
        $sql = "INSERT INTO question VALUES ($itemno, '$topic', '$detail', '$name', 0)";
        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            echo "บันทึกข้อมูลสำเร็จ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();


?>