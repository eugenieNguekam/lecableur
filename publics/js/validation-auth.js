document.addEventListener("DOMContentLoaded", function(){
  var noms=document.querySelectorAll("form input[name='nom-utilisateur'],\
  form input[name='nom-agence']");

  noms.forEach(function(item){
    item.addEventListener("change", function(){
        validNom(item);
    })

  });
  var email=document.querySelector("form input[type='email']")
  email.addEventListener("change", function(){
    validEmail(email)
  })
    var adresse=document.querySelector("form input[name='adresse']")
    adresse.addEventListener("change", function(){
      validAdresse(adresse);
    })

     form=document.querySelector("form")
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        if ( validNom(noms[0]) && validNom(noms[1])
            && validAdresse(adresse) && validEmail(email) ) {
            form.submit();
        } else {
            alert("Veuillez renseigner des valeurs correctes")
        }
    });


})

const validNom = function (nom) {
    let nomRegExp = new RegExp('^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\'._ \s-]+$', 'g');
    let small = nom.nextElementSibling;
    if (!nomRegExp.test(nom.value)) {
        small.innerHTML = 'Entrée invalide'
        small.classList.add('text-danger');
        return false;
    } else {
        small.innerHTML = ''
        small.classList.remove('text-danger');
        return true;

    }

}
const validAdresse = function (adresse) {
    let adresseRegExp = new RegExp('^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\':._ \s-]+$', 'g');
    let small = adresse.nextElementSibling;
    if (!adresseRegExp.test(adresse.value)) {
        small.innerHTML = 'Adresse incorrecte'
        small.classList.add('text-danger');
        return false;
    } else {
        small.innerHTML = ''
        small.classList.remove('text-danger');
        return true;
    }

}

const validEmail = function (email) {
    //creation de la regex pour la validation email
    let emailRegExp = new RegExp('^[a-zA-Z0-9."_]+[@]{1}[a-zA-Z0-9."_]+[.]{1}[a-z]{2,10}$', 'g');

    let small = email.nextElementSibling;

    if (emailRegExp.test(email.value)) {
        small.innerHTML = ''
        small.classList.remove('text-danger');
        return true;

    } else {
        small.innerHTML = 'Adresse Email incorrect'
        small.classList.remove('text-danger');
        small.classList.add('text-danger');
        return false;
    }

}
