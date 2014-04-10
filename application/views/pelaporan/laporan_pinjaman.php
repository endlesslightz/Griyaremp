
<?php $this->load->view('backend/tema/header');?>
<?php $this->load->view('backend/tema/sidebar');?>
				
				<!-- Start of the main content -->
				<div id="main_content">
				
					<h2 class="grid_12">Laporan Peminjaman</h2>
					<div class="clean"></div>		
							<br>
					<br>
						
							<div class="grid_12">
						<br>
						
						<div class="box">
							<div class="header">
								<h3>Data Koleksi</h3><span></span>
							</div>
							<div class="content no-padding">
								<table cellpadding="5" width=100% border=1class="table">
								
										
									
									<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total Peminjaman</strong></td>
										<td><?php 
										foreach ($hasil_search->result_array()  as $row){
										echo $row['COUNT(loan_id)']; 
										}?></td>
									</tr>
									
									
									
									<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total Judul Menurut Media</strong></td>
										<td>
										<ul>
										<?php 
										foreach ($hasil_search2->result_array()  as $row){?>
										<li>
										<?php echo  $row['gmd_name']." : ".$row['hasil']; ?>
										</li>
										<?php }?>
										<a href="<?php echo base_url('index.php/backend/pelaporan/grafik_menurut_media');?> " > lihat grafik </a>
									
										</ul>
										</td>
									</tr>

								
								<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total Item Menurut Jenis Koleksi</strong> </td>
										<td>
										<ul>
										<?php 
										foreach ($hasil_search3->result_array()  as $row){?>
										<li>
										<?php echo  $row['coll_type_name']." : ".$row['COUNT(loan_id)']; ?>
										</li>
										<?php }?>
										</ul>
										</td>
									</tr>

													
												<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total Peminjaman Saat Ini</strong></td>
											<td><?php 
										foreach ($hasil_search4->result_array()  as $row){
										echo $row['COUNT(loan_id)']; 
										}?></td>
									</tr>
									
												<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total Peminjaman Kadaluarsa</strong></td>
											<td><?php 
										foreach ($hasil_search6->result_array()  as $row){
										echo $row['COUNT(loan_id)']; 
										}?></td>
									</tr>
									<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Jumlah Anggota yang Meminjam</strong></td>
										<td>
										<?php 
								
										echo $hasil_search51->num_rows." orang"; 
										?></td>
										</td>
									</tr>
												<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Jumlah Anggota yang Tidak Meminjam</strong></td>
										<td>
										<?php 
										foreach ($hasil_search5->result_array()  as $row){
										$tidak = $row['COUNT(member_id)'] -  $hasil_search51->num_rows;
										echo $tidak." orang"; 
										}?></td>
										</td>
									</tr>
								</table>
							</div> <!-- End of .content -->
							<div class="clear"></div>
						</div> <!-- End of .box -->
					
							   

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