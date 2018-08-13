window.document.onload = welcome();
document.getElementById("home").addEventListener("click", home);
function home(){
    location.reload('app');
}
function welcome(){
    var x= '<div class= "row justify-content-center"> <div class="col">';
    x += '<div class="jumbotron jumbotron-fluid">';
    x += '<div class="container">';
    x += '<h1 class="display-4">Welcome to HomeBrew!</h1>';
    x += '<p class="lead">A place to share and discover new ways to enjoy coffee.</p>';
    x += '<ul><li><a id="find" class="btn btn-secondary" href="#"> Find Coffee! </a></li>';
    x += '<li><a id="partner" class="btn btn-secondary" href="#"> Be a Partner! </a></li>';
    x += '<li><a id="signUp" class="btn btn-secondary" href="#"> Sign Up! </a></li></ul>';
    x += ' </div> </div> </div> </div>';
    document.getElementById('app').innerHTML = x;
}

document.getElementById("find").addEventListener("click", find);
function find(){
    var x= '<h1>Partner Listings go here</h1>';
    x += '';
    document.getElementById('app').innerHTML = x;
}
document.getElementById("partner").addEventListener("click", partner);
function partner(){
    var x ='<h1> Parter signup goes here</h1>'
    x+= ''
    document.getElementById('app').innerHTML = x;
}
document.getElementById("signUp").addEventListener("click", signUp);
function signUp(){
    var x ='<h1> Customer signup goes here</h1>';
    x+= '';
    document.getElementById('app').innerHTML = x;
}
  
    
   
 
