
<?php $this->load->view('backend/tema/header');?>
<?php $this->load->view('backend/tema/sidebar');?>
				
				<!-- Start of the main content -->
				<div id="main_content">
				
					<h2 class="grid_12">Sirkulasi - Pengembalian</h2>
					<div class="clean"></div>
					
					<div class="grid_12">
									
							<br>
						
						<p>Masukkan kode barkod buku yang akan dikembalikan : </p>
					<?php 
					
					echo form_open('backend/sirkulasi/pengembalian'); 
					echo form_hidden('udahcari', true);
					echo form_input('keyword',$keyword); 
					echo form_submit('submit', 'Kembalikan'); 
					echo form_close(); 
					if($udahcari){
					?>
					<br>
					<h2>Transaksi Pengembalian</h2>
					<?php if($hasil_search->num_rows > 0): ?>
							<?php foreach($hasil_search->result() as $hasil_search):?>
						<div class="box">
							<div class="header">
								<h3>Data Anggota</h3><span></span>
							</div>
							<div class="content no-padding">
								<table cellpadding="5" width=100% border=1class="table">
								
										
											<tr>
										<td width="20%" style="background: #EEEEEE;">Judul Buku</td>
										<td colspan="3"><?php echo $hasil_search->title; ?></td>

									</tr>
									<tr>
										<td width="20%" style="background: #EEEEEE;">Nama Anggota</td>
										<td><?php echo $hasil_search->member_name; ?></td>
										<td width="20%" style="background: #EEEEEE;">ID Anggota</td>
										<td><?php echo $hasil_search->member_id; ?></td>
									</tr>
									<tr>
										<td width="20%"  style="background: #EEEEEE;">Tanggal Peminjaman</td>
										<td><?php echo $hasil_search->loan_date; ?></td>
										<td width="20%"  style="background: #EEEEEE;">Tanggal Kembali</td>
										<td><?php echo $hasil_search->due_date; ?></td>
									</tr>
										

								</table>
							</div> <!-- End of .content -->
							<div class="clear"></div>
						</div> <!-- End of .box -->
								
								<?php
								$date = date('Y-m-d'); 
								if( strtotime($date) > strtotime($hasil_search->due_date) ) {
								?>
								
						<div class="alert info">
							<span class="icon"></span><span class="hide">x</span>
							<strong>Information</strong> | Buku mendapatkan denda
						</div>
								
								<?php
								}else{
								?>
								
						<div class="alert info">
							<span class="icon"></span><span class="hide">x</span>
							<strong>Information</strong> | Buku telah berhasil dikembalikan
						</div>
								
				
								
							<?php } endforeach;  ?>
						
					<?php elseif($hasil_search->num_rows() == 0): ?>
						<p>Maaf, kata kunci tidak sesuai dengan ID barkod buku pinjaman apapun</p>
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