<?php
include "connection.php";
session_start();


if(isset($_SESSION['User'])){?>
    <script type="text/JavaScript">
        window.onload = function() {
            document.getElementById("Lbutton").style.display = "none";
        document.getElementById("welcome").style.display = "inline";
        document.getElementById("Lgbutton").style.margin = "0px 10px 0px -130px";
        }

        function logout(){
            var choice = confirm("Do you really want to logout?");
            if(choice == true){
                window.location = "logout.php"
            } else {
                event.preventDefault();
            }
        }
    </script>
<?php } else{?>
    <script type="text/JavaScript">
        window.onload = function() {
        document.getElementById("Lgbutton").style.display = "none";
        }
    </script>
 <?php } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="font.css">
    <title>Weather Update</title>

    <script>
        const apikey="3b6a7c16eaab6e17c562a1be542f6f6f";

        window.addEventListener("load",()=>{
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition((position)=>{
                    let lon= position.coords.longitude;
                    let lat= position.coords.latitude;
                    const url= `http://api.openweathermap.org/data/2.5/weather?lat=${lat}&` + `lon=${lon}&appid=${apikey}`;
                    

                    fetch(url).then((res)=>{
                        return res.json();
                    }).then((data)=>{
                        console.log(data);
                        console.log(new Date().getTime())
                        var dat= new Date(data.dt)
                        console.log(dat.toLocaleString(undefined,'Asia/Kolkata'))
                        console.log(new Date().getMinutes())
                        weatherReport(data);
                    })
                })
            }
        })

        function weatherReport(data){

            var urlcast= `http://api.openweathermap.org/data/2.5/forecast?q=${data.name}&` + `appid=${apikey}`;

            fetch(urlcast).then((res)=>{
                return res.json();
            }).then((forecast)=>{
                var city = document.getElementById("city");
                console.log(forecast.city);
                hourForecast(forecast);
                
              

                console.log(Math.floor(data.main.temp-273));
                document.getElementById("temperature").innerText= Math.floor(data.main.temp-273)+ '°C';

                document.getElementById("clouds").innerText= data.weather[0].description;
                console.log(data.weather[0].description)

                document.getElementById("main").innerText= data.weather[0].main;
                console.log(data.weather[0].main)
                
                let icon1= data.weather[0].icon;
                let iconurl= "http://openweathermap.org/img/wn/"+ icon1 +"@2x.png";
                document.getElementById("img").src=iconurl
            })

        }

        function hourForecast(forecast){
                
                document.querySelector('.templist').innerHTML=''
                for (let i = 0; i < 5; i++) {

                    var date= new Date(forecast.list[i].dt*1000)
                    console.log((date.toLocaleTimeString(undefined,'Asia/Kolkata')).replace(':00',''))

                    let hourR=document.createElement('div');
                    hourR.setAttribute('class','next');

                    let div= document.createElement('div');
                    let time= document.createElement('p');
                    time.setAttribute('class','time')
                    time.innerText= (date.toLocaleTimeString(undefined,'Asia/Kolkata')).replace(':00','');
                    
                    let Newimg= document.createElement('img');
                    let imgsrc = forecast.list[i].weather[0].icon;
                    Newimg.src= "http://openweathermap.org/img/wn/"+ imgsrc +"@2x.png";

                    let desc= document.createElement('p');
                    desc.setAttribute('class','desc')
                    desc.innerText= forecast.list[i].weather[0].main;

                    let temp= document.createElement('p');
                    temp.innerText= Math.floor((forecast.list[i].main.temp_max - 273))+ ' °C';

                    div.appendChild(time)
                    div.appendChild(Newimg)
                    div.appendChild(desc).style.color = "#763435"
                    div.appendChild(temp)
                    
                    hourR.appendChild(div);
                    document.querySelector('.templist').appendChild(hourR);
                }
          
        }
    </script>

</head>
<body>
    <!-- START OF HEADER -->
    <div class="filler">
        <div class="topnav">
        <ul class="topnav-links">
            <li><a href="StudentGov.php">STUDENT GOVERNMENT</a></li>
            <li><a href="Organizations.php">ORGANIZATIONS</a></li>
            <li><a href="Faculty.php">FACULTY</a></li>
            <li><a href="Gallery.php">GALLERY</a></li>
            <li><a href="Weather.php">WEATHER ADVISORY</a></li>
        </ul>
    </div>
    </div>
    <div class="header">
        <div class="header-content">
            <div class="page-logo">
                <a href="Homepage.php"><img src="Images/Bulsulogo.png" alt="Logo"></a>
                <h3 class="autofit pull-left" style="margin-top: 10px !important;">
                    <span>ISO 9001:2015 CERTIFIED</span>
                    <a class="Logo-name" href="Homepage.php">
                        B<small>ULACAN</small>
                        S<small>TATE</small>
                        U<small>NIVERSITY</small>
                    </a>
                </h3>
            </div>
        </div>   
    </div>
    <div class="header-bottom">
        <div class="nav-bar">
                <ul class="Nav-Links">
                    <li><a href="Homepage.php">HOME</a></li>
                    <li><a href="Newspaper.php">NEWS PAPER</a></li>
                    <li><a href="CollegeNews.php">COLLEGE NEWS</a></li>
                    <li><a href="Events.php">EVENTS</a></li>
                    <li><a href="Contacts.php">CONTACTS</a></li>
                    <li><a href="Admin.php" class="Admin" id="edit">EDIT</a></li>
                </ul>
            </div>
            <div class="login-btn" id="welcomehold">
                <p class="Welcome" id="welcome">Welcome, Admin <?php echo $_SESSION['User'] ?></p>
                <a href="Login.php"><button id="Lbutton">Admin Login</button></a>
                <a href="logout.php"><button class="login-button" id="Lgbutton" onclick="logout()">Logout</button></a>
            </div>
            </div>
    <!-- END OF HEADER -->

        <main>
            <div class="weatherapp">
                <div class="dayforecast">
                    <div class="upperweather">
                    <div class="weatherannouncement">
                        <h1>School Closures and Delays</h1>
                        <h3>Weather - Related</h3>
                        <h3>Closures Delay</h3>
                    </div>
                    <div class="date">
                        <div class="weathertitle">
                            <p class="wtitle"><span>WEATHER</span> UPDATES</p>
                            <p class="weatherdate"><?php echo date('Y-m-d') ?></p>
                        </div>
                        <div class="temp-box">
                            
                            <div class="temp">
                                <p id="temperature">26°</p>
                                <h2 id="city">Malolos, Bulacan</h2>
                                <span id="clouds">Broken Clouds</span>
                            </div>
                            <div class="tempimg">
                                <img src="Images/Weather.png" alt="" id="img">
                                <p id="main">Sunny</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <h1><span>SCHOOL</span> DIRECTORIES</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
                    mollit anim id est laborum.</p>
                </div>
                <div class="hourlyforecast">
                    <div class="upperhour">
                    <p class="wtitle"><span>HOURLY</span> FORECAST</p>
                    <p>Malolos, Bulacan</p>
                    </div>
                    <div class="templist">
                        <div class="next">
                            <div>
                                <p class="time1" id="time">2pm</p>
                                <img src="Images/Weather.png" alt="" id="hourimg" class="hourimg">
                                <p id="temp">26°</p>
                            </div>
                            <div >
                                <p class="time2" id="time">3pm</p>
                                <img src="Images/Weather.png" alt="" id="hourimg" class="hourimg">
                                <p id="temp">26°</p>
                            </div>
                            <div>
                                <p class="time3" id="time">4pm</p>
                                <img src="Images/Weather.png" alt="" id="hourimg" class="hourimg">
                                <p id="temp">26°</p>
                            </div>
                            <div>
                                <p class="time4" id="time">5pm</p>
                                <img src="Images/Weather.png" alt="" id="hourimg" class="hourimg">
                                <p id="temp">26°</p>
                            </div>
                            <div>
                                <p class="time5" id="time">6pm</p>
                                <img src="Images/Weather.png" alt="" id="hourimg" class="hourimg">
                                <p id="temp">26°</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
        <div class="footer">
            <span>© 2017 Bulacan State University</span>
            <span>Maintained by System Analysis Development Group 1</span>
        </div>
    </footer>
</body>
</html>