<?php

namespace SurpriseTech\DingtalkApi\Services;

class DingNoticeService
{
    /**
     * 消息通知
     *
     * @param  array  $userid_list 用户列表
     * @param  string  $content 消息内容
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendNotify(array $userid_list, string $content): void
    {
        $dingtalk = new YiDaServices();
        try {
            $dingtalk->httpSend(
                'https://oapi.dingtalk.com/topapi/message/corpconversation/asyncsend_v2',
                [
                    'agent_id' => config('services.yida.agent_id'),
                    'userid_list' => implode(',', $userid_list),
                    'msg' => json_encode([
                        'msgtype' => 'text', // text image{MediaId}  file{MediaId}
                        'text' => [
                            'content' => $content,
                        ],
                    ], JSON_UNESCAPED_UNICODE),
                ],
                'POST'
            );
        } catch (\Exception $err) {
            info($err->getMessage());
        }
    }
}
