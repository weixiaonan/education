<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="Shortcut Icon" href="/favicon.ico" />
<title><?=config_item('site_title')?></title>
    <!--
        JQuery EasyUI 1.5.x of Insdep Theme 1.0.0
        演示地址：https://www.insdep.com/example/
        下载地址：https://www.insdep.com
        问答地址：https://bbs.insdep.com

        项目地址：http://git.oschina.net/weavors/JQuery-EasyUI-1.5.x-Of-Insdep-Theme

        QQ交流群：184075694 （优先发布更新主题及内测包）
    -->
    <!--
        注意样式表优先级
        主题样式必须在easyui组件样式后。
    -->

    <link href="themes/insdep/easyui.css" rel="stylesheet" type="text/css">


    <!--
        themes/insdep/easyui_animation.css
        Insdep对easyui的额外增加的动画效果样式，根据需求引入或不引入，此样式不会对easyui产生影响
    -->
    <link href="themes/insdep/easyui_animation.css" rel="stylesheet" type="text/css">

    <!--
        themes/insdep/easyui_plus.css
        Insdep对easyui的额外增强样式,内涵所有 insdep_xxx.css 的所有组件样式
        根据需求可单独引入insdep_xxx.css或不引入，此样式不会对easyui产生影响
    -->
    <link href="themes/insdep/easyui_plus.css" rel="stylesheet" type="text/css">

    <!--
        themes/insdep/insdep_theme_default.css
        Insdep官方默认主题样式,更新需要自行引入，此样式不会对easyui产生影响
    -->
    <link href="themes/insdep/insdep_theme_default.css" rel="stylesheet" type="text/css">

    <!--
        themes/insdep/icon.css
        美化过的easyui官方icons样式，根据需要自行引入
    -->
    <link href="themes/insdep/icon.css" rel="stylesheet" type="text/css">

    <!--
        2017/03/22 新增
        plugin/font-awesome-4.7.0/css/font-awesome.min.css
        第三方图标库样式，用于显示左侧菜单栏图标，根据需要自行引入
    -->
    <link href="plugin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="static/js/kindeditor410/themes/default/default.css" />

    <script type="text/javascript" src="themes/jquery.min.js"></script>
    <!--<script src="static/js/jquery-2.1.3.min.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="themes/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="themes/insdep/jquery.insdep-extend.min.js"></script>



    <script charset="utf-8" src="static/js/kindeditor410/kindeditor.js?aa"></script>
    <script charset="utf-8" src="static/js/kindeditor410/lang/zh_CN.js"></script>

    <script src="static/js/layer/layer.js" type="text/javascript"></script>

</head>

<body>
<div id="master-layout">
    <div data-options="region:'north',border:false,bodyCls:'theme-header-layout'">
        <div class="theme-navigate">


        </div>
</div>
    <!--开始左侧菜单-->
    <div data-options="region:'west',border:false,bodyCls:'theme-left-layout'" style="width:200px;">


        <!--正常菜单-->
        <div class="theme-left-normal">
            <!--theme-left-switch 如果不需要缩进按钮，删除该对象即可-->
            <div class="left-control-switch theme-left-switch"><i class="fa fa-chevron-left fa-lg"></i></div>

            <!--start class="easyui-layout"-->
            <div  class="easyui-layout" data-options="border:false,fit:true">
                <!--start region:'north'-->
                <div data-options="region:'north',border:false" style="height:100px;">
                    <!--start theme-left-user-panel-->
                    <div class="theme-left-user-panel">
                        <dl>
                            <dt>
                                <img src="themes/insdep/images/portrait86x86.png" width="43" height="43">
                            </dt>
                            <dd>
                                <b class="badge-prompt"><?=$this->userInfo['nickname']?> </b>
                                <p><a onclick="reset_pwd()">修改密码</a><i class="text-success"></i></p>
                                <a onclick="login_out()" href="javascript:void(0)">退出</a>
                            </dd>

                        </dl>
                    </div>
                    <!--end theme-left-user-panel-->
                </div>
                <!--end region:'north'-->

                <!--start region:'center'-->
                <div style="height:200px;" data-options="region:'center',border:false">

                    <!--start easyui-accordion-->
                    <div  id="left_menu" class="wu-side-tree">

                    </div>
                  <!--  <div id="left_menu" class="easyui-accordion wu-side-tree" style="width:height:200px;" data-options="border:false,fit:true">
                        <div title="公共信息">
                            <ul class="easyui-datalist e" style="" data-options="border:false,fit:true">
                                <li iconCls="icon-help"><a href="javascript:void(0)" data-icon="icon-help" data-link="index.php?d=admin&c=admin&m=main" iframe="0">菜单导航</a></li>
                                <li>企业文化</li>
                                <li>公文</li>
                                <li>新闻公告</li>
                                <li>重大信息</li>
                            </ul>
                        </div>
                        <div title="个人事务">
                            <ul class="easyui-datalist" data-options="border:false,fit:true">
                                <li>内部邮件</li>
                                <li>我的日志</li>
                                <li>我的提醒</li>
                            </ul>
                        </div>
                        <div title="通讯录"></div>
                        <div title="流程中心">
                            <ul class="easyui-datalist" data-options="border:false,fit:true">
                                <li>启动流程</li>
                                <li>待办流程</li>
                                <li>我发起的流程</li>
                            </ul>
                        </div>
                        <div title="文档中心"></div>
                        <div title="个人设置">
                            <ul class="easyui-datalist" data-options="border:false,fit:true">
                                <li>修改密码</li>
                            </ul>
                        </div>

                    </div>-->
                    <!--end easyui-accordion-->

                </div>
                <!--end region:'center'-->
            </div>
            <!--end class="easyui-layout"-->

        </div>
        <!--最小化菜单-->
        <div class="theme-left-minimal">
            <ul class="easyui-datalist" data-options="border:false,fit:true">
             <!--   <li><i class="fa fa-home fa-2x"></i><p>主题</p></li>
                <li><i class="fa fa-book fa-2x"></i><p>组件</p></li>
                <li><i class="fa fa-pencil fa-2x"></i><p>编辑</p></li>
                <li><i class="fa fa-cog fa-2x"></i><p>设置</p></li>-->
                <li><a class="left-control-switch"><i class="fa fa-chevron-right fa-2x"></i><p>打开</p></a></li>
            </ul>
        </div>

    </div>
    <!--结束左侧菜单-->

   <!-- <div data-options="region:'center',border:false,href:'index.php?d=admin&c=Admin&m=main'"  id="control" style="padding:20px; background:#fff;">

    </div>-->
    <!-- begin of main -->
    <div class="wu-main" data-options="region:'center'">
        <div id="wu-tabs" class="easyui-tabs" data-options="border:false,fit:true">
            <div title="系统主页" data-options="href:'index.php?d=admin&c=Admin&m=main',closable:false,iconCls:'icon-tip',cls:'pd3'"></div>
        </div>
    </div>
    <!-- end of main -->
</div>

<!--<script type="text/javascript" src="http://cdn-hangzhou.goeasy.io/goeasy.js"></script>-->


<script>

   /* var goEasy = new GoEasy({
        appkey: 'BC-54d183ed4e0b4157abc4d48db2c2a4af',
        onConnected:function(){
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: 'index.php?d=admin&c=admin&m=goEasy&type=login',
                success: function (data) {

                }

            });
        },
        onDisconnected:function () {
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: 'index.php?d=admin&c=admin&m=goEasy&type=login_out',
                success: function (data) {

                }

            });
        }
 });

    goEasy.subscribe({
        channel: 'demo_channel',
        onMessage: function(message){
            alert('收到：'+message.content);
        }
    });
*/
    $(function(){

        $.ajax({
            type : 'POST',
            dataType : "json",
            url : 'index.php?d=admin&c=admin&m=menu',
            success : function(data) {
               if(data == "") return;
                var html = '';
                $.each(data, function(i, n) {//加载父类节点即一级菜单
                    var children_node = n.children;
                    html += '<div title="'+n.text+'">';

                    if(children_node.length>0){
                        html += '<ul class="easyui-datalist" style="height:'+ children_node.length * 38 +'px" data-options="border:false">';
                        $.each(children_node, function(k, v) {
                            html += '<li iconCls="icon-help"><a href="javascript:void(0)" data-icon="icon-information" data-link="'+v.attributes.url+'" iframe="0">'+v.text+'</a></li>';
                        })

                        html += '</ul>';
                    }

                    html += '</div>';
                });
                $('#left_menu').html(html);
                $('#left_menu').accordion({ border:false,fit:false ,selected:false,multiple:true  });
                $.parser.parse('#left_menu');

                $('.wu-side-tree .datagrid-btable a').bind("click",function(){
                    var title = $(this).text();
                    var url = $(this).attr('data-link');
                    var iconCls = $(this).attr('data-icon');
                    var iframe = $(this).attr('iframe')==1?true:false;
                    addTab(title,url,iconCls,iframe);
                });

                $("#left_menu .panel-header").trigger('click');//默认展开全部菜单
            }

        });


        /*布局部分*/
        $('#master-layout').layout({
            fit:true/*布局框架全屏*/
        });




        /*右侧菜单控制部分*/

        var left_control_status=true;
        var left_control_panel=$("#master-layout").layout("panel",'west');

        $(".left-control-switch").on("click",function(){
            if(left_control_status){
                left_control_panel.panel('resize',{width:70});
                left_control_status=false;
                $(".theme-left-normal").hide();
                $(".theme-left-minimal").show();
            }else{
                left_control_panel.panel('resize',{width:200});
                left_control_status=true;
                $(".theme-left-normal").show();
                $(".theme-left-minimal").hide();
            }
            $("#master-layout").layout('resize', {width:'100%'})
        });

        /*右侧菜单控制结束*/





        $(".theme-navigate-user-modify").on("click",function(){
            $('.theme-navigate-user-panel').menu('hide');
            $.insdep.window({id:"personal-set-window",href:"user.html",title:"修改资料"});

        });
        //$.insdep.control("list.html");



        /*
           var cc1=$('#cc1').combo('panel');
           cc1.panel({cls:"theme-navigate-combobox-panel"});
           var cc2=$('#cc2').combo('panel');
           cc2.panel({cls:"theme-navigate-combobox-panel"});


         $("#open-layout").on("click",function(){
                   var option = {
                       "region":"west",
                       "split":true,
                       "title":"title",
                       "width":180
                   };
                   $('#master-layout').layout('add', option);

           });*/




    });
    
    function login_out() {

       /* if (isIE()) {alert(1)
            if (confirm('确定要退出系统吗？')) {
                //if(res) window.location.href = 'index.php?d=admin&c=Login&m=login_out';
            }
        } else {
            $.messager.confirm('操作提示','确定要退出系统吗？',function(res){

                if(res) window.location.href = 'index.php?d=admin&c=Login&m=login_out';
            })
        }*/

        $.messager.confirm('操作提示','确定要退出系统吗？',function(res){

            if(res) window.location.href = 'index.php?d=admin&c=Login&m=login_out';
        })

    }



    function doSearch(value,name){
        alert('You input: ' + value+'('+name+')');
    }

    /**
     * Name 添加菜单选项
     * Param title 名称
     * Param href 链接
     * Param iconCls 图标样式
     * Param iframe 链接跳转方式（true为iframe，false为href）
     */
    function addTab(title, href, iconCls, iframe){
        var tabPanel = $('#wu-tabs');
        if(!tabPanel.tabs('exists',title)){
            var content = '<iframe scrolling="auto" frameborder="0"  src="'+ href +'" style="width:100%;height:100%;"></iframe>';
            if(iframe){
                tabPanel.tabs('add',{
                    title:title,
                    content:content,
                    iconCls:iconCls,
                    fit:true,
                    cls:'pd3',
                    closable:true
                });
            }
            else{
                tabPanel.tabs('add',{
                    title:title,
                    href:href,
                    iconCls:iconCls,
                    fit:true,
                    cls:'pd3',
                    closable:true
                });
            }
        }
        else
        {
            tabPanel.tabs('select',title);
            var tab = tabPanel.tabs('getSelected');
            tab.panel('refresh', href);
        }
    }

    //刷新当前标签Tabs
    function RefreshTab(currentTab) {
        var url = $(currentTab.panel('options')).attr('href');
        $('#wu-tabs').tabs('update', {
            tab: currentTab,
            options: {
                href: url
            }
        });
        currentTab.panel('refresh');
    }


    // 编辑器初始化
    var editor;
    KindEditor.ready(function(K) {
        editor = K.editor({
            urlType :'relative'
        });
    });
    
    //修改资料
    function reset_pwd() {

        $('#com_edit').dialog({
            title: '用户信息编辑',
            width: 600,
            height: 500,
            closed: false,
            cache: false,
            href: 'index.php?d=admin&c=User&m=user_edit&type=reset',
            modal: true,
            buttons: [{
                text: ' 保 存 ',
                iconCls: 'icon-ok',
                handler: function () {
                    $.messager.progress();
                    $('#user_edit_tj').form('submit', {
                        url:'index.php?d=admin&c=User&m=user_save',
                        onSubmit: function(){
                            var isValid = $(this).form('validate');
                            if (!isValid){
                                $.messager.progress('close');
                            }
                            return isValid;	// 返回false终止表单提交
                        },
                        success:function(data){
                            $.messager.progress('close');
                            var data = eval('(' + data + ')');
                            if(data.success){
                                $.messager.alert('操作提示',data.message,'info',function () {
                                    $('#com_edit').dialog("close");
                                });
                            }else{
                                $.messager.alert('操作提示',data.message,'error');
                            }
                        }
                    });
                }
            },
                {
                    text:'取消',
                    handler:function(){
                        $('#com_edit').dialog("close");
                    }}
            ]
        });
    }
    
    //评价
    function mark(id,type,name,datagrid) {
        if(id == "" || type == "") return;
        var title = "课程——" + name;
        if(type == 1) title = "教官——" + name;
        if(type == 3) title = "培训视频——" + name;
        if(type == 4) title = "培训课件——" + name;
        $('#com_edit').dialog({
            title: '评价——'+title,
            width: 600,
            height: 300,
            closed: false,
            cache: false,
            href: 'index.php?d=admin&c=Mark&m=add&type=' + type + '&id=' + id,
            modal: true,
            buttons: [{
                text: ' 保 存 ',
                iconCls: 'icon-ok',
                handler: function () {
                    $.messager.progress();
                    $('#mark_edit_tj').form('submit', {
                        url:'index.php?d=admin&c=Mark&m=mark_save',
                        onSubmit: function(){
                            var isValid = $(this).form('validate');
                            if (!isValid){
                                $.messager.progress('close');
                            }
                            return isValid;	// 返回false终止表单提交
                        },
                        success:function(data){
                            $.messager.progress('close');
                            var data = eval('(' + data + ')');
                            if(data.success){
                                $.messager.alert('操作提示',data.message,'info',function () {
                                    $('#'+datagrid).datagrid('reload');
                                    $('#com_edit').dialog("close");
                                });
                            }else{
                                $.messager.alert('操作提示',data.message,'error');
                            }
                        }
                    });
                }
            },
                {
                    text:'取消',
                    handler:function(){
                        $('#com_edit').dialog("close");
                        $('#'+datagrid).datagrid('clearSelections');
                    }}
            ]
        });
    }
    
    function look_mark(data_id, type, name) {
        if(data_id == "" || type == "") return;
        var title = "课程——" + name;
        var datagrid = "curriculum_dgd";
        if(type == 1) {
            title = "教官——" + name;
            datagrid = "drillmaster_dgd";
        }
        $('#com_edit').dialog({
            title: '评价——'+title,
            width: 800,
            height: 550,
            closed: false,
            cache: false,
            href: 'index.php?d=admin&c=Mark&m=index&mark_type=' + type + '&data_id=' + data_id,
            modal: true,
            buttons: [ {
                    text:'关闭',
                    handler:function(){
                        $('#com_edit').dialog("close");

                        $('#'+datagrid).datagrid('clearSelections');

                    }}
            ]
        });
    }
    
</script>
<div id="com_edit"></div>

<!--第三方插件加载-->
<!--<script src="../../../plugin/justgage-1.2.2/raphael-2.1.4.min.js"></script>
<script src="../../../plugin/justgage-1.2.2/justgage.js"></script>


<script src="../../../plugin/Highcharts-5.0.0/js/highcharts.js"></script>


<script type="text/javascript" src="../../../plugin/ueditor-1.4.3.3/ueditor.config.js"></script>
<script type="text/javascript" src="../../../plugin/ueditor-1.4.3.3/ueditor.all.min.js"></script>


<link href="../../../plugin/cropper-2.3.4/dist/cropper.min.css" rel="stylesheet" type="text/css">
<script src="../../../plugin/cropper-2.3.4/dist/cropper.min.js"></script>-->


<!--第三方插件加载结束-->

</body>
</html>