<?php

defined('TYPO3') or die;

call_user_func(static function () {
    $ll = 'LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:';
    $versionInformation = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);
    if ($versionInformation->getMajorVersion() > 11) {
        // required fields
        foreach (['tx_news_domain_model_link' => ['uri'], 'tx_news_domain_model_news' => ['title', 'externalurl'], 'tx_news_domain_model_tag' => ['title']] as $table => $fields) {
            foreach ($fields as $field) {
                $GLOBALS['TCA'][$table]['columns'][$field]['config']['required'] = true;
                $GLOBALS['TCA'][$table]['columns'][$field]['config']['eval'] = str_replace('required', '', $GLOBALS['TCA'][$table]['columns'][$field]['config']['required']);
            }
        }
    }
});
