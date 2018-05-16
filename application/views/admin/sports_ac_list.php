<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(33)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(20)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(46)){?>
        <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">批量删除</a>
    <?php } ?>
</div>


<div id="<?=$this->datagrid?>_toolbar">
    名称:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'title'" width="60">活动名称</th>
        <th data-options="field:'type'" width="20">活动类型</th>
        <th data-options="field:'scope'" width="20">活动范围</th>
        <th data-options="field:'charge_unit'" width="50">举办单位</th>
        <th data-options="field:'charge_name'" width="20">活动负责人</th>
        <th data-options="field:'contact_info'" width="30">联系方式</th>
        <th data-options="field:'activity_time'" width="25">活动时间</th>
        <th data-options="field:'content'" width="80">活动内容</th>
        <th data-options="field:'button',align:'left',formatter:sports_operate" width="30">操作</th>
        <th data-options="field:'add_time'" width="40">添加时间</th>

    </tr>
    </thead>
</table>

<script type="text/javascript">

    $(function(){
        var obj = $('#<?=$this->datagrid?>_dgd').datagrid({
            rownumbers:true,
            fit:true,
            header:'#<?=$this->datagrid?>_heard',
            toolbar:'#<?=$this->datagrid?>_toolbar',
            pagination:true,

            fitColumns:true,
            method:'get',
            pageSize:20,
            url:'<?=$this->base_url?>&m=list_data',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){
                $('.sports-button').linkbutton({
                });
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){
                <?php  if(role_check(20)){?>
                var id = rowData.id;
                if(id){
                    edit_sports_ac(id);
                }
                <?php  }?>
            }
        }).datagrid('getPager');//enableCellEditing


    });


    function sports_operate(value,row,index) {
        var btns  = '';
        <?php if(role_check(20)){?>
        btns += "<a href='#' onclick='upload_attach(" + row.id + ")'  class='sports-button button-info'>上传相关文件</a>&nbsp;&nbsp;";
        <?php } ?>
        return btns;
    }

    function upload_attach(id) {
        if (id) {
            var url = '<?=$this->base_url?>&m=get_attach&type=3&id=' + id;

                $('#com_edit').dialog({
                    title: '相关文件管理',
                    width: 900,
                    height: 600,
                    closed: false,
                    cache: false,
                    href: url,
                    modal: true,
                    buttons: [{
                        text: '关闭',
                        handler: function () {
                            $('#com_edit').dialog("close");
                        }
                    }
                    ],
                    onClose:function () {
                        $('#<?=$this->datagrid?>_dgd').datagrid('clearSelections');
                    }
                });

        }
    }

    function  edit_sports_ac(id) {

        if(id == 0){
            var row = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
            if(row.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
            if(row.length > 1){$.messager.alert('操作提示',"只能选择一行操作！",'warning');return false;}
            var ids = [];
            $.each(row, function(index, item){
                ids.push(item.id);
            });
            id = ids[0];
        }
        var url = '<?=$this->base_url?>&m=edit&id='+id;
        if(id == 'add'){
            url = '<?=$this->base_url?>&m=add&id='+id;
        }

        $('#com_edit').dialog({
            title: '编辑',
            width: 600,
            height: 600,
            closed: false,
            cache: false,
            href: url,
            modal: true,
            buttons: [{
                text: ' 保 存 ',
                iconCls: 'icon-ok',
                handler: function () {
                    $.messager.progress();
                    $('#<?=$this->datagrid?>_form').form('submit', {
                        url:'<?=$this->base_url?>&m=save',
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
                                    $('#<?=$this->datagrid?>_dgd').datagrid('reload');
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

    function dels_sports_ac() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_sports_ac(ids);
    }

    function del_sports_ac(ids) {
        if(ids){
            $.messager.confirm('操作提示','确定要删除吗？',function(res){
                if(res){
                    $.ajax({
                        url: '<?=$this->base_url?>&m=del',
                        type:"Post",
                        dataType:"json",
                        data:{
                            id_str : ids,
                        },
                        success: function (data) {
                            if(data.success){
                                $.messager.alert('操作提示',data.message,'info',function(){
                                    $('#<?=$this->datagrid?>_dgd').datagrid("reload");
                                });
                            }else{
                                $.messager.alert('操作提示',data.message,'error');
                            }
                        }
                    });
                }
            });
        }
    }


    function sports_ac_search() {
        var title = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";

        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title
        });
    }

</script>

