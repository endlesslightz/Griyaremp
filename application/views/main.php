<?php $this->load->view('tema/header');?>
<?php $this->load->view('tema/sidebar');?>
								

		<div id="content">
		<ul class="breadcrumb">
	<li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
	<li class="divider"></li>
	<li>		<h2 class="grid_12"><?php echo $webtitle; ?></h2></li>
</ul>
<div class="separator"></div>
<?php echo $output; ?>	 
</div>
		</div>

<?php $this->load->view('tema/footer');?>
