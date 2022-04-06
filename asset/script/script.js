//récupérer les élèments HTML DOM
const name = document.querySelector('#name');
const firstname = document.querySelector('#firstname');
const mail = document.querySelector('#mail');
const mdp = document.querySelector('#mdp');

function setValueInput(getname, getfirstname, getmail, getmdp){
    name.value = getname;
    firstname.value = getfirstname;
    mail.value = getmail;
    mdp.value = getmdp;
}