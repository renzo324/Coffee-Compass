window.document.onload = welcome();
document.getElementById("home").addEventListener("click", home);
function home(){
    location.reload('app');
}
function welcome(){
    var x= '<div class= "row justify-content-center"> <div class="col p-0">';
    x += '<div class="jumbotron jumbotron-fluid">';
    x += '<div class="container" id="landing">';
    x += '<h1 class="display-4">Compass Logo goes here!</h1>';
    x += '<p class="lead">A place to share and discover new ways to enjoy coffee.</p><ul>';
    x += '<li><a id="find" class="btn btn-secondary myNav" href="#"> Find Coffee! </a></li>';
    x += '<li><a id="login" class="btn btn-secondary myNav" href="#">  Login  </a></li>';
    x += '<li><a id="signUp" class="btn btn-secondary myNav" href="#"> Sign Up! </a></li>';
    x += '</ul> </div> </div> </div> </div>';
    document.getElementById('app').innerHTML = x;
}

document.getElementById("find").addEventListener("click", find);
function find(){
    var x= '<h1>Partner Listings go here</h1>';
    x += '';
    document.getElementById('app').innerHTML = x;
}
document.getElementById("login").addEventListener("click", login);
function login(){
    var x ='<h1> Login form goes here</h1>';
    x+= '';
    document.getElementById('app').innerHTML = x;
    var endPoint = "functions.php?function=loginUser";
    var xhr = new XMLHttpRequest();
    xhr.open('GET', endPoint, true);
    xhr.onload = function(){
        console.log('add the login form here');
    }
}
document.getElementById("signUp").addEventListener("click", signUp);
function signUp(){
    var x ='<h1> Customer signup goes here</h1>';
    x+= '';
    document.getElementById('app').innerHTML = x;
}
  
    
   
 // XHR request

function getData() {
    var endPoint = "functions.php?function=getData";
    var xhr = new XMLHttpRequest();
    xhr.open('GET', endPoint, true);
    xhr.onload = function() {
        if (this.status == 200) {
            var r = JSON.parse(this.response);
            var x = '';

            for (var i = 0, len = r.length; i < len; i++) {
            x += '<li>' + r[i].task + '<button class="btn btn-light" onclick="deleteTask(' + r[i].id + ')">Done!</button> </li> <br>' ;
            }

            document.getElementById('todo').innerHTML = x;


        };
    };
    xhr.send();
}
