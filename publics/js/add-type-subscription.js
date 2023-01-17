document.addEventListener("DOMContentLoaded", function(){
  var periodicites=document.querySelectorAll("form div.periodicite button");
  var periode=document.querySelector("#periode")
  periodicites.forEach((item, i) => {
    console.log(parseInt(periode.value))
    if(parseInt(periode.value)===i+1){
      item.classList.add("active")
    }
  });

  console.log(periodicites);
  periodicites.forEach(function(item, i){
      item.addEventListener("click", function(){
        periodicites.forEach(function(elt) {
          elt.classList.remove("active");
        });
        item.classList.add("active");
        periode.value=item.getAttribute("id-periode");

      })
  });

 var starterPrice=document.querySelector("form input[name='starter-price']");
 var btn=document.querySelectorAll("form div.starter-price button")

 if(parseInt(starterPrice.value)>0){
   btn[0].classList.remove("active")
   btn[1].classList.add("active")
   starterPrice.parentElement.classList.remove("d-none");
 }
  toggleSelectPrice(btn, starterPrice)
  var finisherPrice=document.querySelector("form input[name='finisher-price']");
  var btn=document.querySelectorAll("form div.finisher-price button")
  if(parseInt(finisherPrice.value)>0){
    btn[0].classList.remove("active")
    btn[1].classList.add("active")
    finisherPrice.parentElement.classList.remove("d-none");
  }
   toggleSelectPrice(btn, finisherPrice)





 });

 function toggleSelectPrice(btn, price){
   btn[0].addEventListener("click", function(e){
     btn[1].classList.remove("active")
     e.target.classList.add("active")
     price.parentElement.classList.add("d-none")
     price.value="0"
   })
   btn[1].addEventListener("click", function(e){
     btn[0].classList.remove("active")
     e.target.classList.add("active")
     price.parentElement.classList.remove("d-none")
   })
 }
