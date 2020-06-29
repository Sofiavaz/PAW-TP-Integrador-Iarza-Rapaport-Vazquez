export default function CourseCardList(baseUrl, list, buttonMore, courseCardType){

    let perPage;

    if (screen.width < 450) {
        perPage = 1; // depending on device res
    } else {
        perPage = 3;
    }

    baseUrl += "?perPage=" + perPage;

    getCourses();

    let data;
    let firstRequest = true;

    // Separo en funcion para hacerlo por auto scroll si se puede
    function getCourses() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText);
                if (data.next_page_url != null) {
                    baseUrl = data.next_page_url + '&perPage=' + perPage;
                }
                else {
                    baseUrl = null;
                }

                if (data.data.length > 0) {
                    if (firstRequest) {
                        list.innerText = "";
                        firstRequest = false;
                    }
                    data.data.forEach(function (e) {
                        let courseCard = courseCardType(e);
                        list.append(courseCard);
                        return list;
                    });
                }
                else {
                    buttonMore.classList.add('fadeout');
                }
            }
        }
        // };
        if (baseUrl != null){
            xhttp.open("GET", baseUrl, true);
            xhttp.send();
        }
    }

    buttonMore.addEventListener('click', function () {
        if (baseUrl == null || baseUrl.indexOf(data.last_page_url) !== -1) {
            // setTimeout(function () {
            buttonMore.classList.add('fadeout');
            setTimeout(function() {
                buttonMore.classList.add('d-none');

                let noMoreCourses = document.createElement('p');
                noMoreCourses.classList.add('float-left', 'w-100');
                noMoreCourses.innerText = "No hay más clases por ahora!";

                buttonMore.insertAdjacentElement('afterend', noMoreCourses);

            }, 1000);
        }
        getCourses();

        // if (baseUrl.indexOf(data.last_page_url) !== -1) {
        //     setTimeout(function () {
        //         buttonMore.classList.add('hidden')
        //     }, 50);
        // }

    })
}
