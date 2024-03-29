<script type="text/javascript">
$(document).ready(function(){
    $('input[type=checkbox]').click( function(){     
        if($(this).is(':checked')){
            $('#delete-selected-item').removeAttr('disabled');
        }else{
            if(!$('input[name=custom_delete]').is(':checked')){
              $('#delete-selected-item').attr('disabled','disabled');
              $('.checkall').removeAttr('checked');
            }        
        }
    });
});
$(function () {
    //CHECK ALL BOXES
    $('.checkall').click(function () {
       if($(this).is(':checked')){
        $('#delete-selected-item').removeAttr('disabled');        
       }else{
        $('#delete-selected-item').attr('disabled','disabled');
       }
        $(this).parents('table:eq(0)').find(':checkbox').attr('checked', this.checked);        
    });
    //ADD DELETE BUTTON
  //  if($('.pDiv2 .delete_all_button').length == 0) { //check if element already exists (for ajax refresh purposes)
  //      $('.pDiv2').append('<input id="delete-selected-item" type="button" value="" class="delete_all_button" onclick="delete_selected()" style="top: 0px";>');
  //      $('#delete-selected-item').attr('disabled','disabled');
  //  }

});

function delete_selected()
{
    var list = "";
    $('input[type=checkbox]').each(function() {     
        if (this.checked) {        
            //remove selection rows
            $('#custom_tr_'+this.value).remove();
            //create list of values that will be parsed to controller
            list += this.value + '|';
        }
    });
    //send data to delete
    $.post('<?php echo base_url();?>index.php/backend/main/delete_selection', { selection: list }, function(data) {
        alert('Deleted !');
    });
}
</script>

<?php  
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	$column_width = (int)(80/count($columns));
	
	if(!empty($list)){
?><div class="bDiv" >
		<table cellspacing="0" cellpadding="0" border="0" id="flex1">
		<thead>
			<tr class='hDiv'>
            	<th width="20px"><input type="checkbox" class="checkall" /></th>
				<?php foreach($columns as $column){?>
                <th width='<?php echo $column_width?>%'>
					<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>" 
						rel='<?php echo $column->field_name?>'>
						<?php echo $column->display_as?>
					</div>
				</th>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
				<th align="left" abbr="tools" axis="col1" class="" width='20%'>
					<div class="text-right">
						<?php echo $this->l('list_actions'); ?>
					</div>
				</th>
				<?php }?>
			</tr>
		</thead>		
		<tbody>
<?php foreach($list as $num_row => $row){ ?>        
		<?php
		$temp_string = $row->delete_url;
		$temp_string = explode("/", $temp_string);
		$row_num = sizeof($temp_string)-1;
		$rowID = $temp_string[$row_num];
		?>
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?> id="custom_tr_<?=$rowID?>">
            <td><input type="checkbox" name="custom_delete" value="<?=$rowID?>" /></td>
			<?php foreach($columns as $column){?>
            <td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<div style="width: 100%;" class='text-left'><?php echo $row->{$column->field_name}; ?></div>
			</td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
			<td align="left" width='20%'>
				<div class='tools'>				
					<?php if(!$unset_delete){?>
                    	<a href='<?php echo $row->delete_url?>' title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row" >
                    			<span class='delete-icon'></span>
                    	</a>
                    <?php }?>
                    <?php if(!$unset_edit){?>
						<a href='<?php echo $row->edit_url?>' title='<?php echo $this->l('list_edit')?> <?php echo $subject?>'><span class='edit-icon'></span></a>
					<?php }?>
					<?php 
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){ 
							$action = $actions[$action_unique_id];
					?>
							<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>"><?php 
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php 	
								}
							?></a>		
					<?php }
					}
					?>					
                    <div class='clear'></div>
				</div>
			</td>
			<?php }?>
		</tr>
<?php } ?>        
		</tbody>
		</table>
	</div>
<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>	