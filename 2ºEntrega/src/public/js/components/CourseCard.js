export default function CourseCard(course) {

    let li = document.createElement('li');
    let link = document.createElement('a');
    link.href = "/courses/" + course.id;
    li.appendChild(link);
    li.classList.add('courseCard', 'w3-animate-top');

    let courseImg = document.createElement('img');
    courseImg.src = '/uploads/' + course.img_path;
    courseImg.classList.add('courseCardImg');
    link.append(courseImg);

    let courseTitle = document.createElement('h4');
    courseTitle.innerText = course.name;
    courseTitle.classList.add('courseCardTitle');
    link.append(courseTitle);

    let courseDate = document.createElement('p');
    courseDate.innerText = new Date(course.date_time).toLocaleDateString();
    courseDate.classList.add('courseCardDate');
    link.append(courseDate);

    let priceSpan = document.createElement('p');
    priceSpan.innerText = "$" + course.price;
    priceSpan.classList.add('courseCardPrice', 'text-success');
    link.append(priceSpan);

    let courseTime = document.createElement('p');
    courseTime.innerText = new Date(course.date_time).getHours() + ":" + new Date(course.date_time).getMinutes() + "hs";
    courseTime.classList.add('courseCardTime');
    link.append(courseTime);

    //
    // let courseTeacher = document.createElement('p');
    // courseTeacher.innerText = teacher;
    // courseTeacher.classList.add('courseCardTeacher');
    // li.append(courseTeacher);


    let durationSpan = document.createElement('p');
    durationSpan.innerText = course.duration_mins + " mins";
    durationSpan.classList.add('courseCardDuration');
    link.append(durationSpan);

    return li;
}
