export default function CourseCard(course) {

    loadJsonLd(course);

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
    imgSection.appendChild(courseImg);
    link.append(imgSection);

    link.appendChild(infoSection);

    let courseTitle = document.createElement('h4');
    courseTitle.innerText = course.name;
    courseTitle.classList.add('course-card-title');
    infoSection.appendChild(courseTitle);

    let courseDate = document.createElement('p');
    courseDate.innerText = new Date(course.date_time).toLocaleDateString();
    courseDate.classList.add('course-card-date');
    infoSection.appendChild(courseDate);

    let price = document.createElement('p');
    price.innerText = "$" + course.price;
    price.classList.add('course-card-price', 'text-success');
    infoSection.appendChild(price);

    let courseTime = document.createElement('p');
    courseTime.innerText = new Date(course.date_time).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) + "hs";
    courseTime.classList.add('course-card-time');
    infoSection.appendChild(courseTime);

    let durationSpan = document.createElement('p');
    durationSpan.innerText = course.duration_mins + " mins";
    durationSpan.classList.add('course-card-duration');
    infoSection.appendChild(durationSpan);

    return li;
}

function loadJsonLd(course) {

    let startDate = new Date(Date.parse(course.date_time));
    let endDate = (new Date(Date.parse(course.date_time) + course.duration_mins * 60000));

    let data = {
        "@context": "http://schema.org/",
        "@type": "Course",
        "name": course.name,
        "description": "https://www.dashcourse.com/courses/" + course.short_description,
        "hasCourseInstance":
        {
            "@type": "CourseInstance",
            "name": course.name,
            "description": course.long_description,
            "image": course.img_path,
            "courseMode": [
                "distance learning",
                "Online"
            ],
            "location": {
                "@type": "VirtualLocation",
                "url": "https://www.dashcourse.com/courses/" + course.id
            },
            "offers": {
                "@type": "Offer",
                "price": course.price,
                "priceCurrency": "ARS",
                "availability": course.free_spots,
                "url": "https://www.dashcourse.com/enrollments/" + course.id
            },
            "startDate": startDate,
            "endDate": endDate,
            "instructor": {
                "@type": "Person",
                "jobTitle": "Instructor en Dashboard.com",
                "name": course.teacher_name,
                "email": course.teacher_email
            },
            "eventAttendanceMode" : "online",
            "eventStatus" : "EventScheduled"
        }
    };

    let script = document.createElement('script');
    script.type = "application/ld+json";
    script.innerHTML = JSON.stringify(data);
    document.getElementsByTagName('head')[0].appendChild(script);
}
