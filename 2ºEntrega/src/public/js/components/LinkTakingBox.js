export default function LinkTakingBox(info){

    let box = document.createElement('div');
    box.classList.add('box');

    let link = document.createElement('a');
    link.href = info;
    link.innerText = info;

    box.appendChild(link);

    return box;
}
