<?php
  
class HoursModel extends ActiveRecord{
	public $id, $hour; 
	public static $table = "hours";
	public static $key = "id";
}