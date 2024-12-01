<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved</title>
    <link href="bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script 
    src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
     crossorigin="anonymous">
    </script>

    <style>
        .box {
            border: 1px solid black;
            padding: 4px;
            margin: 15px;
            border-radius: 25px;
        }
        .center {
            display: flex;
            justify-content: center;
        }
        img {
            border-radius: 90px;
            width: 200px;
            height: 200px;
        }
        h1, h2 {
            margin: 5px;
            font-size: 1.2em;
        }
        .profile-container {
            width: 75%;
            
            margin: auto;
        }
        .profile-info h1 {
            font-size: 1.5em;
            
        }
        span{
            margin: 15px;
        }
        .job-container {
            border: 1px solid black;
            padding: 2%;
            margin: 2%;
            border-radius: 15px;
        }
        .job-header {
            display: flex;
        }
        .job-header-left {
            width: 80%;
        }
        .job-header-right {
            width: 20%;
            text-align: right;
        }
        .job-header-right img {
            height: 110px;
            width: 110px;
            border-radius: 15px;
        }
        .job-footer {
            margin-left: 90%;
            background-color: white;
            color: black;
            border: none;
            cursor: pointer;
        }
        .job-footer:hover {
            color: blue;
        }
    </style>
</head>
<body>
<?php 
    require_once("layouts/navbar.php");
    ?>
    <div style="display: flex;">
        <div style="width: 25%; ">
            <div class="box">
                <div class="center">
                    <img src="images/profile.jpg" alt="Profile Image">
                </div>
                <h1 class="center" id="username"> <i>username</i> </h1>
                <h2 class="center" id="phone"> <i>phone</i></h2>
            </div>
            <div class="box">
                <div class="center">
                    <h1><i><a href="profile.html" style="color: black;">Profile</a></i></h1>
                </div>
            </div>
            <div class="box">
                <div class="center">
                    <h1><i><a href="savedjobs.html" style="color: black;">Saved Jobs</a></i></h1>
                </div>
            </div>
            <div class="box">
                <div class="center">
                    <h1><i><a href="help.html" style="color: black;">Help</a></i></h1>
                </div>
            </div>
            <div class="box">
                <div class="center">
                    <h1><i><a href="index.html" style="color: black;">Logout</a></i></h1>
                </div>
            </div>
        </div>
        <div style="width: 75%; ">
            <div class="companies-tata"></div>
            <script>

$.ajax({
    url:"get_response.php",
    type:"post",
    data:{"RES_TYPE":"SAVED_JOBS"},
    success:function(res){
        console.log(res);
      var jobj=JSON.parse(res);
        console.log(jobj);
        getSavedJobs(jobj);

        
    }

});

                

                function getSavedJobs(jobj)
                { 
                
                
                var tata = document.querySelector('.companies-tata');
                username.innerHTML = jobj.pinfo.username;
                phone.innerHTML = jobj.pinfo.phone;
            
                for (var i = 0; i < jobj.companies.length; i++) {
                    var container = document.createElement('div');
                    container.className = 'job-container';
            
                    var header = document.createElement('div');
                    header.className = 'job-header';
                    container.appendChild(header);
            
                    var headerLeft = document.createElement('div');
                    headerLeft.className = 'job-header-left';
                    header.appendChild(headerLeft);
            
                    var h4 = document.createElement('h4');
                    h4.textContent = jobj.companies[i].developer;
                    headerLeft.appendChild(h4);
            
                    var p1 = document.createElement('p');
                    p1.innerHTML = `<span style="font-weight: 400;">${jobj.companies[i].company} ⭐${jobj.companies[i].rating}</span>
                                    <span style="font-size: small; margin-left: 2%;">${jobj.companies[i].review} Reviews</span>`;
                    headerLeft.appendChild(p1);
            
                    var headerRight = document.createElement('div');
                    headerRight.className = 'job-header-right';
                    header.appendChild(headerRight);
            
                    var img = document.createElement('img');
                    img.src = jobj.companies[i].image;
                    img.alt = jobj.companies[i].company;
                    headerRight.appendChild(img);
            
                    var p2 = document.createElement('p');
                    p2.innerHTML = `<span><i class="fa-solid fa-briefcase"></i> ${jobj.companies[i].experience}</span>
                                    <span><i class="fa-solid fa-indian-rupee-sign"></i> ${jobj.companies[i].money}</span>
                                    <span><i class="fa-solid fa-location-dot"></i> ${jobj.companies[i].location}</span>`;
                    container.appendChild(p2);
            
                    var p3 = document.createElement('p');
                    p3.innerHTML = `<span><i class="fa-regular fa-file"></i> ${jobj.companies[i].work}</span>`;
                    container.appendChild(p3);
            
                    var p4 = document.createElement('p');
                    p4.innerHTML = `<span style="font-weight: 400;">${jobj.companies[i].skills}</span>`;
                    container.appendChild(p4);   
            
                    var footer = document.createElement('div');
                    footer.className = 'job-footer';
                    footer.innerHTML = '<i class="fa-regular fa-bookmark"></i> <span>Save</span>';
                    container.appendChild(footer);
            
                    tata.appendChild(container);
                }
            }
            </script>
            
           
        </div>
    </div>
</body>
</html>
