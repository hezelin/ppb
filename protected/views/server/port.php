<h1> 接口说明 </h1>

<div class="panel panel-default">
    <div class="panel-heading">服务器列表接口</div>
    <div class="panel-body">
        <div class="page-header">
            <h1>url <small> http://192.168.0.226/server/index</small></h1>
            <h1>参数 <small> </small></h1>
            <pre>

        "id": 自增id
        "agent_id": 平台id
        "agent_name": 平台名字
        "server_id": 服务器id
        "server_name": 服务器名字
        "ip":   IP地址
        "port": 端口
        "is_open": 是否开启（0：关闭，1开启）
        "is_show": 是否显示（0：关闭，1显示）
        "status": 服务器状态（'-2'=>'未开启','-1'=>'维护中','0'=>'正常','1'=>'火爆','2'=>'新服','3'=>'新服(火爆)','5'=>'推荐','6'=>'首推','7'=>'爆满'）
        "order": 排列号（数字越大越前）
        "create_time": 创建时间戳
            </pre>
            <h1>返回 <small> json 数据</small></h1>
            <pre>
{
    "recommend": [
        {
            "id": "1",
            "agent_id": "1",
            "agent_name": "pp",
            "server_id": "1",
            "server_name": "测试服1",
            "ip": "112.134.53.15",
            "port": "2208",
            "is_open": "1",
            "status": "-2",
            "order": "1",
            "create_time": "1414744012"
        }
    ],
    "list": [
        {
            "id": "4",
            "agent_id": "1",
            "agent_name": "pp",
            "server_id": "3",
            "server_name": "测试3",
            "ip": "124.131.33.66",
            "port": "2209",
            "is_open": "1",
            "status": "0",
            "order": "3",
            "create_time": "1415070205"
        },
        {
            "id": "2",
            "agent_id": "1",
            "agent_name": "pp",
            "server_id": "2",
            "server_name": "测试2",
            "ip": "134.153.55.33",
            "port": "2342",
            "is_open": "1",
            "status": "0",
            "order": "2",
            "create_time": "1415070746"
        }
    ]
}
            </pre>

        </div>
    </div>
</div>