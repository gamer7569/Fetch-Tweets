<?php
/**
 * Fetch Tweets
 * 
 * Fetches and displays tweets from twitter.com.
 * 
 * http://en.michaeluno.jp/fetch-tweets/
 * Copyright (c) 2013-2016 Michael Uno; Licensed GPLv2
 */

/**
 * Provides an abstract base for adding pages.
 * 
 * @since       2.5.0
 */
abstract class FetchTweets__AdminPage__PageBase extends FetchTweets_PluginUtility {

    protected $_oFactory;
    
    // protected $_aArguments = array();
    
    protected $_sPageSlug = '';
    
    /**
     * Sets up hooks and properties.
     */
    public function __construct( $oFactory ) {
        
        $this->_oFactory     = $oFactory;
        $this->_aArguments   = $this->_getArguments( $oFactory );
        $this->_sPageSlug    = $this->getElement( $this->_aArguments, 'page_slug' );
        
        $this->_construct( $oFactory );
        
        $this->___addPage( $this->_sPageSlug, $this->_aArguments );
        
    }
    
        private function ___addPage( $sPageSlug, $aArguments ) {
            
            if ( ! $sPageSlug ) {
                return;
            }
            
            $this->_oFactory->addSubMenuItems( $aArguments );
            add_action( "load_{$sPageSlug}", array( $this, 'replyToLoadPage' ) );
            
        }

    /**
     * Called when the page loads.
     * 
     * @remark      This method should be overridden in each extended class.
     */
    public function replyToLoadPage( $oFactory ) {
        $this->_loadPage( $oFactory );
    }
    
    protected function _construct( $oFactory ) {}
    
    protected function _getArguments( $oFactory ) { 
        return array(); 
    }
    
    protected function _loadPage( $oFactory ) {}
    
}