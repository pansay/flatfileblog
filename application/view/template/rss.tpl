<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss version="2.0">
  <channel>
    <title><![CDATA[<?=$title?>]]></title>
    <description><![CDATA[<?=$texts['description']?>]]></description>
    <link><?=$urls['full']?></link>
    <language>en-us</language>
    <?php foreach ($posts as $post) : ?>
        <item>
          <title><![CDATA[<?=$post['title']?>]]></title>
          <description><![CDATA[<?=$post['content']?>]]></description>
          <link><?=$post['url-full']?></link>
          <pubDate><?=$post['date-rss']?></pubDate>
        </item>
    <?php endforeach; ?>
  </channel>
</rss>