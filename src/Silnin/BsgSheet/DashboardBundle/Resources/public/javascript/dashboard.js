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

    // initial values:

    // attributes
    $scope.attributes = {};
    $scope.attributes[1] = 0;
    $scope.attributes[2] = 0;
    $scope.attributes[3] = 0;
    $scope.attributes[4] = 0;
    $scope.attributes[5] = 0;
    $scope.attributes[6] = 0;

    $scope.attributeDice = {};
    $scope.attributeDice[1] = translateDie($scope.attributes[1]);
    $scope.attributeDice[2] = translateDie($scope.attributes[2]);
    $scope.attributeDice[3] = translateDie($scope.attributes[3]);
    $scope.attributeDice[4] = translateDie($scope.attributes[4]);
    $scope.attributeDice[5] = translateDie($scope.attributes[5]);
    $scope.attributeDice[6] = translateDie($scope.attributes[6]);

    // advancement
    $scope.advancementPoints = 1;
    $scope.attributePoints = 42;
    $scope.skillPoints = 2;
    $scope.traitPoints = 3;

    /**
     * attempt to upgrade an attribute
     *
     * @param attributeId
     */
    $scope.buyAttribute = function(attributeId) {
        // determine step up 1 or 2 (if you're on 0, you'll step 2 to minimum of 1d4
        var stepUp = 1;
        if ($scope.attributes[attributeId] == 0) {
            stepUp = 2;
        }

        // determine if we can afford it :)
        var cost = stepUp * 2;

        if ($scope.attributePoints < cost) {
            // cant afford it
            //@TODO throw error or notice
            alert('You don\'t have enough Attribute Points');
            return;
        }

        // ok, we're good
        $scope.attributes[attributeId] += stepUp;
        $scope.attributePoints -= cost;

        // update the visual dice
        $scope.attributeDice[attributeId] = translateDie($scope.attributes[attributeId]);
    };

    /**
     * Attempt to downgrade an attribute
     *
     * @param attributeId
     */
    $scope.sellAttribute = function(attributeId) {
        // we don't go below step2

        if ($scope.attributes[attributeId] <= 2 ) {
            alert('Sorry, a 1d4 is minimum for attributes.');
            return;
        }

        // ok, we're good to go down 1 step
        $scope.attributes[attributeId] -= 1;
        $scope.attributeDice[attributeId] = translateDie($scope.attributes[attributeId]);
        $scope.attributePoints += 2;
    };

});

/**
 * Translates an integer die value into a die-type string (1 = +d2, 2 = +d4, 3 = +d6, etc)
 *
 * @param die (integer)
 * @returns {string}
 */
function translateDie(die) {
    var result = "";

    if (die == 0) {
        return '0';
    }

    if (die > 6) {
        result = result.concat("+d12");
        die -= 6;
        result = result.concat(translateDie(die));
    } else {
        result = result.concat("+d".concat((die*2).toString()));
    }

    return result;
}