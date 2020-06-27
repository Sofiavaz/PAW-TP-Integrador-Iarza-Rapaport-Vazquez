import CourseCard from "./CourseCard.js";
import LinkTakingBox from "./LinkTakingBox.js";

export default function CourseCardTaking(course) {

    let courseCard = CourseCard(course);

    let infoTag = document.createElement('span');

    if (course.access_link != null){
        infoTag.innerText = "Ver link";
        infoTag.classList.add('btn', 'btn-success');

        let linkTakingBox = LinkTakingBox(course.access_link);
        linkTakingBox.classList.toggle('hidden');
        courseCard.appendChild(linkTakingBox);

        infoTag.addEventListener('click', function () {
            linkTakingBox.classList.toggle('hidden');
        });

    }
    else {
        infoTag.innerText = "Link pendiente";
        infoTag.classList.add('badge-warning');
    }

    courseCard.appendChild(infoTag);

    return courseCard;

}

