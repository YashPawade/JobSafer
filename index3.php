<?php







$btn1=array("icon"=>"fas fa-home","name"=>"Remote");
$btn2=array("icon"=>"fa-sharp fa-solid fa-building","name"=>"MNC");
$btn3=array("icon"=>"fa-solid fa-medal","name"=>"Fortune 500");
$btn4=array("icon"=>"fa-solid fa-rocket","name"=>"Startup");
$btn5=array("icon"=>"fa-solid fa-dollar-sign","name"=>"Banking & Finance");
$btns=array($btn1,$btn2,$btn3,$btn4,$btn5);
$jobj=array("buttons"=>$btns);
echo json_encode($jobj);



/*
$company1 = array("image" => "genpact.gif", "name" => "Genpact", "rating" => 3.9, "review" => "27.5k+", "info" => "Global professional services firm.", "id" => 1);
$company2 = array("image" => "jio.gif", "name" => "Jio", "rating" => 4.3, "review" => "20.3k+", "info" => "True 5G is here to unlock the limitless era.", "id" => 2);
$company3 = array("image" => "Capgemini.gif", "name" => "Capgemini", "rating" => 3.8, "review" => "35.3k+", "info" => "Global leader in technology services.", "id" => 3);
$company4 = array("image" => "amazon.gif", "name" => "Amazon", "rating" => 4.1, "review" => "21.4k+", "info" => "World's largest Internet company.", "id" => 4);
$companies = array($company1, $company2, $company3, $company4);
$jobj = array("companies" => $companies);
echo json_encode($jobj);


/*
$countries = array("India", "America", "Italy", "Japan", "England");
$fruits = array("Mango", "Apple", "Pineapple", "Banana", "Chickoo");
$mix = array();
foreach ($countries as $i) {
array_push($mix,$i);   
}
foreach ($fruits as $i) {
    array_push($mix,$i);   
    }

print_r($mix);



/*
$countries = array("India", "America", "Italy", "Japan", "England");
$fruits = array("Mango", "Apple", "Pineapple", "Banana", "Chickoo");
$mix = array();

for($i = 0; $i < 4; $i++) {
    $element1 = $countries[$i];
    $element2 = $fruits[$i];
    $mix[] = $element1 . " - " . $element2;
}
print_r($mix);



/*
$countries = array("India", "America", "Italy", "Japan", "England");
array_push($countries,"Canada","Mexico","Russia");
print_r($countries);



/*
$company=array("Employee"=>"Vedant","Experience"=>5,"Age"=>28);
$company["Address"]="Amravati";
print_r($company);



/*
$username=$_POST["username"];
$password=$_POST["password"];
if ($username=="admin" && $password=="1234")
{
    $result=array("status"=>1,"message"=>"Login Successful");
    $result=json_encode($result);
    print_r($result);
}else{
    $result=array("status"=>0,"message"=>"Login Failure");
    $result=json_encode($result);
    print_r($result);
}




/*
$company=array("Employee"=>"Vedant","Experience"=>5,"Age"=>28);
print_r($_POST );
/*foreach($company as $key => $value){
    echo $key."=>".$value;
    echo "<br>";
}/*
 

/*
$countries = array("India", "America", "Italy", "Japan", "England");
$length = count($countries);
/*
for($i = 0; $i < $length; $i++) {
    print_r($countries[$i]);
    echo "<br>";
}
*/
/*
foreach($countries as $country){
    echo $country;
    echo "<br>";
}



/* $weight = $_GET['weight'];
$height = $_GET['height'];
$age = $_GET['age'];
$meters = $height / 100;
$bmi = $weight / ($meters * $meters); 
if ($age >= 18 && $age <= 64) { 
    echo "<h3>Your BMI is: " . $bmi . "</h3>";
    // echo "<h3>Your BMI is: " . round($bmi) . "</h3>";
    if ($bmi < 18.5) {
        echo "<p>You are underweight.</p>";
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
        echo "<p>You have normal weight.</p>";
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
        echo "<p>You are overweight.</p>";
    } elseif ($bmi >= 30) {
        echo "<p>You have obesity .</p>";
    }
} else {
    echo "<p>BMI calculation is applicable only for individuals between the age of 18 and 64.</p>";
}

*/

  /*    
        $dob = $_GET['dob'];      
        $dob= new DateTime($dob);
        $curDate=date("Y/m/d");
        $curDate= new DateTime($curDate);
        $interval=$dob ->diff($curDate);
        echo $interval ->format('%y years,%m months, %d days');

    */

 /*
        
        $number = $_GET['number'];
        $name = $_GET['name'];
        for ($i = 0; $i < $number; $i++) {
            echo $name . "<br>";
        }
    
 */
    ?>