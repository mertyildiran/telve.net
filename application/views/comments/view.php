<?php $this->load->helper('human_timing'); ?><!--Format the time-->

<div class="container-fluid">
    <div class="row-fluid"><!-- style="background-color:#9bb;"-->
        <div class="span9">

			<!-- row-fluid > link -->
            <div class="row-fluid" style="margin:8px 0;">
                <div id="link">
    				<style type="text/css">/*Need to be improved*/
                        div.digg {/*background-color:#ffff99;*/height:40px;width:30px;float:left;text-align:center;}
                        div.picontainer {/*background-color:#369;*/height:80px;width:90px;float:left;text-align:center;}
    					div.middle {/*background-color:#369;height:80px;width:80px;*/float:left;text-align:center;}/*Adaptive picture size*/
                    </style>

					<div class="digg">
						<div><a href="javascript:void(0);" id="<?php echo $link_item['id'];?>" onclick="up_on_view(this);" class="login-required"><i class="glyphicon glyphicon-arrow-up" style="<?php if (!empty($this->session->userdata['username']) && $this->session->userdata['username']) echo ($link_item['up_down'] == 1 ? 'color:green;' : 'color:black;'); else echo 'color:black;' ?>"></i></a></div>
						<strong><div id="show-<?php echo $link_item['id'];?>"><?php echo $link_item['score'];?></div></strong>
						<div><a href="javascript:void(0);" id="<?php echo $link_item['id'];?>" onclick="down_on_view(this);" class="login-required"><i class="glyphicon glyphicon-arrow-down" style="<?php if (!empty($this->session->userdata['username']) && $this->session->userdata['username']) echo ( (!($link_item['up_down'] == '') && ($link_item['up_down'] == 0)) ? 'color:red;' : 'color:black;'); else echo 'color:black;' ?>"></i></a></div>
					</div>

					<div class="picontainer">
						<div class="middle">
                            <?php if (empty($link_item['url'])) { ?>
                            	<a href="<?php echo base_url("")."t/".$link_item['topic']."/comments/".$link_item['id']."/".$link_item['seo_segment']."/";?>"><img class="media-object" src="<?php echo base_url('assets/img/icons/17837.png');?>" width="70" height="70" style="max-height: 70px;"/></a>
    						<?php } else { ?>
    							<a href="<?php echo $link_item['url'];?>"><img class="media-object" src="<?php echo $link_item['picurl'];?>" onError="this.src='<?php echo base_url('assets/img/icons/1715.png');?>';" width="70" height="70" style="max-height: 70px;"/></a>
    						<?php }?>
						</div>
					</div>


                    <div style="margin-left: 120px;"><!--span10 pull-left-->
                        <?php if (empty($link_item['url'])) { ?>
                            <div><strong><a style="text-decoration: none;color: blue;" href="<?php echo base_url("")."t/".$link_item['topic']."/comments/".$link_item['id']."/".$link_item['seo_segment']."/";?>"><?php echo $link_item['title']?></a></strong>&nbsp; &nbsp;<span style="color:#888;">(<span style="color:#888;">text post</span>)</span></div>
                        <?php } else { ?>
                            <div><strong><a style="text-decoration: none;color: blue;" href="<?php echo $link_item['url'];?>"><?php echo $link_item['title']?></a></strong>&nbsp; &nbsp;<span style="color:#888;">(<a style="color:#888;" href="<?php echo base_url().'domain/'.$link_item['domain'].'/';?>"><?php echo $link_item['domain'];?></a>)</span></div>
                        <?php }?>
						<div>
							<small style="color:#888;">submitted <?php echo human_timing($link_item['created']);?>&nbsp;&nbsp;by <a style="color: #369;" href="#"><?php echo $link_item['username']?></a>&nbsp;&nbsp;to <a style="color: #369;" href="#"><?php echo $link_item['topic']?></a></small>
						</div>
                        <div>
                            <?php echo $link_item['text'];?>
                        </div>
						<div>
							<div style="font-size:13px;"><strong>
								<a style="color:#888;line-height: 1.6em;" href="<?php echo base_url("")."t/".$link_item['topic']."/comments/".$link_item['id']."/".$link_item['seo_segment']."/";?>"><?php echo $link_item['comments']?> comments<span class="glyphicon glyphicon-comment" style="font-size:11px;"></span></a>
                                &nbsp;&nbsp;
                                <a style="color:#888;line-height: 1.6em;" href="#">favorite<span class="glyphicon glyphicon-star-empty" style="font-size:13px;"></span></a>
                                &nbsp;&nbsp;
                                <a style="color:#888;line-height: 1.6em;" href="#">report<span class="glyphicon glyphicon-flag" style="font-size:12px;"></span></a>
                                &nbsp;&nbsp;
                                <a style="color:#888;line-height: 1.6em;" id="hide_link" href="javascript:void(0)">hide<span class="glyphicon glyphicon-eye-close" style="font-size:12px;"></span></a>
                                &nbsp;&nbsp;
                                <a style="color:#888;line-height: 1.6em;" href="#">share<span class="glyphicon glyphicon-share" style="font-size:12px;"></span></a>
							</div></strong>
						</div>
                    </div>

				</div>
			</div>
            <!-- row-fluid > link -->

			<!-- Comments block -->
    		<div>
                <!-- Horizontal solid line and submit text box -->
                <?php
                $this->load->helper('get_param');
                if($link_item['comments'] == 0) {
                    echo 'No comments (yet)';
                } else if ( ($link_item['comments'] < 20) || $this->input->get('nolimit') ) {
                    echo 'all '.$link_item['comments'].' comments';
                } else {
                    echo 'only 20 comments';
                    echo '&nbsp; &nbsp;<small><a href="'.append_get_param('nolimit=1').'">display all '.$link_item['comments'].'</a></small>';
                }
                ?>
                <div>
                    <div style="border-top:solid 1px rgba(0, 0, 0, .3); width:100%;"> </div><!--Draw a solid line-->
                    <div><small style="color:#888;">
                        <div class="dropdown">
                            sorting:
                            <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                                <?php
                                if ($this->input->get('sort')) {
                                    echo $this->input->get('sort');
                                } else {
                                    echo "hot";
                                }
                                ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a tabindex="-1" href="<?php echo base_url("")."t/".$link_item['topic']."/comments/".$link_item['id']."/".$link_item['seo_segment']."/";?>">hot</a></li>
                                <li><a tabindex="-1" href="<?php echo append_get_param('sort=top'); ?>">top</a></li>
                                <li><a tabindex="-1" href="<?php echo append_get_param('sort=new'); ?>">new</a></li>
                                <li><a tabindex="-1" href="<?php echo append_get_param('sort=controversial'); ?>">controversial</a></li>
                                <li><a tabindex="-1" href="<?php echo append_get_param('sort=old'); ?>">old</a></li>
                            </ul>
                        </div>
                    </small>
                        <div>
                            <br>
                            <textarea rows="4" class="span6" name="content" id="content" onfocus="first_of_all_login()"/></textarea><br />
			                <input type="hidden" name="pid" id="pid" value="<?php echo $link_item['id']?>" />
            				<!--<button class="btn btn-primary  pull-left" type="submit" name="submit" >submit</button>-->
                            <!--<div id="error_msg"></div>-->
                            <button type="submit" id="submit_reply" class="login-required" style="margin-top:10px; font-weight:bold; color:#888;">submit</button>
                <!-- Horizontal solid line and submit text box -->
                            <br/>
                            <!--Newly submitted replies-->
                            <div id="update_reply" style="margin: 0 0 10px 25px;"></div>
                            <!-- Comment tree -->
                            <?php echo $tree;?>
                            <!-- Comment tree -->

        				</div>
		            </div>
			  </div>
              <!-- <div style="margin: 0 0 10px 25px;"> <a href="#load_more">Load more (192)</a> Each loads 20 </div> -->
			</div>
		</div>
