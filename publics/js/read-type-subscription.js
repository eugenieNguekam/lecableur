document.addEventListener("DOMContentLoaded", function(){
  var periodicites=document.querySelectorAll("form div.periodicite button");
  var periode=document.querySelector("#periode")
  periodicites.forEach((item, i) => {
    console.log(parseInt(periode.value))
    if(parseInt(periode.value)===i+1){
      item.classList.add("active")
    }
  });

 var starterPrice=document.querySelector("form input[name='starter-price']");
 var btn=document.querySelectorAll("form div.starter-price button")

 if(parseInt(starterPrice.value)>0){
   btn[0].classList.remove("active")
   btn[1].classList.add("active")
   starterPrice.parentElement.classList.remove("d-none");
 }
  var finisherPrice=document.querySelector("form input[name='finisher-price']");
  var btn=document.querySelectorAll("form div.finisher-price button")
  if(parseInt(finisherPrice.value)>0){
    btn[0].classList.remove("active")
    btn[1].classList.add("active")
    finisherPrice.parentElement.classList.remove("d-none");
  }

 });
