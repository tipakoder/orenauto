function ready(){
    try{initNav();}catch{console.log("error_nav")}
    try{initRange();}catch{console.log("error_range")}
    try{initSlider();}catch{console.log("error_slider")}
    try{if(document.querySelector(".search-bar")) initSearchBar();}catch{console.log("error_searchbar")}
}

function initNav(){
    let resultUrl = location.pathname;
    document.querySelector('nav a[href="'+resultUrl+'"]').classList.add("selected");
    document.querySelector('.footer-nav a[href="'+resultUrl+'"]').classList.add("selected");
}

function initSearchBar(){

}

function initRange(){
    let input_ranges = document.querySelectorAll("input[type='range']");
    for(let input of input_ranges){
        input.addEventListener("change", function(){
            document.getElementById(this.getAttribute("for")).value = this.value + " руб.";
        });
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

document.addEventListener("DOMContentLoaded", ready);