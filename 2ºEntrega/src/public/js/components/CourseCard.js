export default function CourseCard(course) {

    let li = document.createElement('li');
    let link = document.createElement('a');
    link.href = "/courses/" + course.id;
    li.appendChild(link);
    li.classList.add('course-card', 'w3-animate-top');

    let imgSection = document.createElement('div');
    imgSection.classList.add('course-card-img-section');
    let infoSection = document.createElement('div');
    infoSection.classList.add('course-card-info-section');

    let courseImg = document.createElement('img');
    courseImg.src = '/uploads/' + course.img_path;
    courseImg.classList.add('course-card-img');
    // link.append(courseImg);
    imgSection.appendChild(courseImg);
    link.append(imgSection);

    link.appendChild(infoSection);

    let courseTitle = document.createElement('h4');
    courseTitle.innerText = course.name;
    courseTitle.classList.add('course-card-title');
    // link.append(courseTitle);
    infoSection.appendChild(courseTitle);

    let courseDate = document.createElement('p');
    courseDate.innerText = new Date(course.date_time).toLocaleDateString();
    courseDate.classList.add('course-card-date');
    // link.append(courseDate);
    infoSection.appendChild(courseDate);

    let price = document.createElement('p');
    price.innerText = "$" + course.price;
    price.classList.add('course-card-price', 'text-success');
    // link.append(price);
    infoSection.appendChild(price);

    let courseTime = document.createElement('p');
    courseTime.innerText = new Date(course.date_time).getHours() + ":" + new Date(course.date_time).getMinutes() + "hs";
    courseTime.classList.add('course-card-time');
    // link.append(courseTime);
    infoSection.appendChild(courseTime);
    //
    // let courseTeacher = document.createElement('p');
    // courseTeacher.innerText = teacher;
    // courseTeacher.classList.add('courseCardTeacher');
    // li.append(courseTeacher);


    let durationSpan = document.createElement('p');
    durationSpan.innerText = course.duration_mins + " mins";
    durationSpan.classList.add('course-card-duration');
    // link.append(durationSpan);
    infoSection.appendChild(durationSpan);

    return li;
}
