<?php
  
class PeriodModel extends ActiveRecord{
	public $id_period, $period; 
	public static $table = "period";
	public static $key = "id_period"; 
}