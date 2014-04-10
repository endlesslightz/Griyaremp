
<?php $this->load->view('backend/tema/header');?>
<?php $this->load->view('backend/tema/sidebar');?>
				
				<!-- Start of the main content -->
				<div id="main_content">
				
					<h2 class="grid_12">Daftar Item</h2>
					<div class="clean"></div>		
							<br>
						<p>Masukkan Filter Kode ISBN / ISSN Buku  : </p>
					<?php 
					
					echo form_open('backend/pelaporan/daftar_item'); 
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
								<h3>Data Peminjaman</h3><span></span>
							</div>
							<div class="content no-padding">
								<table cellpadding="5" width=100% border=1class="table">
								
										
									
											<tr>
										<td width="5%" style="background: #EEEEEE;"><strong>No</strong></td>
										<td width="5%" style="background: #EEEEEE;"><strong>Kode Koleksi</strong></td>
										<td swidth="50%" style="background: #EEEEEE;"><strong>Judul</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>ISBN / ISSN</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>Tanggal Masuk</strong></td>
										<td width="10%" style="background: #EEEEEE;"><strong>Klasifikasi</strong></td>

									</tr>
									
									<?php $no=1; foreach($hasil_search->result() as $hasil_search):?>
									<tr>
										<td width="5%"><?php echo $no; ?></td>
										<td width="5%"><?php echo $hasil_search->item_code; ?></td>
										<td width="50%"><?php echo $hasil_search->title; ?></td>
										<td width="10%"><?php echo $hasil_search->isbn_issn; ?></td>
										<td width="10%"><?php echo $hasil_search->input_date; ?></td>
										<td width="10%"><?php echo $hasil_search->classification; ?></td>

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