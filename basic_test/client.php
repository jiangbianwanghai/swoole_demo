<?php
$agent = $_SERVER['HTTP_USER_AGENT']; //获得头部信息
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>测试Websocket</title>
</head>
<body>
<div id="main">
    <div class="msgs">
        消息通知：<span id="push_content" style="color:red"></span>
    </div>
</div>
</body>
<script>
    //监听端口
    var socket = new WebSocket('ws://192.168.1.110:9502');

    //监听是否连接服务器成功触发
    socket.onopen = function () {
        console.log('Connected!');
        socket.send("<?php echo $agent ?>");//重要!!客户端返回服务器
    };

    // **接收到服务器数据**触发
    socket.onmessage = function (event) {
        //console.log(event);
        //alert('Received data: ' + event.data);
        document.getElementById("push_content").innerHTML = event.data;
        //socket.close();
    };

    //与服务器连接断开触发
    socket.onclose = function () {
        console.log('Lost connection!');
    };

    //与服务器连接出现错误触发
    socket.onerror = function () {
        console.log('Error!');
    };
</script>
</html>
