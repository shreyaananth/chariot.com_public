<?php
    session_start();
    ob_start();
        if ($_POST["proper11"]!="yes"){
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
    $pid = $_POST["pid"];
    $_SESSION["ip5"] = 1;
    
    
    $query = "SELECT qty from Inventory where pid = $pid";
    $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    
    if($row){
    
    $q1 = "SELECT count(*) from item where pid = $pid and bno = $bno";
    $r1 = mysqli_query($conn,$q1);
     if(!$r1){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $c1 = mysqli_fetch_row($r1);
    $count = $c1[0]+1;
    
    if($row[0]>=$count){
    $query = "INSERT INTO item (bno, pid) values($bno, $pid)";
   if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    }
    }
    
?>

<html>
<body>
<form id="one" action="http://localhost/chariot.com/Billing/cart.php" method="POST"></form>
<input form="one"  type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="one"  type="hidden" name="date" value=<?php echo $date; ?> />
<input form="one" type="hidden" name="bno" value=<?php echo $bno; ?> />
<input form="one" type="hidden" name="proper10" value="yes" />
</body>
</html>
<?php
        echo '<script>document.getElementById("one").submit();</script>';
?>
