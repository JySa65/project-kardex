<?php 
/**
 * 
 */

namespace app\models;
use framework\basedatos\Model;
class ProductModel extends Model
{
	protected static $table= "product";	

	public function all_products()
	{
		$query = "SELECT p.name, p.description, p.id, c.code as id_category, p.price 
			FROM product as p 
			LEFT JOIN category as c 
			ON p.id_category = c.id";
		return $this->execute_query($query);
	}

	public function get_products_by_filter($id, $date_min, $date_max)
	{
		$query = "SELECT p.name, i.created_at, i.type, i.quantity FROM inpout as i 
					LEFT JOIN reason as r 
					ON i.id_reason = r.id
					LEFT JOIN product as p
					ON p.id=i.id_product 
					where r.id_institute={$id}
					and (i.created_at>='{$date_min} 00:00:00'
					and i.created_at<='{$date_max} 00:00:00')
					order by i.created_at asc";
		return $this->execute_query($query);	
	}

	public function get_products_by_filter_product($id, $product, $date_min, $date_max)
	{
		$query = "SELECT * FROM inpout as i 
					LEFT JOIN reason as r 
					ON i.id_reason = r.id
					LEFT JOIN product as p
					ON p.id=i.id_product 
					where r.id_institute={$id}
					and p.id={$product}
					and (i.created_at>='{$date_min} 00:00:00'
					and i.created_at<='{$date_max} 00:00:00')
					order by i.created_at asc";
		return $this->execute_query($query);	
	}

	public function get_products_by_filter_type($id, $product, $type, $date_min, $date_max)
	{
		$query = "SELECT * FROM inpout as i 
					LEFT JOIN reason as r 
					ON i.id_reason = r.id
					LEFT JOIN product as p
					ON p.id=i.id_product 
					where r.id_institute={$id}
					and p.id={$product}
					and i.type = {$type}
					and (i.created_at>='{$date_min} 00:00:00'
					and i.created_at<='{$date_max} 00:00:00')
					order by i.created_at asc";
		return $this->execute_query($query);	
	}
}
?>