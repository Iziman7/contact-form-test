<?php

$name = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$errors = [];

if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
 	echo('<div class="alert alert-danger" role="alert">Введіть валідний email!</div>');
   $errors[] = 'Не валідний email';
}
if($password != $confirmpassword){
	echo('<div class="alert alert-danger" role="alert">Паролі не співпадають!</div>');
   $errors[] = 'Паролі не співпадають';
}

if (!file_exists("users.json")) {
	file_put_contents('users.json', '');
}

$file = file_get_contents("users.json");
$data = json_decode($file, true);
if(filesize("users.json") != 0){
foreach ($data as $item) {
    if ($item['email'] == $email) {
        echo('<div class="alert alert-danger" role="alert">Користувач з таким email вже існує!</div>');
        $errors[] = 'Повторний email';
        break;
    }
}
}

if($errors){
error_log(date("d-m-Y H:i:s")." - User: ".$_SERVER['REMOTE_ADDR'].PHP_EOL.print_r($errors,true), 3, "errors.log");
}

if(filesize("users.json") != 0){
$last_item = end($data);
$last_item_id = $last_item['id'];
}

$new_message = array(
	"id" => ++$last_item_id,
	"name" => $name,
   "email" => $email,
   "password" => $password,
);

if(filesize("users.json") == 0){
   $first_record = array($new_message);
   $data_to_save = $first_record;
}else{
   $old_records = json_decode(file_get_contents("users.json"));
   array_push($old_records, $new_message);
   $data_to_save = $old_records;
}

$encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);

if(!$errors){
   file_put_contents("users.json", $encoded_data, LOCK_EX);
}
