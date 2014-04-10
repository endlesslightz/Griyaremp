
<?php $this->load->view('backend/tema/header');?>


		<?php $this->load->view('backend/tema/sidebar');?>
				
				<!-- Start of the main content -->
				<div id="main_content">
					
					
					<h2 class="grid_12">Reservasi Buku</h2>
					<div class="clean"></div>		
							<br>
						<p>Masukkan Kode Barkod Buku  : </p>
					<?php 
					
					echo form_open('backend/sirkulasi/reservasi'); 
					echo form_hidden('udahcaribuku', true);
					echo form_input('keyword',$keyword); 
					echo form_submit('submit', 'Pesan Buku'); 
					echo form_close(); 
					if($udahcaribuku){
					?>
					<br>
					<h2>Informasi Reservasi Buku</h2>
					<?php if($hasil_search->num_rows > 0): ?>
							<?php foreach($hasil_search->result() as $hasil_search):?>
						<div class="box">
							<div class="header">
								<h3>Data Buku</h3><span></span>
							</div>
							<div class="content no-padding">
								<table cellpadding="5" width=100% border=1class="table">
								
										
									<tr>
										
										<td style="background: #EEEEEE;">Kode Koleksi</td>
										<td style="background: #EEEEEE;">ID peminjam</td>
										<td width="50%" style="background: #EEEEEE;">Judul</td>
										<td width="20%" style="background: #EEEEEE;">Tanggal Reservasi</td>
									</tr>
									<tr>
										<td width="20%"><?php echo $hasil_search->item_code; ?></td>
										<td width="20%"><?php echo $this->session->userdata('membersesi'); ?></td>
										<td width="20%"><?php echo $hasil_search->title; ?></td>
										<td width="20%"><?php $date = date('Y-m-d'); echo $date; ?></td>
									</tr>
											
								</table>
							</div> <!-- End of .content -->
							<div class="clear"></div>
						</div> <!-- End of .box -->
						<table>
						<tr>
						<td>
						<div class="actions-right">
						<?php
					echo form_open('backend/sirkulasi/');  	
					echo form_hidden('udahcari', true);
					echo form_hidden('keyword',$this->session->userdata('membersesi')); 					
					echo form_submit('submit', 'Batalkan Reservasi'); 
					echo form_close(); 
					?>
				</td>
				<td>
				</div>
						<div class="actions-right">
					<?php
					echo form_open('backend/sirkulasi/tambah_pinjaman'); 
					echo form_hidden('udahcari', true);
					echo form_hidden('item_code',$hasil_search->item_code); 
					echo form_hidden('member_id',$this->session->userdata('membersesi')); 
					echo form_hidden('loan_date',$date); 
					echo form_hidden('renewed',0); 
					echo form_hidden('loan_rules_id',0); 
					echo form_hidden('actual',NULL); 
					echo form_hidden('is_lent',1); 
					echo form_hidden('is_return',0); 
					echo form_hidden('return_date',NULL); 				
					echo form_submit('submit', 'Selesai Reservasi'); 
					echo form_close(); 
					?>
				</td>
				</tr>
				</table>
				</div>
					
					
							<?php endforeach;  ?>
				
					<?php elseif($hasil_search->num_rows() == 0): ?>
						<p>Maaf, kata kunci tidak sesuai dengan ID koleksi buku apapun</p>
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