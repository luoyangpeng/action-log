<?php
namespace luoyangpeng\ActionLog\Repositories;

use luoyangpeng\ActionLog\Models;

class ActionLogRepository {


    /**
     * 记录用户操作日志
     * @param $type
     * @param $content
     * @param ActionLog $actionLog
     * @return bool
     */
    public function createActionLog($type,$content,ActionLog $actionLog)
    {
        $actionLog->uid = auth()->user()->id;
        $actionLog->name = auth()->user()->name;
        $actionLog->ip = request()->getClientIp();
        $actionLog->type = $type;
        $actionLog->content = $content;
        $res = $actionLog->save();

        return $res;
    }
}