<?php

    //include 'function prac.php';
    class job{
        //Properties
        public $jobtype ;
        public $jobloc;

        function __construct($type, $loc) {
            $this->jobtype = $type;
            $this->jobloc = $loc;
        }
    }

    $jobs=array("");

    $jobs[0]=new job("wow","now");
    $jobs[0]=new job("wow","now");
    array_push($jobs,new job("get it","now"));

    echo $jobs[0]->jobtype. " ";
    echo $jobs[0]->jobloc;

    echo "<br>";

    echo $jobs[1]->jobtype. " ";
    echo $jobs[1]->jobloc;

    //echo functionName("Sifat");
?>