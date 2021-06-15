<?php
    session_start();
    ob_start();
        if ($_POST["proper3"]!="yes"){
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
        $cphno = $_POST["cphno"];
        $cname = $_POST["cname"];
        $aadhar = $_POST["aadhar"];
 
    $query = "INSERT INTO customer (phno, aadhar,cname) values($cphno, $aadhar, '$cname')";
   if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
     $query = "select cid from customer where phno = $cphno";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    $cid = $row[0];
    
?>

<html>
<body>
<form id="one" action="http://localhost/chariot.com/Billing/checkat.php" method="POST"></form>

<input form="one" type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="one" type="hidden" name="proper4" value="yes" />

</body>
</html>
<?php
        echo '<script>document.getElementById("one").submit();</script>';
?>
