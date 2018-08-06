const API_KEY= AIzaSyD36fANxC_S5fqSsgJpIFf0BcsFmGrPXrs;


function getData() {
    var endPoint = 'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=50.4016469,30.6269542&radius=500&keyword=%D0%B7%D0%B0%D0%BF%D1%80%D0%B0%D0%B2%D0%BA%D0%B0&key=AIzaSyD36fANxC_S5fqSsgJpIFf0BcsFmGrPXrs';
    var xhr = new XMLHttpRequest();
    xhr.open('GET', endPoint, true);
    xhr.onload = function() {
        if (this.status == 200) {
            var r = JSON.parse(this.response);
            var x = '';

            for (var i = 0, len = r.length; i < len; i++) {
            x += '<li>' + r[i].task + '<button class="btn btn-light" onclick="deleteTask(' + r[i].id + ')">Done!</button> </li> <br>' ;
            }

            document.getElementById('app').innerHTML = x;


        };
    };
    xhr.send();
}



