 <?php 
require_once "conn.php";
if(!empty($_GET['quarriedSize'])){
    $requestedSize = $_GET['quarriedSize'];
    requestProducts($requestedSize);
}


function requestProducts($size){
    global $conn;
    $cleanSize = $size;
    $query = "SELECT `Web Display Name`, `Product Description 1`, `Product Description 2`, `Web Display Size` FROM `product_list` WHERE `Clean Size` = '".$cleanSize."' OR `Clean Size 2` = '".$cleanSize."'"; 
    $results = mysqli_query($conn,$query);
    
    $sizes = array();
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            if(!in_array($row["Web Display Name"],$sizes)){
                $sizes[$row["Web Display Name"]]["Product Description 1"] = $row["Product Description 1"];
                if(!empty($row["Product Description 2"])){
                    $sizes[$row["Web Display Name"]]["Product Description 2"] = $row["Product Description 2"];
                }                
                $sizes[$row["Web Display Name"]]["Web Display Size"] = $row["Web Display Size"];                
//                array_push($sizes,$row["Web Display Name"]);
            }
        }
        $output['success'] = $sizes;    
    }
    else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}

?>