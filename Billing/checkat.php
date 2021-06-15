<?php
    session_start();
    ob_start();
        if ($_POST["proper4"]!="yes"){
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
<form id="one" action="http://localhost/chariot.com/Billing/price.php" method="POST"></form>
<form id="two" action="http://localhost/chariot.com/Billing/member.php" method="POST"></form>

<input form="one" type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="one" type="hidden" name="proper8" value="yes" />

<input form="two" type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="two" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="two" type="hidden" name="proper5" value="yes" />
</body>
</html>
<?php
    if(!$row){
        echo '<script>document.getElementById("two").submit();</script>';
    }
    echo '<script>document.getElementById("one").submit();</script>';
?>
