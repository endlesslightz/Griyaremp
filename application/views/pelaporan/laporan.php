
<?php $this->load->view('backend/tema/header');?>

<?php $this->load->view('backend/tema/sidebar');?>
				<!-- Start of the main content -->
				<div id="main_content">
				
					<h2 class="grid_12">Pelaporan Utama</h2>
					<div class="clean"></div>
					
						
							<br>
					
						<div id="shortcuts-steps" class="box tabbed">

							

								<ul id="shortcuts" class="shortcuts tab-content">
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/address-book.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="<?php echo base_url('index.php/backend/pelaporan/statistik_koleksi')?>"> <strong>Statistik Koleksi</strong> <span>Statistik data buku atau bibliografi.</span>  </a>
									</li>
								</ul> <!-- End of #shortcuts -->
								
								
								<ul id="shortcuts" class="shortcuts tab-content">
								
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/address-book-4.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="<?php echo base_url('index.php/backend/pelaporan/laporan_pinjaman')?>"> <strong>Laporan Peminjaman</strong>  <span>Statistik data peminjaman dan pengembalian buku.</span>  </a>
									</li>									
								</ul> <!-- End of #shortcuts -->
								
								
								<ul id="shortcuts" class="shortcuts tab-content">
			
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/address-book-5.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="<?php echo base_url('index.php/backend/pelaporan/laporan_anggota')?>"> <strong>Laporan Anggota</strong>   <span>Statistik data anggota perpustakaan.</span> </a>
									</li>
								</ul> <!-- End of #shortcuts -->								
							</div> <!-- End of .content -->


				</div> <!-- End of #main_content -->
				<div class="push clear"></div>
					
			</div> <!-- End of #content-wrapper -->
			<div class="clear"></div>
			<div class="push"></div> <!-- BUGFIX if problems with sidebar in Chrome -->

<?php $this->load->view('backend/tema/footer');?>
<!--
<?php //$this->load->view('backend/tema/header-grocery');?>

<div class="container_24">
<?php // echo $output; ?>	 	   
</div>
</div>

<?php //$this->load->view('backend/tema/footer');?>
-->