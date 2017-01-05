<?php
class PluginExtrss_ActionRss extends PluginExtrss_Inherits_ActionRss {

    protected function SetPerPageFromQuery($config='') {
		$show = isset($_GET['show']) ? $_GET['show'] : 0;
		$show = ($show=='all') ? 1000 : intval($show);
		$show = ($show<10) ? 10 : $show;
		if ($show) C::Set($config, $show);
	}

	protected function RssTopics() {
		$this->SetPerPageFromQuery('module.topic.per_page');
		return parent::RssTopics();
	}

    protected function RssWall() {
		$this->SetPerPageFromQuery('module.wall.per_page');
		parent::RssWall();
	}

    protected function RssComments() {
		$this->SetPerPageFromQuery('module.comment.per_page');
		return parent::RssComments();
	}

    protected function RssBlog() {
		$this->SetPerPageFromQuery('module.topic.max_rss_count');
		return parent::RssBlog();
	}

    protected function RssPersonalBlog() {
		$this->SetPerPageFromQuery('module.topic.max_rss_count');
		parent::RssPersonalBlog();
	}
}
