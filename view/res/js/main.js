function ready(){
    try{initNav();}catch{console.log("error_nav")}
    try{initRange();}catch{console.log("error_range")}
    try{initSlider();}catch{console.log("error_slider")}
    try{initFormSend();}catch{console.log("error_forms")}
    try{initLinks();}catch{console.log("error_links")}
}

function mouseDown(e){
    if(e.target.closest('.window') === null && document.getElementById("popup-window")?.style.display != "none"){
        hidePopup();
    }
}

function initNav(){
    let resultUrl = location.pathname;
    document.querySelector('nav a[href="'+resultUrl+'"]').classList.add("selected");
    document.querySelector('.footer-nav a[href="'+resultUrl+'"]').classList.add("selected");
}

function initRange(){
    let input_ranges = document.querySelectorAll("input[type='range']");
    for(let input of input_ranges){
        input.addEventListener("change", function(){document.getElementById(this.getAttribute("for")).value = this.value + " "+this.getAttribute("eg");});
        document.getElementById(input.getAttribute("for")).value = input.value + " "+input.getAttribute("eg");
    }
}

function initSlider(){
    let sliders = document.querySelectorAll(".slider");
    for(let slider of sliders){
        let view_slide = slider.querySelector(".view-slide");
        let slides = slider.querySelectorAll(".slide");
        for(let slide of slides){
            slide.addEventListener("click", function(){
                view_slide.style.backgroundImage = this.style.backgroundImage;
                try{slider.querySelector(".selected").classList.remove("selected");}catch{}
                this.classList.add("selected");
            });
        }
    }
}

function initFormSend(){
    let forms = document.querySelectorAll("form");
    for(let form of forms){
        form.addEventListener("submit", function(e){
            e.preventDefault();

            let url = this.getAttribute("action");
            let method = (this.getAttribute("method") != null) ? this.getAttribute("method") : "POST";
            let redirectTo = this.getAttribute("redirectTo");
            let functionToDo = this.getAttribute("functionToDo");

            let reqBody = new FormData();
            for(let input of this.querySelectorAll("input")){
                if(input.type !== "file"){
                    reqBody.append(input.name, input.value);
                } else {
                    reqBody.append(input.name, input.files[0]);
                }
            }
            for(let textarea of this.querySelectorAll("textarea")){
                reqBody.append(textarea.name, textarea.value);
            }
            for(let select of this.querySelectorAll("select")){
                if(select.value != null){
                    reqBody.append(select.name, select.value);
                }
            }

            fetch(url, {
                body: reqBody,
                method: method
            }).then(async(res) => {
                return res.json();
            }).then((res) => {
                if(res.type === "success"){
                    if(redirectTo != null) location.href = redirectTo;
                    if(functionToDo != null) (new Function(functionToDo))();
                } else {
                    if(res?.data){
                        console.log(url + ": " +JSON.stringify(res.data));
                    } else {
                        console.log(url + ": " +JSON.stringify(res));
                    }
                }
            }).catch((err) => {
                console.log(url + ": " +err);
            });
        });
    }
}

function initLinks(){
    let links = document.querySelectorAll(".link");
    for(let link of links){
        link.addEventListener("click", function(){
            if(this.getAttribute("href") != null) location.href = this.getAttribute("href");
        });
    }
}

function showPopup(name){
    let popupBody = document.getElementById("popup-window");
    popupBody.querySelector(".window[name='"+name+"']").style.display = "block";
    popupBody.before.onclick = hidePopup;
    popupBody.style.display = "block";
    document.body.style.overflow = "hidden";
}   

function hidePopup(){
    let popupBody = document.getElementById("popup-window");
    popupBody.style.display = "none";
    document.body.style.overflow = "auto";
    for(let window of popupBody.querySelectorAll(".window")){
        if(window.style.display != "none") window.style.display = "none";
    }
}

function formWrite(json, form_id, url){
    let form = document.getElementById(form_id);
    console.log(form_id);
    form.setAttribute("action", url);
    if(json != null) {
        let arr = JSON.parse(json);
        for(let i in arr){
            try{form.querySelector("[name='"+i+"']").value = arr[i];}catch{}
        }
    }
}

document.addEventListener("DOMContentLoaded", ready);
document.addEventListener("mousedown", mouseDown);