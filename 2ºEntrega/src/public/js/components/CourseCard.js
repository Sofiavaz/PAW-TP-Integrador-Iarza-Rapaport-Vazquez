export default function CourseCard(course) {

    let li = document.createElement('li');
    let link = document.createElement('a');
    link.href = "/courses/" + course.id;
    li.appendChild(link);
    li.classList.add('course-card', 'w3-animate-top');

    let courseImg = document.createElement('img');
    courseImg.src = '/uploads/' + course.img_path;
    courseImg.classList.add('course-card-img');
    link.append(courseImg);

    let courseTitle = document.createElement('h4');
    courseTitle.innerText = course.name;
    courseTitle.classList.add('course-card-title');
    link.append(courseTitle);

    let courseDate = document.createElement('p');
    courseDate.innerText = new Date(course.date_time).toLocaleDateString();
    courseDate.classList.add('course-card-date');
    link.append(courseDate);

    let price = document.createElement('p');
    price.innerText = "$" + course.price;
    price.classList.add('course-card-price', 'text-success');
    link.append(price);

    let courseTime = document.createElement('p');
    courseTime.innerText = new Date(course.date_time).getHours() + ":" + new Date(course.date_time).getMinutes() + "hs";
    courseTime.classList.add('course-card-time');
    link.append(courseTime);

    //
    // let courseTeacher = document.createElement('p');
    // courseTeacher.innerText = teacher;
    // courseTeacher.classList.add('courseCardTeacher');
    // li.append(courseTeacher);


    let durationSpan = document.createElement('p');
    durationSpan.innerText = course.duration_mins + " mins";
    durationSpan.classList.add('course-card-duration');
    link.append(durationSpan);

    return li;
}
