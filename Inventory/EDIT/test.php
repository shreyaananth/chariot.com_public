<?php
    session_start();
    ob_start();
        if ($_POST["proper1"]!="yes"){
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
    
    $pname = $_POST["pname"];
    $type = $_POST["type"];
    $mc =$_POST["mc"];
    $wastage = $_POST["wastage"];
    $oos = $_POST["oos"];
    $discon = $_POST["discon"];
    
    if($pname==NULL){
        $pname = "%";
    }
    if($type==NULL){
        $type = "%";
    }
      if($mc==NULL){
        $mc = "%";
    }
      if($wastage==NULL){
        $wastage = "%";
    }
    
    $q0 = "SELECT * from Inventory where pname like '%$pname%' and type like '$type' and mc like '$mc' and wastage like '$wastage'";
   
    
    if($discon=="Yes"){
        $q0 = "SELECT * from Inventory where pname like '%$pname%' and type like '$type' and mc like '$mc' and wastage like '$wastage' and qty<=-1";
    }
    else if($discon == "No"){
        if($oos=="Yes"){
        $q0 = "SELECT * from Inventory where pname like '%$pname%' and type like '$type' and mc like '$mc' and wastage like '$wastage' and qty=0";
        }
        else if($oos=="No"){
        $q0 = "SELECT * from Inventory where pname like '%$pname%' and type like '$type' and mc like '$mc' and wastage like '$wastage' and qty>0";
        }
        else{
        $q0 = "SELECT * from Inventory where pname like '%$pname%' and type like '$type' and mc like '$mc' and wastage like '$wastage' and qty>=0";
        }
    }
    else{
        if($oos=="Yes"){
        $q0 = "SELECT * from Inventory where pname like '%$pname%' and type like '$type' and mc like '$mc' and wastage like '$wastage' and qty=0";
        }
        else if($oos =="No"){
        $q0 = "SELECT * from Inventory where pname like '%$pname%' and type like '$type' and mc like '$mc' and wastage like '$wastage' and qty>0";
        }
    }
    
    $q1 = "CREATE OR REPLACE VIEW one AS $q0";
    $r1 = mysqli_query($conn, $q1);
    
    if(!$r1){
        $mes =  mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
    
    
    $gold = $_POST["gold"];
    if($gold == "Yes"){
            $gpurity = $_POST["gpurity"];
            $gwt = $_POST["gwt"];
            $c1 = $_POST["c1"];
            $c2 = $_POST["c2"];
            $c3 = $_POST["c3"];
    
    if($gpurity==NULL){
        $gpurity = "%";
    }
    if($gwt==NULL){
        $gwt = "%";
    }
      if($c1==NULL){
        $c1 = "%";
    }
      if($c2==NULL){
        $c2 = "%";
    }
    if($c3==NULL){
        $c3 = "%";
    }
            
        $q2 = "SELECT Gold.pid prod from Gold inner join one on Gold.pid = one.pid where purity like '$gpurity' and wt like '$gwt' and yellow like '$c1' and white like '$c2' and rose like '$c3'";
        $q3 = "CREATE OR REPLACE VIEW two AS $q2";
        $r2 = mysqli_query($conn, $q3);
    
        if(!$r2){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    else if($gold == "No"){
        $q4 = "SELECT pid from Gold";
        $q5 = "SELECT pid prod from one where pid NOT IN ($q4)";
        $q6 = "CREATE OR REPLACE VIEW two AS $q5";
        $r3 = mysqli_query($conn, $q6);
    
        if(!$r3){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    else{
        $q7 = "SELECT pid prod from one";
        $q8 = "CREATE OR REPLACE VIEW two AS $q7";
        $r4 = mysqli_query($conn, $q8);
    
        if(!$r4){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    
        
    
    
    $silver = $_POST["silver"];
    if($silver == "Yes"){
    
               $silverp = $_POST["silverp"];
               $silw = $_POST["silw"];
            
            if($silverp==NULL){
        $silverp = "%";
    }
    if($silw==NULL){
        $silw = "%";
    }
                
        $q9 = "SELECT Metal.pid prod from Metal inner join two on Metal.pid = two.prod where name='silver' and purity like '$silverp' and wt like '$silw'";
        $q10 = "CREATE OR REPLACE VIEW three AS $q9";
        $r5 = mysqli_query($conn, $q10);
    
        if(!$r5){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    else if($silver=="No"){
        $q11 = "SELECT pid from Metal where name='silver'";
        $q12 = "SELECT prod from two where prod NOT IN ($q11)";
        $q13 = "CREATE OR REPLACE VIEW three AS $q12";
        $r6 = mysqli_query($conn, $q13);
    
        if(!$r6){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    else{
        $q14 = "SELECT * from two";
        $q15 = "CREATE OR REPLACE VIEW three AS $q14";
        $r7 = mysqli_query($conn, $q15);
    
        if(!$r7){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    
     $platinum = $_POST["platinum"];
    
    if($platinum == "Yes"){
    
                  $platp = $_POST["platp"];
                  $platw = $_POST["platw"];
            
            if($platp==NULL){
                $platp = "%";
            }
            if($platw==NULL){
                $platw = "%";
            }
                
        $q16 = "SELECT Metal.pid prod from Metal inner join three on Metal.pid = three.prod where name = 'platinum' and purity like '$platp' and wt like '$platw'";
        $q17 = "CREATE OR REPLACE VIEW four AS $q16";
        $r8 = mysqli_query($conn, $q17);
    
        if(!$r8){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    else if($platinum=="No"){
        $q18 = "SELECT pid from Metal where name='platinum'";
        $q19 = "SELECT prod from three where prod NOT IN ($q18)";
        $q20 = "CREATE OR REPLACE VIEW four AS $q19";
        $r9 = mysqli_query($conn, $q20);
    
        if(!$r9){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    else{
        $q21 = "SELECT * from three";
        $q22 = "CREATE OR REPLACE VIEW four AS $q21";
        $r10 = mysqli_query($conn, $q22);
    
        if(!$r10){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    }
    
  $stone = $_POST["stone"];
  $s1 = $_POST["s1"];
  
        if($s1=="no"){
            $q25 = "SELECT distinct(pid) from Stone";
            $q26 = "SELECT prod from four where prod NOT IN($q25)";
            $q27 = "CREATE OR REPLACE VIEW four1 AS $q26";
        $r12 = mysqli_query($conn, $q27);
            if(!$r12){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
            }
        }
        
        else{
          $q21 = "SELECT * from four";
        $q22 = "CREATE OR REPLACE VIEW four1 AS $q21";
        $r10 = mysqli_query($conn, $q22);
    
        if(!$r10){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
        
        }
  
  
  $q3 = "DROP TABLE five";
        $r2 = mysqli_query($conn, $q3);
    
        
        $q23 = "SELECT prod from four1";
        $q24 = "CREATE TABLE five AS $q23";
        $r11 = mysqli_query($conn, $q24);
    
        if(!$r11){
            $mes =  mysqli_error($conn);
            header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
            exit();
        }
    
?>

<html>
<body>
    <form id="one"action="http://localhost/chariot.com/Inventory/EDIT/stonespecs.php" method="POST" ></form>
    <form id="two"action="http://localhost/chariot.com/Inventory/EDIT/prodview.php" method="POST" ></form>
        <input form = "one" type="hidden" name="proper2" value="yes" />
  
     
        <input form = "two" type="hidden" name="proper4" value="yes" />
    
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

