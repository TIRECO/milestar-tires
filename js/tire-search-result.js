var $ = jQuery;
$(document).ready(function(){
    retrieveProduct();
})
function displayResultSummary(productCount){
    $('.search-result-quantity').text(productCount);
    $('.search-result-tire-size').text(" "+genericSize);
}
function displayResultRows(productList){
    var foundProducts = productList,
        descriptionListArray;
    
    for(product in foundProducts){
        descriptionListArray = [];
        for(line in foundProducts[product]){
            descriptionListArray.push(foundProducts[product][line]);
        }
        createResultRow(product,descriptionListArray);
    }
}
function createResultRow(productName, tireDescription){
    var properProductName = productName.toUpperCase(),
        imgName = properProductName.replace(/ /g,"").replace(/\//g,"").replace(/-/g,""),
        linkURL = properProductName.replace(/ /g,"-").replace(/\//g,"");
    
    var item = $("<div>").addClass("search-result-item content-centered-wrapper"),
        detailWrapper = $('<div>').addClass("search-result-detail-wrapper content-centered-wrapper"),
        detail = $('<div>').addClass("search-result-detail content-centered-wrapper img-container"),
        tireImg = $('<img>').attr('src','../img/tire-search-result/milestar_'+imgName+'_tn-2.png'),////////////////////////////////////////////////
        
        detail2 = $('<div>').addClass("search-result-detail content-centered-wrapper text"),
        tireDesc = $('<div>').addClass("tire-desc"),
        tireNameContainer = $('<div>').addClass("tire-name"),
        tirename = $('<h1>').text(properProductName);
    
    var ul = createResultHighlights(tireDescription),
        button = createViewDetailLink(linkURL);
    
    var item = item.append(
                    detailWrapper.append(
                        detail.append(tireImg),
                        detail2.append(tireDesc.append(tireNameContainer.append(tirename),ul),button)));
    $('.search-result-items-container').append(item);
}

function createResultHighlights(tireDescriptions){
    var descriptionList = tireDescriptions, //array of descriptions
        tireHighlights = $('<div>').addClass("tire-highlights"),
        highlightList = $('<ul>').addClass("highlight-list"),    
        highLight;
    
    descriptionList.forEach(function(description){
        highLight = $('<li>').addClass("hightlight").text(description);
        highlightList.append(highLight);
    });
    
    return tireHighlights.append(highlightList);
}

function createViewDetailLink(tireName){
    var productLink = tireName,
        viewTireDetail = $('<div>').addClass("view-tire-detail"),
        linkTag = $('<a>').attr("href",productLink),
        viewTireDetailBtn = $('<div>').addClass("view-tire-detail-btn content-centered-wrapper"),
        tireDetailText = $('<p>').text('VIEW TIRE DETAILS'),
        linkButton = viewTireDetail.append(linkTag.append(viewTireDetailBtn.append(tireDetailText)));
    
    return linkButton;
}

function retrieveProduct(){
    var products,
        count = 0;
    $.ajax({
        url: '../wp-content/themes/milestar-tires/retrieve-product.php',
        method: 'GET',
        data:{
            quarriedSize: quarriedSize
        },
        success: function(response){
            if(JSON.parse(response).error){
               displayResultSummary(0); 
            }else{
                products = JSON.parse(response).success;    
                displayResultRows(products);
                for(each in products){
                    count++;
                }
                displayResultSummary(count);
            }
        },
        error : function(){
            console.log('error');
        }
    })
}

                
                    
                

