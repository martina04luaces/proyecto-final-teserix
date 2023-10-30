const $form= document.querySelector('#form');
const $buttonMailto= document.querySelector('#reference');

$form.addEventListener('submit', doSubmit);

function doSubmit(event){
    event.preventDefault();
    const form = new FormData(this);
<<<<<<< HEAD
    $buttonMailto.setAttribute('href', `mailto:teserix.contact@gmail.com?subject=${form.get('nombre')}&body=${form.get('texta')}`);
=======
    $buttonMailto.setAttribute('href', `mailto:teserix.contact@gmail.com?subject=${form.get('nombre')}${form.get('mail')}&body=${form.get('texta')}`);
>>>>>>> 878b001006a9fbe165a0fdcbd88e700321e3001f
    $buttonMailto.click()
}