<?php
   
class LessonsModel extends ActiveRecord{
	public $id_l, $lesson; 
	public static $table = "lessons";
	public static $key = "id_l";
}