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
    <script 
    src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
     crossorigin="anonymous">
    </script>
    <title>Registration</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 5%;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            width: 1000px;
           
            border: 1px solid #ccc;
            border-radius: 15px;
            padding: 30px;
            background-color: #fff;
            text-align: center; 
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 25%;
            text-align: left;
            margin-right: 10px;
        }
        .form-group input, .form-group select {
            width: 75%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .flex-container {
            display: flex;
            justify-content: center;
            margin-top: 25px;
            width: 7220px;
        }
        .flex-item {
            border: 2px solid black;
            margin: 3%;
            border-radius: 25px;
           
            
           
            
            flex-direction: column;
            padding: 10px;
        }
        .flex-item img {
            height: 150px;
            width: 150px;
            border-radius: 15px;
        }
        .flex-item .image-container {
            text-align: center;
            width: 100%;
            height: auto;
        }
        .flex-item input {
            margin-right: 10px;
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        button {
            width: 55%;
            padding: 10px;
            border: none;
            border-radius: 25px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            margin-top: 15px;
        }
        .already-registered {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <img src="images/logo.jpg" style="width: 600px;" alt="Jobsafer">
        <h3>Create your Jobsafer profile</h3>
        <h4>Search & apply to jobs from India's No.1 Job Site</h4>
        <br>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="pname" name="Name" placeholder="Enter Your Name" required>
        </div>
        <div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="Username" placeholder="Enter Your Username" required>
        </div>
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="email" id="email" name="Email" placeholder="Enter Your Email ID" required>
        </div>       
        <div class="form-group">
    <label>Gender</label>
    <div>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
    </div>
    <div>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label>
    </div>
    <div>
        <input type="radio" id="other" name="gender" value="Other" required>
        <label for="other">Other</label>
    </div>
</div>
 
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="pass" name="Password" required 
                   placeholder="Enter Password 7 char. using special char."   
                   maxlength="7">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile number</label>
            <input type="text" id="mobile" name="Mobile Number" required pattern="^[789]\d{9}$">
        </div>
        <div class="form-group">
    <label for="work_status">Work Status</label>
    <div class="flex-container" id="work_status">
        <label class="flex-item">
            <div class="image-container">
                <img src="images/briefcase.bdc5fadf.svg" alt="">
            </div>
            <div>
                <input type="radio" id="experienced" name="work_status" value="experienced" required>
                <p>I'm experienced</p>
                <p>I have work experience (excluding internships)</p>    
            </div>
        </label>
        <label class="flex-item">
            <div class="image-container">
                <img src="images/schoolbag.a54cbf7a.svg" alt="">
            </div>
            <div>
                <input type="radio" id="fresher" name="work_status" value="fresher" required>
                <p>I'm a fresher</p>
                <p>I am a student/ Haven't worked after graduation</p>    
            </div>
        </label>
    </div>
</div>

        <div class="form-group">
    <label for="city">Current city</label>
    <select id="city" name="city" required>
        <option value="" disabled selected>Select your city</option> 
        <option value="Amravati">Amravati</option>
        <option value="Mumbai">Mumbai</option>
        <option value="Pune">Pune</option>
        <option value="Akola">Akola</option>
        <option value="Nagpur">Nagpur</option>
    </select>
</div>

        <div class="button-container">
        <button onclick="register()">Register Now</button>

        </div> <br>
        <div class="already-registered">
            <p>Already Registered?<a href="login.php"> Login </a>here</p>
        </div>
        <h1 id="message"></h1>
    </div>
    
</body>

<script>
   function register() {
    if (pname.value != "" && email.value != "" && pass.value != "" && mobile.value != "" && city.value != "") {
        var gender = (document.querySelector('input[name="gender"]:checked').value);
        $.ajax({
            url: "get_response.php",
            type: "post",
            data: {
                "RES_TYPE": "REGISTER",
                "PNAME": pname.value,
                "USERNAME": username.value,
                "EMAIL": email.value,
                "GENDER": gender,
                "PASSWORD": pass.value,
                "MOBILE": mobile.value,
                "CITY": city.value
            },
            success: function(res) {
                console.log(res);
                var jobj = JSON.parse(res);
                if (jobj.result == 1) {
                    message.style.color = "green";
                    message.innerHTML = "Registration Successful";
                } else {
                    message.style.color = "red";
                    message.innerHTML = "Registration Failed";
                }
            }
        });
    } else {
        message.style.color = "red";
        message.innerHTML = "Please Fill Up All Fields";
    }
}

</script>
</html>
