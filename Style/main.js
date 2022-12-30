//show and hide navbar
function showAndHideMenu()
{
    let menu = document.querySelectorAll("nav");    
    let currentDisplay = window.getComputedStyle(menu[0],null).display;    
    if(currentDisplay === 'none' ) [...menu].map((element) => element.style.display = 'block');
    else {[...menu].map((element) => element.style.display = 'none');}
}


// functions about slides // 
window.addEventListener("load",()=>{showFirstSlide(0);showFirstSlide(1);showFirstSlide(2);showFirstSlide(3);});


const slideId = ['slide_1','slide_2','slide_3','slide_4'];
let index = [0,0,0,0];

function showFirstSlide(which_slide)
{
    let slides = document.getElementsByClassName(slideId[which_slide]);    
    slides[0].style.display = 'block';     
}

setInterval(() => {
    
    moveSlide(1,0);
    moveSlide(1,1);
    moveSlide(1,2);
    moveSlide(1,3);
   
},3000);

//move forward or backward on slides
function moveSlide(direction,which_slide)
{
    let slide = document.getElementsByClassName(slideId[which_slide]);
    slide[index[which_slide]].style.display = 'none';

    if ((index[which_slide] + direction) < 0) {var mov = slide.length - 1;}
    else{ var mov = (index[which_slide] + direction) % slide.length;}
    
    index[which_slide] = mov;
    slide[index[which_slide]].style.display = 'block';       
}




