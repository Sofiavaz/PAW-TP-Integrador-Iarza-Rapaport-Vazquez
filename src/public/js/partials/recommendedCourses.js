import CourseCard from '../components/CourseCard.js';

document.addEventListener("DOMContentLoaded", function (event) {
    var xhttp = new XMLHttpRequest();

    let coursesList = document.getElementById('recommended-list');

    let page = 1;
    let perPage;

    if (screen.width < 450) {
        perPage = 1; // depending on device res
    } else {
        perPage = 3;
    }

    let url = '/api/courses/recommended?perPage=' + perPage;

    getCourses();
    let buttonMore = document.getElementById('buttonMore');

    var data;

    // Separo en funcion para hacerlo por auto scroll si se puede
    function getCourses() {

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText);
                url = data.next_page_url + '&perPage=' + perPage;
                data.data.forEach(function (e) {
                    let courseCard =
                        CourseCard(e.id, e.name, e.date_time, e.short_description, e.price, e.duration_mins);//, getTeacher(e.user_id));
                    coursesList.append(courseCard);
                });
            }
        }
        // };
        xhttp.open("GET", url, true);
        xhttp.send();
    }

    buttonMore.addEventListener('click', function () {
        if (url.indexOf(data.last_page_url) != -1) {
            buttonMore.classList.add('hidden')
        }
        getCourses();
    })

    // function getTeacher(id){
    //     let xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function () {
    //         if (this.readyState == 4 && this.status == 200) {
    //             return this.responseText.name;
    //         }
    //     }
    //     xhttp.open("GET", '/api/users/')
    // }

});

