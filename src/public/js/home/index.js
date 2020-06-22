import CourseCardList from "../components/CourseCardList.js";
import CourseCardForm from "../components/CourseCardForm.js";

document.addEventListener("DOMContentLoaded", function(){

    let url = '/api/courses/teaching';

    let coursesList = document.getElementById('teaching-list');

    let buttonMore = document.getElementById('button-more-teaching')

    CourseCardList(url, coursesList, buttonMore, CourseCardForm);

})
