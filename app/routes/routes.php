<?php 
use framework\route\Routes;

new Routes([
	"/" => "IndexController",
	"info" => "InfoController",
	"login/" => "LoginController",
	"dashboard/" => "DashBoardController",
	"account" => "AccountController",
	"vehicle" => "VehicleController",
	"logout" => "LogoutController",
	"assign_vehicle" => "AssignVehicleController",
])

?>