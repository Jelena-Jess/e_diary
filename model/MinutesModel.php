<?php
  
class MinutesModel extends ActiveRecord{
	public $id_min, $min; 
	public static $table = "minutes";
	public static $key = "id_min";
}