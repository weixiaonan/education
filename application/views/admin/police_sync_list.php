<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">

        <a href="#" onclick="save_sync()" class="easyui-linkbutton" iconCls="icon-refresh" plain="true">同步</a>


</div>


<div id="<?=$this->datagrid?>_toolbar">
    关键字:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />
    &nbsp;&nbsp;

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="sync_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',formatter:checked_row"></th>
        <th data-options="field:'name'" width="30">姓名</th>
        <th data-options="field:'sex'" width="10">性别</th>

        <th data-options="field:'birth_time'" width="40">出生日期</th>
        <th data-options="field:'mz'" width="30">民族</th>
        <th data-options="field:'sfz'" width="70">身份证号</th>
        <th data-options="field:'political_status'" width="20">政治面貌</th>
        <th data-options="field:'org_job'" width="40">职务</th>
        <th data-options="field:'c_id'" width="40">所属部门</th>
        <th data-options="field:'xueli'" width="40">学历</th>

        <th data-options="field:'phone'" width="40">联系电话</th>


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
           // checkOnSelect:true,
          //  selectOnCheck: false,
            fitColumns:true,
            method:'get',
            pageSize:20,
            url:'index.php?d=admin&c=Police&m=get_sync_list',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){
                if(data){
                    $.each(data.rows, function(index, item){

                        if(item.checked){
                            $('#<?=$this->datagrid?>_dgd').datagrid('checkRow', index);

                        }
                    });
                }
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){

            }
        }).datagrid('getPager');


    });


    function checked_row(value,row,index){
        if(!row.checked){
            return '<div style="" class="datagrid-cell-check"><input type="checkbox"  name="id" value="'+value+'" ></div>';
        }else{
            return '<b class="font-green">已同步</b>';
        }
    }


    function save_sync() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');

        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            if(rows[i].checked) continue; //如果已经同步那就跳过
            ids.push(rows[i].id);
        }
        ids = ids.join(',');

        if(ids){
            $.messager.confirm('操作提示','确定要同步吗？',function(res){
                if(res){
                    $.ajax({
                        url: '<?=$this->base_url?>&m=save_sync',
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



    function sync_search() {
        var title = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";

        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title,
        });
    }

</script>

