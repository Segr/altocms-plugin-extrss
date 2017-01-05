<?php
if (!class_exists('Plugin')) die('Hacking attemp!');

class PluginExtrss extends Plugin {
    public $aDelegates = array(
        'template' => array(
            'actions/rss/action.rss.index.tpl'=>'_tpls/actions/rss/action.rss.index.tpl',
			),
		);
	protected $aInherits=array(
        'module' => array(
			'ModuleTopic_EntityTopic',
			),
        'action' => array(
			'ActionRss',
			),
		);
    public function Activate() {
		return true;
    }
    public function Deactivate(){
        return true;
    }
    public function Init() {
    }
}
?>
