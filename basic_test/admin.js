//监听端口
var socket = new WebSocket('ws://192.168.1.110:9502');

//监听是否连接服务器成功触发
socket.onopen = function () {
    console.log('Connected!');
    socket.send("客服端上线");//重要!!客户端返回服务器
};
$("body").keydown(function() {
     if (event.keyCode == "13") {
         $('#push_button').click();
     }
 });
$("#push_button").click(function(){
    var text = $("#text").val();
    socket.send(text);
    $("#text").val("");
});
//接收到服务器数据时触发
socket.onmessage = function (event) {
    //document.getElementById("push_content").innerHTML = event.data;
    var Cts = event.data;
    if(Cts.indexOf("客户") >= 0 ) {
        $("#push_content").append("<div style='text-align:left'>"+event.data+"<br /><br /></div>");
    } else {
        $("#push_content").append("<div style='text-align:right'>我:"+event.data+"<br /><br /></div>");
    }

    $('#push_content').scrollTop( $('#push_content')[0].scrollHeight );
};

//与服务器连接断开触发
socket.onclose = function () {
    console.log('Lost connection!');
};

//与服务器连接出现错误触发
socket.onerror = function () {
    console.log('Error!');
};
