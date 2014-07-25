<?php


class Basemodel extends eloquent{
	public static function validate($data){
		return Validator::make($data,static::$rules);
	}
}