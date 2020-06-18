import CourseCard from '../components/CourseCard.js';

document.addEventListener("DOMContentLoaded", function(event){
    var xhttp = new XMLHttpRequest();

    let coursesList = document.getElementById('recommended-list');

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            data.forEach(function(e) {
                coursesList.append(CourseCard(e.id, e.name, e.short_description, e.price, e.duration_mins, e.user_id));
            });
        }
    };
    xhttp.open("GET", '/api/courses/recommended', true);
    xhttp.send();
});

function style(li) {
    return li;
}

