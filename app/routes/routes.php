<?php 
use framework\route\Routes;

new Routes([
	"/" => "IndexController",
	"login/" => "LoginController",
	"dashboard/" => "DashBoardController",
	"account" => "AccountController",
	"vehicle" => "VehicleController",
	"logout" => "LogoutController",
	"assign_vehicle" => "AssignVehicleController",
])

?>