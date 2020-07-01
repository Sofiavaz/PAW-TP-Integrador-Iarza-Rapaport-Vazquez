import CourseCardList from "../components/CourseCardList.js";
import CourseCard from "../components/CourseCard.js";

document.addEventListener("DOMContentLoaded", function(){
    let coursesList = document.getElementById('course-list');

    let url = '/api/courses';

    let buttonMore = document.getElementById('button-more')

    CourseCardList(url, coursesList, buttonMore, CourseCard);

});
