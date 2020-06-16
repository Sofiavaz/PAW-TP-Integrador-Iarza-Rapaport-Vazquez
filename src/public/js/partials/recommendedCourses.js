document.addEventListener("DOMContentLoaded", function(event){
    var xhttp = new XMLHttpRequest();

    let coursesList = document.getElementById('recommended-list');

    function addCourse(e) {
        let li = document.createElement('li');

        let courseTitle = document.createElement('h4');
        courseTitle.innerText = e.name;
        li.append(courseTitle);

        let price = document.createElement('span');
        price.innerText = e.price;
        li.append(price);

        let info = document.createElement('p');
        info.innerText = e.short_description;
        li.append(info);

        coursesList.append(style(li));
    }

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            data.forEach(function(e) {
                addCourse(e)
            });
        }
    };
    xhttp.open("GET", '/api/courses/recommended', true);
    xhttp.send();
});

function style(li) {
    return li;
}

