<div class="main">
	<div class="container">		
		<?php
			echo "<h1>{$item['name']}</h1>";
			echo "<img src='img/{$item['image']}' class='itemImg'><br>";
			echo "<span>{$item['description']}</span><br>";
			echo "<b>Место проведения: </b>{$item['mesto']}<br>";
			echo "<b>Расписание: </b>{$item['raspisanie']}<br>";
			echo "<b>Руководитель: </b>{$item['teacher']}<br>";
		?>
	</div>
</div>