<?php

    //---needed for cosine similaritiy

    include('../vendor/autoload.php');

    use NlpTools\Tokenizers\WhitespaceAndPunctuationTokenizer;

    use NlpTools\Tokenizers\WhitespaceTokenizer;
    use NlpTools\Similarity\CosineSimilarity;

function functionCompare($CvDetails,$getjobtype) {


    //---------------connection establish------------>
    $DB_host = "localhost";
    $DB_user = "root";
    $DB_pass = "";
    $DB_name = "jobboard";

    try {
        $con = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo " Connected successfully ";


    } catch (PDOException $e) {
        //print "Error!: " . $e->getMessage() . "<br/>";

        die();
    }
    //---------------connection establish finish------------>

    $stmtcv = $con->query("SELECT * FROM `jobs`"); //running query
    //$row1 = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo $row1["JobType"];
    //echo "<br>";
    //echo "<br>";


    //Main code start---------------------------
    class job{
        //Properties
        public $ASerial;
        public $jobtype;
        public $jobloc;
        public $jobsal;
        public $jobovert;
        public $jobskills;
        public $cossim;
        public $jobcom;
        public $jobemail;

        function __construct($actualSerial,$type, $loc,$salary,$overt,$skills,$sim,$comp,$emailjob) {
            $this->ASerial = $actualSerial;
            $this->jobtype = $type;
            $this->jobloc = $loc;
            $this->jobsal = $salary;
            $this->jobovert = $overt;
            $this->jobskills = $skills;
            $this->cossim = $sim;
            $this->jobcom = $comp;
            $this->jobemail=$emailjob;

        }
    }



    //$jobs=array("");
    $jobs=array();
    //array_push($jobs,new job("blank","blank","blank","blank","blank"));

    //$jobs[0]=new job("wow","now");
    //$jobs[0]=new job("wow","now");
    //array_push($jobs,new job("get it","now"));

    //echo $jobs[1]->jobtype. " ";
    //echo $jobs[1]->jobloc;

    //print_r($jobs); //print array stack

    //echo "<br>";
//    for ($x = 1; $x < count($jobs); $x++) {
//        echo "Job no-: $x <br>";
//        //echo $jobs[$x]->jobtype ." ". $jobs[$x]->jobloc ." ". $jobs[$x]->jobsal ." ". $jobs[$x]->jobovert ." ". $jobs[$x]->jobskills ;
//        echo "<br>";
//        $p1=$jobs[$x]->jobtype;
//        $p2=$jobs[$x]->jobloc;
//        $p3=$jobs[$x]->jobsal;
//        $p4=$jobs[$x]->jobovert;
//        $p5=$jobs[$x]->jobskills;
//        $currjob=strtolower("$p1 $p2 $p3 $p4 $p5");
//        echo $currjob;
//        echo "<br>";
//    }



        $count=1;
        while($row = $stmtcv->fetch(PDO::FETCH_ASSOC)){

            if($getjobtype==$row["JobType"]){

            $p1=$row["JobType"];
            $p2=$row["JobLocation"];
            $p3=$row["Salary"];
            $p4=$row["Overtime"];
            $p5=$row["Skills"];
            $currjob=strtolower("$p1 $p2 $p3 $p4 $p5");
            //echo $currjob." is the current job ";
            //echo "<br>";


            $similarity = new CosineSimilarity();
            $tokenizer = new WhitespaceAndPunctuationTokenizer();
            $text1=$CvDetails;
            $text2=$currjob;
            $setA = $tokenizer->tokenize($text1);
            $setB = $tokenizer->tokenize($text2);
            $result = $similarity->similarity($setA, $setB);

            //echo "The similarity is - ".$result;
            //echo "<br>";


            //array_push($jobs,new job("get it","now"));
            array_push($jobs,new job($row["Serial"],$row["JobType"],$row["JobLocation"],$row["Salary"],$row["Overtime"],$row["Skills"],$result,$row["Company"],$row["Email"]));
            $count++;
            }
        }

        //echo $jobs[1]->jobtype. " ";
        //echo $jobs[1]->jobloc;

        //echo "The reference job is-----".$CvDetails;
    //-----------cosining----------------
    //echo "<br> Cosining enabled page";

    function cmp($a, $b) {
        //return strcmp($a->cossim, $b->cossim);
        return $a->cossim < $b->cossim;
    }

    usort($jobs, "cmp");

//    echo "<br>";
//    echo $jobs[0]->jobtype;
//    echo $jobs[0]->jobloc;
//    echo $jobs[0]->cossim;


    //echo "<br>";
    //echo "<br>";
        for ($x = 0; $x < count($jobs); $x++) {
            //echo "Job no-: $x <br>";
            //echo $jobs[$x]->jobtype ." ". $jobs[$x]->jobloc ." ". $jobs[$x]->jobsal ." ". $jobs[$x]->jobovert ." ". $jobs[$x]->jobskills." ". $jobs[$x]->cossim ;
            //echo "<br>";

            //echo "<br>";
        }

    //return "acknowledged";
    return $jobs;


    }




?>


