let form = document.querySelector("#loginForm");

//ecouter la modification du numero de cni
form.cni.addEventListener('change', function () {
    validCni(this);
});
/******************Validation cni*****************/
const validCni = function (NumCNI) {
    //creation de la regex pour la validation email
    let cniRegExp = new RegExp('^[1-9]{1}[0-9]{1,8}$', 'g');

    //recuperation de la balise small
    let small = NumCNI.nextElementSibling;

    //test de l'expression reguliere
    if (!cniRegExp.test(NumCNI.value)) {
        small.innerHTML = 'Numero de CNI incorrect'
        small.classList.add('text-danger');
        return false;
    } else {
        small.innerHTML = ''
        small.classList.remove('text-danger');
        return true;

    }
}

//ecouter la modification du nom
form.nom.addEventListener('change', function () {
    validNom(this);
});
/************validation nom**************/
const validNom = function (nom) {
    //creation de la regex pour la validation nom
    let nomRegExp = new RegExp('^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\'._ \s-]+$', 'g');

    //recuperation de la balise small
    let small = nom.nextElementSibling;

    //test de l'expression reguliere
    if (!nomRegExp.test(nom.value)) {
        small.innerHTML = 'Nom incorrect'
        small.classList.add('text-danger');
        return false;
    } else {
        small.innerHTML = ''
        small.classList.remove('text-danger');
        return true;

    }

}

//ecouter la modification du prenom
form.prenom.addEventListener('change', function () {
    validPrenom(this);
});
/************validation prenom**************/
const validPrenom = function (prenom) {
    //creation de la regex pour la validation du prenom
    let prenomRegExp = new RegExp('^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\'._ \s-]+$', 'g');
    //recuperation de la balise small
    let small = prenom.nextElementSibling;

    //test de l'expression reguliere
    if (!prenomRegExp.test(prenom.value)) {
        small.innerHTML = 'Prenom incorrect'
        small.classList.add('text-danger');
        return false;
    } else {
        small.innerHTML = ''
        small.classList.remove('text-danger');
        return true;

    }

}



//ecouter la modification de l'adresse
form.adresse.addEventListener('change', function () {
    validAdresse(this);
});
/************validation prenom**************/
const validAdresse = function (adresse) {
    //creation de la regex pour la validation du prenom
    let adresseRegExp = new RegExp('^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\':._ \s-]+$', 'g');

    //recuperation de la balise small
    let small = adresse.nextElementSibling;

    //test de l'expression reguliere
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
//ecouter la modification de l'email
form.email.addEventListener('change', function () {
    validEmail(this);
});
/******************Validation email*****************/
const validEmail = function (email) {
    //creation de la regex pour la validation email
    let emailRegExp = new RegExp('^[a-zA-Z0-9."_]+[@]{1}[a-zA-Z0-9."_]+[.]{1}[a-z]{2,10}$', 'g');

    //recuperation de la balise small
    let small = email.nextElementSibling;

    //test de l'expression reguliere
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

//ecouter la modification du numero de telephone
form.telephone.addEventListener('change', function () {
    validTelephone(this);
});
/************validation prenom**************/
const validTelephone = function (telephone) {
    //creation de la regex pour la validation du prenom
    let telephoneRegExp = new RegExp('^[6]{1}[2]|[5-9]{1}[0-9]{7}$', 'g');

    //recuperation de la balise small
    let small = telephone.nextElementSibling;

    //test de l'expression reguliere
    if (!telephoneRegExp.test(telephone.value)) {
        small.innerHTML = 'Numero de telephone incorrect'
        small.classList.add('text-danger');
        return false;
    } else {
        small.innerHTML = ''
        small.classList.remove('text-danger');
        return true;

    }
}


//ecouter la validation du formulaire
form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (validCni(form.cni) && validNom(form.nom) && validPrenom(form.prenom)
        && validAdresse(form.adresse) && validEmail(form.email) && validTelephone(form.telephone)) {
        form.submit();
    } else {
        alert("Veuillez renseigner des valeurs correctes")
    }
});
