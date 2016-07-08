<?php
namespace luoyangpeng\ActionLog\Repositories;

use luoyangpeng\ActionLog\Services\clientService;
class ActionLogRepository {


    /**
     * 记录用户操作日志
     * @param $type
     * @param $content
     * @param ActionLog $actionLog
     * @return bool
     */
    public function createActionLog($type,$content)
    {
    	$actionLog = new \luoyangpeng\ActionLog\Models\ActionLog();
    	if(auth()->check()){
    		$actionLog->uid = auth()->user()->id;
    		$actionLog->username = auth()->user()->name;
    	}else{
    		$actionLog->uid=0;
    		$actionLog->username ="访客";
    	}
       	$actionLog->browser = clientService::getBrowser($_SERVER['HTTP_USER_AGENT'],true);
       	$actionLog->system = clientService::getPlatForm($_SERVER['HTTP_USER_AGENT'],true);
       	$actionLog->url = request()->getRequestUri();
        $actionLog->ip = request()->getClientIp();
        $actionLog->type = $type;
        $actionLog->content = $content;
        $res = $actionLog->save();

        return $res;
    }
}