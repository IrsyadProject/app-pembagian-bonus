<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<style>
		/* ul {
			list-style-type: none;
		} */

		ul ul {
			margin-left: 20px;
		}
	</style>
</head>

<body>
	<div class="container mt-4">
		<?php function display_menu($menu)
		{ ?>
			<ul>
				<?php foreach ($menu as $item) { ?>
					<li>
						<?php echo $item['nama']; ?>
						<?php if (isset($item['child'])) { ?>
							<?php display_menu($item['child']); ?>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
		<?php } ?>

		<?php display_menu($menuTree); ?>
	</div>
</body>

</html>