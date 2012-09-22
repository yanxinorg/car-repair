<?php 
/**
 * 
 * Notice(公告)
 *
 * @package      	companycms
 * @author          zxz (QQ:396774497)
 * @copyright     	Copyright (c) 2011-2013  (http://www.tengzhiinfo.com)
 * @license         http://www.tengzhiinfo.com/license.txt
 * @version        	$Id: NoticeModel.class.php v1.0 2011-7-28 Administrator tengzhiwangluoruanjian $

 */
 
import("AdvModel");
class NoticeModel extends AdvModel 
{
    protected $_validate = array(
        array('title', 'require', '标题必填', 0, '', Model:: MODEL_BOTH),
        array('content', 'require', '内容必填', 0,'', Model:: MODEL_BOTH),
    );
    protected $_auto = array(
        array('title', 'dHtml', Model:: MODEL_BOTH, 'function'),        
        array('start_time', 'strtotime', Model:: MODEL_BOTH, 'function'),        
        array('end_time', 'strtotime', Model:: MODEL_BOTH, 'function'),        
        array('create_time', 'time', Model:: MODEL_BOTH, 'function'),        
    );
}