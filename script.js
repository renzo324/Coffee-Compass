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
    var x ='<!-- Comment of the day --> ';
    x+= '<div class="container">';
    x+= '<div class="main-div">';
    x+= '<div class="panel">';
    x+= '<h2>Admin Login</h2>';
    x+= '<p>Please enter your email and password</p>';
    x+= '</div>';
    x+= '<form id="Login">';
    x+= '<div class="form-group"><input type="email" class="form-control" id="inputEmail" placeholder="Email Address"></div>';
    x+= '<div class="form-group"><input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>';
    x+= '<div class="forgot"><a href="reset.html">Forgot password?</a></div>';
    x+= '<button type="submit" class="btn btn-primary">Login</button>';
    x+= '</form>';
    x+= '</div> </div>';
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
    x+= '<div class="span3 well">';
    x+= '<h1>New to <a href="#" id="appName">Compass</a>? Sign up!</h1';
    x+= '<form accept-charset="UTF-8" action="" method="post">';
    x+= '<input class="span3" name="name" placeholder="Full Name" type="text">';
    x+= '<input class="span3" name="username" placeholder="Username" type="text">';
    x+= '<input class="span3" name="password" placeholder="Password" type="password"> ';
    x+= '<button class="btn btn-warning" type="submit">Sign up for WebApp</button>';
    x+= '</form>';
    x+= '</div>';
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
