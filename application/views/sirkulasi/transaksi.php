
<?php $this->load->view('backend/tema/header');?>

<?php $this->load->view('backend/tema/sidebar');?>
				<!-- Start of the main content -->
				<div id="main_content">
				
					<h2 class="grid_12">Sirkulasi - Transaksi</h2>
					<div class="clean"></div>
<?php
					if ($this->session->flashdata('message')) {
					?>
					<div class="message flash">
						<div class="alert info">
							<span class="icon"></span><span class="hide">x</span>
							<strong>Information</strong> | <?php echo $this->session->flashdata('message');?> 
						</div>
						
					</div>
					<?php
					}
				?>
							<br>
						
						<p>Masukkan ID anggota : </p>
					<?php 
					
					echo form_open('backend/sirkulasi/'); 
					echo form_hidden('udahcari', true);
					echo form_input('keyword',$keyword); 
					echo form_submit('submit', 'Cari'); 
					echo form_close(); 
					if($udahcari){
					?>
					<br>
					<h2>Transaksi</h2>
					<?php if($hasil_search->num_rows > 0): ?>
							<?php foreach($hasil_search->result() as $hasil_search):?>
							
						
						<div class="box">
							<div class="header">
								<h3>Data Anggota</h3><span></span>
							</div>
							<div class="content no-padding">
								<table cellpadding="5" width=100% border=1class="table">
								
										
											<tr>
										<td width="20%" style="background: #EEEEEE;">Nama Anggota</td>
										<td><?php echo $hasil_search->member_name; ?></td>
										<td width="20%" style="background: #EEEEEE;">ID Anggota</td>
										<td><?php echo $hasil_search->member_id; ?></td>
									</tr>
									<tr>
										<td width="20%" style="background: #EEEEEE;">Email Anggota</td>
										<td><?php echo $hasil_search->member_email; ?></td>
										<td width="20%" style="background: #EEEEEE;">Tipe Kenggotaan</td>
										<td><?php echo $hasil_search->	member_type_name; ?></td>
									</tr>
									<tr>
										<td width="20%"  style="background: #EEEEEE;">Tanggal Regisrasi</td>
										<td><?php echo $hasil_search->register_date; ?></td>
										<td width="20%"  style="background: #EEEEEE;">Berlaku Hingga</td>
										<td><?php echo $hasil_search->expire_date; ?></td>
									</tr>
										

								</table>
							</div> <!-- End of .content -->
							<div class="clear"></div>
						</div> <!-- End of .box -->
					
							<?php endforeach; ?>

						<div id="shortcuts-steps" class="box tabbed">
							<div class="header">
								<h3>Olah Transaksi</h3>
							</div>
							

								<ul id="shortcuts" class="shortcuts tab-content">
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/book-large.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="<?php echo base_url('index.php/backend/sirkulasi/pinjaman')?>"> <strong>Pinjaman</strong> </a>
									</li>
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/address-book-3.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="<?php echo base_url('index.php/backend/sirkulasi/pinjaman_skrg')?>"> <strong>Pinjaman Sekarang</strong>  </a>
									</li>
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/pencil.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="<?php echo base_url('index.php/backend/sirkulasi/reservasi')?>"> <strong>Reservasi</strong>  </a>
									</li>
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/money-2.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="#"> <strong>Denda</strong> </a>
									</li>
									<li>
										<div class="shortcut-icon">
											<img src="<?php echo base_url();?>assets/backend/img/icons/25x25/blue/books-2.png" width="25" height="25">
											<div class="divider"></div>
										</div>
										<a class="shortcut-description" href="<?php echo base_url('index.php/backend/sirkulasi/transaksi_sejarah')?>"> <strong>Log Peminjaman</strong> </a>
									</li>
								</ul> <!-- End of #shortcuts -->
							</div> <!-- End of .content -->

							
					<?php elseif($hasil_search->num_rows() == 0): ?>
						<p>Maaf, kata kunci tidak sesuai dengan ID member apapun</p>
					<?php endif; } ?> 	   
					</div> <!-- End of .grid_12 -->
					<div class="clear"></div>
					


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