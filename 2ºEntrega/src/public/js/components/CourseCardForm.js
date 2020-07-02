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
    labelInfo.classList.add('text-sm', 'lbl-info', 'course-card-link-section');

    if (e.access_link != null){
        labelInfo.innerText = "Link definido";
        courseCard.appendChild(labelInfo);
    }
    else {
        labelInfo.innerText = "Definir link";
        courseCard.appendChild(labelInfo);
    }
    labelInfo.addEventListener('click', function(e){
        form.classList.toggle('d-none');
    })

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
    inputCourseLink.value = e.access_link != null ? e.access_link : "";
    form.appendChild(inputCourseLink);

    let button = document.createElement('input');
    button.classList = "text-sm btn btn-blue";
    button.type = "submit";
    button.value = e.access_link == null ? "Confirmar" : "Actualizar";
    form.appendChild(button);

    form.classList.add('d-none');

    courseCard.appendChild(form);
    return courseCard;

}
