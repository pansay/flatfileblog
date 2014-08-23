<rss version="2.0">
  <channel>
    <title><![CDATA[<?=$title?>]]></title>
    <description><![CDATA[<?=$texts['description']?>]]></description>
    <link><?=$urls['full']?></link>
    <language>en-us</language>
    <?php foreach ($posts as $post) : ?>
        <item>
          <title><![CDATA[<?=$post['title']?>]]></title>
          <description><![CDATA[]]></description>
          <link><?=$post['url-full']?></link>
          <pubDate><?=$post['date-rss']?></pubDate>
        </item>
    <?php endforeach; ?>
  </channel>
</rss>