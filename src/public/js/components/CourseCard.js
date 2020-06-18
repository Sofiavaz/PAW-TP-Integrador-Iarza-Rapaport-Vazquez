export default function CourseCard(id, title, short_descr, price, duration, user_id) {

    let li = document.createElement('li');

    let courseTitle = document.createElement('h4');
    courseTitle.innerText = title;
    li.append(courseTitle);

    let priceSpan = document.createElement('span');
    priceSpan.innerText = price;
    li.append(priceSpan);

    let durationSpan = document.createElement('p');
    durationSpan.innerText = duration;
    li.append(durationSpan);

    let info = document.createElement('p');
    info.innerText = short_descr;
    li.append(info);

    let button = document.createElement('a');
    button.href = "/courses/" + id;
    button.innerText = "Más info";
    li.append(button);
    return style(li);
}

function style(li){
    return li;
}


