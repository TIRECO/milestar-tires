// Custom JS here
var $ = jQuery;

$(document).ready(
    function(){
        activateScroll();
        activateSearchBox();
        activateLineups();  
        activateChangeEvent();
        pullSliderActiveImages();
        addClickHandlerToMobileMenus();
    }
); 
        
function activateLineups(){
    $('.lineup-list-item').click(function(e){
        var optionIndex = $('.lineup-list-item').index(this);
        toggleActiveLineup(optionIndex,this);
    })
    $('.mega-menu-tires').hover(function(e){
        if(e.type == "mouseenter"){
            $(".mega-menu-tires>.sub-menu").addClass("smooth")
        }else{
            $(".mega-menu-tires>.sub-menu").removeClass("smooth")
        }
    })
}
function activateScroll(){
    $(document).scroll(function(){
        var scrollTop = $(this).scrollTop();
        shrinkExpandHeader(scrollTop);
    });
}
function activateSearchBox(){
    $(".vehicle-search").click(function(e){        
        var clickedBtnCls = e.currentTarget.className,
            activeBtnCls;
        $(this).addClass('active');
        $(this).siblings(".vehicle-search").removeClass('active');
        activeBtnCls = e.currentTarget.className;
        if(clickedBtnCls == activeBtnCls){   
            showHideSearchBoxes(activeBtnCls,false);      
            $(this).removeClass('active');
        }else{
            showHideSearchBoxes(activeBtnCls,true);       
        }
    });
}
//for mobile page
function activateChangeEvent(){
    $('#lineup-list-options').change(function(e){
        var optionIndex = Number(this.value);
        toggleActiveLineup(optionIndex);
        
    })
}

function toggleActiveLineup(selecOptionIndex,clickedMenu){
    var clickedPos = selecOptionIndex,
        segment = "segment-"+(selecOptionIndex+1),
        heroElement = $('.lineup-hero.'+segment)[0],
        carouselElement = $('.owl-carousel')[clickedPos];
    
    if(arguments[1]){
        $(".lineup-name-wrapper .lineup-list-item").removeClass('active');
        $(clickedMenu).addClass('active');  
        
    }
       
    $('.owl-carousel').addClass('hidden');
    $(carouselElement).removeClass('hidden');    
}


function pullSliderActiveImages(){
    var owl = $('.owl-carousel'),
        carouselInitiated = false,
        tempParentTag,
        tempSavedImgTag,
        tempSavedTextTag;
    
    owl.owlCarousel({
          loop: true,
          nav: true,
          center: true,
          navText: ["<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 48'><polyline class='grey-fill' points='0 0 24 24 0 48 '/></svg>","<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 48'><polyline class='grey-fill' points='0 0 24 24 0 48 '/></svg>"],
          responsive:{
              0:{
                  items : 1
              },
              750:{
                  items : 3
              }
          },
          onInitialized: getCenterContent
      });
    owl.on('change.owl.carousel', function(event) {
        var parentElement = event.currentTarget.className.replace(/ /g,"."),
            link,
            linkURL;
        
        setTimeout(function(){
            var selector = $("."+parentElement + " .owl-item.center").selector + " .product-name > p",
                centeredProductName = $(selector).text();
            showInnerHero(centeredProductName);
            $('.hello').remove();
            tempParentTag.append(tempSavedImgTag,tempSavedTextTag);
            
            linkURL = adjustProdcutNameToLink(centeredProductName);
            link = createLinkTag(linkURL);
            
            tempSavedImgTag = $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item.carousel-image');
            tempSavedTextTag = $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item.product-name');
            tempParentTag = $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item-container');
            
            //console.log($('.owl-carousel:not(.hidden) .owl-item.active.center p').text());
            $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item').wrapAll(link);
        },100)
    })
    
    function getCenterContent(){
        var link,
            linkURL,
            productName = $('.lineup-hero:not(.hidden) h1').text();
        
        if(carouselInitiated){
            return;
        }else{
        carouselInitiated = true;
        
        linkURL = adjustProdcutNameToLink(productName);
        link = createLinkTag(linkURL);
            
        tempSavedImgTag = $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item.carousel-image');
        tempSavedTextTag = $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item.product-name');
        tempParentTag = $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item-container');
            
        $('.owl-carousel:not(.hidden) .owl-item.active.center .carousel-item').wrapAll(link);
        }
    }
}
function adjustProdcutNameToLink(productName){
    var productName = productName;
    if(productName.indexOf(" ") == 0){
        productName = productName.substr(1);
    }
    productName = productName.replace(/\//g,"");
    productName = productName.replace(/ /g,"-");
    
    return productName;
    
}
function createLinkTag(url){
    var href = $('<a>').attr('href',url).addClass('center-image-wrapper');
    return href;
}

function showInnerHero(productName){
    var name = productName.substr(1).toUpperCase();
    
    $('.lineup-hero').addClass('hidden');
    $('.lineup-hero h1').each(function(index,element){
        if($(element).text() == name){
            var toBeShownElement = $(element).parents('.lineup-hero');
            $(toBeShownElement).removeClass('hidden');
        }
    });
}


function shrinkExpandHeader(scrollTop){
    if(window.innerWidth > 749){
        if(scrollTop > 0){
            $(".find-tire-options, .size-search-options, .home-page-body, .header, .mega-menu-tires>.sub-menu").addClass("shrunk");    
        }else{
            $(".find-tire-options, .size-search-options, .home-page-body, .header, .mega-menu-tires>.sub-menu").removeClass("shrunk"); 
        }    
    }
}


/*Mobile Menu*/
function addClickHandlerToMobileMenus(){
    var menuOpened = false;
    $('.navbar-menu').click(function(){
        if(menuOpened){
            toggleMobileMenu(menuOpened);
            //addSubMenuClickHandlers/ close submenus
            //removeSubMenuClickHandlers
            addRemoveSubMenuClickHandlers(menuOpened);
            menuOpened = false;
        }else{
            toggleMobileMenu(menuOpened);
            //toggle submenus
            addRemoveSubMenuClickHandlers(menuOpened);
            menuOpened = true;
        }
        
    })
}

function toggleMobileMenu(opened){
    if(opened){
        $('.mobile-menu').removeClass('shown');
        
    }else{
        $('.mobile-menu').addClass('shown');
    }
}

function addRemoveSubMenuClickHandlers(mainMenuOpened){    
    if(!mainMenuOpened){
        $(".expandableMenu").each(function(index){
            var submenu = new Submenu(index);            
            $(this).click(function(){
                submenu.toggle();
            })
        })
    }else{
        $("#primary-menu .expandableMenu").unbind('click');
    }
}


function Submenu(index){
    this.index = index;
    this.opened = false;
    this.toggle = function(){
        if(this.opened){
            $(".expandableMenu:eq("+this.index+") > .sub-menu").removeAttr("style");
            this.opened = false;
        }else{
            $(".expandableMenu:eq("+this.index+") > .sub-menu").css({"display":"block"});
            this.opened = true;
        }
    }
}


/*
    --- Vehicle Search ---
    @param
    1) String - clicked btn's class name 
    2) Boolean Val 
        - Show Search Box (True)
        - Hide Search Box (False)
    
    @)Action
    1) Shows and Hides Vehicle/Size Search window
        1-A) Applies focus handler on vehicle search options
    2) Removes all options lists
    3) Removes all focus listener on all vehicle Search
*/


var vehicleSearchFields = {},
    sizeSearchFields = {},
    selectOptionIds = ['vehicle-year','vehicle-make','vehicle-model','vehicle-trim','vehicle-find-tire-submit'],
    selectSizeOptionIds = ['size-width','size-ratio','size-rim','size-find-tire-submit'],
    searchURL = fileStructure+'wp-content/themes/milestar-tires/get-vehicle-size.php',
    availableModelSizes;

function showHideSearchBoxes(className,show){  
    removeOptionList();
    if(show){
        if(className.indexOf("vehicle active") != -1){
            $(".size-search-options").addClass("hidden");
            $(".find-tire-options").removeClass("hidden");
            searchableSizeList = new Array();
            removeFocusListener(selectOptionIds);
            applyFocusListener(selectOptionIds);
        }else{
            $(".find-tire-options").addClass("hidden");
            $(".size-search-options").removeClass("hidden");
            removeFocusListener(selectSizeOptionIds);
            applyFocusListener(selectSizeOptionIds);
        }    
    }else{
        if(className.indexOf("vehicle active") != -1){
            $(".find-tire-options").addClass("hidden");
        }else{
            $(".size-search-options").addClass("hidden");
            searchableSizeList = new Array();
        }
    }
}

function removeOptionList(){
    $(".search-select-options > ul").remove();
}

function removeFocusListener(idList){
    var optionIDs = idList;
    optionIDs.forEach(function(id){
        $('#'+id).unbind('click');
        $('.'+id+'-ul > li').unbind('click');
    })
    vehicleSearchFields = {};
    sizeSearchFields = {};
}

function applyFocusListener(OptionIds){
    var optionIDs = OptionIds,
        optionText;
    //applies click handlers to each button when 'vehicle' or 'size' button is clicked
    optionIDs.forEach(function(id){
        optionText = (id.substring(id.indexOf("-")+1)).toUpperCase();
        $('#'+id+" > .select-option-wrapper > p").text(optionText);
        $('#'+id).click(function(e){
            var selectID = e.currentTarget.id;
            delegateVehicleSearch(selectID);
        })
    })
}

function delegateVehicleSearch(id){
    switch(id){
        case 'vehicle-year':
            getYearFromVehicleDB();
            break;
        case 'vehicle-make':
            getMakeFromVehicleDB();
            break;
        case 'vehicle-model':
            getModelsFromVehicleDB();
            break;
        case 'vehicle-trim':
            getTrimsFromVehicleDB();
            break;
        case 'vehicle-find-tire-submit':
            getCorretSizesFromVehicleDB();
            break;
        case 'size-width':
            getWidthFromVehicleDB();
            break;
        case 'size-ratio':
            getRatioFromVehicleDB();
            break;
        case 'size-rim':
            getRimFromVehicleDB();
            break;
        case 'size-find-tire-submit':
            createSizeQueryObj();
            break;
        default:
            alert('error has been occured, please refresh your page');
    }
}






function applyOptionLister(optionID){
    $('.'+optionID+'-ul > li').click(function(target){
        if (optionID in vehicleSearchFields) {
            if (vehicleSearchFields[optionID] != null) {
                var resetIDList = clearPartialVehicleFields(optionID);
                applyFocusListener(resetIDList);
                $('.'+optionID+'-ul > li').removeClass('select');
            }
        }
        vehicleSearchFields[optionID] = target.currentTarget.innerText;
        $('#'+optionID+" > .select-option-wrapper > p").text(vehicleSearchFields[optionID]);
        $(this).addClass('select');
    });
}
function applySizeOptionLister(optionID){
    $('.'+optionID+'-ul > li').click(function(target){
        if (optionID in sizeSearchFields) {
            if (sizeSearchFields[optionID] != null) {
                var resetIDList = clearPartialSizeFields(optionID);
                applyFocusListener(resetIDList);
                $('.'+optionID+'-ul > li').removeClass('select');
            }
        }
        sizeSearchFields[optionID] = target.currentTarget.innerText;
        $('#'+optionID+" > .select-option-wrapper > p").text(sizeSearchFields[optionID]);
        $(this).addClass('select');
    });
}









function clearPartialVehicleFields(optionID){
    var fieldNames = selectOptionIds,
        fieldPosition = fieldNames.indexOf(optionID),
        returnableIDs = [];
    for(var i = fieldPosition + 1 ; i < fieldNames.length-1; i++){
        vehicleSearchFields[fieldNames[i]] = null;
        $('.'+fieldNames[i]+'-ul').remove();
        $('.'+fieldNames[i]+'-ul > li').unbind('click');
        $('#'+fieldNames[i]).unbind('click');
        
        returnableIDs.push(fieldNames[i]);
    }
    return returnableIDs;
}
function clearPartialSizeFields(optionID){
    var fieldNames = selectSizeOptionIds,
        fieldPosition = fieldNames.indexOf(optionID),
        returnableIDs = [];
    for(var i = fieldPosition + 1 ; i < fieldNames.length-1; i++){
        sizeSearchFields[fieldNames[i]] = null;
        $('.'+fieldNames[i]+'-ul').remove();
        $('.'+fieldNames[i]+'-ul > li').unbind('click');
        $('#'+fieldNames[i]).unbind('click');
        
        returnableIDs.push(fieldNames[i]);
    }
    return returnableIDs;
}







function showHideOptionUL(id){
    $('#'+id).click(function(e){
        var className = $('#'+id+' > ul').attr('class');
        if(className.indexOf('hidden') == -1){
            $('#'+id+' > ul').addClass('hidden');
        }else{
            $('#'+id+' > ul').removeClass('hidden');
        }
    })
}
function createOptionList(optionID,optionArray){
    var option,
        unorderedList = $('<ul>').addClass(optionID+"-ul");
    optionArray.forEach(function(value){
        option = $('<li>').addClass('optionList '+optionID).text(value);
        unorderedList.append(option);
    });
    $('#'+optionID).append(unorderedList);
}




function getYearFromVehicleDB(){
    var years,
        sortedYears,
        optionID = 'vehicle-year';
    //url needs to change based on what page it is
    $.ajax({
        url: searchURL,
        method: 'GET',
        data:{requstedFn : 'year'},
        success: function(response){
            $('#vehicle-year').unbind('click');
            showHideOptionUL(optionID);
            years = JSON.parse(response).success;
            sortedYears = years.sort(function(a,b){
                return a - b;
            }).reverse();
            createOptionList(optionID,years);
            applyOptionLister(optionID);
        },
        error : function(){
            console.log('error');
        }
    })
}
function getMakeFromVehicleDB(){
    var makes,
        sortedMakes,
        optionID = 'vehicle-make',
        year = 'vehicle-year' in vehicleSearchFields ? vehicleSearchFields['vehicle-year'] : null;
    if(!year){
        return;
    }
    $.ajax({
        url: searchURL,
        method: 'GET',
        data:{
            requstedFn : 'make',
            requiredYear : year
        },
        success: function(response){
            $('#vehicle-make').unbind('click');
            showHideOptionUL(optionID);
            makes = JSON.parse(response).success;
            sortedMakes = makes.sort();
            createOptionList(optionID,makes);
            applyOptionLister(optionID);
        },
        error : function(){
            console.log('error');
        }
    })
}

function getModelsFromVehicleDB(){
    var models,
        sortedModels,
        optionID = 'vehicle-model',
        year ='vehicle-year' in vehicleSearchFields ? vehicleSearchFields['vehicle-year'] : null,
        make ='vehicle-make' in vehicleSearchFields ? vehicleSearchFields['vehicle-make'] : null;
    if(!year || !make){
        return;
    }
    $.ajax({
        url: searchURL,
        method: 'GET',
        data:{
            requstedFn: 'model',
            requiredYear: year,
            requiredMake: make 
        },
        success: function(response){
            $('#vehicle-model').unbind('click');
            showHideOptionUL(optionID);
            models = JSON.parse(response).success;
            sortedModels = models.sort();
            createOptionList(optionID,models);
            applyOptionLister(optionID);
        },
        error : function(){
            console.log('error');
        }
    })
}

function getTrimsFromVehicleDB(year, make, model){
    var trims,
        sortedTrims,
        optionID = 'vehicle-trim',
        year ='vehicle-year' in vehicleSearchFields ? vehicleSearchFields['vehicle-year'] : null,
        make ='vehicle-make' in vehicleSearchFields ? vehicleSearchFields['vehicle-make'] : null,
        model='vehicle-model' in vehicleSearchFields ? vehicleSearchFields['vehicle-model'] : null;
    if(!year || !make || !model){
        return;
    }
    $.ajax({
        url: searchURL,
        method: 'GET',
        data:{
            requstedFn: 'trim',
            requiredYear: year,
            requiredMake: make,
            requiredModel: model
        },
        success: function(response){
            $('#vehicle-trim').unbind('click');
            showHideOptionUL(optionID);
            trims = JSON.parse(response).success;
            revisedTrimNames = parseTrimsBySizes(trims);
            availableModelSizes = revisedTrimNames.masterSizeList;
            createOptionList(optionID,revisedTrimNames.trimNamesArray);
            applyOptionLister(optionID);
        },
        error : function(){
            console.log('error');
        }
    })
}



function getCorretSizesFromVehicleDB(){
    var selectedVehicleTrim = vehicleSearchFields['vehicle-trim'],
        selectedVehicleSize = availableModelSizes[selectedVehicleTrim].size;

    redirectToSearchPage(selectedVehicleSize);
}


function getWidthFromVehicleDB(){
    $.ajax({
        url: searchURL,
        method: 'GET',
        data:{requstedFn : 'width'},
        success: function(response){
            var webDisplaySizes = JSON.parse(response).success;
            pullSizeNamingKeys(webDisplaySizes);
        },
        error : function(){
            console.log('error');
        }
    })
}


function getRatioFromVehicleDB(){
    var ratios,
        optionID = 'size-ratio',
        width = 'size-width' in sizeSearchFields ? sizeSearchFields['size-width'] : null;
    if(!width){
        return;
    }

    $('#size-ratio').unbind('click');    
    ratios = createRatioDispayArray(width);
    ratios.sort(function(b,a){
        return b - a;
    });

    showHideOptionUL(optionID);
    createOptionList(optionID,ratios);
    applySizeOptionLister(optionID);
}


function getRimFromVehicleDB(){
    var rims,
        optionID = 'size-rim',
        width ='size-width' in sizeSearchFields ? sizeSearchFields['size-width'] : null,
        ratio ='size-ratio' in sizeSearchFields ? sizeSearchFields['size-ratio'] : null;
    if(!width || !ratio){
        return;
    }

    $('#size-rim').unbind('click');
    rims = createRimDispayArray(width,ratio);
    rims.sort(function(b,a){
        return b - a;
    });
    
    showHideOptionUL(optionID);
    
    createOptionList(optionID,rims);
    applySizeOptionLister(optionID);
}

function createSizeQueryObj(){
    var rim = 'size-rim' in sizeSearchFields ? sizeSearchFields['size-rim'] : null,
        width ='size-width' in sizeSearchFields ? sizeSearchFields['size-width'] : null,
        ratio ='size-ratio' in sizeSearchFields ? sizeSearchFields['size-ratio'] : null,
        genericSize;
        //queryingObj = {};
    if(!width || !ratio || !rim){
        return;
    }
    
    genericSize = findGenericSize(rim,width,ratio);
    
    redirectToSearchPage(width+ratio+rim,genericSize);
}

function redirectToSearchPage(size,genericSize){
    var genericSize;
    if(!genericSize){
        var createdGenericSize = size.split("");
        createdGenericSize.splice(3,0,"/");
        createdGenericSize.splice(6,0,"R");
        genericSize = createdGenericSize.join("");
    }
    
    var sanitizedSize = size.replace(/\./g,"").replace("None","");
    
    window.location.href = "localhost/milestar/tire-search-result/?size="+sanitizedSize+"&genericSize="+genericSize;
    //encodeURIComponent() : currently not working find out how.
}

function findGenericSize(rim,width,ratio){
    for(size in searchableSizeList){
        if(searchableSizeList[size].width == width){
            if(searchableSizeList[size].ratio == ratio){
                if(searchableSizeList[size].rim == rim){
                    return size;
                }
            }
        }
    }
}

function parseTrimsBySizes(trims){
    var trimNamesArray = [],
        trims = trims,
        trimObj,
        trimSizeObj,
        masterSizeList = {},
        returningObj = {};
    for(trim in trims){
        trimObj = trims[trim];
        for(type in trimObj){
            trimSizeObj = trimObj[type];
            for(size in trimSizeObj){
                switch(trimSizeObj[size]['FRB']) {
                    case "F":
                        trimNamesArray.push(trim+" "+trimSizeObj[size]['Rim']+'" Front');
                        masterSizeList[trim+" "+trimSizeObj[size]['Rim']+'" Front'] = trimSizeObj[size];
                        break;
                    case "R":
                        trimNamesArray.push(trim+" "+trimSizeObj[size]['Rim']+'" Rear');
                        masterSizeList[trim+" "+trimSizeObj[size]['Rim']+'" Rear'] = trimSizeObj[size];
                        break;
                    default:
                        trimNamesArray.push(trim+" "+trimSizeObj[size]['Rim']+'"');
                        masterSizeList[trim+" "+trimSizeObj[size]['Rim']+'"'] = trimSizeObj[size];
                }
            }
        }
    }
    trimNamesArray = trimNamesArray.sort();
    returningObj.trimNamesArray = trimNamesArray;
    returningObj.masterSizeList = masterSizeList;
    return returningObj;
}

function pullSizeNamingKeys(webDisplaySizes){
    var optionID = 'size-width',
        widths,
        sortedWidths;
    $.ajax({
        url: searchURL,
        method: 'GET',
        data:{requstedFn : 'sizingMethodKey'},
        success: function(response){
            var sizingTypes = JSON.parse(response).success;
            distNamesToParse(webDisplaySizes,sizingTypes);
            $('#size-width').unbind('click');
            widths = createWidthDispayArray();
            widths.sort(function(b,a){
                return b - a;
            });
            showHideOptionUL(optionID);
            
            createOptionList(optionID,widths);
            applySizeOptionLister(optionID);
        },
        error : function(){
            console.log('error');
        }
    })
}

function createRimDispayArray(selectedWidth,selectedRatio){
    var returningArray = [];
    //currently re looping the previously discared items. need to fix later
    for(size in searchableSizeList){
        if(searchableSizeList[size].width == selectedWidth){
            if(searchableSizeList[size].ratio == selectedRatio){
                if(returningArray.indexOf(searchableSizeList[size].rim) == -1){
                    returningArray.push(searchableSizeList[size].rim);
                }
            }
        }
    }
    return returningArray;
}

function createRatioDispayArray(selectedWidth){
    var returningArray = [];
    for(size in searchableSizeList){
        if(searchableSizeList[size].width == selectedWidth){
            if(returningArray.indexOf(searchableSizeList[size].ratio) == -1){
                returningArray.push(searchableSizeList[size].ratio);
            }
        }
    }
    return returningArray;
}
function createWidthDispayArray(){
    var returningArray = [];
    for(size in searchableSizeList){
        if(returningArray.indexOf(searchableSizeList[size].width) == -1){
            returningArray.push(searchableSizeList[size].width);
        }
    }
    return returningArray;    
}


var masterSizeList,
    searchableSizeList = new Array();

function distNamesToParse(webDisplaySizes,sizingTypes){
    var trimmedNumericSize = [];
    masterSizeList = webDisplaySizes;
    
    for(type in webDisplaySizes){
        switch(type) {
        case "CM":
            rmCarTypeDesignation(webDisplaySizes[type],false,['C']);
            break;
        case "M":
            webDisplaySizes[type].forEach(function(val){
                updateSearchableSizeList(val);    
            });
            break;
        case "N":
            trimmedNumericSize = trimNumeric(webDisplaySizes[type],['LT']);
            break;
        case "SM":
            rmCarTypeDesignation(webDisplaySizes[type],true,sizingTypes[type]);
            break;
        case "SMF":
            splitMetricAndFloat(webDisplaySizes[type],webDisplaySizes,sizingTypes['SM']);
            break;
        default:
            rmCarTypeDesignation(webDisplaySizes[type],false,['LT']);
        }    
    }
    
    parseSearchableSizeList(sizingTypes["M"]);
    if(trimmedNumericSize.length > 1){
        parseNumeric(trimmedNumericSize);    
    }
    
}

function parseSearchableSizeList(metricInternalSizingKey){
    var newSearchableSizeList = new Object(),
        firstDividerIndex,
        secondDividerIndexInfo;
    
    searchableSizeList.forEach(function(sizeVal, sizeIndex, sizeArray){
        newSearchableSizeList[sizeVal] = {};
        sizeArray[sizeIndex] = sizeArray[sizeIndex].replace(/X/g,"/");        
        
        firstDividerIndex = sizeArray[sizeIndex].indexOf('/');
        newSearchableSizeList[sizeVal].width = sizeArray[sizeIndex].slice(0,firstDividerIndex);
        
        secondDividerIndexInfo = loopMetricKey(sizeArray,sizeIndex);
        
        newSearchableSizeList[sizeVal].ratio = sizeArray[sizeIndex].slice(firstDividerIndex+1,secondDividerIndexInfo.index);
        newSearchableSizeList[sizeVal].rim = sizeArray[sizeIndex].slice(secondDividerIndexInfo.index+secondDividerIndexInfo.length);
        
    })
    
    
    function loopMetricKey(sizeArray,sizeIndex){
        var dividerIndex;
        
        for(var i = 0; i < metricInternalSizingKey.length; i++){            
            if(sizeArray[sizeIndex].search(metricInternalSizingKey[i]) > -1){
                dividerIndex = sizeArray[sizeIndex].search(metricInternalSizingKey[i]);
                return {
                    index : dividerIndex,
                    length : metricInternalSizingKey[i].length
                };
            }
        }
    }
    
    searchableSizeList = newSearchableSizeList;
}

function updateSearchableSizeList(trimmedSizeName){
    if(searchableSizeList.indexOf(trimmedSizeName) == -1){
        searchableSizeList.push(trimmedSizeName);
    }
}

function parseNumeric(trimmedNumericSize){
    trimmedNumericSize.forEach(function(val){
        searchableSizeList[val] = {};
        searchableSizeList[val].width = val.slice(0,val.indexOf('R'));
        searchableSizeList[val].ratio = "None";
        searchableSizeList[val].rim = val.slice(val.indexOf('R')+1);
    })
}

function trimNumeric(nameArray,keyList){
    var trimmedSizeName,
        retuningArray = [];
    keyList.forEach(function(keyVal,keyIndex,keyList){
        nameArray.forEach(function(nameVal, nameIndex, nameList){
            if(nameVal.search(keyVal) == nameVal.length-keyVal.length){
                trimmedSizeName = nameVal.slice(0,nameVal.length-keyVal.length);            
                retuningArray.push(trimmedSizeName);
            }
        })
    })
    return retuningArray;
}

function rmCarTypeDesignation(nameArray,front,keyList){
    var trimmedSizeName;
    
    keyList.forEach(function(keyVal,keyIndex,keyList){
        nameArray.forEach(function(nameVal, nameIndex, nameList){
            if(front){
                if(nameVal.search(keyVal) == 0){
                    trimmedSizeName = nameVal.slice(keyVal.length);
                    updateSearchableSizeList(trimmedSizeName);
                }
            }else{
                if(nameVal.search(keyVal) == nameVal.length-keyVal.length){
                    trimmedSizeName = nameVal.slice(0,nameVal.length-keyVal.length);
                    updateSearchableSizeList(trimmedSizeName);
                }
            }
            
        })
    })
   
}

function splitMetricAndFloat(smfArray,webDisplaySizes,smKeyList){
    var oldSMFArray = smfArray,
        floatArray = new Array(),
        metricArray = new Array(),
        splitedSizeNames;
    
    oldSMFArray.forEach(function(val, index, array){
        val = val.replace(/[()]/g,"");
        splitedSizeNames = val.split(" ");
        metricArray.push(splitedSizeNames[0]);
        floatArray.push(splitedSizeNames[1]);  
    })
    rmCarTypeDesignation(floatArray,false,['LT']);
    rmCarTypeDesignation(metricArray,true,smKeyList);        
}
