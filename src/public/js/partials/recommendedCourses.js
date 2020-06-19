import CourseCard from '../components/CourseCard.js';

document.addEventListener("DOMContentLoaded", function(event){
    var xhttp = new XMLHttpRequest();

    let coursesList = document.getElementById('recommended-list');

    let page = 1;
    let perPage;

    if (screen.width < 450){
         perPage = 1; // depending on device res
    }
    else {
        perPage = 3;
    }

    getCourses();

    // Separo en funcion para hacerlo por auto scroll si se puede
    function getCourses() {
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (JSON.parse(this.responseText).length === undefined) {
                    let e = (JSON.parse(this.responseText)[1]);
                    let courseCard = CourseCard(e.id, e.name, e.short_description, e.price, e.duration_mins, e.user_id);
                    coursesList.append(courseCard);
                }
                else{
                    let data = JSON.parse(this.responseText);
                    data.forEach(function (e) {
                        let courseCard = CourseCard(e.id, e.name, e.short_description, e.price, e.duration_mins, e.user_id);
                        coursesList.append(courseCard);
                    });
                }

            }
        };
        xhttp.open("GET", '/api/courses/recommended?page=' + page++ +'&perPage=' + perPage, true);
        xhttp.send();
    }

    let buttonMore = document.getElementById('buttonMore');

    buttonMore.addEventListener('click', function() {
        getCourses();
    })


});

