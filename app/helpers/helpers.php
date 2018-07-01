<?php
use app\models\ReasonModel; 
function existence_products($id)
{
	$reason = new ReasonModel;
	$entry = $reason->execute_query("SELECT sum(quantity) FROM inpout WHERE id_product = {$id} and type = 1");
	$output = $reason->execute_query("SELECT sum(quantity) FROM inpout WHERE id_product = {$id} and type = 2");
	return (int)$entry[0]->sum - (int)$output[0]->sum;
}
?>
