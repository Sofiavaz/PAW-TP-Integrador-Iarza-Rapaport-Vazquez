document.addEventListener("DOMContentLoaded", function(){







    /* Logica para boton "definir link": toggle hidden del form -------------------------------*/
    let linkForms = document.querySelectorAll('form.set-link-form');
    for (var form of linkForms){
        form.classList.add('hidden');
    }

    let linkBtns = document.querySelectorAll('.set-link-btn');
    linkBtns.forEach(function(linkBtn){
        linkBtn.addEventListener('click', function(e){
            let splitted = e.target.id.split('-');
            let index = splitted[splitted.length - 1];
            let form = document.getElementById("set-link-form-" + index);
            form.classList.toggle('hidden');
        });
    })
    /* Fin logica para boton "definir link" --------------------------------------------------*/
})
