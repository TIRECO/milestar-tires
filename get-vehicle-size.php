 <?php 
require_once "conn.php";
if(!empty($_GET['requstedFn'])){
    switch ($_GET['requstedFn']) {
        case 'year':
            requestYear();
            break;
        case 'make':
            $requiredYear = $_GET['requiredYear'];
            requestMake($requiredYear);
            break;
        case 'model':
            $requiredYear = $_GET['requiredYear'];
            $requiredMake = $_GET['requiredMake'];
            requestModel($requiredYear,$requiredMake);
            break;
        case 'trim':
            $requiredYear = $_GET['requiredYear'];
            $requiredMake = $_GET['requiredMake'];
            $requiredModel = $_GET['requiredModel'];
            requestTrim($requiredYear,$requiredMake,$requiredModel);
            break;
        case 'width':
            requestWidth();
            break;
        case 'ratio':
            ///
            ///
            //$requiredWidth = $_GET['requiredWidth'];
            //requestRatio($requiredWidth);
            break;
        case 'rim':
            ///
            ///
            //$requiredWidth = $_GET['requiredWidth'];
            //$requiredRatio = $_GET['requiredRatio'];
            //requestRim($requiredWidth,$requiredRatio);
            break;
        case 'sizingMethodKey':
            requestSizeNamingKeys();
            break;
        default:
            print 'request code not read';
    }
}



function requestCorrectSizes($requiredParamYear, $requiredParamMake, $requiredParamModel, $requiredParamTrim){
    global $conn;
    $modelYear = $requiredParamYear;
    $modelMake = $requiredParamMake;
    $modelModel = $requiredParamModel;
    $modelTrim = $requiredParamTrim;
    $query = 'SELECT Width, Ratio, Rim , STDOROPT, FRB FROM vehicle_search WHERE Year = '.$modelYear.' AND Make = "'.$modelMake.'" AND Model = "'.$modelModel.'" AND Trim = "'.$modelTrim.'"';
    $results = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($results) > 0){
         while($row = mysqli_fetch_assoc($results)){
            
            $key = $row['FRB'];
            $rim =  $row['Rim']+0;

            $output[$modelTrim][$key][$row['Width'].$row['Ratio'].$rim] = array('size'=>$row['Width'].$row['Ratio'].$rim,'Width'=>$row['Width'], 
                      'Ratio'=>$row['Ratio'], 'Rim'=>$rim, 'FRB'=>$row['FRB']);
        }    
    }
    else{
        $output['error'][] = 'data base is empty';
    }
    return $output;
    mysqli_close($conn);
}


function requestTrim($requiredParamYear, $requiredParamMake, $requiredParamModel){
    global $conn;
    $modelYear = $requiredParamYear;
    $modelMake = $requiredParamMake;
    $modelModel = $requiredParamModel;
    $query = 'SELECT Trim FROM vehicle_search WHERE Year = '.$modelYear.' AND Make = "'.$modelMake.'" AND Model = "'.$modelModel.'"';
    $results = mysqli_query($conn,$query);

    $returnOutput = [];
    $trims = array();
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            if(!in_array($row['Trim'],$trims)){
                array_push($trims,$row['Trim']);
            }
        }
        foreach($trims as $trimName){
            $sizesByTrim = requestCorrectSizes($modelYear,$modelMake,$modelModel,$trimName);    
            foreach($sizesByTrim as $key => $trim){
                $returnOutput[$key] = $trim;
            }            
        }      
        $output['success'] = $returnOutput;
    }
    else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}

function requestModel($requiredParamYear, $requiredParamMake){
    global $conn;
    $modelYear = $requiredParamYear;
    $modelMake = $requiredParamMake;
    $query = 'SELECT Model FROM vehicle_search WHERE Year = '.$modelYear.' AND Make = "'.$modelMake.'"';
    $results = mysqli_query($conn,$query);
    $models = array();
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            if(!in_array($row['Model'],$models)){
                array_push($models,$row['Model']);
            }
        }
        $output['success'] = $models;    
    }
    else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}


function requestMake($requiredParamYear){
    global $conn;
    $modelYear = $requiredParamYear;
    $query = 'SELECT Make FROM vehicle_search WHERE Year = '.$modelYear;
    $results = mysqli_query($conn,$query);
    $makes = array();
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            if(!in_array($row['Make'],$makes)){
                array_push($makes,$row['Make']);
            }
        }
        $output['success'] = $makes;    
    }
    else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}

function requestYear(){
    global $conn;
    $query = "SELECT Year FROM vehicle_search";
    $results = mysqli_query($conn,$query);
    $year = array();
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            if(!in_array($row['Year'],$year)){
                array_push($year,$row['Year']);
            }
        }
        $output['success'] = $year;    
    }else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
function requestWidth(){
    global $conn;
//    $query = "SELECT Width FROM vehicle_search";
    $query = "SELECT `Web Display Size`,`Sizing Method` FROM product_list";
    $results = mysqli_query($conn,$query);
    $size = array();
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            if(!array_key_exists($row['Sizing Method'],$size)){
                $size[$row['Sizing Method']][] = $row['Web Display Size'];    
            }else{
                if(!in_array($row['Web Display Size'],$size[$row['Sizing Method']])){
                    $size[$row['Sizing Method']][] = $row['Web Display Size'];
                }
            }
        }    
        $output['success'] = $size;    
    }else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}

//function requestRatio($requiredParamWidth){
//    global $conn;
//    $modelWidth = $requiredParamWidth;
//    $query = 'SELECT Ratio FROM vehicle_search WHERE Width = '.$modelWidth;
//    $results = mysqli_query($conn,$query);
//    $ratio = array();
//    if(mysqli_num_rows($results) > 0){
//        while($row = mysqli_fetch_assoc($results)){
//            if(!in_array($row['Ratio'],$ratio)){
//                array_push($ratio,$row['Ratio']);
//            }
//        }
//        $output['success'] = $ratio;    
//    }
//    else{
//        $output['error'][] = 'data base is empty';
//    }
//    print_r(json_encode($output));
//    mysqli_close($conn);
//}
//
//function requestRim($requiredParamWidth, $requiredParamRatio){
//    global $conn;
//    $modelWidth = $requiredParamWidth;
//    $modelRatio = $requiredParamRatio;
//    $query = 'SELECT Rim FROM vehicle_search WHERE Width = '.$modelWidth.' AND Ratio = "'.$modelRatio.'"';
//    $results = mysqli_query($conn,$query);
//    $rim = array();
//    if(mysqli_num_rows($results) > 0){
//        while($row = mysqli_fetch_assoc($results)){
//            $rimsize = $row['Rim'] + 0;
//            if(!in_array($rimsize,$rim)){
//                array_push($rim,$rimsize);
//            }
//        }
//        $output['success'] = $rim;    
//    }
//    else{
//        $output['error'][] = 'data base is empty';
//    }
//    print_r(json_encode($output));
//    mysqli_close($conn);
//}

function requestSizeNamingKeys(){
    global $conn;
    $query = 'SELECT `Sizing Method`, `Keys` FROM sizing_method_key';
    $results = mysqli_query($conn,$query);
    $sizingTypes = array();
    if(mysqli_num_rows($results) > 0){        
        while($row = mysqli_fetch_assoc($results)){
            if(!array_key_exists($row['Sizing Method'],$sizingTypes)){
                $sizingTypes[$row['Sizing Method']][] = $row['Keys']; 
            }else{
                if(!in_array($row['Keys'],$sizingTypes[$row['Sizing Method']])){
                    $sizingTypes[$row['Sizing Method']][] = $row['Keys'];
                } 
            }
        }
        $output['success'] = $sizingTypes; 
    }else{
        $output['error'][] = 'data base is empty';
    }
    print_r(json_encode($output));
    mysqli_close($conn);
}

?>