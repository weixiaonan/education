<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(19)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(34)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(40)){?>
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
        <th data-options="field:'title'" width="40">项目名称</th>
        <th data-options="field:'develop_unit'" width="40">研发单位</th>
        <th data-options="field:'url'" width="60">项目地址</th>
        <th data-options="field:'use_time'" width="30">启用时间</th>
        <th data-options="field:'content'" width="250">项目简介</th>
        <th data-options="field:'button',formatter:iw_operate" width="40">操作</th>
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
          //  checkOnSelect:false,
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
                <?php  if(role_check(34)){?>
                var id = rowData.id;
                if(id){
                    edit_innovate_work(id);
                }
                <?php  }?>
            }
        }).datagrid('getPager');//enableCellEditing


    });



    function  edit_innovate_work(id) {

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
            ],onClose: function () {
                $('#<?=$this->datagrid?>_dgd').datagrid('clearSelections');
            }
        });

    }

    function dels_innovate_work() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_innovate_work(ids);
    }

    function del_innovate_work(ids) {
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

    function iw_operate(value,row,index) {
        var btns  = '';
        <?php if(role_check(34)){?>
        btns += "<a href='#' onclick='upload_iw_attach(" + row.id + ")'  class='sports-button button-info'>上传/查阅相关资料</a>&nbsp;&nbsp;";
        <?php } ?>
        return btns;
    }

    function upload_iw_attach(id) {
        if (id) {
            var url = 'index.php?d=admin&c=Attachment&m=innovate_work_attach&type=3&id=' + id;

            $('#com_edit').dialog({
                title: '创新工作资料管理',
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


    function innovate_work_search() {
        var title = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";
       /* var good_at_type = '';
        $("input[name='good_at_type[]']").each(function(i){
            if($(this).val() != "") good_at_type += $(this).val() + ",";
        });*/
        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title,
         //   'good_at_type':good_at_type
        });
    }

</script>

