window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}



const goTOPBtn= document.querySelector(".go-top-btn");
window.addEventListener("scroll", checkHeight)

function checkHeight(){
    if(window.scrollY > 100){
       goTOPBtn.style.display= "flex"
    }else{
        goTOPBtn.style.display= "none"
    }
}

goTOPBtn.addEventListener('click', () =>{
    window.scrollTo({
        top:0,
        behavior:"smooth"
    })
})



