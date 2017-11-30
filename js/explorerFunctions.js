/*
Functions for explorer.php
 */

filterLevel(getCookie("level"));
setMode(getCookie("mode"));

// General function for getting cookie values
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie;
    decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Set the explorer mode based on "mode" cookie value
function setMode(mode){
    // Check for no "mode" cookie value, if the session was just started
    if (!mode) {
        return this.setMode("Explore");
    }

    // Set the new cookie value
    document.cookie = "mode=" + mode;

    switch (mode) {
        case "Explore":
            document.getElementById('modeExplore').setAttribute("class", "mode-choice selected");
            document.getElementById("modeLabel").setAttribute("class", "mode-choice");
            document.getElementById("modeReading").setAttribute("class", "mode-choice");
            document.getElementById("modeVocabulary").setAttribute("class", "mode-choice");
            break;
        case "Label":
            document.getElementById("modeExplore").setAttribute("class", "mode-choice");
            document.getElementById("modeLabel").setAttribute("class", "mode-choice selected");
            document.getElementById("modeReading").setAttribute("class", "mode-choice");
            document.getElementById("modeVocabulary").setAttribute("class", "mode-choice");
            break;
        case "Reading":
            document.getElementById("modeExplore").setAttribute("class", "mode-choice");
            document.getElementById("modeLabel").setAttribute("class", "mode-choice");
            document.getElementById("modeReading").setAttribute("class", "mode-choice selected");
            document.getElementById("modeVocabulary").setAttribute("class", "mode-choice");
            break;
        case "Vocabulary":
            document.getElementById("modeExplore").setAttribute("class", "mode-choice");
            document.getElementById("modeLabel").setAttribute("class", "mode-choice");
            document.getElementById("modeReading").setAttribute("class", "mode-choice");
            document.getElementById("modeVocabulary").setAttribute("class", "mode-choice selected");
            break;
    }
}

// Set explorer to filter for the level difficulty, based on the "level" cookie value
function filterLevel(level) {
    // Check for no "level" cookie value, if none was selected
    if (!level) {
        return;
    }

    // Set the new cookie value
    document.cookie = "level=" + level;

    var levels = ["level0", "level1", "level2", "level3", "level4"];
    for (var i = 0; i < levels.length; i++){
        var elements = document.getElementsByName(level);
        if (elements[i] == level){
            for(var j = 0; j < elements.length; i++){
                elements[j].setAttribute("style", "block");
            }
        } else {
            for(var j = 0; j < elements.length; i++){
                elements[j].setAttribute("style", "none");
            }
        }
    }
}