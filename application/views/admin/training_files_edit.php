
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
                <td class="input_tit60">课程:</td>
                <td>
                    <input style="width: 400px;"  id="training_c_id" class="easyui-combobox" name="value[curriculum_id]"
                           data-options="value:'<?=$value['curriculum_id']?>',editable:false,required:true,valueField:'id',textField:'training_name',url:'index.php?d=admin&c=Curriculum&m=get_curriculum'" />

                </td>
            </tr>

            <tr>
                <td class="input_tit60">签到:</td>
                <td>
                    <input id="police_id" class="easyui-datetimebox input_w_400" type="text" name="value[sign_in]" value="<?=$value['sign_in']?>"  data-options="required:true"></input>
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
                <td class="input_tit60">训练时间:</td>
                <td>
                    <input id="police_id" class="easyui-textbox input_w_400" type="text" name="value[training_time]" value="<?=$value['training_time']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">是否超时:</td>
                <td>
                     <span class="radioSpan">
                         <input type="radio" name="value[is_overtime]" <?php if($value['is_overtime'] == 1) echo 'checked'; ?> value="1">是</input>
                         <input type="radio" name="value[is_overtime]" <?php if($value['is_overtime'] == 0) echo 'checked'; ?> value="0">否</input>

                     </span>
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
    })





</script>



