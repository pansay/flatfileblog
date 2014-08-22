<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
    <meta name="description" content="<?=$texts['description']?>" />
    <meta name="keywords" content="<?=$texts['keywords']?>" />
    <link rel="stylesheet" href="<?=$urls['style']?>" />
</head>
<body>
	<div id="main">
		<header>
			<h1><a href="<?=$urls['home']?>"><?=$texts['title']?></a></h1>
			<p><?=$texts['tagline']?></p>

		 	<p class="all-posts"><a href="<?=$urls['all']?>"><?=$texts['all-posts']?></a></p>
		</header>

		<?php switch ($view) : 

			case 'post': ?>

				<article id="post">
					<p class="time"><time><?=$post['date']?></time></p>
					<div class="post-content"><?=$post['content']?></div>
				</article>

			<?php break; case 'all' : ?>

				<div id="posts-lists">
					<ul>

						<?php foreach ($posts as $post) : ?>

							<li>
								<article>
									<p class="time"><time><?=$post['date']?></time></a>&nbsp;</p>
									<a href="<?=$post['url']?>"><?=$post['title']?></a>
								</article>
							</li>

						<?php endforeach; ?>

					</ul>
				</div>

			<?php break; case 'posts' : ?>

				<div id="posts">
					<ul>

						<?php foreach ($posts as $post) : ?>

							<li>
								<article>
									<p class="time"><a href="<?=$post['url']?>"><time><?=$post['date']?></time></a></p>
									<div class="post-content"><?=$post['content']?></div>
								</article>
							</li>

						<?php endforeach; ?>

					</ul>
				</div>

				<footer>

					<?php if ($urls['pagination']) : ?>

						<?php if ($urls['pagination']['previous']) : ?>
							<a href="<?=$urls['pagination']['previous']?>" class="pagi previous">&lsaquo; &lsaquo;</a>
						<?php endif; ?>

						<?php if ($urls['pagination']['previous'] && $urls['pagination']['next']) : ?>

						<?php endif; ?>

						<?php if ($urls['pagination']['next']) : ?>
							<a href="<?=$urls['pagination']['next']?>" class="pagi next">&rsaquo; &rsaquo;</a>
						<?php endif; ?>

					<?php endif; ?>

				</footer>

			<?php break; default: ?>

				404

		<?php endswitch; ?>

	</div>
</body>
</html>