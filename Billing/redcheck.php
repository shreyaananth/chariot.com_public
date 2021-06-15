<?php
    session_start();
    ob_start();
        if ($_POST["proper12"]!="yes"){
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
 
 
 
     $flag = 0;
   
    $items = "SELECT pid,count(*) from item where bno = $bno group by pid";
    $ir1 = mysqli_query($conn,$items);
    if(!$ir1){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    while($irow =  mysqli_fetch_row($ir1)){
    $pid = $irow[0];
    $count = $irow[1];
    
    $query = "SELECT qty from Inventory where pid = $pid";
    $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    $ecount = $row[0];
    
    if($count>$ecount){
    $j = 1;
    $flag = 1;
    $query = "DELETE FROM item where pid = $pid and  bno = $bno";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
                exit();
    }
   
    while($j<=$ecount){
            $query = "INSERT INTO item (bno,pid) values($bno,$pid)";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                echo "here1";
                header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
                exit();
            }
            $j = $j + 1;
    }
    }
    
}
 
 
    $query = "SELECT * from athreyam where cid=$cid";
   $res = mysqli_query($conn,$query);
   if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
    $row = mysqli_fetch_row($res);
?>

<html>
<body>
<form id="one" action="http://localhost/chariot.com/Billing/cartcheck2.php" method="POST"></form>
<form id="four" action="http://localhost/chariot.com/Billing/redeem.php" method="POST"></form>
<form id="two" action="http://localhost/chariot.com/Billing/cart.php" method="POST"></form>


<input form="two"  type="hidden" name="eid" value=<?php echo $eid; ?> /
<input form="two" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="two"  type="hidden" name="date" value=<?php echo $date; ?> />
<input form="two" type="hidden" name="bno" value=<?php echo $bno; ?> />
<input form="two" type="hidden" name="proper10" value="yes" />

<input form="one" type="hidden" name="total" value=<?php echo $total; ?> />
<input form="one" type="hidden" name="netmc" value=<?php echo $netmc; ?> />
<input form="one" type="hidden" name="netw" value=<?php echo $netw; ?> />
<input form="one" type="hidden" name="proper15" value="yes" />
<input form="one"  type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="one"  type="hidden" name="date" value=<?php echo $date; ?> />
<input form="one" type="hidden" name="bno" value=<?php echo $bno; ?> />

<input form="four" type="hidden" name="total" value=<?php echo $total; ?> />
<input form="four" type="hidden" name="netmc" value=<?php echo $netmc; ?> />
<input form="four" type="hidden" name="netw" value=<?php echo $netw; ?> />
<input form="four" type="hidden" name="proper13" value="yes" />
<input form="four"  type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="four" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="four"  type="hidden" name="date" value=<?php echo $date; ?> />
<input form="four" type="hidden" name="bno" value=<?php echo $bno; ?> />
</body>
</html>
<?php
    if($flag==1){
      $_SESSION["ip5"] = 1;
        echo '<script>document.getElementById("two").submit();</script>';
    }
    else if($row){
    $_SESSION["ip6"] = 1;
    echo '<script>document.getElementById("four").submit();</script>';
    }
    else if(!$row){
    $_SESSION["ip7"] = 1;
     echo '<script>document.getElementById("one").submit();</script>';
    }
?>
