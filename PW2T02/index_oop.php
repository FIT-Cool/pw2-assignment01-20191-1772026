<?php
include_once 'entity/Person.php';
include_once 'entity/Student.php';

$person=new Person("John","Doe");
echo 'First name: '.$person->getFirstName().'<br>';
echo 'Last name: '.$person->getFirstName().'<br>';

$student=new Student("202072001","John","Doe");
echo 'Student ID: '.$student->getNrp()."<br>";
echo 'First Name: '.$student->getFirstName()."<br>";
echo 'Last Name: '.$student->getLastName()."<br>";