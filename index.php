<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        div{
            margin: 10px;
        }
        .titleStyle{
            font-size:x-large ;
        }
        .footerstyle {
            margin: 8px 0;
            text-decoration: none;
            color: black;
        }
        .custom-container {
            border-radius: 25px; 
            border: 1px solid rgba(5, 5, 5, 0.986); 
            padding: 15px;
        }
        .custom-btn {
            margin-right: 10px; 
            margin-bottom: 10px;
        }
        .container-info {
            width: 250px;
            border: 1px solid black;
            text-align: center;
            border-radius: 15px;
            margin: 20px;
            padding: 15px;
        }
        .btn-custom {
            border-radius: 25px;
        }
        .companies-wrapper {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        
    </style>
</head>
<body>
   <?php 
    require_once("layouts/navbar.php");
    ?>
            
            </div>
            <div class="m-5">
                <h1 class="text-center">
                    Find your dream job now!
                </h1>
                <p class="text-center">
                    5 lakh+ jobs for you to explore...
                </p>
            </div>

            <div class="container-fluid ">
                <div class="row" style="border-radius: 25px; border: 1px solid rgba(128, 128, 128, 0.521); padding: 15px;">
                    <div class="col-1"></div>
                    <div class="col-3">
                      <input type="text" placeholder="Enter Skills" class="form-control" style="width: 100%; " id="sdc">
                    </div>
                    <div class="col-2">
                        <select class="form-control" id="exp">
                          <option value="" disabled selected>Select Experience</option>
                          <option value="0">Fresher (less than 1 year)</option>
                          <option value="1">1 year</option>
                          <option value="2">2 years</option>
                          <option value="3">3 years</option>
                          <option value="4">4 years</option>
                          <option value="5">5 years</option>
                          <option value="6">6 years</option>
                          <option value="7">7 years</option>
                          <option value="8">8 years</option>
                          <option value="9">9 years</option>
                          <option value="10">10 years</option>
                          <option value="11">More than 10 years</option>
                        </select>
                      </div>
                      
                    <div class="col-2">
                        <select class="form-control" id="loc">
                          <option value="" disabled selected>Select Location</option>
                          <option value="delhi">Delhi</option>
                          <option value="mumbai">Mumbai</option>
                          <option value="bangalore">Bangalore</option>
                          <option value="hyderabad">Hyderabad</option>
                          <option value="chennai">Chennai</option>
                          <option value="kolkata">Kolkata</option>
                          <option value="pune">Pune</option>
                          <option value="jaipur">Jaipur</option>
                          <option value="amravati">Amravati</option>
                          <option value="nagpur">Nagpur</option>
                        </select>
                      </div>
                      <div class="col-2">
                        <button class="px-4 btn btn-outline-primary" style="border-radius: 25px;" onclick="search()">
                          <i class="fa-solid fa-magnifying-glass"></i> Search
                        </button>
                      </div>
                      <div class="col-1"></div>
                    </div>
                    
                    <div class="col-2"></div>
                  </div>
                  

           


            <div class="row" style="margin-top: 20px;">
              <div class="col-12 text-center">
                <p>Ads via Coca-Cola:</p>
                <video src="images/coca.mp4" height="250" width="70%" style="max-width: 100%; height: auto;" 
                       autoplay loop controls muted preload="auto" poster="images/poster.jpeg">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>
            
                

            <h1 class="text-center">Top industries hiring..</h1>

            <div class="container mt-3 custom-container">
                <div class="d-flex flex-wrap" id="parentDiv">
                </div>
            </div>
        
            <script>
             
                var btns ;
                 $.ajax({
    url:"get_response.php",
    type:"post",
    data:{"RES_TYPE":"INDEX"},
    success:function(res){
      var jobj=JSON.parse(res);
        console.log(jobj);

        createBtns(jobj.buttons);
        createCompanies(jobj.companies);
    }

});;
        
function createBtns(jobj) {
    var parentDiv = document.getElementById("parentDiv");
    
    jobj.buttons.forEach(function(company) {
        var button = document.createElement("button");
        button.id = company.id;       
        button.className = "btn btn-outline-danger btn-lg custom-btn";      
        var icon = document.createElement("i");
        company.icon.split(' ').forEach(cls => icon.classList.add(cls));
        button.appendChild(icon);
        var textNode = document.createTextNode(" " + company.name);
        button.appendChild(textNode);
         button.addEventListener("click", redirectToDesc);

        
        parentDiv.appendChild(button);
        
    });
}

function redirectToDesc() {
    console.log(this.id);
    window.location.href="desc.php?id="+this.id;
}

               function createCompanies(jobj)
                  {
                  
                  var wrapper = document.querySelector('.companies-wrapper');
          
                  for (var i = 0; i < jobj.companies.length; i++) {
                      var container = document.createElement('div');
                      container.className = 'container-info';
          
                      var img = document.createElement('img');
                      img.src = "images/" + jobj.companies[i].image;
                      img.alt = jobj.companies[i].name;
                      container.appendChild(img);
          
                      var h3 = document.createElement('h3');
                      h3.className = 'text-center';
                      h3.textContent = jobj.companies[i].name;
                      container.appendChild(h3);
          
                      var ratingP = document.createElement('p');
                      ratingP.textContent = "⭐" + jobj.companies[i].rating + " | " + jobj.companies[i].review + " Reviews";
                      container.appendChild(ratingP);
          
                      var descriptionP = document.createElement('p');
                      descriptionP.textContent = jobj.companies[i].info;
                      container.appendChild(descriptionP);
          
                      var button = document.createElement('button');
                      button.className = 'px-4 btn btn-primary mt-3 btn-custom';
                      button.textContent = 'View jobs';
                      container.appendChild(button);
                      button.id = jobj.companies[i].id;
                      button.addEventListener("click", redirectToInfo);
                      companiesDiv.appendChild(container);
                  }
                  }

                  function redirectToInfo() {
    console.log(this.id);
    window.location.href="info.php?id="+this.id;
}


function search(){
  window.location.href="search.php?sdc="+sdc.value+"&exp="+exp.value+"&loc="+loc.value
}
function redirectToLogin(){
  window.location.href="login.php";
}
function redirectToRegister(){
  window.location.href="register.php";
}

</script>
             <div >
              <h1 class="text-center">
                Featured companies actively hiring </h1>
                


                 <div class="d-flex flex-wrap justify-content-center mt-4" >
    <div>
      <button class="px-4 btn btn-outline-secondary btn-lg mr-2 mb-2 btn-custom" style="border-radius: 150px">All</button>
    </div>
    <div>
      <button class="px-4 btn btn-outline-secondary btn-lg mr-2 mb-2 btn-custom" style="border-radius: 150px">IT Services</button>
    </div>
    <div>
      <button class="px-4 btn btn-outline-secondary btn-lg mr-2 mb-2 btn-custom" style="border-radius: 150px">BFSI</button>
    </div>
  </div>
              
              </div>

              <div id="companiesDiv" class="d-flex justify-content-center flex-wrap"> 

              </div>

              <?php 
    require_once("layouts/footer.php");
    ?>

              
    
              

             
            
              

           


            

           
            
                      
   
</body>
</html>