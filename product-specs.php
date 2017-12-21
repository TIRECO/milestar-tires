<?php 
require_once "conn.php";
if(!empty($_GET['productName'])){
    $requestedProduct = $_GET['productName'];
    requestProductSpecs($requestedProduct);
}


function requestProductSpecs($name){
    global $conn;

    $productName = $name;

    $query = "SELECT `Display Name`, `Web Display Size`, `Web Display 1`, `Web Display 2`, `Max Load single (lbs@psi) (tires)`, `PNL Sidewall (tires)`, `PNL Tread Depth (32nds) (tires)`, `PNL Rim Width (inches) (tires)`, `PNL Measured Section Width (inch) (tire)`, `PNL Overall Diameter (tires)`, `PNL UTQG (Tires)`, `Weight`, `PNL Rim Diameter (tires)`, `Sizing Method`, `Series (Tires)`, `Section Width (tires)`  FROM `product_list` WHERE `Web Display Name` = '".$productName."'"; 

    $query2 = "SELECT `Keys`, `Order` FROM `sizing_method_key` WHERE `Sizing Method` = 'SM'";
    $results = mysqli_query($conn,$query);
    $results2 = mysqli_query($conn,$query2);
    
    $specs = array();
    $specs2 = array();
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            $specs[$row['PNL Rim Diameter (tires)']][] = $row;
        }
        while($row2 = mysqli_fetch_assoc($results2)){
            $specs2[$row2['Keys']] = $row2;
        }
        
        $output['success']['sizes'] = $specs;    
        $output['success']['specifiedMetricKey'] = $specs2;
    }
    else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}

?>