
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden"  name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">姓名:</td>
                <td>
                    <input id="police_id" class="easyui-combobox input_w_400" type="text" name="value[police_id]" value=""  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">培训班名称:</td>
                <td>
                    <input style="width: 400px;"  id="training_c_id" class="easyui-combobox" name="value[curriculum_id]"
                           data-options="value:'<?=$value['curriculum_id']?>',editable:false,required:true,valueField:'id',textField:'training_name',url:'index.php?d=admin&c=Curriculum&m=get_curriculum'" />

                    <a style="color: red;" href="javascript:" onclick="look_curriculum()" >查看培训内容</a>
                </td>

            </tr>

            <tr>
                <td class="input_tit60">签到:</td>
                <td>
                    <input id="police_id" class="easyui-datetimebox input_w_400" type="text" name="value[sign_in]" value="<?=$value['sign_in']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">培训天数:</td>
                <td>
                    <input  class="easyui-numberbox input_w_400" id="training_days" type="text" name="value[training_days]" value="<?=$value['training_days']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">培训时间:</td>
                <td>
                    <input  class="easyui-datebox" id="training_stime" type="text" data-options="editable:false,onSelect:onChangeDate" name="value[training_stime]" value="<?=$value['training_stime']?>"></input>
                    至
                    <input  class="easyui-datebox" id="training_etime" type="text" data-options="editable:false,onSelect:onChangeDate" name="value[training_etime]" value="<?=$value['training_etime']?>"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">分数:</td>
                <td>
                    <input id="police_id" class="easyui-textbox input_w_400" type="text" name="value[score]" value="<?=$value['score']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">排名:</td>
                <td>
                    <input id="police_id" class="easyui-textbox input_w_400" type="text" name="value[ranking]" value="<?=$value['ranking']?>"  data-options="required:true"></input>
                </td>
            </tr>



            <tr>
                <td class="input_tit60">是否超时:</td>
                <td height="30">
                    <input class="easyui-radiobox" name="value[is_overtime]" data-options="label:'是'" value="1" <?php if($value['is_overtime'] == 1) echo 'checked'; ?>>
                    <input class="easyui-radiobox" name="value[is_overtime]" data-options="label:'否'" value="0" <?php if($value['is_overtime'] == 0) echo 'checked'; ?>>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">训练过程信息:</td>
                <td>
                    <input style="width: 400px;height:80px;"  class="easyui-textbox" type="text" name="value[training_pro_info]" value="<?=$value['training_pro_info']?>"  data-options="multiline:true"></input>


                </td>
            </tr>

        </table>

    </form>
</div>
<div id="look_curriculum_div"></div>

<script>




    $(function () {

        var myloader = function(param,success,error){

            var q = param.q || '';
            if (q.length <= 0) {
                return false;
            }
            var urlStr = '<?=$this->base_url?>&m=get_police&title=' + q;
            $.ajax({
                url: urlStr,
                type: 'POST',
                dataType: 'json',
                data: {'title': q},
                success: function(data){
                    var items = $.each(data, function(value){
                        return value;
                    });
                    success(items);
                    if(items.length < 1)
                    {
                        $.messager.alert('系统提示','查无此人','error',function () {
                            $('#police_id').combobox('setValue', '');
                        });
                    }
                }
            });
        }

        $('#police_id').combobox({
            url:'<?=$this->base_url?>&m=get_police',
            loader : myloader,
            prompt:'输入关键字后自动搜索',
            valueField: 'id',
            textField: 'name',
            editable:true,
            hasDownArrow:false,
            mode:'remote' ,
            panelHeight:'auto',
         //   value:"<?=$value['police_id']?>",
            data: [{
                id: "<?=$value['police_id']?>",
                name: "<?=$value['name']?>",
                "selected":true
            }],
            onLoadSuccess: function () {  //加载完成后,设置选中第一项

            },
            onBeforeLoad: function(param){
                if(param == null || param.q == null || param.q.replace(/ /g, '') == ''){
                    var value = $(this).combobox('getValue');
                    if(value){// 修改的时候才会出现q为空而value不为空
                        param.id = value;
                        return true;
                    }
                    return false;
                }else {
                 //   var title = param.q;
                 //   var urlStr = '<?=$this->base_url?>&m=get_police&title=' + title;
                 //   $('#police_id').combobox("reload", urlStr);
                 //   console.log(value);
                  //  return false;
                }
            },
            onChange: function(newValue) {

            }

        });


        $('#look_curriculum_div').dialog({
            title: '详细',
            width: 600,
            height: 500,
            closed: true,
            cache: false,
            modal: true,
        })

    })

    function look_curriculum() {
       var training_c_id = $("#training_c_id").val();
       if (training_c_id != "") {
           var training_text = $('#training_c_id').combobox('getText');
           var url = 'index.php?d=admin&c=Curriculum&m=edit&id='+training_c_id;
           $('#look_curriculum_div').dialog({closed: false,title:'['+training_text+']-详细',href:url}).open();
       } else {
           $.messager.alert('操作提示', '未选择培训班名称', 'warning');
       }
    }

    function onChangeDate(date){
        var training_stime = $('#training_stime').datebox('getValue');
        var training_etime = $('#training_etime').datebox('getValue');

        if (training_stime != '' && training_etime != ''){
            var s1 = new Date(training_stime.replace(/-/g, "/"));
            var s2 = new Date(training_etime.replace(/-/g, "/"));
            var days = s2.getTime() - s1.getTime();
            var iDays = parseInt(days / (1000 * 60 * 60 * 24)) + 1;
            if (days < 0) {
                $.messager.alert('操作提示', '起止日期不符合', 'warning');
                return false;
            }
            $("#training_days").textbox('setValue', iDays);
        }

    }

</script>



