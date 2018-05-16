<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(23)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(24)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(26)){?>
        <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">批量删除</a>
    <?php } ?>
</div>


<div id="<?=$this->datagrid?>_toolbar">
    名称:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />

    课程： <input   id="sele_training_c_id2" class="easyui-combobox"
                 data-options="" />

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'name'" width="80">姓名</th>
        <th data-options="field:'sex'" width="20">性别</th>
        <th data-options="field:'police_num'" width="80">警号</th>
        <th data-options="field:'birth'" width="80">出生年月</th>
        <th data-options="field:'curriculum'" width="180">所教课程</th>
        <th data-options="field:'work_unit'" width="150">工作单位</th>
        <th data-options="field:'style'" width="100">教官类别</th>
        <th data-options="field:'speciality'" width="200">专长</th>
        <th data-options="field:'experience'" width="250">经历</th>
        <th data-options="field:'add_time'" width="150">添加时间</th>
        <th data-options="field:'mark_num'" width="60">评价数</th>
        <th data-options="field:'button',align:'left',formatter:drill_operate" width="40">操作</th>

    </tr>
    </thead>
</table>

<script type="text/javascript">

    $(function(){
        $.ajax({
            url:'index.php?d=admin&c=Curriculum&m=get_curriculum',
            dataType: 'json',
            success: function (jsonstr) {
                jsonstr.unshift({
                    'id': '',
                    'training_name': '-请选择-'
                });//向json数组开头添加自定义数据
                $('#sele_training_c_id2').combobox({
                    editable:false,
                    valueField:'id',
                    textField:'training_name',
                    data: jsonstr,
                    onLoadSuccess: function () { //加载完成后,设置选中第一项
                        var val = $(this).combobox('getData');
                        for (var item in val[0]) {
                            if (item == 'id') {
                                $(this).combobox('select', val[0][item]);
                            }
                        }
                    }
                });
            }
        });

        var obj = $('#<?=$this->datagrid?>_dgd').datagrid({
            rownumbers:true,
            fit:true,
            header:'#<?=$this->datagrid?>_heard',
            toolbar:'#<?=$this->datagrid?>_toolbar',
            pagination:true,
           // checkOnSelect:false,
            fitColumns:false,
            method:'get',
            pageSize:20,
            url:'<?=$this->base_url?>&m=list_data',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){
                $('.curriculum-button').linkbutton({
                });
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){
                <?php  if(role_check(24)){?>
                var id = rowData.id;
                if(id){
                    edit_drillmaster(id);
                }
                <?php  }?>
            }
        }).datagrid('getPager');//enableCellEditing


    });


    function drill_operate(value,row,index) {
        var btns  = '';
        <?php if(role_check(22)){?>
        btns += "<a href='#' onclick='mark("+row.id+", 1, \""+row.name+"\" ,\"" + '<?=$this->datagrid?>_dgd' + "\" )'  class='curriculum-button button-info'>评价</a>&nbsp;&nbsp;";
        <?php } ?>
        return btns;
    }

    function  edit_drillmaster(id) {

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
            height: 570,
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
                        $('#<?=$this->datagrid?>_dgd').datagrid('clearSelections');
                    }}
            ]
        });

    }

    function dels_drillmaster() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_drillmaster(ids);
    }

    function del_drillmaster(ids) {
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


    function drillmaster_search() {
        var title = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";
        var sele_c_id = $("#sele_training_c_id2").val().length > 0 ? $("#sele_training_c_id2").val() : "";
        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title,
            'c_id' :sele_c_id
        });
    }

</script>

