<?php
  
class DaysModel extends ActiveRecord{
	public $id_days, $day; 
	public static $table = "days";
	public static $key = "id_days";
}