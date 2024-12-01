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
    <div style="display: flex;">
        


        <div style="width: 100%; " ;>

            <div class="companies-tata"></div>
    
    <script>

        var queryString=window.location.search;
        var params=new URLSearchParams(queryString);
        var sdc = params.get("sdc");
        var exp = params.get("exp");
        var loc = params.get("loc");
   
        
     $.ajax({
    url:"get_response.php",
    type:"post",
    data:{"RES_TYPE":"SEARCH","SDC":sdc,"EXP":exp,"LOC":loc},
    success:function(res){
        
        console.log(res);
      var jobj=JSON.parse(res);

        getCompaniesDesc(jobj.companies);

        
    }

});

        function  getCompaniesDesc(companies)

        {
           
        var tata = document.querySelector('.companies-tata');

        for (var i = 0; i < companies.length; i++) {
            var container = document.createElement('div');
            container.className = 'job-container';
            container.id = companies[i].id;
            container.addEventListener("click", redirectToInfo);

            var header = document.createElement('div');
            header.className = 'job-header';
            container.appendChild(header);

            var headerLeft = document.createElement('div');
            headerLeft.className = 'job-header-left';
            header.appendChild(headerLeft);

            var h4 = document.createElement('h4');
            h4.textContent = companies[i].developer;
            headerLeft.appendChild(h4);

            var p1 = document.createElement('p');
            p1.innerHTML = `<span style="font-weight: 400;">${companies[i].company} ⭐${companies[i].rating}</span>
                            <span style="font-size: small; margin-left: 2%;">${companies[i].review} Reviews</span>`;
            headerLeft.appendChild(p1);

            var headerRight = document.createElement('div');
            headerRight.className = 'job-header-right';
            header.appendChild(headerRight);

            var img = document.createElement('img');
            img.src = companies[i].image;
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

            var footer = document.createElement('div');
            footer.className = 'job-footer';
            footer.innerHTML = '<i class="fa-regular fa-bookmark"></i> <span>Save</span>';
            container.appendChild(footer);

            tata.appendChild(container);


        }

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

        


    
</body>
</html>