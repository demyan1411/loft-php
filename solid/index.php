<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/../vendor/autoload.php';


$duck = new Patterns\Duck();

echo '<br>';

//interface ILogger {
//    public function log($message);
//}
//
////class Logger {
////    public function log($message)
////    {
////        $this->saveToFile($message);
////    }
////
////    private function saveToFile($message)
////    {
////        echo $message;
////    }
////}
//
//class FileLogger implements ILogger {
//    public function log($message)
//    {
//        $this->saveToFile($message);
//    }
//
//    private function saveToFile($message)
//    {
//        echo 'File: ' . $message;
//    }
//}
//
//class DBLogger implements ILogger {
//    public function log($message)
//    {
//        $this->saveToDB($message);
//    }
//
//    private function saveToDB($message)
//    {
//        echo 'database: ' . $message;
//    }
//}
//
//class Product {
//    private $logger;
//
//    public function __construct(ILogger $logger)
//    {
//        $this->logger = $logger;
//    }
//
//    public function setPrice($price)
//    {
//        try {
//            $this->logger->log('I m product');
//        } catch (Exception $e) {
//            $this->logger->log($e->getMessage());
//        }
//    }
//}
//
//$logger  = new DBLogger();
//$logger2 = new FileLogger();
//$product = new Product($logger2);
//
//$product->setPrice(10);
//
//
//class Bird {
//    public function fly() {
//        $fly_speed = 10;
//        return $fly_speed;
//    }
//}
//
//class Duck extends Bird {
//    public function fly() {
//        $fly_speed = 8;
//        return $fly_speed;
//    }
//
//    public function swim() {
//        $swim_speed = 8;
//        return $swim_speed;
//    }
//}
//
//class Pinguin extends Bird {
//    public function fly() {
//        return 'I can not fly =(((';
//    }
//
//    public function swim() {
//        $swim_speed = 4;
//        return $swim_speed;
//    }
//}
//
//class BirdRun {
//    private $bird;
//
//    public function __construct(Bird $bird)
//    {
//        $this->bird = $bird;
//    }
//
//    public function run() {
//        $fly_speed = $this->bird->fly();
//        echo "<br> $fly_speed";
//    }
//}
//
////$bird = new Bird();
////$bird = new Duck();
//$bird = new Pinguin();
//
//$bird_run = new BirdRun($bird);
//$bird_run->run();
//
///////////////////////////////////
/////
//interface ISuperTransformer {
//    public function toCar();
//}
//
