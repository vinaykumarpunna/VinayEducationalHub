let menu_open = document.querySelectorAll(".menu_open");
let menu_close = document.querySelectorAll(".menu_close");
let responsive


function menu_toggle() {
    if(menu_open[0].style.display == "flex"){
        menu_open[0].style.display = "none";
        menu_close[0].style.display = "flex";
    }
    else{
        menu_close[0].style.display = "none";
        menu_open[0].style.display = "flex";

    }
}


function myFunction() {
    const element = document.getElementById("About_us");
    element.scrollIntoView();
  }