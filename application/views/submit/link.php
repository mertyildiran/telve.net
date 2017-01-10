<div class="container-fluid">
  <div class="row-fluid">
    <div class="span5">
        <?php echo validation_errors();?>
        <ul class="nav nav-tabs form-tabs" id="myTab">
          <?php if ($is_text_post) { ?>
              <li><a class="submit" href="#link">Submit a link</a></li>
              <li class="active"><a class="submit" href="#text">Submit a text</a></li>
          <?php } else { ?>
              <li class="active"><a class="submit" href="#link">Submit a link</a></li>
              <li><a class="submit" href="#text">Submit a text</a></li>
          <?php };?>
        </ul>

        <div class="tab-content">
            <?php if ($is_text_post) { ?>
                <div class="tab-pane" id="link">
            <?php } else { ?>
                <div class="tab-pane active" id="link">
            <?php };?>
                <?php echo form_open('submit');?>
                <fieldset>

                    <table class="table table-bordered submit-form"><tr><td>
                    <label for="title">Title</label>
                    <textarea rows="2" class="span12" id="title" name="title" value="<?php echo set_value('title');?>" placeholder="the title of the link..."/></textarea><br />
                    <div style="color:red"><?php echo form_error('title');?></div>
                    </td></tr></table>

                    <table class="table table-bordered submit-form"><tr><td>
                    <label for="url">URL</label>
                    <input type="text" class="span12" name="url" id="url" value="<?php echo set_value('url');?>" placeholder="the URL of the link..."/><br />
                    <div style="color:red"><?php echo form_error('url');?></div>

                    <a href="javascript:void(0)" class="btn btn-primary pull-right btn-blue" id="get_title">Suggest title</a>
                    </td></tr></table>

                    <table class="table table-bordered submit-form"><tr><td>
                    <label for="topic">Choose a topic</label>
                    <input type="text" class="span12 topic" id="topic" value="<?php echo set_value('topic');?>" name="topic" placeholder="the topic of the link..."/><br />
                    <div style="color:red"><?php echo form_error('topic');?></div>
                        <!--Show popular categories-->
                        <a href="javascript:void(0)" onclick="set_topic(this)">PICS</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">FUNNY</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">GAME</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">ASKTELVE</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">WORLDNEWS</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">NEWS</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">SCIENCE AND TECHNOLOGY</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">EDUCATION</a>
                    </td></tr></table>

                    <table class="table table-bordered submit-form"><tr><td>
                    <img src="<?php echo base_url('user/captcha');?>" />
                    <br/>
                    <label for="captcha">Verification code</label>
                    <input type="text" name="captcha" placeholder="enter the four characters in the figure above"/>
                    <div style="color:red;"><?php if(!empty($error)){echo $error;}?><?php echo form_error('captcha');?></div>
                    </td></tr></table>

                    <button class="btn btn-primary btn-blue pull-left" type="submit" name="submit" >Submit</button>

                </fieldset>
                </form>

            </div>

            <?php if ($is_text_post) { ?>
                <div class="tab-pane active" id="text">
            <?php } else { ?>
                <div class="tab-pane" id="text">
            <?php };?>
                <?php echo form_open('submit');?>
                <fieldset>

                    <table style="background-color:#cee3f8" class="table table-bordered"><tr><td>

                    <label for="title">Title</label>
                    <textarea rows="2" class="span12" id="title" name="title" value="<?php echo set_value('title');?>" placeholder="the title of the post..."/></textarea><br />
                    <div style="color:red"><?php echo form_error('title');?></div>
                    </td></tr></table>

                    <table style="background-color:#cee3f8" class="table table-bordered"><tr><td>
                    <label for="text">Text (optional)</label>
                    <textarea rows="5" class="span12" id="text" name="text" value="<?php echo set_value('text');?>" placeholder="the content of the post..."/></textarea><br />
                    <div style="color:red"><?php echo form_error('title');?></div>
                    </td></tr></table>

                    <table style="background-color:#cee3f8" class="table table-bordered"><tr><td>
                    <label for="topic">Choose a topic</label>
                    <input type="text" class="span12 topic" id="topic" value="<?php echo set_value('topic');?>" name="topic" placeholder="the topic of the link..."/><br />
                    <div style="color:red"><?php echo form_error('topic');?></div>
                        <!--Show popular categories-->
                        <a href="javascript:void(0)" onclick="set_topic(this)">PICS</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">FUNNY</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">GAME</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">ASKTELVE</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">WORLDNEWS</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">NEWS</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">SCIENCE AND TECHNOLOGY</a>&nbsp;&nbsp;
      					<a href="javascript:void(0)" onclick="set_topic(this)">EDUCATION</a>
                    </td></tr></table>

                    <table style="background-color:#cee3f8" class="table table-bordered"><tr><td>
                    <img src="<?php echo base_url('user/captcha');?>" />
                    <br/>
                    <label for="captcha">Verification code</label>
                    <input type="text" name="captcha" placeholder="enter the four characters in the figure above"/>
                    <div style="color:red;"><?php if(!empty($error)){echo $error;}?><?php echo form_error('captcha');?></div>
                    </td></tr></table>

                    <button class="btn btn-primary btn-blue pull-left" type="submit" name="submit" >Submit</button>

                </fieldset>
                </form>
            </div>
        </div>
    </div>
