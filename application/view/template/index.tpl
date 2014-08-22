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
            <p id="main-title"><a href="<?=$urls['home']?>"><?=$texts['title']?></a></p>
            <p id="main-tagline"><?=$texts['tagline']?></p>
        </header>
        <div id="main-content">

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

                <?php break; default: ?>

                    404

            <?php endswitch; ?>
        </div>
        <footer>
            <p id="footer-links">
                <a href="<?=$urls['all']?>"><?=$texts['all-posts']?></a>
            </p>
            <p id="footer-pagination">

                <?php if ($urls['pagination']) : ?>

                    <?php if ($urls['pagination']['previous']) : ?>
                        <a href="<?=$urls['pagination']['previous']?>" class="previous">&lsaquo; &lsaquo;</a>
                    <?php endif; ?>

                    <?php if ($urls['pagination']['previous'] && $urls['pagination']['next']) : ?>

                    <?php endif; ?>

                    <?php if ($urls['pagination']['next']) : ?>
                        <a href="<?=$urls['pagination']['next']?>" class="next">&rsaquo; &rsaquo;</a>
                    <?php endif; ?>

                <?php endif; ?>
            </p>
        </footer>

    </div>
</body>
</html>