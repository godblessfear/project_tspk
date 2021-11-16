<?php session_start();include("../aot.php") ?>
<?php
if(!isset($_SESSION['login']))
{
	header("Location: index.php");
}
?>
<?php

if(isset($_POST['id_kruj']))
{
	if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
	{
		if($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/png')
		{
			$tmpimg = $_FILES['image']['tmp_name'];
			$img = $_FILES['image']['name'];
			$imgcopy = '../img/'. $_FILES['image']['name'];
			$img = mysqli_real_escape_string($db, $img);
		}
		else
		{
			$_SESSION['error']['file_red'] = 'is-invalid';
			$_SESSION['error']['file_text'] = 'Формат файла не поддерживается';
		}
	}
	else
	{
		$krujok = getKrujById($_POST['id_kruj']);
		$krujok = mysqli_fetch_array($krujok);
		$img = $krujok['image'];
	}	
}
else
{
	if(isset($_FILES['image']) && $_FILES['image'] != '')
	{
		if($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/png')
		{
			$tmpimg = $_FILES['image']['tmp_name'];
			$img = $_FILES['image']['name'];
			$imgcopy = '../img/'. $_FILES['image']['name'];
			$img = mysqli_real_escape_string($db, $img);
		}
		else
		{
			$_SESSION['error']['file_red'] = 'is-invalid';
			$_SESSION['error']['file_text'] = 'Формат файла не поддерживается';
		}
	}
	else
	{
		$_SESSION['error']['file_red'] = 'is-invalid';
		$_SESSION['error']['file_text'] = 'Вы не загрузили изображение';
	}
}



if(isset($_POST['name']) && $_POST['name'] != '')
{

	$name = mysqli_real_escape_string($db, $_POST['name']);
}
else
{
	$_SESSION['error']['name_red'] = 'is-invalid';
	$_SESSION['error']['name_text'] = 'Поле не заполнено';
}

if(isset($_POST['description']) && $_POST['description'] != '')
{
	$description = mysqli_real_escape_string($db, $_POST['description']);
}
else
{
	$_SESSION['error']['description_red'] = 'is-invalid';
	$_SESSION['error']['description_text'] = 'Поле не заполнено';
}

if(isset($_POST['mesto']) && $_POST['mesto'] != '')
{
	$mesto = mysqli_real_escape_string($db, $_POST['mesto']);
}
else
{
	$_SESSION['error']['mesto_red'] = 'is-invalid';
	$_SESSION['error']['mesto_text'] = 'Поле не заполнено';
}

if(isset($_POST['raspisanie']) && $_POST['raspisanie'] != '')
{
	$raspisanie = mysqli_real_escape_string($db, $_POST['raspisanie']);
}
else
{
	$_SESSION['error']['raspisanie_red'] = 'is-invalid';
	$_SESSION['error']['raspisanie_text'] = 'Поле не заполнено';
}

if(isset($_POST['teacher']) && $_POST['teacher'] != '')
{
	$teacher = mysqli_real_escape_string($db, $_POST['teacher']);
}
else
{
	$_SESSION['error']['teacher_red'] = 'is-invalid';
	$_SESSION['error']['teacher_text'] = 'Поле не заполнено';
}

if(isset($_POST['categorie']))
{
	$categorie = mysqli_real_escape_string($db, $_POST['categorie']);
}


if(isset($_POST['id_kruj']))
{
	$id_kruj = $_POST['id_kruj'];	
		if(isset($name) && isset($description) && isset($mesto) && isset($raspisanie) && isset($teacher) && isset($categorie) && isset($img))
		{
			$sql = $db->query("UPDATE `krujok` SET `name`='$name',`description`='$description',`image`='$img',`mesto`='$mesto',`raspisanie`='$raspisanie',`teacher`='$teacher',`categorie`='$categorie' WHERE `id` ='$id_kruj'");
			if($sql)
			{
				header("Location: add_cruj.php?id={$id_kruj}");
				copy($tmpimg, $imgcopy);
			}
			else
			{
				header("Location: add_cruj.php?id={$id_kruj}");
			}
		}
		
	else
	{
		header("Location: add_cruj.php?id={$id_kruj}");
	}
}
else
{
	if(isset($name) && isset($description) && isset($mesto) && isset($raspisanie) && isset($teacher) && isset($categorie) && isset($tmpimg) && isset($img))
		{
		if(isset($_POST['id_kruj']))
		{
			
		}
		else
		{
			$sql = $db->query("INSERT INTO `krujok` (`name`, `description`, `image`, `mesto`, `raspisanie`, `teacher`, `categorie`) VALUES ('$name', '$description', '$img', '$mesto', '$raspisanie', '$teacher', '$categorie')");
			if($sql)
			{
				copy($tmpimg, $imgcopy);
				header("Location: all_cruj.php");
			}
			else
			{
				header("Location: add_cruj.php");
			}
		}

		
	}
	else
	{
		header("Location: add_cruj.php");
	}

}
?>