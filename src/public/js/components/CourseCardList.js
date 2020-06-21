import CourseCard from "./CourseCard.js";

export default function CourseCardList(baseUrl, list, buttonMore){

    let perPage;

    if (screen.width < 450) {
        perPage = 1; // depending on device res
    } else {
        perPage = 3;
    }

    baseUrl += "?perPage=" + perPage;

    getCourses();

    let data;

    // Separo en funcion para hacerlo por auto scroll si se puede
    function getCourses() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText);
                baseUrl = data.next_page_url + '&perPage=' + perPage;
                data.data.forEach(function (e) {
                    let courseCard =
                        CourseCard(e.id, e.name, e.date_time, e.short_description, e.price, e.duration_mins);//, getTeacher(e.user_id));
                    list.append(courseCard);
                    return list;
                });
            }
        }
        // };
        xhttp.open("GET", baseUrl, true);
        xhttp.send();
    }

    buttonMore.addEventListener('click', function () {
        if (baseUrl.indexOf(data.last_page_url) !== -1) {
            // setTimeout(function () {
            buttonMore.classList.add('fadeout')
        }
        getCourses();

        // if (baseUrl.indexOf(data.last_page_url) !== -1) {
        //     setTimeout(function () {
        //         buttonMore.classList.add('hidden')
        //     }, 50);
        // }

    })
}
