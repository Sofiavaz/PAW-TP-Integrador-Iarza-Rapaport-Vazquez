export default function CourseCard(id, title, date_time, short_descr, price, duration) {

    let li = document.createElement('li');

    let courseTitle = document.createElement('h4');
    courseTitle.innerText = title;
    courseTitle.classList.add('courseCardTitle');
    li.append(courseTitle);

    let priceSpan = document.createElement('p');
    priceSpan.innerText =  "$" + price;
    priceSpan.classList.add('courseCardPrice');
    li.append(priceSpan);

    let courseDate = document.createElement('p');
    courseDate.innerText = new Date(date_time).toLocaleDateString();
    courseDate.classList.add('courseCardDate');
    li.append(courseDate);

    let courseTime = document.createElement('p');
    courseTime.innerText = new Date(date_time).getHours() + ":" +new Date(date_time).getMinutes() + "hs";
    courseTime.classList.add('courseCardTime');
    li.append(courseTime);
    //
    // let courseTeacher = document.createElement('p');
    // courseTeacher.innerText = teacher;
    // courseTeacher.classList.add('courseCardTeacher');
    // li.append(courseTeacher);



    let durationSpan = document.createElement('p');
    durationSpan.innerText = duration;
    durationSpan.classList.add('courseCardDuration');
    li.append(durationSpan);

    let info = document.createElement('p');
    info.innerText = short_descr;
    info.classList.add('courseCardDescription');
    li.append(info);

    let button = document.createElement('a');
    button.href = "/courses/" + id;
    button.innerText = "Más info";
    button.classList.add('courseCardBtn');
    li.append(button);

    li.classList.add('courseCard');
    return li;
}




