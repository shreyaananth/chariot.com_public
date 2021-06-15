<?php
    session_start();
    ob_start();
        if ($_POST["proper18"]!="yes"){
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
   
    $points = $_POST["points"];
    
    $total = $_POST["total"];
    $netmc = $_POST["netmc"];
    $netw = $_POST["netw"];
    $gst = $_POST["gst"];
    $cst = $_POST["cst"];
    $net1 = $_POST["net1"];
    
    
    $query = "UPDATE bill set total = $total where bno = $bno";
   if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
     $query = "UPDATE bill set netmc = $netmc where bno = $bno";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
    $query = "UPDATE bill set netw = $netw where bno = $bno";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
    $query = "UPDATE bill set gst = $gst where bno = $bno";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
     $query = "UPDATE bill set cst = $cst where bno = $bno";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
     $query = "UPDATE bill set net = $net1 where bno = $bno";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
    $items = "SELECT pid,count(*) from item where bno =$bno group by pid";
    $ir1 = mysqli_query($conn,$items);
    if(!$ir1){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    while($irow =  mysqli_fetch_row($ir1)){
    $pid = $irow[0];
    $count = $irow[1];
    
    $query = "UPDATE Inventory set qty = qty - $count where pid = $pid";
    $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    }
    
    $query = "UPDATE employee set daysalesno = daysalesno + 1 where eid = $eid";
    $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
    $query = "SELECT aid from athreyam where cid = $cid";
    $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    
    if($row){
        if($points!=0){
        $q1 = "UPDATE athreyam set points = points - $points where cid = $cid";
       
        $r1 = mysqli_query($conn,$q1);
        if(!$r1){
            $mes = mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
            exit();
        }
        }
        else{
        $points = $net1*0.01;
        
        $q1 = "UPDATE athreyam set points = points + $points where cid = $cid";
       
        $r1 = mysqli_query($conn,$q1);
        if(!$r1){
            $mes = mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
            exit();
        }
        
       }
    }
    $_SESSION["rec"] = 1;
?>
<html>
<body>
    <form id = "one" action = "http://localhost/chariot.com/Billing/receipt.php" method="POST" ></form>
    <input type="hidden" name="rec" value="yes" form="one"/>
    <input type="hidden" name="bno" value=<?php echo $bno; ?> form="one"/>
</body>
</html>
<?php
    echo '<script>document.getElementById("one").submit();</script>';
?>

