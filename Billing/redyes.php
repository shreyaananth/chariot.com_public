<?php
    session_start();
    ob_start();
        if ($_POST["proper14"]!="yes"){
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
    $date = $_POST["date"];
    $bno = $_POST["bno"];

    $total = $_POST["total"];
    $netmc = $_POST["netmc"];
    $netw = $_POST["netw"];
    $red = $_POST["red"];
    $points = 0;
 if($red == "yes"){
    $query = "SELECT points from athreyam where cid = $cid";
    $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    $points = $row[0];
    }
    
    $query = "UPDATE bill set redeem = $points where bno = $bno";
    $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }

    
?>

<html>
<body>
<form id="four" action="http://localhost/chariot.com/Billing/cartcheck2.php" method="POST"></form>

<input form="four" type="hidden" name="total" value=<?php echo $total; ?> />
<input form="four" type="hidden" name="netmc" value=<?php echo $netmc; ?> />
<input form="four" type="hidden" name="netw" value=<?php echo $netw; ?> />
<input form="four" type="hidden" name="proper15" value="yes" />
<input form="four"  type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="four" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="four"  type="hidden" name="date" value=<?php echo $date; ?> />
<input form="four" type="hidden" name="bno" value=<?php echo $bno; ?> />
</body>
</html>
<?php
    $_SESSION["ip7"] = 1;
    echo '<script>document.getElementById("four").submit();</script>';
?>
