<?php
    session_start();
    ob_start();
        if ($_POST["proper3"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
    
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
    
    $stone = $_POST["stone"];
    $stonename = $_POST["stonename"];
    $cut = $_POST["cut"];
    $colour =$_POST["colour"];
    $clarity = $_POST["clarity"];
    $wt = $_POST["wt"];
    $num = $_POST["num"];
    
    if( $stonename==NULL){
         $stonename = "%";
    }
    if($cut==NULL){
        $cut = "%";
    }
      if($colour==NULL){
        $colour = "%";
    }
      if($clarity==NULL){
        $clarity = "%";
    }
    if($wt==NULL){
        $wt = "%";
    }
    if($num==NULL){
        $num = "%";
    }
    
     $q3 = "DROP TABLE six";
        $r2 = mysqli_query($conn, $q3);
    
    
    $q2 = "SELECT prod from five";
        $q3 = "CREATE TABLE six AS $q2";
        $r2 = mysqli_query($conn, $q3);
    
        if(!$r2){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    
    
    $q0 = "SELECT distinct(six.prod) prod from six inner join Stone on Stone.pid = six.prod where name like '%$stonename%' and cut like '%$cut%' and clarity like '%$clarity%' and colour like '%$colour%' and wt like '$wt' and no like '$num'";
    
    $q3 = "DROP TABLE temp";
        $r2 = mysqli_query($conn, $q3);
    
    $q1 = "CREATE OR REPLACE VIEW temp AS $q0";
    $r1 = mysqli_query($conn, $q1);
    
    if(!$r1){
        $mes =  mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
    
      
      $q3 = "DROP TABLE five";
        $r2 = mysqli_query($conn, $q3);
    
        $q2 = "SELECT * from temp";
        $q3 = "CREATE TABLE five AS $q2";
        $r2 = mysqli_query($conn, $q3);
    
        if(!$r2){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
?>

<html>
<body>
    <form id="one"action="http://localhost/chariot.com/Inventory/EDIT/stonespecs.php" method="POST" >
        <input type="hidden" name="proper2" value="yes" />
    </form>
     <form id="two"action="http://localhost/chariot.com/Inventory/EDIT/prodview.php" method="POST" >
        <input type="hidden" name="proper4" value="yes" />
    </form>
<?php
    if($stone=="no"){
        echo '<script>document.getElementById("two").submit()</script>';
    }
    else{
       echo '<script>document.getElementById("one").submit()</script>';
    }

?>
</body>
</html>

