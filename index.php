<?php

  
$servername = "localhost";
$username = "root";
$password = "";
$datbase = "hostel";

$conn = mysqli_connect($servername , $username , $password , $datbase);


//   $query="SELECT name FROM hostelname WHERE h_id='$result[hostel_name]'";
// 	     $data=mysqli_query($con,$query);
// 	    $Res=mysqli_fetch_array($data);
// 	    $hostel=$Res['name'];

if(!$conn)
{
die("soooo".mysqli_connect_error());
}
else
{
#echo "connnection <br>" ;
}
$sql = "select hostel_name from boys_details where hostel_name != 'NULL'";
$result = mysqli_query($conn,$sql);
$num =500 - mysqli_num_rows($result);
#echo $num;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>HOSTEL CSJMU</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Hanalei&family=Marck+Script&display=swap" rel="stylesheet">


</head>
<body>





<div class="nav1">

     <div class="row  navbar navbar-expand-lg  navbar-light ">
     
     <img src="https://media.9curry.com/uploads/organization/image/736/kanpur-university.png" width="70" height="70" />
     <span style=" color: black;flex:; margin-right:30px;align-self: center;">Chhatrapati Shahuji Maharaj University</span>
    
     <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                  <span class="nav-item dropdown">
      							<a  style=" color:black; background-color:rgba(0, 61, 114, 0.568)" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      				 			Login
      							</a>
      							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      					 	 		<a style=" color:black;background-color:rgba(0, 61, 114, 0.568)" class="dropdown-item" href="Student login/login.php">Student</a>
      					  			<a style="color:black; background-color:rgba(0, 61, 114, 0.568)" class="dropdown-item" href="admin/adminlogin.php">Admin</a>
      							</div>
                  </span>
                
                  <span   class="nav-item active">
                        <a  style=" color:black; background-color:rgba(0, 61, 114, 0.568);" class="nav-link" href="About.php">ABOUT US</a>
                  </span>
                  <span class="nav-item">
                        <a style="color:black;  background-color:rgba(0, 61, 114, 0.568);"class="nav-link" href="#gallery">GALLERY</a>
                  </span>
                  <span  class="nav-item">
                        <a  style="color:black;  background-color:rgba(0, 61, 114, 0.568);" class="nav-link" href="#">CONTACT</a>
                  </span>
              </div>   
       </div>
</div> 



<div  id="carouselExampleControls" class="carousel slide slide1" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="http://csjmu.ac.in/wp-content/themes/csjmutheme/imgs-copyrighted/imgs/slider-3.jpeg" height="700px" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="	http://csjmu.ac.in/wp-content/themes/csjmutheme/imgs-copyrighted/imgs/slider-1.jpeg" height="700px" alt="Second slide">
              </div>
              <!-- <div class="carousel-item">
                <img class="d-block w-100" src="" alt="Third slide">
              </div> -->
            </div>
            <a class="carousel-control-prev  arrow" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="next carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next  arrow" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="next carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


<!--Hostel-->
<!-- <section>
    <div class="container" id = "about">
        <section id="counts" class="counts section-bg">
          <div class="container">
    
            <div class="row counters">
    
              <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="600" data-purecounter-duration="1" class="purecounter"></span>
                <p>Boys Seats</p>
              </div>
    
              <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="514" data-purecounter-duration="1" class="purecounter"></span>
                <p>Girls Seats</p>
              </div>
    
              <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hostels</p>
              </div>
    
              <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="1114" data-purecounter-duration="1" class="purecounter"></span>
                <p>Total Seats</p>
              </div>
    
            </div>
    
          </div>
        </section> -->
    </div>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
</section>



<section class = "current">
  <center>
  <h1>Current Status</h1>
  </center>
  <!-- <div class="row">
  <div class="col-6" style = "font-family: 'Roboto Condensed', sans-serif; font-size: 30px;"> &nbsp &nbsp &nbsp Boys  </div>
  <div class="col-6" style = "font-family: 'Roboto Condensed', sans-serif; font-size: 30px;"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Girls  </div>
</div> -->
<div class="container">
  <div class="row">
    <div class="col">Boys Hostel</div>
    <div class="col">Total Seats:   600</div>
    <div class="col" style = "color: red;">Available Seats:  <?php echo $num ?> </div>
    <div class="w-100"></div>
    <div class="col">Girls Hostel</div>
    <div class="col">Total Seats: 512</div>
    <div class="col" style = "color: red;">Available Seats: 512</div>
  </div>
</div>
</section>

<!--Hostels details-->


<div class="jumbotron " style="background-color: rgba(255, 255, 255, 0);">
        <div class="container">
          <div class="row " >
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch box">
              <div >
               
                <div >
                    <br>
                  <h4>Ganga Girls Hostel</h4>
                  <span>Capacity: 72 Seats</span>
                  <ceter>
                  <div class="row">
                  <div class="col-md-12">  <p>
                      <b>A Block-2</b>
                      <br>Seater Room<br>
                      G<sup>nd</sup> Floor - 18<br>
                      1<sup>st</sup> Floor - 18<br>
                     </p>
                 </div>
                  </div></ceter>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch box">
              <div >
           
                <div >
                  <br>
                  <h4>Triveni Girls Hostel</h4>
                  <span>Capacity: 108 Seats</span>
                  <ceter>
                  <div class="row">
                  <div class="col-md-12">  <p>
                      <b>A Block-2</b>
                      <br>Seater Room<br>
                      G<sup>nd</sup> Floor - 27<br>
                      1<sup>st</sup> Floor - 27<br>
                   
                     </p>
                 </div>
                  </div></ceter>
            
            
                </div>
              </div>
              
              
            </div>
  
             <div class="col-lg-3 col-md-6 d-flex align-items-stretch box">
              <div >         
                <div >
                    <br>
                  <h4>Saraswati Girls Hostel</h4>
                  <span>Capacity: 218 Seats</span>
                  <ceter>
                  <div class="row">
                  <div class="col-md-12">  <p>
                      <b>A Block-2</b>
                      <br>Seater Room<br>
                      G<sup>nd</sup> Floor - 37<br>
                      1<sup>st</sup> Floor - 36<br>
                      2<sup>nd</sup> Floor - 36<br>
                     </p>
                 </div>
                  </div></ceter>
                </div>
              </div>
            </div>
  
              
          </div>


          <div class="row "  >

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch box">
              <div >
                <div >
                    <br>
                  <h4>Kaveri Girls Hostel</h4>
                  <span>Capacity: 116 Seats</span>
                  <ceter>
                  <div class="row">
                  <div class="col-md-12">  <p>
                      <b>A Block-2</b>
                      <br>Seater Room<br>
                      G<sup>nd</sup> Floor - 14<br>
                      1<sup>st</sup> Floor - 22<br>
                      2<sup>nd</sup> Floor - 22<br>
                     </p>
                 </div>
                  </div></ceter>           
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch box" >
              <div >
               
                <div >
                    <br>
                  <h4>Shiva Ji Boys Hostel 1</h4>
                  <span>Capacity: 400 Seats</span>
                  <ceter>
                  <div class="row">
                  <div class="col-md-12">  <p>
                      <b>A Block-2</b>
                      <br>Seater Room<br>
                      G<sup>nd</sup> Floor - 18<br>
                      1<sup>st</sup> Floor - 18<br>
                     </p>
                 </div>
                  </div></ceter>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch box">
              <div >
               
                <div >
                    <br>
                  <h4>Swarn Jayanti Boys Hostel</h4>
                  <span>Capacity: 200  Seats</span>
                  <ceter>
                  <div class="row">
                  <div class="col-md-12">  <p>
                      <b>A Block-2</b>
                      <br>Seater Room<br>
                      G<sup>nd</sup> Floor - 18<br>
                      1<sup>st</sup> Floor - 18<br>
                     </p>
                 </div>
                  </div></ceter>
                </div>
              </div>
            </div>

            </div>
        </div>
    </div>



   

<!--Gallery-->
<section>
    <div class="section-title" id = "gallery">
       
        <h3 class="text-center font-weight-bold " style="color:rgb(34, 48, 34);">Gallery</h3>   
    </div>

    <div class="container my-4">

        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
    
         
          <!--Slides-->
          <div class="carousel-inner" role="listbox">
    
            <!--First slide-->
            <div class="carousel-item active">
    
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                    <img class="card-img-top" src="https://th.bing.com/th/id/R.c409fef9cb42e445668a4f5d0c7b01a5?rik=c8LlxQwx9Y304Q&riu=http%3a%2f%2fuietkanpur.com%2fhostel%2fGanga.jpg&ehk=cHQ%2fYZNE3GPE68pS5lIn4JBjKJ4MP96dX%2bunQ1UHCzo%3d&risl=&pid=ImgRaw&r=0"
                      alt="Card image cap">
                   
                  </div>
                </div>
    
                <div class="col-md-4 clearfix d-none d-md-block">
                  <div class="card mb-2">
                    <img class="card-img-top" src=""
                      alt="Card image cap">
                   
                  </div>
                </div>
    
                <div class="col-md-4 clearfix d-none d-md-block">
                  <div class="card mb-2">
                    <img class="card-img-top" src="gandhi.png"
                      alt="Card image cap">
                   
                  </div>
                </div>
              </div>
    
            </div>
            <!--/.First slide-->
    
            <!--Second slide-->
            <div class="carousel-item">
    
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                    <img class="card-img-top" src=""
                      alt="Card image cap">
                  
                  </div>
                </div>
    
                <div class="col-md-4 clearfix d-none d-md-block">
                  <div class="card mb-2">
                    <img class="card-img-top" src=""
                      alt="Card image cap">
                  
                  </div>
                </div>
    
                <div class="col-md-4 clearfix d-none d-md-block">
                  <div class="card mb-2">
                    <img class="card-img-top" src=""
                      alt="Card image cap">
                   
                  </div>
                </div>
              </div>
    
            </div>
            <!--/.Second slide-->
    
            <!--Third slide-->
            <div class="carousel-item">
    
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                    <img class="card-img-top" src=""
                      alt="Card image cap">
                 
                  </div>
                </div>
    
                <div class="col-md-4 clearfix d-none d-md-block">
                  <div class="card mb-2">
                    <img class="card-img-top" src=""
                      alt="Card image cap">
                    
                  </div>
                </div>
    
                <div class="col-md-4 clearfix d-none d-md-block">
                  <div class="card mb-2">
                    <img class="card-img-top" src=""
                      alt="Card image cap">
                   
                  </div>
                </div>
              </div>
    
            </div>
            <!--/.Third slide-->
    
          </div>
          <!--/.Slides-->
    
        </div>
        <!--/.Carousel Wrapper-->
    
      </div>

      </section>
<br>
<br>
<br>
   

<!--footer-->
<footer>
    <section id="footer">  
        <div class="container">  
        <div class="row text-center text-xs-center text-sm-left text-md-left">  
        <div class="col-xs-12 col-sm-4 col-md-6">      
          <H5>
            Chhatrapati Shahu Ji Maharaj University
            Kalyanpur, Kanpur
            Uttar Pradesh, India-208024
          </H5>  
        <h6>
            E-mail: csjmu[at]kanpuruniversity[dot]org
        </h6>
        </div>  
                  <div class="col-xs-12 col-sm-4 col-md-6">  
            <h5> Quick links </h5>  
            <ul class="list-unstyled quick-links">  
            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Home </a> </li>  
            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> About </a> </li>  
            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> FAQ </a> </li>  
            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Our Services </a> </li>  
            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Expert Team </a> </li>  
            </ul>  
            </div>  
              
            </div>  
           <br>
           <br>
           <br>  
            <hr>  
            </div>      
            <div class="row">  
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">  
           <p class="h6"> All right Reversed. <a class="text-green ml-2" href="#" target="_blank">  Notice : Only csjmu.ac.in and kanpuruniversity.org are our official websites. All other websites are fake( e,g. Csjmu.co.in)
If website seems slow to load, please clear your browser cookies and refresh page. </a> </p>  
            </div>  
            <hr>  
            </div>      
            </div>  
            </section>    
</footer>

<script>
    !function(e){var t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(r,a,function(t){return e[t]}.bind(null,a));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=2)}([,,function(e,t,n){e.exports=n(3)},function(e,t,n){"use strict";function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}n.r(t);new(function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.registerEventListeners()}var t,n,a;return t=e,(n=[{key:"registerEventListeners",value:function(){var e=this,t=document.querySelectorAll(".purecounter");if(this.intersectionListenerSupported())for(var n=new IntersectionObserver(this.animateElements.bind(this),{root:null,rootMargin:"20px",threshold:.5}),r=0;r<t.length;r++)n.observe(t[r]);else window.addEventListener&&(this.animateLegacy(t),window.addEventListener("scroll",function(n){e.animateLegacy(t)},{passive:!0}))}},{key:"animateLegacy",value:function(e){for(var t=0;t<e.length;t++){!0===this.parseConfig(e[t]).legacy&&this.elementIsInView(e[t])&&this.animateElements([e[t]])}}},{key:"animateElements",value:function(e,t){var n=this;e.forEach(function(e){var r=void 0!==e.target?n.parseConfig(e.target):n.parseConfig(e);return r.duration<=0?e.innerHTML=r.end.toFixed(r.decimals):!t&&!n.elementIsInView(e)||t&&e.intersectionRatio<.5?e.target.innerHTML=r.start>r.end?r.end:r.start:void setTimeout(function(){return void 0!==e.target?n.startCounter(e.target,r):n.startCounter(e,r)},r.delay)})}},{key:"startCounter",value:function(e,t){var n=this,r=(t.end-t.start)/(t.duration/t.delay),a="inc";t.start>t.end&&(a="dec",r*=-1),r<1&&t.decimals<=0&&(r=1);var i=t.decimals<=0?parseInt(t.start):parseFloat(t.start).toFixed(t.decimals);e.innerHTML=i,!0===t.once&&e.setAttribute("data-purecounter-duration",0);var o=setInterval(function(){var s=n.nextNumber(i,r,t,a);e.innerHTML=n.formatNumber(s,t),((i=s)>=t.end&&"inc"==a||i<=t.end&&"dec"==a)&&(clearInterval(o),i!=t.end&&(e.innerHTML=t.decimals<=0?parseInt(t.end):parseFloat(t.end).toFixed(t.decimals)))},t.delay)}},{key:"parseConfig",value:function(e){for(var t=[].filter.call(e.attributes,function(e){return/^data-purecounter-/.test(e.name)}),n={start:0,end:9001,duration:2e3,delay:10,once:!0,decimals:0,legacy:!0},r=0;r<t.length;r++){var a=t[r].name.replace("data-purecounter-","");n[a.toLowerCase()]="duration"==a.toLowerCase()?parseInt(1e3*this.castDataType(t[r].value)):this.castDataType(t[r].value)}return n}},{key:"nextNumber",value:function(e,t,n,r){return r||(r="inc"),"inc"===r?n.decimals<=0?parseInt(e)+parseInt(t):parseFloat(e)+parseFloat(t):n.decimals<=0?parseInt(e)-parseInt(t):parseFloat(e)-parseFloat(t)}},{key:"formatNumber",value:function(e,t){return t.decimals<=0?parseInt(e):e.toLocaleString(void 0,{minimumFractionDigits:t.decimals,maximumFractionDigits:t.decimals})}},{key:"castDataType",value:function(e){return/^[0-9]+\.[0-9]+$/.test(e)?parseFloat(e):/^[0-9]+$/.test(e)?parseInt(e):e}},{key:"elementIsInView",value:function(e){for(var t=e.offsetTop,n=e.offsetLeft,r=e.offsetWidth,a=e.offsetHeight;e.offsetParent;)t+=(e=e.offsetParent).offsetTop,n+=e.offsetLeft;return t>=window.pageYOffset&&n>=window.pageXOffset&&t+a<=window.pageYOffset+window.innerHeight&&n+r<=window.pageXOffset+window.innerWidth}},{key:"intersectionListenerSupported",value:function(){return"IntersectionObserver"in window&&"IntersectionObserverEntry"in window&&"intersectionRatio"in window.IntersectionObserverEntry.prototype}}])&&r(t.prototype,n),a&&r(t,a),e}())}]);
</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    

</body>
</html>