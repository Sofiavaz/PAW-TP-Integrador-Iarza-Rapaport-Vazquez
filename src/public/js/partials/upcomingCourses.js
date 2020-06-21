import CourseCard from "../components/CourseCard.js";
import CourseCardList from "../components/CourseCardList.js";

document.addEventListener("DOMContentLoaded", function(event){
    let url = '/api/courses/upcoming';

    let coursesList = document.getElementById('upcoming-list');

    let buttonMore = document.getElementById('button-more-upcoming')

    CourseCardList(url, coursesList, buttonMore);

});

function style(li) {
    return li;
}
