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
}
?>