import CourseCard from "./CourseCard.js";

export default function CourseCardForm(e) {
    let courseCard = CourseCard(e);

    let form = document.createElement('form');
    form.classList.add("set-link-form");
    form.method = "POST";
    form.id = "set-link-form-" + e.id;
    form.action = "/courses/link/define";

    let inputId = document.createElement('input');
    inputId.type = "hidden";
    inputId.name = "course-id";
    inputId.value = e.id;
    form.appendChild(inputId);

    let inputToken = document.createElement('input');
    inputToken.type = "hidden";
    inputToken.name = "_token";
    inputToken.value = document.getElementsByName("_token")[0].content;
    form.appendChild(inputToken);

    let labelInfo = document.createElement('a');
    labelInfo.classList.add('text-sm');
    labelInfo.classList.add('lbl-info');
    if (e.access_link != null){
        labelInfo.innerText = "Link definido";
        courseCard.appendChild(labelInfo);
    }
    else {
        labelInfo.innerText = "Definir link";
        labelInfo.addEventListener('click', function(e){
            form.classList.toggle('d-none');
        })
        courseCard.appendChild(labelInfo);
    }


    let labelCourseLink = document.createElement('label');
    labelCourseLink.innerText = "Link de la clase"
    labelCourseLink.for = "course-link";
    form.appendChild(labelCourseLink);


    let closeButton = document.createElement('p');
    closeButton.innerText = "X";
    closeButton.classList.add('text-sm','close-btn');
    closeButton.addEventListener('click', function(){
        form.classList.toggle('d-none')
    })
    form.appendChild(closeButton);

    let inputCourseLink = document.createElement('input');
    inputCourseLink.name = "course-link";
    inputCourseLink.id = "course-link";
    form.appendChild(inputCourseLink);

    let button = document.createElement('input');
    button.classList = "text-sm btn btn-blue";
    button.type = "submit";
    button.value = "Confirmar";
    form.appendChild(button);

    form.classList.add('d-none');

    courseCard.appendChild(form);
    return courseCard;
    //
    //
    // setTimeout(function() {
    //     /* Logica para boton "definir link": toggle hidden del form -------------------------------*/
    //     let linkForms = document.querySelectorAll('form.set-link-form');
    //     for (var form of linkForms){
    //         form.classList.add('hidden');
    //     }
    //
    //     let linkBtns = document.querySelectorAll('.set-link-btn');
    //     linkBtns.forEach(function(linkBtn){
    //         linkBtn.addEventListener('click', function(e){
    //             let splitted = e.target.id.split('-');
    //             let index = splitted[splitted.length - 1];
    //             let form = document.getElementById("set-link-form-" + index);
    //             form.classList.toggle('hidden');
    //         });
    //     })
    //     /* Fin logica para boton "definir link" --------------------------------------------------*/
    // }, 1500);

}
