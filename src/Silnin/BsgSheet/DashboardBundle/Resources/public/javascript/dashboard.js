/**
 * Attempt to buy an attribute for requested character/attribute
 * @param characterId
 * @param attributeId
 */
function buyAttribute(characterId, attributeId)
{
    var xmlhttp;
    if (!window.XMLHttpRequest) {
        // no dice
        alert('Unsupported browser, sorry');
    }

    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    var url = "/character/" + characterId + "/buy-attribute/" + attributeId;
    xmlhttp.open("GET", url,true);
    //xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.status !=200) {
            alert('nope.');
        }
        var str = xmlhttp.responseText;
        var res = str.split(",");
        var attrValue = res[0];
        var pointsValue = res[1];
        var attrId = 'attr' + attributeId;
        window.document.getElementById(attrId).innerHTML=attrValue;
        window.document.getElementById("attributePoints").innerHTML=pointsValue;
    }
}


/**
 * Attempt to downgrade attribute for requested character/attribute
 * @param characterId
 * @param attributeId
 */
function sellAttribute(characterId, attributeId)
{
    var xmlhttp;
    if (!window.XMLHttpRequest) {
        // no dice
        alert('Unsupported browser, sorry');
    }

    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    var url = "/character/" + characterId + "/sell-attribute/" + attributeId;
    xmlhttp.open("GET", url,true);
    //xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.status !=200) {
            alert('nope.');
        }
        var str = xmlhttp.responseText;
        var res = str.split(",");
        var attrValue = res[0];
        var pointsValue = res[1];
        var attrId = 'attr' + attributeId;
        window.document.getElementById(attrId).innerHTML=attrValue;
        window.document.getElementById("attributePoints").innerHTML=pointsValue;
    }
}

/**
 * characterEditor AngularJS Module
 * @type {*}
 */
var app = angular.module('characterEditor', []);

/**
 * Configuration for characterEditor
 */
app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

/**
 * characterEditorLoader
 * Loads data from backend for character editor
 */
app.controller('characterEditorLoader', function($scope) {
    $scope.attr1 = "6";
    $scope.attr2 = "5";
    $scope.attr3 = "4";
    $scope.attr4 = "3";
    $scope.attr5 = "2";
    $scope.attr6 = "1";
    $scope.attributePoints = "42";
    $scope.initiative = "4";
});

/**
 * buyAttribute
 * Updates all neccesary fields when upgrading an attribute
 */
app.controller('buyAttribute', function($scope) {

});

/**
 * sellAttribute
 * Updates all neccesary fields when downgrading an attribute
 */
app.controller('sellAttribute', function($scope) {

});