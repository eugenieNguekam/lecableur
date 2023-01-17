document.addEventListener("DOMContentLoaded", function(){
  if(!document.querySelector(".payment").classList.contains("d-none")){
    window.location.replace("#price");
  }
    document.querySelector("a.btn-payment").addEventListener("click", function(e){
        e.preventDefault();
        document.querySelector(".payment").classList.remove("d-none");
        document.querySelector("a.btn-payment").removeEventListener("click", function(){

        });

    })


})
