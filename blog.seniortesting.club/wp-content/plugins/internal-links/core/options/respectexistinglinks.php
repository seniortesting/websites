<?php

namespace ILJ\Core\Options;

use  ILJ\Helper\Options as OptionsHelper ;
/**
 * Option: Respect existing links
 *
 * @since   1.1.3
 * @package ILJ\Core\Options
 */
class RespectExistingLinks extends AbstractOption
{
    /**
     * @inheritdoc
     */
    public static function getKey()
    {
        return self::ILJ_OPTIONS_PREFIX . 'link_output_respect_existing_links';
    }
    
    /**
     * @inheritdoc
     */
    public static function getDefault()
    {
        return false;
    }
    
    /**
     * @inheritdoc
     */
    public static function isPro()
    {
        return true;
    }
    
    /**
     * @inheritdoc
     */
    public function register( $option_group )
    {
        global  $ilj_fs ;
        return;
    }
    
    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return __( 'Consideration of existing or manually created links', 'ILJ' );
    }
    
    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return __( 'Do not link already manually built link targets', 'ILJ' ) . '<br>' . __( 'Prevents links to URLs that are already linked in the content', 'ILJ' );
    }
    
    /**
     * @inheritdoc
     */
    public function getHint()
    {
        return __( '<small><strong>Attention: activation may have a negative effect on the index building time</strong></small>', 'ILJ' );
    }
    
    /**
     * @inheritdoc
     */
    public function renderField( $value )
    {
        $checked = checked( 1, $value, false );
        OptionsHelper::renderToggle( $this, $checked );
    }

}