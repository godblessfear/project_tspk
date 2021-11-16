<div class="main">
	<div class="container">
		<?php
			if(isset($_GET['catid']))
			{
				$catid = $_GET['catid'];
				$items = getKrujByCat($catid);
				while ($item = mysqli_fetch_array($items)) {
print <<<HERE
<div class="card mb-5">
<div class="card-body">
<div class="item">
<h4 class="card-title"><a href="krug.php?id={$item['id']}">{$item['name']}</a></h4>
<img src="img/{$item['image']}" class="itemImg">
<div class="card-text">{$item['description']}</div>
</div></div></div>
HERE;
			}
		}
			else
			{
				$items = getAllKruj();
				while ($item = mysqli_fetch_array($items)) {
print <<<HERE
<div class="card mb-5">
<div class="card-body">
<div class="item">
<h4 class="card-title"><a href="krug.php?id={$item['id']}">{$item['name']}</a></h4>
<img src="img/{$item['image']}" class="itemImg">
<div class="card-text">{$item['description']}</div>
</div></div></div>
HERE;
				}
			}

		?>
		
	</div>
</div>