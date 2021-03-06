<script src="../dropzone/dropzone.min.js"></script>
<script src="../../resources/jquery/js/jquery-1.12.4.min.js"></script>
<style>
body {
    font-size:24px;
    font-family:Oswald, Tahoma, sans-serif;
}
div#text {
    margin-top:48px;
    text-align:center;
}
div#dropzone {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999999999;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    transition: visibility 175ms, opacity 175ms;
    display: table;
    text-shadow: 1px 1px 2px #000;
    color: #fff;
    background: rgba(0, 0, 0, 0.45);
    font: bold 42px Oswald, DejaVu Sans, Tahoma, sans-serif;
}
div#textnode {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    transition: font-size 175ms;
}
</style>

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
 
<div style="visibility:hidden; opacity:0" id="dropzone">
    <div id="textnode">Drop anywhere!</div>
</div>
<div id=text>Drag a file anywhere</div>

<script>
    
var lastTarget = null;

function isFile(evt) {
    var dt = evt.dataTransfer;

    for (var i = 0; i < dt.types.length; i++) {
        if (dt.types[i] === "Files") {
            return true;
        }
    }
    return false;
}

window.addEventListener("dragenter", function (e) {
    if (isFile(e)) {
        lastTarget = e.target;
        document.querySelector("#dropzone").style.visibility = "";
        document.querySelector("#dropzone").style.opacity = 1;
        document.querySelector("#textnode").style.fontSize = "48px";
    }
});

window.addEventListener("dragleave", function (e) {
    e.preventDefault();
    if (e.target === document || e.target === lastTarget) {
        document.querySelector("#dropzone").style.visibility = "hidden";
        document.querySelector("#dropzone").style.opacity = 0;
        document.querySelector("#textnode").style.fontSize = "42px";
    }
});

window.addEventListener("dragover", function (e) {
    e.preventDefault();
});

window.addEventListener("drop", function (e) {
    e.preventDefault();
    document.querySelector("#dropzone").style.visibility = "hidden";
    document.querySelector("#dropzone").style.opacity = 0;
    document.querySelector("#textnode").style.fontSize = "42px";
    if(e.dataTransfer.files.length == 1)
    {
        document.querySelector("#text").innerHTML =
            "<b>File selected:</b><br>" + e.dataTransfer.files[0].name;
    }
});
</script>
<?php

