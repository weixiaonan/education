
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">活动名称:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[title]" value="<?=$value['title']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">活动类型:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[type]" value="<?=$value['type']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">活动范围:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[scope]" value="<?=$value['scope']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">举办单位:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[charge_unit]" value="<?=$value['charge_unit']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">活动负责人:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[charge_name]" value="<?=$value['charge_name']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">联系方式:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[contact_info]" value="<?=$value['contact_info']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">活动时间:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[activity_time]" value="<?=$value['activity_time']?>"  data-options="required:true"></input>
                </td>
            </tr>



            <tr>
                <td class="input_tit60">活动内容:</td>
                <td>
                  <!--  <input style="width: 400px;height:80px;"  class="easyui-textbox" type="text" name="value[content]" value="<?/*=$value['content']*/?>"  data-options="multiline:true"></input>
                 -->
                    <textarea name="value[content]"  id="<?=$this->datagrid?>content" class="form-control"><?=$value['content']?></textarea>

                </td>
            </tr>

        </table>

    </form>
</div>

<script>
    KindEditor.ready(function(K) {
        K.create('#<?=$this->datagrid?>content',{
            urlType :'relative',
            width:"90%",
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
            ,afterChange:function(){
                this.sync();
            },afterBlur:function(){
                this.sync();
            }
        });
        K('#htqd_pic_1').click(function() {
            editor.loadPlugin('multiimage', function() {
                editor.plugin.multiImageDialog({
                    clickFn : function(urlList) {
                        var div = K('#J_imageView');
                        div.html('');
                        K.each(urlList, function(i, data) {
                            div.append('<img src="' + data.url + '">');
                        });
                        editor.hideDialog();
                    }
                });
            });
        });
    });
</script>


