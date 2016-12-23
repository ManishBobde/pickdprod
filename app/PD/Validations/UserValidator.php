<?php
/**
 * Created by PhpStorm.
 * User: Hash
 * Date: 14-01-2016
 * Time: 20:10
 */

namespace PD\Validations;


use PD\Validations\ValidatorService;

class UserValidator extends ValidatorService
{
    public static $rules =[
        'firstName' => 'required',
        'lastName'=>'required',
        'email'=>'required|unique:users'
   ];


}