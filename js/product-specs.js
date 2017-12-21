var $ = jQuery;
$(document).ready(function(){
    getProductSpecs();
})

function getProductSpecs(){
    var specsData,
        smKey;
    
    $.ajax({
        url: '../../wp-content/themes/milestar-tires/product-specs.php',//'../../../wp-content/themes/milestar-tires/product-specs.php',
        method: 'GET',
        data:{
            productName: productName
        },
        success: function(response){
            specsData = JSON.parse(response).success.sizes; 
            smKey = JSON.parse(response).success.specifiedMetricKey;
            createSpecsDataRows(specsData,smKey);    
        },
        error : function(){
            console.log('error');
        }
    })
}

function createSpecsDataRows(specsData,smKey){
    
    var data = specsData,
        smKey = smKey,
        itemsPerSize,
        diameterTD,
        tableRow,
        diameterCount = 0,
        tableRowCount = 0; 
    
    var sizeSortOrder = sortDiametersInOrder(data,smKey);
    
    sizeSortOrder.forEach(function(size, index, array){
        //sizeSortOrder == arrayOfWheelDiameters
        var colorClass,
            diameterRow,
            indexToInsert,
            sortedArray = new Array(),
            sortedObj = new Object,
            unsortedArray = data[size];
        
        itemsPerSize = data[size].length;
        diameterTD = createRimDiameterCol(itemsPerSize,size);
        !(diameterCount % 2)? diameterTD.addClass('bg-grey'): diameterTD.addClass('bg-white');
        diameterCount++;
        diameterRow = createTableRow();
        diameterRow.append(diameterTD).css({"height": (27*itemsPerSize)+"px"});
        $('.wheel-diameter > .tire-spec-table').append(diameterRow);
        
                
        //data[size] == array of objects. Each array is a group of rim diameter
        //need to create a new array of objects(sorted)
        
        
        for(product in unsortedArray){
            indexToInsert = 0;    
            if(!(unsortedArray[product]['Sizing Method'] in sortedObj)){
                sortedObj[unsortedArray[product]['Sizing Method']] = [unsortedArray[product]];
            }else{
                
                //unsortedArray[product] == an object to add
                //sortedObj[unsortedArray[product]['Sizing Method']] == an array to add object
                var tempToBeSortedObj = unsortedArray[product]['Sizing Method'],
                    tempArr = sortedObj[tempToBeSortedObj],
                    unsorteTempObj = unsortedArray[product];
                
                
                
                for(var i = 0; i < tempArr.length; i++){
                    if (tempToBeSortedObj == "M" || tempToBeSortedObj == "CM") {                        
                        if (Number(tempArr[i]['Section Width (tires)']) < Number(unsorteTempObj['Section Width (tires)'])) {
                            indexToInsert++;
                        } else if (Number(tempArr[i]['Section Width (tires)']) == Number(unsorteTempObj['Section Width (tires)'])) {
                            if (Number(tempArr[i]['Series (Tires)']) < Number(unsorteTempObj['Series (Tires)'])) {
                                indexToInsert++;
                            }
                        }
                    }else if(tempToBeSortedObj == "SMF" || tempToBeSortedObj == "SM"){
                        var unsortedSpecKeyOrder,
                            sortedSpecKeyOrder;
                            
                        for(each in smKey){
                            if(tempArr[i]['Web Display Size'].indexOf(smKey[each].Keys) == 0){
                                sortedSpecKeyOrder = smKey[each].Order;
                            }
                            if(unsorteTempObj['Web Display Size'].indexOf(smKey[each].Keys) == 0){
                                unsortedSpecKeyOrder = smKey[each].Order;
                            }
                        }
                        
                        if (Number(sortedSpecKeyOrder) < Number(unsortedSpecKeyOrder)) {
                            indexToInsert++;
                        } else if (Number(sortedSpecKeyOrder) == Number(unsortedSpecKeyOrder)) {
                            if (Number(tempArr[i]['Section Width (tires)']) < Number(unsorteTempObj['Section Width (tires)'])) {
                                indexToInsert++;
                            } else if (Number(tempArr[i]['Section Width (tires)']) == Number(unsorteTempObj['Section Width (tires)'])) {
                                if (Number(tempArr[i]['Series (Tires)']) < Number(unsorteTempObj['Series (Tires)'])) {
                                    indexToInsert++;
                                }
                            }
                        }

                    }else if(tempToBeSortedObj == "F"){
                        if(Math.round(Number(tempArr[i]['PNL Overall Diameter (tires)'])) < Math.round(Number(unsorteTempObj['PNL Overall Diameter (tires)']))){
                            indexToInsert++;
                        }else if(Math.round(Number(tempArr[i]['PNL Overall Diameter (tires)'])) == Math.round(Number(unsorteTempObj['Section Width (tires)']))){
                            if (Number(tempArr[i]['Section Width (tires)']) < Number(unsorteTempObj['Section Width (tires)'])){
                                indexToInsert++;
                            }
                        }
                    }else if(tempToBeSortedObj == "N"){
                        if(Number(tempArr[i]['Section Width (tires)']) < Number(unsorteTempObj['Section Width (tires)'])){
                            indexToInsert++;
                        }
                    }
                }
                tempArr.splice(indexToInsert,0,unsorteTempObj);
            }
            
        }
        
        if("F" in sortedObj){
            sortedObj["F"].forEach(function(val,index,array){
                sortedArray.push(val);
            })
        }
        if("M" in sortedObj){
            sortedObj["M"].forEach(function(val,index,array){
                sortedArray.push(val);
            })
        }
        if("CM" in sortedObj){
            sortedObj["CM"].forEach(function(val,index,array){
                sortedArray.push(val);
            })
        }
        if("SM" in sortedObj){
            sortedObj["SM"].forEach(function(val,index,array){
                sortedArray.push(val);
            })
        }
        if("SMF" in sortedObj){
            sortedObj["SMF"].forEach(function(val,index,array){
                sortedArray.push(val);
            })
        }
        if("N" in sortedObj){
            sortedObj["N"].forEach(function(val,index,array){
                sortedArray.push(val);
            })
        }
        
        for(product in sortedArray){            
            
            tableRow = createTableRow();
         
            if(itemsPerSize-1 == Number(product) && index != array.length-1){
                tableRow.addClass('grey-border-bottom');
            }
            
            colorClass = !(tableRowCount % 2)? 'bg-white':'bg-grey';
            
            createTableDatas(tableRow,sortedArray[product],colorClass);
            $('.full-specs > .tire-spec-table').append(tableRow);

            tableRowCount++;
        }
    })
}

function sortDiametersInOrder(dataObj,smKey){
    var sizesInOrder= [];
    for(key in dataObj){
        sizesInOrder.push(key);
    }
    
    sizesInOrder.sort(function(a, b){return a-b});
    return sizesInOrder;
    
}

function createTableDatas(tr,product,color){
    var tdArray = [],
        tableRow = tr;
    
    var size = $('<td>').addClass('table-body-col '+color).text(product["Web Display Size"]),
        itemNum = $('<td>').addClass('table-body-col '+color).text(product["Display Name"]),
        serviceIndex = $('<td>').addClass('table-body-col '+color).text(product["Web Display 1"]),
        sideWall = $('<td>').addClass('table-body-col '+color).text(product["PNL Sidewall (tires)"]),
        lrPr = $('<td>').addClass('table-body-col '+color).text(product["Web Display 2"]),
        treadDepth = $('<td>').addClass('table-body-col '+color).text(product["PNL Tread Depth (32nds) (tires)"]+'/32"'),
        rimWdith = $('<td>').addClass('table-body-col '+color).text(product["PNL Rim Width (inches) (tires)"]),
        secWidth = $('<td>').addClass('table-body-col '+color).text(product["PNL Measured Section Width (inch) (tire)"]),
        overallDiameter = $('<td>').addClass('table-body-col '+color).text(product["PNL Overall Diameter (tires)"]),
        maxLoad = $('<td>').addClass('table-body-col '+color).text(product["Max Load single (lbs@psi) (tires)"]),
        weight = $('<td>').addClass('table-body-col '+color).text(product["Weight"]),
        utqg = $('<td>').addClass('table-body-col '+color).text(product["PNL UTQG (Tires)"]);
    
    tdArray.push(size,itemNum,serviceIndex,sideWall,lrPr,treadDepth,rimWdith,secWidth,overallDiameter,maxLoad,weight,utqg);
    tdArray.forEach(function(tableData){
        tr.append(tableData);
    })
}
function createRimDiameterCol(rowSpan,size){
    var diameterCol = $('<td>').addClass('table-body-col tire-size').text(Number(size)+'"');
    return diameterCol;
}
function createTableRow(){
    var tableBodyRow = $('<tr>').addClass("table-body-row");
    return tableBodyRow;
}

