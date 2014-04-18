<html>
<head>
	<title>Blog</title>
</head>
<body>
	<h1>Blog</h1>
	<?php foreach ($posts as $post) : ?>
		<article>
			<h2>
				<a href="post.php?id=<?= $post['id'];?>">
					<?= $post['title']?>
				</a>
			</h2>
			<div class="body">
				<?= $post['body']?>
			</div>
		</article>
	<?php endforeach; ?>
</body>
</html>