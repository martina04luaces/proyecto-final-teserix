const $form= document.querySelector('#form');
const inputs= document.getElementById('input').value;
const $buttonMailto= document.querySelector('#reference');

$form.addEventListener('submit', doSubmit);

function doSubmit(event){
    event.preventDefault();
    const form = new FormData(this);
    $buttonMailto.setAttribute('href', `mailto:teserix.contact@gmail.com?subject=${form.get('nombre')}&body=${form.get('texta')}`);
}

