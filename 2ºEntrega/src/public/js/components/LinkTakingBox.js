export default function LinkTakingBox(info){

    let box = document.createElement('div');
    box.classList.add('box');

    let link = document.createElement('a');
    link.href = info;
    link.innerText = info;

    box.appendChild(link);

    let btnCopy = document.createElement('button');
    btnCopy.innerText = "Copiar";
    btnCopy.classList.add('btn-copy', 'btn', 'btn-sm', 'btn-blue');

    let copiedMsg = document.createElement('span');
    copiedMsg.innerText = "Copiado!";
    copiedMsg.classList.add('d-none');
    copiedMsg.classList.add('copied-msg');

    btnCopy.addEventListener('click', function(){

        copyStringToClipboard(link);

        copiedMsg.classList.toggle('d-none');
        setTimeout(function(){
            copiedMsg.classList.toggle('d-none');
            setTimeout(function(){
                box.classList.add('d-none');
            }, 650)

        }, 1500);
    });

    let btnClose = document.createElement('button');
    btnClose.innerText = "X";
    btnClose.addEventListener('click', function () {
        box.classList.add('d-none');
    })
    btnClose.classList.add('close-btn', 'float-right');

    box.appendChild(btnCopy);
    box.appendChild(copiedMsg);
    box.appendChild(btnClose);

    return box;
}


function copyStringToClipboard (str) {
    // Create new element
    var el = document.createElement('textarea');
    // Set value (string to be copied)
    el.value = str;
    // Set non-editable to avoid focus and move outside of view
    el.setAttribute('readonly', '');
    el.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(el);
    // Select text inside element
    el.select();
    // Copy text to clipboard
    document.execCommand('copy');
    // Remove temporary element
    document.body.removeChild(el);
}
