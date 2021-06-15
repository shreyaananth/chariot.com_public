<?php
   session_start();
       ob_start();
?>
<script>
window.addEventListener( "pageshow", function ( event123 ) {
  var historyTraversal = event123.persisted ||
                         ( typeof window.performance != "undefined" &&
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
</script>
<?php
   if($_POST["proper2"]!="yes"){
    $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Customers/error.php?mes=".$mes);
   }

     $_SESSION["ip2"] = 0;
?>
<html>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $conn = mysqli_connect("127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Customers/error.php?mes=".$mes);
        exit();
    }
  
    else if($conn)
    {

        $cid = $_POST["cid"];
        $cname = $_POST["cname"];
        $cphno = $_POST["cphno"];
        $aadhar = $_POST["aadhar"];
       
        $i = 0;
        $n = sizeof($cid);
        
        while($i<$n){
            $query = "UPDATE customer SET cname = '$cname[$i]' WHERE cid = $cid[$i] ";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Customers/error.php?mes=".$mes);
                exit();

            }
            $i = $i + 1;
        }

        $i = 0;
        while($i<$n){
            $query = "UPDATE customer SET phno = $cphno[$i] WHERE cid = $cid[$i] ";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Customers/error.php?mes=".$mes);
                exit();

            }
            $i = $i + 1;
        }

        $i = 0;
        while($i<$n){
            $query = "UPDATE customer SET aadhar = $aadhar[$i] WHERE cid = $cid[$i] ";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Customers/error.php?mes=".$mes);
                exit();

            }
        
            $i = $i + 1;
        }

    
    header("Location: http://localhost/chariot.com/Customers/Success.php");

    }
?>
</body>
</html>
