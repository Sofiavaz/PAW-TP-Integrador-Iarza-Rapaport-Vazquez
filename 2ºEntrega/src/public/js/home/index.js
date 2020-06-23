import CourseCard from "../components/CourseCard.js";
import CourseCardList from "../components/CourseCardList.js";
import CourseCardForm from "../components/CourseCardForm.js";

document.addEventListener("DOMContentLoaded", function(){

    let urlTeaching = '/api/courses/teaching';
    let teachingList = document.getElementById('teaching-list');
    let buttonMoreTeaching = document.getElementById('button-more-teaching')
    CourseCardList(urlTeaching, teachingList, buttonMoreTeaching, CourseCardForm);

    let urlTaking = 'api/courses/taking';
    let takingList = document.getElementById('taking-list');
    let buttonMoreTaking = document.getElementById('button-more-taking');
    CourseCardList(urlTaking, takingList, buttonMoreTaking, CourseCard);
})
