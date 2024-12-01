<?php 
require_once("dbconn.php");

//test();
function test(){
    global $conn;
    $stmt=$conn->prepare("SELECT * FROM `categories`");
    if($stmt){
        if($stmt->execute()){
            $result=$stmt->get_result();
            while($row=$result->fetch_assoc())
            {
                print_r($row);
                echo "<br>";
            }
            
        }else{
            echo $conn->connect_error;
        }

    }else{
        echo $conn->connect_error;
    }
}

function save($id, $status){
    echo $status;
    session_start();
    global $conn;   
    
    if($status=="black"){$stmt=$conn->prepare(" INSERT INTO savedjobs( `user`, `job`) VALUES (?,?)");}
    else{
        $stmt=$conn->prepare(" DELETE FROM `savedjobs` WHERE user=? AND job=?");
        }
        
        $stmt->bind_param("ii",$_SESSION["userid"],$id);
        if($stmt->execute()){
                   
            return $status;
        }else{
            echo $conn->connect_error;
        }

   

    

    
}


function apply($exp, $package, $loc, $skills,$id) {
    session_start();
    global $conn;
    
    
    $stmt = $conn->prepare("INSERT INTO `apply` (`exp`, `package`, `location`, `skills`, `users`, `job`) VALUES ( ?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
       
        $stmt->bind_param("iissii", $exp, $package, $loc, $skills,$_SESSION['userid'],$id);
        
        
        if ($stmt->execute()) {
            
            return "Application Submitted Successfully";
            
        } else {
            
            return "Application Submission Failed";
            
        }
    } else{
        echo $conn->connect_error;
    }
}



function checkSkills($applicantSkills, $jobSkills) {
    $applicantSkillsArray = explode(",", $applicantSkills);
    $jobSkillsArray = explode(" • ", $jobSkills);

    foreach ($applicantSkillsArray as $skill) {
        if (!in_array(trim($skill), $jobSkillsArray)) {
            return false;
        }
    }
    return true;
}



function cfilter($data){

    $minexp=0;
    $maxexp=$data["exp"];

    $minmax=explode("-",$data["salary"][0]);
    $minsal=$minmax[0];
    $maxsal=$minmax[1];
    
    $location=array();
    global $conn;
    $stmt=$conn->prepare(" SELECT jobs.id,jobs.title, jobs.experience,jobs.money,jobs.location,jobs.work, jobs.skills, companies.image, companies.rating, companies.review FROM jobs INNER JOIN companies ON jobs.company=companies.id INNER JOIN categories ON companies.category=categories.id WHERE jobs.location=? AND companies.name=? AND (jobs.minexp BETWEEN ? AND ?) AND (jobs.maxsal BETWEEN ? AND ?) AND jobs.developer=? ;");
    if($stmt){
        $stmt->bind_param("ssiiiii",$data["loc"],$data["tc"],$minexp,$maxexp,$minsal,$maxsal,$data["id"]);
        if($stmt->execute()){
            $result=$stmt->get_result();
            $companies=array();
            while($row=$result->fetch_assoc())
            {
                array_push($companies,$row);

                if (!in_array($row['location'],$location))
                array_push($location,$row['location']);
                
            }
            
            return array("companies"=>$companies,"locations"=>$location);
               
        }else{
            echo $conn->connect_error;
        }

    }else{
        echo $conn->connect_error;
    }


    return $data;
}

function search($sdc,$exp,$loc)
{
    
    global $conn;
    $stmt=$conn->prepare("SELECT * FROM `jobs` INNER JOIN companies ON jobs.company=companies.id INNER JOIN categories ON jobs.developer=categories.id WHERE jobs.minexp<? AND jobs.location=? AND jobs.tags LIKE ?");
    if($stmt){
        $sdc="%$sdc%";
        $stmt->bind_param("iss",$exp,$loc,$sdc);
        if($stmt->execute()){
            $result=$stmt->get_result();
            $companies=array();
            while($row=$result->fetch_assoc())
            {
                array_push($companies,$row);

                
            }
            
            return array("companies"=>$companies);
               
        }else{
            echo $conn->connect_error;
        }

    }else{
        echo $conn->connect_error;
    }
return $companies;
}



function login($username, $password){

    global $conn;
    $stmt=$conn->prepare("SELECT * FROM users WHERE BINARY name=?  AND BINARY pass=?");
    if($stmt){
        $stmt->bind_param("ss",$username,$password);
        if($stmt->execute()){
            $result=$stmt->get_result();
            $count=mysqli_num_rows($result);
            if($count>=1){
                $row=$result->fetch_assoc();
                session_start();
                $_SESSION["login"]=true;
                $_SESSION["username"]=$row["name"];
                $_SESSION["userid"]=$row["id"];
                $res = array("result" => 1, "message" => "Login Successful");
                return $res; 
            }
            else{
                $res = array("result" => 0, "message" => "Invalid Email or Password");
                return $res; 
            }
               


    }else{
        echo $conn->connect_error;
    }
}else{
    echo $conn->connect_error;
}


/*
    if ($username == "Yash Pawade" && $password == "1234567") {
        session_start();
        $_SESSION["login"]=true;
        $_SESSION["username"]="Yash Pawade";
        $_SESSION["userid"]=1;
        $result = array("result" => 1, "message" => "Login Successful");

    } else {
        $result = array("result" => 0, "message" => "Invalid Email or Password");
    }*/
    
}




function register($pname,$username,$email,$gender,$pass,$mobile,$city){

    
    global $conn;   
    $stmt=$conn->prepare(" INSERT INTO `users`( `name`, `username`, `email`,  `gender`, `pass`, `mobile`, `city`) VALUES (?,?,?,?,?,?,?)");
    if($stmt){
        $stmt->bind_param("sssssss",$pname,$username,$email,$gender,$pass,$mobile,$city);
        if($stmt->execute())
    {        
        $result = array("result" => 1, "message" => "Registration Successfull");
        return $result;    
    }else{
        $result = array("result" => 0, "message" => "Registration Failed");
        return $result;  
    }

}else{
    echo $conn->connect_error;
}
}

function getButtons(){
    global $conn;
    $stmt=$conn->prepare("SELECT * FROM `categories`");
    if($stmt){
        if($stmt->execute()){
            $result=$stmt->get_result();
            $btns=array();
            while($row=$result->fetch_assoc())
            {
                array_push($btns,$row);
                
            }
            
            $jobj=array("buttons"=>$btns);
            return $jobj;  
        }else{
            echo $conn->connect_error;
        }

    }else{
        echo $conn->connect_error;
    }
 
}
function getCompanies(){
   
    global $conn;
    $stmt=$conn->prepare("SELECT * FROM `companies`");
    if($stmt){
        if($stmt->execute()){
            $result=$stmt->get_result();
            $companies=array();
            while($row=$result->fetch_assoc())
            {
                array_push($companies,$row);

                
                
            }
            
            $jobj=array("companies"=>$companies);
            return $jobj;  
        }else{
            echo $conn->connect_error;
        }

    }else{
        echo $conn->connect_error;
    }
   
}
function getCompaniesDesc($id)
{
    $location=array();
    global $conn;
    $stmt=$conn->prepare("SELECT jobs.id,jobs.title, jobs.experience,jobs.money,jobs.location,jobs.work, jobs.skills, companies.image, companies.rating, companies.review, jobdeveloper.developer FROM jobs INNER JOIN companies ON jobs.company=companies.id INNER JOIN categories ON companies.category=categories.id INNER JOIN jobdeveloper ON jobs.developer=jobdeveloper.id WHERE categories.id=?");
    if($stmt){
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            $result=$stmt->get_result();
            $companies=array();
            while($row=$result->fetch_assoc())
            {
                array_push($companies,$row);

                if (!in_array($row['location'],$location))
                array_push($location,$row['location']);
                
            }
            
            return array("companies"=>$companies,"locations"=>$location);
               
        }else{
            echo $conn->connect_error;
        }

    }else{
        echo $conn->connect_error;
    }
}


function getJobInfo($id){
    global $conn;
      $stmt=$conn->prepare("SELECT * FROM jobs INNER JOIN companies ON jobs.company=companies.id INNER JOIN categories ON jobs.developer=categories.id WHERE jobs.id=?");
      if($stmt){
          $stmt->bind_param("i",$id);
          if($stmt->execute()){
              $result=$stmt->get_result();
              $row=$result->fetch_assoc();
              return $row;  
          }else{
              echo $conn->connect_error;
          }
  
      }else{
          echo $conn->connect_error;
      }
  }



function getBenifits($id){
    global $conn;
    $stmt=$conn->prepare("SELECT * FROM `benifits` WHERE jobid=?");
    if($stmt){
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            $result=$stmt->get_result();
            $benifits=array();
            while($row=$result->fetch_assoc())
            {
                array_push($benifits,$row);
                
            }
            
            
            return $benifits;  
        }else{
            echo $conn->connect_error;
        }

    }else{
        echo $conn->connect_error;
    }
}

function getCompanyDesc($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM jobdesc INNER JOIN jobtitles ON jobdesc.title=jobtitles.id WHERE jobdesc.jobid=?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $companies = [];

            // Process each row in the result
            while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $description = $row['description'];

                // Check if the title already exists in the $companies array
                $found = false;
                foreach ($companies as &$entry) {
                    if ($entry['title'] === $title) {
                        // Add the description to the existing title entry
                        $entry['desc'][] = $description;
                        $found = true;
                        break;
                    }
                }

                // If the title does not exist, create a new entry
                if (!$found) {
                    $companies[] = [
                        "title" => $title,
                        "desc" => [$description]
                    ];
                }
            }
                return $companies;
            
        } else {
            echo $conn->error;
        }
        
    } else {
        echo $conn->error;
    }
}


function getCompanyInfo($id){
    $jobInfo=getJobInfo($id);
    $benifits=getBenifits($id);
    $jobdesc=getCompanyDesc($id);
    $jobDetails = array(
        "jobInfo" => $jobInfo,
        "benifits" => $benifits,
        "jobdesc" => $jobdesc
    );
    return $jobDetails;
}  
function getSavedJobs(){
    $jobj = array(
        "companies" => array(
            array(
                "image" => "images/223346.gif",
                "developer" => "Html Developer",
                "company" => "Tata Consultancy Services (TCS)",
                "rating" => 2.9,
                "review" => 76531,
                "experience" => "5-10 Years",
                "money" => "1 - 3 lakhs",
                "location" => "Bengaluru",
                "work" => "Roles & Responsibility: Developer, Senior Developer, Technical Lead",
                "skills" => "Java • CSS • Javascript • HTML • SQL • C++ • Communication Skill • Excel",
                "id" => 1
            ),
            array(
                "image" => "images/smartsense.gif",
                "developer" => "Html Developer",
                "company" => "Smartsense Consulting Solutions",
                "rating" => 4.5,
                "review" => 5624,
                "experience" => "2-7 Years",
                "money" => "2 - 5 lakhs",
                "location" => "Gandhinagar",
                "work" => "Roles & Responsibility: Back End Developer",
                "skills" => "PSD • CSS • jQuery • Coding • Illustrator • Wordpress • HTML • SEO",
                "id" => 2
            ),
            array(
                "image" => "images/accenture.gif",
                "developer" => "Java Full Stack Development-Application Developer",
                "company" => "Accenture",
                "rating" => 4.0,
                "review" => 47915,
                "experience" => "3-6 Years",
                "money" => "5 - 8 lakhs",
                "location" => "Pune",
                "work" => "Must have skills: Java Full Stack Development, Good to have skills: JavaScript, Spring Boot, React.js. Minimum 3 year(s) of experience is required",
                "skills" => "CSS • webworks • oops • HTML • javascript • unit testing • eks • hibernate",
                "id" => 3
            ),
            array(
                "image" => "images/fis.gif",
                "developer" => "Full stack development",
                "company" => "FIS",
                "rating" => 3.9,
                "review" => 5028,
                "experience" => "3-8 Years",
                "money" => "3 - 7 lakhs",
                "location" => "Pune, Bangalore Rural, Chennai",
                "work" => "Understand the realities of model development and make pragmatic and business-aware choices when trading-off sophistication and accuracy versus implementation and performance costs.",
                "skills" => "Mango Db • Node.Js • React.Js • Python • Db • Full Stack • Stack Development",
                "id" => 4
            ),
            array(
                "image" => "images/iIdeamagix.gif",
                "developer" => "MERN Stack Development Professional",
                "company" => "Ideamagix",
                "rating" => 4.6,
                "review" => 1805,
                "experience" => "1-3 Years",
                "money" => "1-3 lakhs",
                "location" => "Thane",
                "work" => "Understand the realities of model development and make pragmatic and business-aware choices when trading-off sophistication and accuracy versus implementation and performance costs.",
                "skills" => "MERN Stack Development • CSS • GIT • GraphQL • CI/CD • SVN • HTML",
                "id" => 5
            )
        ),
        "pinfo" => array(
            "username" => "Yash Pawade",
            "phone" => "Phone No. 9112011052"
        )
    );
return $jobj;
}
function getProfile(){

$jobj = array(
    "name" => "Ravi",
    "username" => "ravi",
    "phone" => "9595210063",
    "gender" => "male",
    "age" => 23,
    "email" => "ravi@gmail.com"
);
return $jobj;
}
?>