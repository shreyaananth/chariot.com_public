<?php
    session_start();
    ob_start();
        if ($_POST["proper9"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
  
        $eid = $_POST["eid"];
        $cid = $_POST["cid"];
    
      $query = "SELECT NOW()";
    $res = mysqli_query($conn,$query);
    if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    $date = $row[0];
    
    $query = "INSERT INTO bill (eid, cid,date,dt) values($eid, $cid, '$date','$date')";
   if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
     $query = "select bno from bill where eid=$eid and cid=$cid and dt='$date'";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    $bno = $row[0];
?>

<html>
<body>
<form id="one" action="http://localhost/chariot.com/Billing/cart.php" method="POST"></form>
<input form="one" type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="one" type="hidden" name="bno" value=<?php echo $bno; ?> />
<input form="one" type="hidden" name="date" value=<?php echo $date; ?> />
<input form="one" type="hidden" name="proper10" value="yes" />
</body>
</html>
<?php
        echo '<script>document.getElementById("one").submit();</script>';
?>
