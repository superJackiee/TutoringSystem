<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>

<rss version="2.0"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:admin="http://webns.net/mvcb/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:content="http://purl.org/rss/1.0/modules/content/">

    <channel>

        <title><?php echo $feed_name; ?></title>
        <link><?php echo $feed_url; ?></link>
        <description><?php echo $page_description; ?></description>
        <dc:language><?php echo $page_language; ?></dc:language>
        <dc:creator><?php echo $creator_email; ?></dc:creator>
        <dc:rights>Copyright <?php echo gmdate("Y", time()); ?> <?php echo html_escape($settings->site_title); ?></dc:rights>

<?php foreach ($posts as $post): ?>
<?php if ($post->post_type == "video"): ?>
        <item>
            <title><?php echo xml_convert($post->title); ?></title>
            <link><?php echo base_url() . "video/" . html_escape($post->title_slug) . "/" . html_escape($post->id); ?></link>
            <guid><?php echo base_url() . "video/" . html_escape($post->title_slug) . "/" . html_escape($post->id); ?></guid>
            <description><![CDATA[ <?php echo character_limiter($post->summary, 200); ?> ]]></description>
            <pubDate><?php echo $post->created_at; ?></pubDate>
            <dc:creator><?php echo html_escape($post->username); ?></dc:creator>
        </item>
<?php else: ?>
    <item>
        <title><?php echo xml_convert($post->title); ?></title>
        <link><?php echo base_url() . "post/" . html_escape($post->title_slug) . "/" . html_escape($post->id); ?></link>
        <guid><?php echo base_url() . "post/" . html_escape($post->title_slug) . "/" . html_escape($post->id); ?></guid>
        <description><![CDATA[ <?php echo character_limiter($post->summary, 200); ?> ]]></description>
        <pubDate><?php echo $post->created_at; ?></pubDate>
        <dc:creator><?php echo html_escape($post->username); ?></dc:creator>
    </item>
<?php endif; ?>
<?php endforeach; ?>

    </channel>
</rss>