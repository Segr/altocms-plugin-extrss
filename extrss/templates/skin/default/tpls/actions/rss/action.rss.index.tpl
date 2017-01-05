<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" {$oRss->getRssAttributesStr()} xmlns:content="http://purl.org/rss/1.0/modules/content/">
    {foreach $oRss->getChannels() as $oRssChannel}
    <channel>
        <title>{$oRssChannel->getTitle()}</title>
        <link>{$oRssChannel->getLink()}</link>
        <description><![CDATA[{$oRssChannel->getDescription()}]]></description>
        <language>{$oRssChannel->getLanguage()}</language>
        <managingEditor>{$oRssChannel->getManagingEditor()}</managingEditor>
        <webMaster>{$oRssChannel->getWebMaster()}</webMaster>
        <generator>{$oRssChannel->getGenerator()}</generator>
        {foreach $oRssChannel->getItems() as $oRssItem}
            <item>
                <title>{$oRssItem->getTitle()|escape:'html'}</title>
                <guid isPermaLink="true">{$oRssItem->getGuid()}</guid>
                <link>{$oRssItem->getLink()}</link>
                <author>
                    <name>{$oRssItem->getAuthorname()}</name>
                    <url>{$oRssItem->getAuthorurl()}</url>
                    <email>{$oRssItem->getAuthor()}</email>
                </author>
                <description><![CDATA[{$oRssItem->getDescription()}]]></description>
                <content:encoded><![CDATA[{$oRssItem->getContent()}]]></content:encoded>
                <pubDate>{$oRssItem->getPubDate()}</pubDate>
                {foreach $oRssItem->getCategories() as $sCategory}
                    <category>{$sCategory}</category>
                {/foreach}
                {$oTopicFields = $oRssItem->getAllProps()}
                {foreach $oTopicFields['addparam'] as $oPropName=>$oPropValue}
                    <{$oPropName}>{$oPropValue}</{$oPropName}>
                {/foreach}
            </item>
        {/foreach}
    </channel>
    {/foreach}
</rss>
