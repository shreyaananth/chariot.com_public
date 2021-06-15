<?php

    session_start();
    ob_start();
        if ($_POST["proper8"]!="yes"){
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
    
    $query = "SELECT Date(NOW())";
    $res = mysqli_query($conn,$query);
    if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    $date = $row[0];
    $eid = $_POST["eid"];
    $cid = $_POST["cid"];
    $query = "SELECT * from price where Date(date) = '$date'";
     $res = mysqli_query($conn,$query);
    if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    
    if(!$row){
      $endpoint = 'latest';
          $access_key = 'vx3v0w7z898fv7gp1k688e64sk86hp8eiilt1xd28mncmayrst079eob03ng';
          $ch = curl_init('https://metals-api.com/api/'.$endpoint.'?access_key='.$access_key.'&base=INR&symbols=XAU,XAG,XPT');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $json = curl_exec($ch);
          curl_close($ch);
          $exchangeRates = json_decode($json, true);
          $g = round($exchangeRates['rates']['XAU']/28.35,3);
          $s = round($exchangeRates['rates']['XAG']/28.35,3);
          $p = round($exchangeRates['rates']['XPT']/28.35,3);
          
          $k22 = $g;
          $g = $g/22;
          $k18 = round($g*18,3);
          $k24 = round($g*24,3);
    
    $query = "INSERT INTO price values('$date',$k22,$k24,$k18,$s,$p)";
   if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    }
    
  ?>
  
  <html>
  <body>
  <form id="one" action="http://localhost/chariot.com/Billing/insbill.php" method="POST" >
  <input form="one" type="hidden" name="eid" value=<?php echo $eid; ?> />
  <input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
  <input form="one" type="hidden" name="proper9" value="yes" />
  </form>
  </body>
  </html>
  
  <?php
        echo '<script>document.getElementById("one").submit();</script>';
?>
  
