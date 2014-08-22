<rss version="2.0">
  <channel>
    <title><![CDATA[<?=$title?>]]></title>
    <description><![CDATA[<?=$texts['description']?>]]></description>
    <link><?=$urls['home']?></link>
    <language>en-us</language>
    <?php foreach ($posts as $post) : ?>
        <item>
          <title><![CDATA[<?=$post['title']?>]]></title>
          <description><![CDATA[]]></description>
          <link><?=$post['url']?></link>
          <pubDate></pubDate>
        </item>
    <?php endforeach; ?>
  </channel>
</rss>