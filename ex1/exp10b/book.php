<!DOCTYPE html>
<html>
<head>
    <title>Phone booking!!</title>
</head>

<body>
    <?php
    session_start();

    $model = $_POST['model'];
    $colour = $_POST['colour'];
    $quantity = intval($_POST['quantity']);

    $con = mysqli_connect("localhost:3306","root","","phone");
    $stmt = "select * from phones where model = '$model' and colour = '$colour'"; 
    $res = mysqli_query($con,$stmt);
    $row = mysqli_fetch_array($res); 

    echo '<center><h1>Phone Details</h1></center>';
    if($row){
        $count = intval($row['quantity']);
        $name = $row['model'];
        if($quantity > $count)
        {
            echo("<SCRIPT>window.alert('no phones available');</SCRIPT>");
        }
        else{
            $count = $count - $quantity;
            $stmt2 = "update phones set quantity = '$count' where model = '$name'"; 
            $res2 = mysqli_query($con,$stmt2);
            if($res2){
                echo("<SCRIPT>window.alert('phones booked successfully');
                window.location.href='main.php';</SCRIPT>");
            }
        }
        mysqli_free_result($res);
        mysqli_close($con);
    }
    else{
        echo("<SCRIPT>window.alert('No Phone Available');</SCRIPT>");
    }   
?>
</body>
</html>