<?php


namespace socket\channels;


use yii\base\BaseObject;

class PushMessageChannel extends BaseObject implements \yiiplus\websocket\ChannelInterface
{
    public function execute($fd, $data)
    {
        return [
            $fd, // 第一个参数返回客户端ID，多个以数组形式返回
            $data->message // 第二个参数返回需要返回给客户端的消息
        ];
    }

    public function close($fd)
    {
        return false;
    }
}
