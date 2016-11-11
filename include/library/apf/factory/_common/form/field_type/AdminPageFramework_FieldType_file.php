<?php 
/**
	Admin Page Framework v3.8.10 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/fetch-tweets>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class FetchTweets_AdminPageFramework_FieldType_text extends FetchTweets_AdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array('text', 'password', 'date', 'datetime', 'datetime-local', 'email', 'month', 'search', 'tel', 'url', 'week',);
    protected $aDefaultKeys = array();
    protected function getStyles() {
        return ".fetch-tweets-field.fetch-tweets-field-text > .fetch-tweets-input-label-container {vertical-align: middle; }.fetch-tweets-field.fetch-tweets-field-text > .fetch-tweets-input-label-container.fetch-tweets-field-text-multiple-labels {display: block;}";
    }
    protected function getField($aField) {
        $_aOutput = array();
        foreach (( array )$aField['label'] as $_sKey => $_sLabel) {
            $_aOutput[] = $this->_getFieldOutputByLabel($_sKey, $_sLabel, $aField);
        }
        $_aOutput[] = "<div class='repeatable-field-buttons'></div>";
        return implode('', $_aOutput);
    }
    private function _getFieldOutputByLabel($sKey, $sLabel, $aField) {
        $_bIsArray = is_array($aField['label']);
        $_sClassSelector = $_bIsArray ? 'fetch-tweets-field-text-multiple-labels' : '';
        $_sLabel = $this->getElementByLabel($aField['label'], $sKey, $aField['label']);
        $aField['value'] = $this->getElementByLabel($aField['value'], $sKey, $aField['label']);
        $_aInputAttributes = $_bIsArray ? array('name' => $aField['attributes']['name'] . "[{$sKey}]", 'id' => $aField['attributes']['id'] . "_{$sKey}", 'value' => $aField['value'],) + $this->getAsArray($this->getElementByLabel($aField['attributes'], $sKey, $aField['label'])) + $aField['attributes'] : $aField['attributes'];
        $_aOutput = array($this->getElementByLabel($aField['before_label'], $sKey, $aField['label']), "<div class='fetch-tweets-input-label-container {$_sClassSelector}'>", "<label for='" . $_aInputAttributes['id'] . "'>", $this->getElementByLabel($aField['before_input'], $sKey, $aField['label']), $_sLabel ? "<span " . $this->getLabelContainerAttributes($aField, 'fetch-tweets-input-label-string') . ">" . $_sLabel . "</span>" : '', "<input " . $this->getAttributes($_aInputAttributes) . " />", $this->getElementByLabel($aField['after_input'], $sKey, $aField['label']), "</label>", "</div>", $this->getElementByLabel($aField['after_label'], $sKey, $aField['label']),);
        return implode('', $_aOutput);
    }
}
class FetchTweets_AdminPageFramework_FieldType_file extends FetchTweets_AdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array('file',);
    protected $aDefaultKeys = array('attributes' => array('accept' => 'audio/*|video/*|image/*|MIME_type',),);
    protected function setUp() {
    }
    protected function getScripts() {
        return "";
    }
    protected function getStyles() {
        return "";
    }
    protected function getField($aField) {
        return parent::getField($aField) . $this->getHTMLTag('input', array('type' => 'hidden', 'value' => '', 'name' => $aField['attributes']['name'] . '[_dummy_value]',)) . $this->getHTMLTag('input', array('type' => 'hidden', 'name' => '__unset_' . $aField['_structure_type'] . '[' . $aField['_input_name_flat'] . '|_dummy_value' . ']', 'value' => $aField['_input_name_flat'] . '|_dummy_value', 'class' => 'unset-element-names element-address',));
    }
}
