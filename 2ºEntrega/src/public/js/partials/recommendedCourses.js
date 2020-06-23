import CourseCard from '../components/CourseCard.js';
import CourseCardList from "../components/CourseCardList.js";

document.addEventListener("DOMContentLoaded", function (event) {

    let url = '/api/courses/recommended';

    let coursesList = document.getElementById('recommended-list');

    let buttonMore = document.getElementById('button-more-recommended')

    CourseCardList(url, coursesList, buttonMore, CourseCard);

});

