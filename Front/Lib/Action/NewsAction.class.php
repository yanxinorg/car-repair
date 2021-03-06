<?php
/**
 * 
 * 新闻
 *
 * @package      	companycms
 * @author          zxz (QQ:396774497)
 * @copyright     	Copyright (c) 2011-2013  (http://www.tengzhiinfo.com)
 * @license         http://www.tengzhiinfo.com/license.txt
 * @version        	$Id: NewsAction.class.php v1.0 2011-7-28 Administrator tengzhiwangluoruanjian $
 */

class NewsAction extends GlobalAction
{
    public $dao;
    function _initialize()
    {
    	parent::_initialize();
        $data['newsCategory'] = getCategory(getCache('Category'), 1);
        $this->assign($data);
    }
    
    /**
     * 列表
     *
     */
    public function index()
    {
    	$this->setSeoInfo();
    	$category = intval($_GET['category']);
        $sql = 'SELECT a.*, b.title as categoryName FROM _DBPREFIX_news a LEFT JOIN _DBPREFIX_category b on a.category_id=b.id WHERE 1=1';
        if (!empty($_GET['category'])) {
        	$sql.= " and a.category_id=".formatQuery($category);
        }
    	if (!empty($_GET['keyword'])) {
        	$sql.= " and a.title like '%".formatQuery($_GET['keyword'])."%'";
        }
        $sql.= " and a.status=0";
        parent::getSqlList($sql,'a.update_time desc, display_order asc');
        //parent::getJoinList($condition, 'a.id DESC', 15, C('DB_PREFIX').'news a', C('DB_PREFIX').'category b on a.category_id=b.id','a.*, b.title as categoryName');
    }
    
    /**
     * 内容
     *
     */
    public function detail(){
        $titleId = intval($_GET['id']);
       // $commentCount = M('Comment')->where("title_id={$titleId} and module='News'")->count();
       // $this->assign('commentCount', $commentCount);
        $sql = 'SELECT a.*, b.title as categoryName FROM _DBPREFIX_news a LEFT JOIN _DBPREFIX_category b on a.category_id=b.id WHERE a.id='.formatQuery($titleId).' and a.status=0 LIMIT 1 ';
        parent::getSqlDetail($sql, $titleId);
//        $titleId = intval($_GET['id']);
//        $commentCount = M('Comment')->where("title_id={$titleId} and module='News'")->count();
//        $this->assign('commentCount', $commentCount);
//        parent::getJoinDetail(array("a.id={$titleId}", "id={$titleId}"), 'view_count', C('DB_PREFIX').'news a', C('DB_PREFIX').'category b on a.category_id=b.id','a.*, b.title as categoryName');
    }
}