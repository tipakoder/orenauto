function mouseDown(e){
    if(e.target.closest('.window') === null && document.getElementById("popup-window")?.style.display != "none"){
        hidePopup();
    }
}
document.addEventListener("mousedown", mouseDown);