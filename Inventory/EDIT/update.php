<?php
    session_start();
    ob_start();
        if ($_POST["proper7"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
      $pid = $_POST["pid"];

    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
        
    }
    $count = 0;
    $gold = "SELECT * FROM Gold where pid = $pid";
     $result = mysqli_query($conn,$gold);
        if(!$result){
          $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
        }
     $row = mysqli_fetch_row($result);
        if($row){
        $count = $count + 1;
           $gwt =  $_POST["gwt"];
           $gpurity = $_POST["gpurity"];
           $c1 = $_POST["c1"];
           $c2 = $_POST["c2"];
           $c3 = $_POST["c3"];
           
           $query = "Update Gold set wt = $gwt where pid = $pid";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
           
            $query = "UPDATE Gold SET purity = $gpurity where pid = $pid";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
           
             $query = "UPDATE Gold SET yellow = '$c1' where pid = $pid";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
           
            $query = "UPDATE Gold SET white = '$c2' where pid = $pid";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
           
            $query = "UPDATE Gold SET rose = '$c3' where pid = $pid";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
    }
    
    $silver = "SELECT * FROM Metal where name='silver' and pid = $pid";
       $result = mysqli_query($conn,$silver);
        if(!$result){
          $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
        }
     $row = mysqli_fetch_row($result);
        if($row){
        $count = $count + 1;
            $silverp = $_POST["silverp"];
            $silverw = $_POST["silverw"];
            
             $query = "UPDATE Metal SET purity = $silverp where pid = $pid and name='silver'";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
            
             $query = "UPDATE Metal SET wt = $silverw where pid = $pid and name='silver'";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
        }
        
          $platinum = "SELECT * FROM Metal where name='platinum' and pid = $pid";
       $result = mysqli_query($conn,$platinum);
        if(!$result){
          $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
        }
     $row = mysqli_fetch_row($result);
        if($row){
        $count = $count + 1;
            $platp = $_POST["platp"];
            $platw = $_POST["platw"];
            
             $query = "UPDATE Metal SET purity = $platp where pid = $pid and name='platinum'";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
            
             $query = "UPDATE Metal SET wt = $platw where pid = $pid and name='platinum'";
           if(!mysqli_query($conn,$query)){
            $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
           }
        }
        
         $stone = "SELECT * FROM Stone where pid = $pid";
        $result = mysqli_query($conn,$platinum);
        if(!$result){
          $mes = mysqli_error($conn);
          header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
          exit();
        }
        
         $row = mysqli_fetch_row($result);
         
         if($row){
            $sid = $_POST["stone"];
            $sname = $_POST["sname"];
            $cut = $_POST["cut"];
            $clarity = $_POST["clarity"];
            $colour = $_POST["colour"];
            $weight = $_POST["weight"];
            $value = $_POST["value"];
            $num = $_POST["num"];
            
           
            
            $n = sizeof($sname);
            $i = 0;
            while($i<$n){
                
                $query = "UPDATE Stone set name = '$sname[$i]' where sid = $sid[$i]";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
                
                $query = "UPDATE Stone set cut = '$cut[$i]' where sid = $sid[$i]";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
                
                $query = "UPDATE Stone set clarity = '$clarity[$i]' where sid = $sid[$i]";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
                
                $query = "UPDATE Stone set colour = '$colour[$i]' where sid = $sid[$i]";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
                
                $query = "UPDATE Stone set wt = $weight[$i] where sid = $sid[$i]";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
                
                $query = "UPDATE Stone set value = $value[$i] where sid = $sid[$i]";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
                
                $query = "UPDATE Stone set no = $num[$i] where sid = $sid[$i]";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
                
                
                $i = $i + 1;
            }
         }
         
         if($count>1){
            $metal = $_POST["metal"];
            if($metal == "gold"){
                $query = "DELETE FROM Gold where pid = $pid";
                 if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
            }
            else if($metal == "silver"){
                    $query = "DELETE FROM Metal where pid = $pid and name='silver'";
                    if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
            }
            else if($metal == "platinum"){
                 $query = "DELETE FROM Metal where pid = $pid and name='platinum'";
                   if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
                }
            }
         
         }
         
          $sid = $_POST["sel"];
          $i = 0;
          $n = sizeof($sid);
          
          while($i<$n){
          $query = "DELETE FROM Stone where sid = $sid[$i]";
          if(!mysqli_query($conn,$query)){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                    exit();
            }
            $i = $i + 1;
          }
          
          header("Location: http://localhost/chariot.com/Inventory/EDIT/Success.php");
          exit();
          
?>
        
         

