<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">

</div>


<div id="<?=$this->datagrid?>_toolbar">
    名称:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'apply_name'" width="20">申请人</th>
        <th data-options="field:'title'" width="20">申请名称</th>
        <th data-options="field:'content'" width="120">申请说明</th>
        <th data-options="field:'add_time'" width="120">申请时间</th>
        <th data-options="field:'button',formatter:review_operate" width="40">操作</th>
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

            }
        }).datagrid('getPager');//enableCellEditing


    });





    function review_search() {
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


    function review_operate(value,row,index) {
        var btns  = '';
        if (row.status == 1) {
            btns += "<a href='#'  style='color:green' >已通过</a>&nbsp;&nbsp;";
        } else {
            btns += "<a href='#' onclick='review_apply(" + row.id + ")'  class='sports-button button-info'>通过</a>&nbsp;&nbsp;";
        }

        return btns;
    }
    
    function review_apply(id) {
        if(id){
            $.messager.confirm('操作提示','确定要通过审批吗？',function(res){
                if(res){
                    $.ajax({
                        url: '<?=$this->base_url?>&m=review_apply',
                        type:"Post",
                        dataType:"json",
                        data:{
                            id: id,
                        },
                        success: function (data) {
                            if(data.success){
                                $.messager.alert('操作提示',data.message,'success',function(){
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

</script>

