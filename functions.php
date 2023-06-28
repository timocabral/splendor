<?php
//adicione esse código dentro do functions.php
final class Person {

    public static function getFakeDatabase(): array {
        return [
            ['nome'=> "Thymochenko Cabral", 'codigo_pessoal'=>"0077"],
            ['nome'=> "unknown user 1", 'codigo_pessoal'=>"0078"],
            ['nome'=> "unknown user 2", 'codigo_pessoal'=>"0079"],
            ['nome'=> "unknown user 3", 'codigo_pessoal'=>"0080"],
            ['nome'=> "unknown user 4", 'codigo_pessoal'=>"0081"],
        ];
    }
 }

add_filter( 'splendor_test', function($code): array {
    foreach(Person::getFakeDatabase() as $k=>$user){
        //var_dump($user['codigo_pessoal']);
        if($code === $user['codigo_pessoal']){
            return $user;
        }
    }
 });

$helloFilter = apply_filters('splendor_test', $code="0077");
var_dump($helloFilter);
