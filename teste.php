<?php
    
    /*Using composer autoloader*/
    //require_once  'vendor/autoload.php'; 
    
    /*Without composer autoloader*/
    require_once 'src/bootstrap.php';
    
    $obj = new \Jarouche\Financial\PMT(0.05,3,1000.00);
    echo $obj->evaluate();
    
    $obj2 = new \Jarouche\Financial\PV(0.05,3,$obj->evaluate());
    
    echo "   -    ".$obj2->evaluate();
    
   
    $obj3 = new \Jarouche\Financial\FV(0.05,3,1000.00);
    echo "   -    ".$obj3->evaluate();