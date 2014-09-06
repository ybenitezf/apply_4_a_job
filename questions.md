## Personal details

Name: Yoel Benítez Fonseca

Country: Cuba

Timezone: -5

Gmail Id: ybenitezf@gmail.com

## Availability

Are you able to work from 3PM to 7PM (GMT -2) ? In case you aren't, what's your availability?

My availability is from 8AM to 10PM (GMT -5) from mondays to saturday.

## Tech Skills

Assing yourself a score in the following technologies:
 
Let's say that we use the 1 to 10 scale

Object Oriented Programming (OOP) - 10

Git - 6

PHP 5 - 8 

Codeigniter framework - 3 (newbie)

MySQL - 8

Javascript - 7

jQuery - 7

HTML - 10

CSS - 10

Bootstrap - 8

## Questions About OOP:

- How do you declare a function or method that you want to be accessed without instantiate the class?


<?php

  class MyClass {
      public static function MyStaticMethod () {
	// do static stuff
      }
  };
  
  // the static method can be called with:
  MyClass::MyStaticMethod();  
?>

- How do you create a child class of BaseClass ?

<?php
 class AClass 
 {
     // some class stuff...
 };
 
 class BClass extends AClass
 {
     // more class stuff
 };
?>

## Questions about GIT:

- If you accidentally add the wrong files to be commited using git add, how do you unstage them?

  git reset FILE

- If you want to switch to another branch, what command you need to execute?

  git checkout BRANCH_NAME


## Questions about PHP 5:

- Please write a conditional block of code that check if the variable $var exists, is not null and it's a number.

 <?php
 
 if( isset($a) && is_numeric($a)
 {
    echo "OK"; // or do something...
 };
 
 ?>


- Write a function that adds a line to a log file the current date and time with this format: "[2013-09-23 00:30:15] - Status OK"

<?php

 function write_log_msg($log_file, $msg)
 {
     $now = new DateTime('NOW');
     file_put_contents( $log_file, $now->format("[Y-m-d H:i:s]") . " - $msg\n", FILE_APPEND);
 };

 write_log_msg("mtest.log", "Status OK");

?>

## Questions about Codeigniter

- Which is the default path where you set up the configuration for the database?

application/config/database.php

- How you can get the value of a session variable with key "foo" using Codeigniter ?

$foo = $this->session->userdata('foo');


## Questions about MySQL

- Write a single query to retrieve the information from 2 tables that are related( users and users_data) where the primary 
key on users is ID and the foreign key on users_data is USER_ID.

SELECT * FROM users,users_data WHERE users.ID=users_data.id;

- Write a single query to retrieve all the queries that are currently running on the server .

SELECT * FROM INFORMATION_SCHEMA.PROCESSLIST;

## Questions about Javascript

- How do access to the alt attribute of the following image element using javascript? <img src='http://example.com/image.jpg' id='some_img' alt='lol' />

<script type="text/javascript">
var getvalue=document.getElementById("some_img").getAttribute("alt")
</script>

- What is the protocol name behind ajax?

HTTP(s) !?

## Questions about jQuery

- Write a piece of javascript code using jQuery that make the el ement with id "someElement" to appear on 
  the screen using a fade in effect after the DOM is loaded.

<script>
$(document).ready(function(){
  $("#someElement").fadeIn("slow");
});
</script>

- How do you remove an element from the DOM using jQuery?

<hmtl>
<div id="container">
  <div id="someElement">disapear !!!</div>
</div>
</html>
...
$( "#container" ).remove( "#someElement" );
 
## Questions about HTML

- Which is the doctype syntax for HTML5?

<!DOCTYPE html>

- Which is the attribute and value required on forms to allow file uploads?

the attribute "enctype" with the value "multipart/form-data", appart from that the method should be "post" 
and the form may contain one or more <input type="file" ...>


## Questions about CSS

- Which is the css property and its value to force to hide the scroll on any DOM element with fixed height when its content exceed its own height?

  overflow: hidden;

- If you have to div elements next to each other with the property float:left, which 
  CSS property do you need to add to the next element in order to get both of them to fill the same height 
  on page and make the next one not a floating one?
  
  clear: both;


## Questions about Linux / Unix based OS

- Which protocol(s) you could use to connect to a server SHELL remotely?

  SSH

- Write a command to look for the word "ads" on all files with .ctp extension in the same directory

  grep --include=\*.ctp -rnw './' -e "ads"
  
  the "n" option prints out the line number

## Programming challenge

- Complete the challenge described on the file challenge.md within three days. 

