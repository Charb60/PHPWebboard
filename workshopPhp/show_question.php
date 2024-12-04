<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>หน้าแรก</title>
    </head>
    <body>
        <h2>กระทู้ทั้งหมด</h2>
        <hr>
        <?php
        $conn = new mysqli('localhost', 'root', 'root', 'webboard');
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM question ORDER BY qid desc";    
        $result = $conn->query($sql);

        while ($dbarr = mysqli_fetch_array($result)){
            // echo $dbarr['qid'];
            echo "&nbsp;<a href=show_detail.php?item=$dbarr[qid]>";
            echo "$dbarr[topic]</a>&nbsp;";
            echo "$dbarr[name]<br>";

            // echo "&nbsp; [" . $dbarr['count'] . " ]<br>\n";
        }
        $conn->close();
        ?>
        <hr><a href="index.html">ตั้งกระทู้ใหม่</a>
    </body>
</html>