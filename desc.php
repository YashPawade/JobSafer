<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Description</title>
    <script 
    src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
     crossorigin="anonymous">
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    

    <style>
        span{
            margin: 15px;
        }
        .footerstyle {
            margin: 8px 0;
            text-decoration: none;
            color: black;
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
    border: none;
    
}

    </style>
</head>
<body>
<?php 
    require_once("layouts/navbar.php");
    ?>
    <div style="display: flex;">
        <div style="width: 25%;padding: 2%;">
            <h5><b>All Filters</b></h5>
            <hr>
            <h5>Experience <span id="expyrs">0</span>Year's</h5>
            <input id="exp" type="range" style="width: 100%;" min="0" max="25" step="1" value="0" onchange="valuesUpdated(this)" >
            <p>
                <label>0 Year's</label>
                <label style="margin-left:55%;">25 Year's</label>
            </p>
            <hr>
            <h5>Work Mode</h5>
            <p><input type="checkbox" name="workmode" value="Work from office" onchange="valuesUpdated(this)" style="margin-right: 5%;">Work from office</p>
            <p><input type="checkbox" name="workmode" value="Hybrid" onchange="valuesUpdated(this)" style="margin-right: 5%;">Hybrid</p>
            <p><input type="checkbox" name="workmode" value="Remote" onchange="valuesUpdated(this)" style="margin-right: 5%;">Remote</p>
           <hr>
            <h5>Salary</h5>
             <p><input type="checkbox" style="margin-right: 5%;" value="0-3" onchange="valuesUpdated(this)">0-3 lakhs</p>
             <p><input type="checkbox" style="margin-right: 5%;" value="3-6" onchange="valuesUpdated(this)">3-6 lakhs</p>
             <p><input type="checkbox" style="margin-right: 5%;" value="6-10" onchange="valuesUpdated(this)">6-10 lakhs</p>
             <p><input type="checkbox" style="margin-right: 5%;" value="10-15" onchange="valuesUpdated(this)">10-15 lakhs</p>

            <h6 style="color: cornflowerblue;">View More</h6>
            <hr>
            <h5>Location</h5>
            <select name="" id="loc" class="form-control" onchange=valuesUpdated(this)>
            <option value="all">All</option>
               
               </select>
           <hr>
           <h5>Department</h5>
           <select name="" id="depart" class="form-control" onchange="valuesUpdated(this)">
    <option value="all">All</option>
    <option value="it-&-information-security">IT & Information Security</option>
    <option value="ux,-design-&-architecture">UX, Design & Architecture</option>
    <option value="project-&-program-management">Project & Program Management</option>
    <option value="marketing-&-communication">Marketing & Communication</option>
    <option value="data-science-&-analytics">Data Science & Analytics</option>
</select>

           <hr>
           <h5>Posted by</h5>
           <select name="" id="post" class="form-control" onchange="valuesUpdated(this)">
    <option value="all">All</option>
    <option value="company-jobs">Company Jobs</option>
    <option value="consultant-jobs">Consultant Jobs</option>
</select>

            <hr>
            <h5>Industry</h5>
            <select name="" id="indus" class="form-control" onchange="valuesUpdated(this)">
    <option value="all">All</option>
    <option value="it-&-information-security">IT & Information Security</option>
    <option value="ux,-design-&-architecture">UX, Design & Architecture</option>
    <option value="project-&-program-management">Project & Program Management</option>
    <option value="marketing-&-communication">Marketing & Communication</option>
    <option value="data-science-&-analytics">Data Science & Analytics</option>
</select>

            <hr>
            <h5>Company type</h5>
            <select name="" id="ctype" class="form-control" onchange="valuesUpdated(this)">
    <option value="all">All</option>
    <option value="foreign-mnc">Foreign MNC</option>
    <option value="indian-mnc">Indian MNC</option>
    <option value="startup">Startup</option>
    <option value="corporate">Corporate</option>
</select>

            <hr>
            <h5>Duration</h5>
            <select name="" id="dur" class="form-control" onchange="valuesUpdated(this)">
    <option value="all">All</option>
    <option value="1-months">1 Month</option>
    <option value="2-months">2 Months</option>
    <option value="3-months">3 Months</option>
    <option value="4-months">4 Months</option>
    <option value="flexible">Flexible</option>
</select>

            <hr>
            <h5>Education</h5>
            <select name="" id="edu" class="form-control" onchange="valuesUpdated(this)">
    <option value="all">All</option>
    <option value="any-postgraduate">Any Postgraduate</option>
    <option value="m.tech">M.Tech</option>
    <option value="mca">MCA</option>
    <option value="post-graduation-not-required">Post Graduation Not Required</option>
    <option value="b.sc">B.Sc</option>
</select>

            <hr>
            <h5>Top companies</h5>
            <select name="" id="tc" class="form-control" onchange=valuesUpdated(this)>
            <option value="all">All</option>
             <option value="infosys">Infosys</option>
             <option value="qualcomm">Qualcomm</option>
             <option value="microsoft">Microsoft</option>
             <option value="tata-consultancy-services-(tcs)">Tata Consultancy Services (TCS)</option>
            <option value="intel">Intel</option>
            </select>
            <hr>

        
        </div>


        <div style="width: 75%; " ;>

            <div class="companies-tata"></div>
    
    <script>

var queryString=window.location.search;
        var params=new URLSearchParams(queryString);
        var id = params.get("id");
        var salary=[];
        var updatedValues={"loc":"all","tc":"all","salary":[],"exp":0};
        function valuesUpdated(element){
           
           if (element.type=="checkbox")
           {
            var index=salary.indexOf(element.value);
           if (index == -1)
           {
            salary.push(element.value)
           }
           else
           {
            salary.splice(index,1);
           }
           updatedValues["salary"]=salary;
           }
           else{
            updatedValues[element.id]=element.value;
           }
           expyrs.innerHTML=element.value;
            

            $.ajax({
    url:"get_response.php",
    type:"post",
    data:{"RES_TYPE":"CFILTER","DATA":updatedValues},
    success:function(res){
      
        console.log(res);   
    }
});
        }

            

 
        console.log(id)
        
       
     $.ajax({
    url:"get_response.php",

    type:"post",
    data:{"RES_TYPE":"DESC","ID":id},
    success:function(res){
    console.log(res);
      var jobj=JSON.parse(res);
      
        console.log(jobj);

        getCompaniesDesc(jobj.companies);
        createLocations(jobj.locations);

        
    }

});

function createLocations(locations){
    for (i=0;i<locations.length;i++) 
    {
        opt=document.createElement("option");
        opt.innerHTML=locations[i];
        opt.value=locations[i];
        loc.appendChild(opt);
    }   
}


function getCompaniesDesc(companies) {
    var tata = document.querySelector('.companies-tata');

    for (var i = 0; i < companies.length; i++) {
        var container = document.createElement('div');
        container.className = 'job-container';
       
        

        var header = document.createElement('div');
        header.className = 'job-header';
        container.appendChild(header);

        var headerLeft = document.createElement('div');
        headerLeft.className = 'job-header-left';
        header.appendChild(headerLeft);

        var h4 = document.createElement('h4');
        h4.textContent = companies[i].title;
        headerLeft.appendChild(h4);

        var p1 = document.createElement('p');
        p1.innerHTML = `<span style="font-weight: 400;">${companies[i].developer} ⭐${companies[i].rating}</span>
                        <span style="font-size: small; margin-left: 2%;">${companies[i].review} Reviews</span>`;
        headerLeft.appendChild(p1);

        var headerRight = document.createElement('div');
        headerRight.className = 'job-header-right';
        header.appendChild(headerRight);

        var img = document.createElement('img');
        img.src = "images/"+companies[i].image;
        img.alt = companies[i].company;
        headerRight.appendChild(img);

        var p2 = document.createElement('p');
        p2.innerHTML = `<span><i class="fa-solid fa-briefcase"></i> ${companies[i].experience}</span>
                        <span><i class="fa-solid fa-indian-rupee-sign"></i> ${companies[i].money}</span>
                        <span><i class="fa-solid fa-location-dot"></i> ${companies[i].location}</span>`;
        container.appendChild(p2);

        var p3 = document.createElement('p');
        p3.innerHTML = `<span><i class="fa-regular fa-file"></i> ${companies[i].work}</span>`;
        container.appendChild(p3);

        var p4 = document.createElement('p');
        p4.innerHTML = `<span style="font-weight: 65;">${companies[i].skills}</span>`;
        container.appendChild(p4);

        var btnDiv = document.createElement('div');
       
        btnDiv.style.justifyContent = 'flex-end';
        btnDiv.style.gap = '15px';  
        container.appendChild(btnDiv);

        var loginbtn = document.createElement("button");
            loginbtn.classList.add("btn", "btn-outline-primary");
            loginbtn.style.borderRadius = "25px";
            loginbtn.innerHTML = "View Info";
            container.id = companies[i].id;
            loginbtn.addEventListener("click", redirectToInfo.bind(null, companies[i].id));
            btnDiv.appendChild(loginbtn);

            var footer = document.createElement('button'); // Changed div to button for better accessibility
        footer.className = 'job-footer';
        footer.id = "p5_" + companies[i].id;
        footer.innerHTML = '<i class="fa-regular fa-bookmark"></i> <span>Save</span>';
        footer.addEventListener("click", saveCompany.bind(null, companies[i].id)); 
        btnDiv.appendChild(footer);

        tata.appendChild(container);
    }
}

function saveCompany(id) {

    <?php
     if (isset($_SESSION["login"]) && $_SESSION["login"] == true)
     {
        ?>

    var element = document.getElementById("p5_" + id);
    $.ajax({
        url: "get_response.php",
        type: "post",
        data: { "RES_TYPE": "SAVE", "ID": id, "STATUS": element.style.color },
        success: function(res) {
            console.log(res);
            var jobj = JSON.parse(res);
            
        }
    });

    if (element.style.color === "black" ) {
        element.style.color = "red";
    } else {
        element.style.color = "black";
    }
    console.log("Saving company with ID:", id);
    <?php
} else{
?>
toastr.error("Please Login Before Apply");
<?php
}
?>
}

function redirectToLogin() {
    window.location.href = "login.php";
  }

  function redirectToRegister() {
    window.location.href = "register.php";
  }

        function redirectToInfo() {
    console.log(this.id);
    window.location.href = "info.php?id=" + this.id;  
}

            </script>



            

            <div style="border: 1px solid black; padding: 2%; margin: 2%; border-radius: 15px;">
            <h4 style="margin-bottom: 30px;">Apply to 51548 Html Developer Jobs on Jobsafer.com</h4>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Bangalore</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Delhi NCR</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Hyderabad Secunderabad</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Mumbai</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Chennai</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Gurgaon</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Pune</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Kolkata</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Ahmedabad</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Gurgaon</span>
            </div>
            <div style="background-color: white; color: black; border: none; cursor: pointer; display: inline-block; margin-right: 10px; margin-bottom: 10px;" 
                onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                <span>Noida</span>
            </div>



            <h4 style="margin-top: 30px;">Top Companies</h4>
            <hr>
                <div class="container">
                <div class="row">

            <div class="col">
                <p ><a class="footerstyle"  href="desc.html" >• Html Programmer Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Web Developer Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Ui Developer Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Css Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Html Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Web Designer Jobs In Bangalore</a></p>
               </div>
               <div class="col">
                <p ><a class="footerstyle"  href="desc.html" >• Jquery Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Javascript Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Html Development Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Ui Designer Jobs In Bangalore</a></p>
                <p ><a class="footerstyle"  href="desc.html" >• Web Designer Jobs In Bangalore</a></p>
               </div>
            </div>
        </div>
    </div>
            
            
                 
                
                
               
            </div>






        </div>

        
        <?php 
    require_once("layouts/footer.php");
    ?>

    
</body>
</html>