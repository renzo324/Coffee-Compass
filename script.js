const API_KEY= AIzaSyD36fANxC_S5fqSsgJpIFf0BcsFmGrPXrs;


function getData() {
    var endPoint = "functions.php?function=getUsers";
    var xhr = new XMLHttpRequest();
    xhr.open('GET', endPoint, true);
    xhr.onload = function() {
        if (this.status == 200) {
            var r = JSON.parse(this.response);
            var x = '';

            for (var i = 0, len = r.length; i < len; i++) {
            x +=  ;
            }

            document.getElementById('app').innerHTML = x;


        };
    };
    xhr.send();
}



