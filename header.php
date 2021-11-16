<div class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<div class="container-fluid">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01"> <a class="navbar-brand" href="index.php">ТСПК</a>
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Кружки</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<?php
										$categ = getAllCat();
										while ($cat = mysqli_fetch_array($categ)) {
											echo "<li><a class='dropdown-item' href='?catid={$cat['id']}'>{$cat['name']}</a></li>";
										}

									?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
	</div>