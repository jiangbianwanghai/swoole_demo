<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>客服端上线</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div style="margin: 20px auto; width: 500px;">
    <p style="text-align: center">-——客服端上线——-</p>
    <p>消息面板：</p>
    <div id="push_content" style="color:gray; border: #ccc solid 1px; padding: 10px; background: #f1f1f1;margin-bottom: 10px; height: 500px; overflow-y: scroll;"></div>
    <div>
    <div style="text-align: center">推送消息：<input type="text" id="text" style="width: 380px;" name="content" placeholder="请输入需要推送的信息"><button id="push_button">推送</button></div>
    </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./admin.js?<?php echo time(); ?>"></script>
  </body>
  <script type="text/javascript">
      function add()
      {
          var now = new Date();
          var div = document.getElementById('push_content');
          div.scrollTop = div.scrollHeight-200;
      }
  </script>
</html>
