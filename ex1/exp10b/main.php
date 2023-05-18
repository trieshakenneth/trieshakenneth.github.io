<!DOCTYPE html>
<html>
<head>
    <title>PHone booking!!</title>
</head>

<body>
    <?php
    session_start();
    // Database connection
    $con = mysqli_connect("localhost:3306","root","","phone");
    $stmt = "select * from phones"; 
    $res = mysqli_query($con,$stmt); 
    echo '<center><h1>Phone Details</h1></center>';
    if($res){
        while($row = mysqli_fetch_array($res))
        {
            echo'<center><div>'.        
            '<h5>Name : '.$row["Model"].'</h5>'.
            '<h5>Color : '.$row["colour"].'</h5>'.
            '<h5>Quantity available : '.$row["quantity"].'</h5>'.
            '</div></center>';
        }

        mysqli_free_result($res);
        mysqli_close($con);
    }
    else{
        echo("<SCRIPT>window.alert('No phones available');</SCRIPT>");
    }   
?>
<center><div>
    
    <form action="book.php" method="POST">
          <label for="model">Select the phone model: </label>
            <select name="model" required>
                <option value="">Choose an option</option>
                <option value="iphone12">iphone12</option>
                <option value="iphone13">iphone13</option>
                <option value="iphone14">iphone14</option>
            </select><br>

            <label for="colour">Select the colour:</label>
            <select name="colour" required>
                <option value="">Choose an option</option>
                <option value="RED">RED</option>
                <option value="GREEN">GREEN</option>
                <option value="YELLOW">YELLOW</option>
            </select><br>
        <label for="quantity">Enter quantity: </label>
        <input type="number" name="quantity" min="1" max="30" required><br>
        <input type="submit">
    </form>
</div></center>
</body>
</html>