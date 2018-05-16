
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">训练名称:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[training_name]" value="<?=$value['training_name']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">训练类型:</td>
                <td>

                    <select  class="easyui-combobox" name="value[training_type]" style="width:120px;" data-options="editable:false,validType:'minTypeValue'">
                    <?php echo getSelect($this->training_type, $value['training_type'], 'key'); ?>
                    </select>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">训练对象:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[training_object]" value="<?=$value['training_object']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">计划参训人数:</td>
                <td>
                    <input class="easyui-numberbox input_w_400" type="text" name="value[training_people]" value="<?=$value['training_people']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">训练天数:</td>
                <td>
                    <input class="easyui-numberbox input_w_400" type="text" id="t_days" name="value[training_days]" value="<?=$value['training_days']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">开始时间:</td>
                <td>
                    <input class="easyui-datebox input_w_400" type="text" id="start_time" name="value[start_time]" value="<?=$value['start_time']?>"  data-options="required:true,editable:false,onSelect:onChangeDate"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">结束时间:</td>
                <td>
                    <input class="easyui-datebox input_w_400" type="text" id="end_time" name="value[end_time]" value="<?=$value['end_time']?>"  data-options="required:true,editable:false,onSelect:onChangeDate"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">状态:</td>
                <td  height="30">

                         <?php foreach ($this->status as $k=>$v){ ?>
                                <input class="easyui-radiobox" name="value[status]" data-options="label:'<?=$v?>'" value="<?=$k?>" <?php if($value['status'] == $k) echo 'checked'; ?> >
                         <?php } ?>



                </td>
            </tr>

            <tr>
                <td class="input_tit60">训练内容:</td>
                <td>
                    <input style="width: 400px;height:80px;"  class="easyui-textbox" type="text" name="value[training_info]" value="<?=$value['training_info']?>"  data-options="multiline:true"></input>

                 </td>
            </tr>

        </table>

    </form>
</div>

<script>
$(function () {
    $.extend($.fn.validatebox.defaults.rules, {
        minTypeValue: {
            validator: function(value, param){
                console.log(param)
                if(value == '请选择')
                {
                    return false;
                }else{
                    return true;
                }

            },
            message: '请选择类型！'
        }
    });
})


function onChangeDate(date){
    var training_stime = $('#start_time').datebox('getValue');
    var training_etime = $('#end_time').datebox('getValue');

    if (training_stime != '' && training_etime != ''){
        var s1 = new Date(training_stime.replace(/-/g, "/"));
        var s2 = new Date(training_etime.replace(/-/g, "/"));
        var days = s2.getTime() - s1.getTime();
        var iDays = parseInt(days / (1000 * 60 * 60 * 24)) + 1;
        if (days < 0) {
            $.messager.alert('操作提示', '起止日期不符合', 'warning');
            return false;
        }
        $("#t_days").textbox('setValue', iDays);
    }

}
</script>


