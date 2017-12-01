
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">训练名称:</td>
                <td>
                    <input class="easyui-textbox" type="text" name="value[training_name]" value="<?=$value['training_name']?>"  data-options="required:true"></input>
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
                <td class="input_tit60">开始时间:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[start_time]" value="<?=$value['start_time']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">结束时间:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[end_time]" value="<?=$value['end_time']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">状态:</td>
                <td>
                     <span class="radioSpan">
                         <?php foreach ($this->status as $k=>$v){ ?>
                             <input type="radio" name="value[status]" <?php if($value['status'] == $k) echo 'checked'; ?> value="<?=$k?>"><?=$v?></input>
                         <?php } ?>

                     </span>
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


</script>


