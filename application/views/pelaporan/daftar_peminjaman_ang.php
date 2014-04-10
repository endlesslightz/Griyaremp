
<?php $this->load->view('backend/tema/header');?>
<?php $this->load->view('backend/tema/sidebar');?>
				
				<!-- Start of the main content -->
				<div id="main_content">
				
					<h2 class="grid_12">Daftar Peminjaman Anggota</h2>
					<div class="clean"></div>		
							<br>
						<p>Masukkan Filter Nama Member : </p>
					<?php 
					
					echo form_open('backend/pelaporan/daftar_peminjaman_ang'); 
					//echo form_hidden('udahcaribuku', true);
					echo form_input('keyword',$keyword); 
					echo form_submit('submit', 'Filter'); 
					echo form_close(); 
					?>
					<br>
					<?php if($hasil_search->num_rows > 0): ?>
						
							<div class="grid_12">
						<div class="alert info">
							<span class="icon"></span><span class="hide">x</span>
							<strong>Information</strong> | Ditemukan <?php echo $hasil_search->num_rows; ?> hasil dalam database
						</div>
						
						<br>
						
						<div class="box">
							<div class="header">
								<h3>Data Peminjaman Anggota</h3><span></span>
							</div>
							<div class="content no-padding">
								<table cellpadding="5" width=100% border=1class="table">
								
										
									
										<tr>
										<td swidth="2%" style="background: #EEEEEE;"><strong>No</strong></td>
										<td swidth="2%" style="background: #EEEEEE;"><strong>ID</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>Nama Member</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>Kode Buku</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>Judul</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>Tanggal Peminjaman</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>Tanggal Harus Kembali</strong></td>
									</tr>
									
									<?php $no=1; foreach($hasil_search->result() as $hasil_search):?>
									<tr>
										<td width="2%"><?php echo $no; ?></td>
										<td width="2%"><?php echo $hasil_search->member_id; ?></td>
										<td width="10%"><?php echo $hasil_search->member_name; ?></td>
										<td width="10%"><?php echo $hasil_search->item_code; ?></td>
										<td width="10%"><?php echo $hasil_search->title; ?></td>
										<td width="10%"><?php echo $hasil_search->loan_date; ?></td>
										<td width="10%"><?php echo $hasil_search->due_date; ?></td>
											
									</tr>
												<?php $no=$no+1; endforeach;  ?>
								</table>
							</div> <!-- End of .content -->
							<div class="clear"></div>
						</div> <!-- End of .box -->
					
						
				
					<?php elseif($hasil_search->num_rows() == 0): ?>
						<p>Maaf, kata kunci tidak sesuai dengan ID member apapun</p>
					<?php endif; ?> 	   

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