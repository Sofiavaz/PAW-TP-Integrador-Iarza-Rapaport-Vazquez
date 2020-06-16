document.addEventListener("DOMContentLoaded", function(){
    var xhttp = new XMLHttpRequest();

    let selectPlatform = document.getElementById('platform_name');

    function addOption(e) {
        let option = document.createElement('option');
        option.value = e.name;
        option.innerText = e.name;

        selectPlatform.append(option);
    }

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            data.forEach(function(e) {
                addOption(e);
            });
        }
    };

    xhttp.open("GET", '/api/platforms/all', true);
    xhttp.send();
});
