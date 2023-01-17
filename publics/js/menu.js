document.addEventListener("DOMContentLoaded", function(){
  var lis=document.querySelectorAll("nav ul li ")
  lis.forEach((item, i) => {
  item.addEventListener("click", function(){
      lis.forEach( elt=> {
        elt.classList.remove("active");
      });
      item.classList.add("active");


  })
});

})
