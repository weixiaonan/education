
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">项目名称:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[title]" value="<?=$value['title']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">研发单位:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[develop_unit]" value="<?=$value['develop_unit']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">项目地址:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[url]" value="<?=$value['url']?>"  data-options="required:false"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">启用时间:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[use_time]" value="<?=$value['use_time']?>"  data-options="required:false"></input>
                </td>
            </tr>



            <tr>
                <td class="input_tit60">项目简介:</td>
                <td>
                  <!--  <input style="width: 400px;height:80px;"  class="easyui-textbox" type="text" name="value[content]" value="<?/*=$value['content']*/?>"  data-options="multiline:true"></input>
                 -->
                    <textarea name="value[content]" id="<?=$this->datagrid?>content" class="input_w_400"><?=$value['content']?></textarea>
                </td>
            </tr>

        </table>

    </form>
</div>

<script>
    KindEditor.ready(function(K) {
        K.create('#<?=$this->datagrid?>content',{
            urlType :'relative',
            width:"98%",
            height:250,
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
    });


</script>


