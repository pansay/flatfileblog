<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
    <meta name="description" content="<?=$texts['description']?>" />
    <meta name="keywords" content="<?=$texts['keywords']?>" />
    <link rel="stylesheet" href="<?=$urls['style']?>" />
    <link rel="alternate" type="application/rss+xml" href="<?=$urls['rss']?>" />
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
                        <div class="post-info">
                            <h1><?=$post['title']?></h1>
                            <time class="dateline"><?=$post['date']?></time>
                        </div>
                        <div class="post-content"><?=$post['content']?></div>
                    </article>
                <?php break; case 'all' : ?>
                    <div id="posts-lists" class="page">
                        <div class="post-info">
                            <h1><?=$texts['all-posts']?></h1>
                        </div>
                        <ul>
                            <?php foreach ($posts as $post) : ?>
                                <li>
                                    <article>
                                        <p class="time"><time><?=$post['date']?></time></p>
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
                                        <div class="post-info">
                                            <h1><?=$post['title']?></h1>
                                            <a href="<?=$post['url']?>" class="dateline"><time><?=$post['date']?></time></a>
                                        </div>
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
            <div id="footer-inner">
                <div class="pagination pagination-left">
                    <?php if ($urls['pagination']['previous']) : ?>
                        <a href="<?=$urls['pagination']['previous']?>" class="previous" title="previous page">&lsaquo; &lsaquo;</a>
                    <?php endif; ?>
                </div>
                <div class="footer-links">
                    <?php if ($urls['all']) : ?>
                        <a href="<?=$urls['all']?>"><?=$texts['all-posts']?></a>
                    <?php endif; ?>
                </div>
                <div class="pagination pagination-right">
                    <?php if ($urls['pagination']['next']) : ?>
                        <a href="<?=$urls['pagination']['next']?>" class="next" title="next page">&rsaquo; &rsaquo;</a>
                    <?php endif; ?>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>