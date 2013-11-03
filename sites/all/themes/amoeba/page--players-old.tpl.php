  <?php require_once ('includes/region_layout.php');?>
  <?php $show_breadcrumb = theme_get_setting('show_breadcrumb');?>    

  <div id="page-wrapper"><div id="page-wrapper-inner">

<!-- Header --> 
    <div id="header-wrapper"><div class="width-wrapper"><div class="header-wrapper-inner clearfix">
      
      <?php if ($logo): ?>
        <div id="site-logo">
          <a href="<?php print check_url($front_page); ?>"><img src="<?php print $logo ?>" alt="<?php print $site_name; ?>" /></a>
        </div>
      <?php endif; ?>	      
      
      <?php if ($site_name): ?>
        <div id="site-name">
          <?php if ($is_front) { ?>
            <h1><a href="<?php print check_url($front_page); ?>"><?php print $site_name; ?></a></h1>
          <?php } else { ?>
            <span><a href="<?php print check_url($front_page); ?>"><?php print $site_name; ?></a></span>
          <?php } ?>
        </div>
      <?php endif; ?>
      
      <?php if ($site_slogan): ?>
        <div id="site-slogan">
          <h3><?php print $site_slogan; ?></h3>            
        </div>
      <?php endif; ?>     

<!-- About Menu -->	
     <?php if ($page['about_menu']): ?>     
       <div id="about-menu">
         <?php print render($page['about_menu']); ?>
       </div>
     <?php endif; ?>  
      
<!-- Main Menu -->	
     <?php if ($page['main_menu']): ?>     
       <div id="main-menu">
         <?php print render($page['main_menu']); ?>
       </div>
     <?php endif; ?>      
      
    </div></div></div><!-- /header-wrapper -->
    
<!-- Middle Wrapper -->  
    <div id="middle-wrapper"><div class="width-wrapper clearfix">	

<!-- Slideshow Region -->
			<?php if ($page['slideshow']): ?>
        <div id="slideshow"><div class="slideshow-inner clearfix">	
          <?php print render($page['slideshow']); ?>
        </div></div>
      <?php endif; ?>       
    
<!-- Top User Regions -->
			<?php if ($page['user1'] || $page['user2'] || $page['user3'] || $page['user4']): ?>
        <div id="top-user-regions"><div class="top-user-regions-inner clearfix">
        <?php if ($page['user1']): ?>
            <div class="user-region <?php echo $topBlocks; ?> user1">
              <div class="user-region-inner">
                <?php print render($page['user1']); ?>
              </div>
            </div>
        <?php endif; ?>
        <?php if ($page['user2']): ?>
          <div class="user-region <?php echo $topBlocks; ?> user2">
            <div class="user-region-inner">
              <?php print render($page['user2']); ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($page['user3']): ?>
          <div class="user-region <?php echo $topBlocks; ?> user3">
            <div class="user-region-inner">
              <?php print render($page['user3']); ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($page['user4']): ?>
          <div class="user-region <?php echo $topBlocks; ?> user4">
            <div class="user-region-inner">
              <?php print render($page['user4']); ?>
            </div>
          </div>
        <?php endif; ?>
        
        <div class="top-regions-border-a clearfix"></div>
        <div class="top-regions-border-b clearfix"></div>
        
        </div></div><!-- End of Top User Regions -->
      <?php endif; ?>      

<!-- Breadcrumb Region -->   
      <?php if ($show_breadcrumb == 1 || $breadcrumb): ?>
        <div id="breadcrumbs"><div class="breadcrumbs-inner">
			    <?php print $breadcrumb; ?>
        </div></div>
	  	<?php endif; ?>         
  	 
      <div id="main-content" class="clearfix"><div id="main-content-inner">
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
       	<?php if ($page['content_top']): ?><div class="content-top"><?php print render($page['content_top']); ?></div><?php endif; ?>
        <?php print render($tabs); ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><span><?php print $title; ?></span></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
 	 <div id="feature" style="background-image: url('<?php print image_style_url('baseball-card', $node->field_player_photo['und'][0]['uri']); ?>');">
        <div id="main-image">
        	<div id="main_name">
        		<h1 id="player_name"><?php print $node->field_firstname['und']['0']['value']; ?>&nbsp; <?php print $node->field_lastname['und']['0']['value']; ?> 
        			<span id="player_jersey">#<?php print $node->field_jersey2['und']['0']['value']; ?></span>
					<span id="player_main_position"><?php print $node->field_main_position['und']['0']['value'] ?></span>
				</h1>
			<img id="player_team_logo" class="logo" alt="The Wellesley Raiders Logo" src="http://wellesleybaseball.com/sites/all/themes/amoeba/images/wb-logo_sm.png<?php //image_style_url('large', $node->field_wellesley_logo['und'][0]['uri']) ?>" />
			</div>
			<div id="player_season_stats">2012 Statistics:</div>
       	</div>
     </div>	
     
     <div id="player-personal">
     	<table id="">
     		<tr>
     			<td>Positions:</td>
     			<td>
     				<?php 
     					foreach ($node->field_positions[LANGUAGE_NONE] as $key => $value) {
  							print $value['value'] . "&nbsp;&nbsp;";
						}
     					
     					dpm($node->field_positions[LANGUAGE_NONE]);
     					//$array = explode(', ',$node->field_positions['und']['0']['value']);
     					//dpm($array);
     					//foreach ($array as $value) {
     					//	print $value;
     					//}
     				?>
     			</td>
     		</tr>
     		
     		<tr>
     			<td>Bats/Throws:</td>
     			<td><?php print $node->field_bats['und']['0']['value'];?>/<?php print $node->field_throws['und']['0']['value'];?></td>
     		</tr>
     		<tr>
     			<td>Height:</td>
     			<td><?php print $node->field_height_ft['und']['0']['value'];?>'<?php print $node->field_height_in['und']['0']['value'];?>"</td>
     		</tr>
     		<tr>
     			<td>Weight:</td>
     			<td><?php print $node->field_weight['und']['0']['value'];?> lbs</td>
     		</tr>
     		<tr>
     			<td>Class of:</td>
     			<td><?php print $node->field_grad_class['und']['0']['value'];?></td>
     		</tr>
     		<tr>
     			<td>Interests:</td>
     			<td><?php print $node->field_interests['und']['0']['value'];?></td>
     		</tr>
     		<tr>
     			<td>Team:</td>
     			<td>Varsity</td>
     		</tr>

     	</table>
   	        <?php
        	/*print $node->field_lastname['und']['0']['value']; 
        	print $node->field_firstname['und']['0']['value'];
        	print $node->field_lastname['und']['0']['value'];
        	print $node->field_lastname['und']['0']['value']; 
        	print $node->field_lastname['und']['0']['value'];
        	print $node->field_lastname['und']['0']['value']; 
        	print $node->field_lastname['und']['0']['value'];
        	*/
        	?>
   		
     </div>

   		
        <?php // print render($page['content']); ?> 
        <?php // print render($page['content']); ?>         
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php if ($page['content_bottom']): ?><div class="content-bottom"><?php print render($page['content_bottom']); ?></div><?php endif; ?>
      </div></div>
      
      <?php if ($page['sidebar_first']): ?>
	    <div class="sidebar-first clearfix"><div class="sidebar-first-inner">
          <?php print render($page['sidebar_first']); ?>
	    </div></div>
      <?php endif; ?>
	  
      <?php if ($page['sidebar_second']): ?>
	    <div class="sidebar-second clearfix"><div class="sidebar-second-inner">
          <?php print render($page['sidebar_second']); ?>                
	    </div></div>
      <?php endif; ?>
  
    </div></div><!-- /middle-wrapper --> 
    
<!-- Bottom User Regions -->
    <?php if ($page['user5'] || $page['user6'] || $page['user7'] || $page['user8']): ?>
    
      <div id="bottom-user-regions"><div class="width-wrapper"><div class="bottom-user-regions-inner clearfix">
		<?php if ($page['user5']): ?>
		  <div class="user-region <?php echo $bottomBlocks; ?> user5">
		    <div class="user-region-inner bottom-equal">
              <?php print render($page['user5']); ?>
		    </div>
		  </div>
        <?php endif; ?>
        <?php if ($page['user6']): ?>
		  <div class="user-region <?php echo $bottomBlocks; ?> user6">
		    <div class="user-region-inner bottom-equal">
              <?php print render($page['user6']); ?>
	        </div>
		  </div>
        <?php endif; ?>
        <?php if ($page['user7']): ?>
		  <div class="user-region <?php echo $bottomBlocks; ?> user7">
		    <div class="user-region-inner bottom-equal">
              <?php print render($page['user7']); ?>
		    </div>
		  </div>
        <?php endif; ?>
		<?php if ($page['user8']): ?>
		  <div class="user-region <?php echo $bottomBlocks; ?> user8">
		    <div class="user-region-inner bottom-equal">
              <?php print render($page['user8']); ?>
		    </div>
		  </div>
        <?php endif; ?>
      </div></div></div><!-- End of Bottom User Regions -->
    <?php endif; ?>  
    
<!-- The All Knowing All Seeing Footer Block -->
    <?php if ($page['footer']): ?>
	  <div id="footer"><div class="width-wrapper clearfix">
      
      	<?php print render($page['footer']) ?>
      
        <?php if ($logo): ?>
          <div class="site-logo">
            <a href="<?php print check_url($front_page); ?>"><img src="<?php print $logo ?>" alt="<?php print $site_name; ?>" /></a>
          </div>
        <?php endif; ?>	 
      
	  </div></div><!-- /footer -->
	<?php endif; ?>
 
  </div></div><!-- page-wrapper -->