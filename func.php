<?php

function getAllCat()
{
	include("db.php");
	$sql = $db->query("SELECT * FROM `categories`");
	if($sql)
	{
		return $sql;
	}
}

function getCatById($id)
{
	include("db.php");
	$id = mysqli_real_escape_string($db, $id);
	$sql = $db->query("SELECT * FROM `categories` WHERE `id` = '$id'");
	if($sql)
	{
		return $sql;
	}
}

function getAllKruj()
{
	include("db.php");
	$sql = $db->query("SELECT * FROM `krujok`");
	if($sql)
	{
		return $sql;
	}
}

function getKrujByCat($catid)
{
	include("db.php");
	$catid = mysqli_real_escape_string($db, $catid);
	$sql = $db->query("SELECT * FROM `krujok` WHERE `categorie` = '$catid'");
	if($sql)
	{
		return $sql;
	}
}

function getKrujById($id)
{
	include("db.php");
	$id = mysqli_real_escape_string($db, $id);
	$sql = $db->query("SELECT * FROM `krujok` WHERE `id` = '$id'");
	if($sql)
	{
		return $sql;
	}
}

function passToMd5($password)
{
	$password = md5($password."casdcasdcas");
	return $password;
}

function getAllUsers()
{
	include("db.php");
	$sql = $db->query("SELECT * FROM `admin`");
	if($sql)
	{
		return $sql;
	}
}

function getUserById($id)
{
	include("db.php");
	$sql = $db->query("SELECT * FROM `admin` WHERE `id` = '$id'");
	if($sql)
	{
		return $sql;
	}
}

?>