//zone message d'erreurs
const error = document.querySelector('#error');
//fonction affiche les messages d'erreurs
function setMessage(msg){
    error.innerHTML = "<span>"+msg+"</span>";
}