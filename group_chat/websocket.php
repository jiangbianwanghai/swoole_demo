<?php
$map    = array(); //客户端集合
$server = new swoole_websocket_server("192.168.1.110", 9502);

$server->on('open', function ($server, $req) {
    echo "connection open: {$req->fd}\n";
    global $map; //客户端集合
    $map[$req->fd] = $req->fd; //首次连上时存起来
});

$server->on('message', function ($server, $frame) {
    echo "received message: {$frame->data}\n";
    global $map; //客户端集合
    $data = '客户端 ' . $frame->fd . ' 号说:' . $frame->data;
    foreach ($map as $fd) {
        $server->push($fd, $data); //循环广播
    }
});

$server->on('close', function ($server, $fd) {
    echo "connection close: {$fd}\n";
});

$server->start();
