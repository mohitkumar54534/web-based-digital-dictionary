<?php
    $servername = "localhost";
$username = "admin";
$password = "12345";
 $conn = new PDO("mysql:host=$servername;dbname=mohit", $username, $password);
?> 
<!DOCTYPE html>
    <html>
        <head>
        <title> MY dictionary</title>
`

        </head>
            <style>
               
                h3
                {  
                    text-align: center;
                    font: chiller; 
                    color: red;
                    font-size: 20px;
                    margin:5px;
                }
                   
                
                h2
                {  
                    text-align: center;
                    font: chiller; 
                    color: blue;
                    font-size: 50px;
                }
                ::placeholder{
                    color:red;
                    font-size: large;
                }
                input[type=text]
                {
                    padding: 21px;
                    border: 2px  solid blue;
                    border-radius: 20px;
                    font-weight: 50px;
                }
                .dic
                {
                    
                   text-align:center;
             
                }
                h1
                {
                text-align: center;
                    font: chiller; 
                    color:red;
                    font-size: 22px;
                    line-height:25px;
                   
                }
            </style>
<body bgcolor="#00FFFFF">
        
    <div id="mmm" class="dic">
        <h1><b> <i><u>DICTIONARY</u></i> </b></h1>
        <img src='https://www.pngfind.com/pngs/m/102-1021249_open-book-png-open-book-in-png-transparent.png'
        width="300" height="300" style={border-radius:10px}
        /> 
    </div>
    <div class="container">
        <form  action="<?php $_PHP_SELF ?>" method = "POST" align="center">
        
            <h1>  <input  type="text" name="name" placeholder="Search🔍️" />
            <i class="fa-solid fa-magnifying-glass"></i> <input align="center" type="submit"</h1>
        </form>
    <?php
        if(isset($_POST["name"]) )
        {    
             $m=$_POST['name'];
             $i="select * from t1 where words like '$m%' ";
             $id="";
             $res=$conn->query($i);
	$publish1=$res->fetchAll(PDO::FETCH_ASSOC);
	if($publish1){
             foreach ($publish1 as $pub){
              $id = $pub['id'];
              
               $sql1="select scientific_name,photo from t2 where id=$id";
	$res=$conn->query($sql1);
	$publish1=$res->fetchAll(PDO::FETCH_ASSOC);
	if($publish1){
             foreach ($publish1 as $pub1){
                ?> 
                  <img   class="image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($pub1['photo']);  ?>"style="width:200px;height:200px;" />
               <?php 
                echo "<p>scientific name: ".$pub1['scientific_name']."</p><br>";
                }
        }    
          
         $sql="select * from t1 where id=$id";
	$result=$conn->query($sql);
	$publish=$result->fetchAll(PDO::FETCH_ASSOC);
	if($publish){
             foreach ($publish as $pub)
             {  
                    echo "<p>pronunciation: ".$pub['pronunciation']."</p><br>";
                 echo "<p>ENGLISH: ".$pub['words']."</p><br>";
                echo "<p>Meaning : ".$pub['means']."</p><br>";
                echo "<p> sentence: ".$pub['examples']."</p><br>";
                   echo "<p>Part of speech: ".$pub['pos']."</p><br> "; 
                    echo "<p>hindi:".$pub['hindi']."</p><br>";
                echo "<p>tamil:".$pub['tamil']."</p><br>";
                echo "<p>bhojpuri:".$pub['bhojpuri']."</p><br>";  

               }
          } 
          $sql1="select * from t3 where id=$id";
	$res=$conn->query($sql1);
	$publish1=$res->fetchAll(PDO::FETCH_ASSOC);
	
	if($publish1){
             foreach ($publish1 as $pub)
             {  
                echo "<p>antonyms:".$pub['anto']."</p><br>";
                echo "<p>synonyms:".$pub['syno']."</p><br>";  
               }
          }
            }
             }
             else{
echo " <h1>NO RESULT FOUND</h1>";
            }
        }  
    ?>
</body>
</html>
