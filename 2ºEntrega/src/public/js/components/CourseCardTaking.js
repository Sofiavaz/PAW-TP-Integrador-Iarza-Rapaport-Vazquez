import CourseCard from "./CourseCard.js";
import LinkTakingBox from "./LinkTakingBox.js";

export default function CourseCardTaking(course) {

    let courseCard = CourseCard(course);

    let infoTag = document.createElement('button');

    if (course.access_link != null){
        infoTag.innerText = "Ver link";
        infoTag.classList.add('btn', 'btn-success', 'btn-sm');

        let linkTakingBox = LinkTakingBox(course.access_link);
        linkTakingBox.classList.toggle('d-none');
        courseCard.appendChild(linkTakingBox);

        infoTag.addEventListener('click', function () {
            linkTakingBox.classList.toggle('d-none');
        });

    }
    else {
        infoTag.innerText = "Link pendiente";
        infoTag.classList.add('badge-warning');
    }

    courseCard.appendChild(infoTag);

    return courseCard;

}

