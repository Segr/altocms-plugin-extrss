<?php
class PluginExtrss_ModuleTopic_EntityTopic extends PluginExtrss_Inherits_ModuleTopic_EntityTopic {
    public function CreateRssItem() {
        list($sTextShort, $sTextNew, $sTextCut) = E::ModuleText()->Cut($this->getTextSource());

        $aRssItemData = array(
            'title' => $this->getTitle(),
            'description' => $sTextShort,
            'content' => $sTextNew,
            'link' => $this->getUrl(),
            'author' => $this->getUser() ? $this->getUser()->getMail() : '',
            'authorname' => $this->getUser() ? $this->getUser()->getDisplayName() : '',
            'authorurl' => $this->getUser() ? $this->getUser()->getUserUrl() : '',
            'guid' => $this->getUrlShort(),
            'comments' => $this->getUrl() . '#comments',
            'pub_date' => $this->getDateShow() ? date('r', strtotime($this->getDateShow())) : '',
        );

        if ($oContentType = $this->getContentType()) {
            foreach ($oContentType->getFields() as $oField) {
                $oParamName = F::TranslitUrl($oField->getFieldName());
                $oParamValue = '';
                if ($oTopicField = $this->getField($oField->getFieldId())) {
                    $oParamValue = $oTopicField->getValue();
                }
                $aRssItemData['addparam'][$oParamName] = $oParamValue;
            }
        }

        $oRssItem = E::GetEntity('ModuleRss_EntityRssItem', $aRssItemData);

        return $oRssItem;
    }
}