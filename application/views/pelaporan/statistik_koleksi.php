
<?php $this->load->view('backend/tema/header');?>
<?php $this->load->view('backend/tema/sidebar');?>
				
				<!-- Start of the main content -->
				<div id="main_content">
				
					<h2 class="grid_12">Statistik Koleksi</h2>
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
										<td width="15%" style="background: #EEEEEE;"><strong>Total judul</strong></td>
										<td><strong><?php foreach ($hasil_search->result_array()  as $row){
										echo $row['COUNT(biblio_id)']; 
										}?></strong> (termasuk judul buku tanpa memiliki item)</td>
									</tr>
									
									
									
									<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total judul dengan items</strong></td>
										<td><strong><?php $jumlah=$hasil_search2->num_rows;
										echo $jumlah; 
										?></strong> (termasuk judul buku tanpa memiliki item)</td>
										</tr>

								
								<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total buku</strong> </td>

										<td><strong><?php $jumlahbuku=$hasil_search3->num_rows;
										echo $jumlahbuku; 
										?></strong> </td>
									</tr>

												
												<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total buku dipinjam</strong></td>
										<td><strong><?php foreach ($hasil_search4->result_array()  as $row){
										echo $row['COUNT(item_id)']; 
										$jumlahpinjam = $row['COUNT(item_id)'];}?></strong></td>
									</tr>

												<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total buku dalam koleksi</strong></td>
										<td>
										<strong><?php $jumlahsisa = $jumlahbuku - $jumlahpinjam;
										echo $jumlahsisa; ?></strong>
										</td>
									</tr>

									
									<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>Total Judul Menurut Media</strong></td>
										<td>
										<ul>
										<?php 
										foreach ($hasil_search6->result_array()  as $row){?>
										<li>
										<?php echo  $row['gmd_name']." : ".$row['total_titles']; ?>
										</li>
										<?php }?>
											 
										<a href="<?php echo base_url('index.php/backend/pelaporan/grafik_gmd');?> " > lihat grafik </a>
									
										</ul>
										</td>
									</tr>

												
									
												
												<tr>
										<td width="15%" style="background: #EEEEEE;"><strong>10 judul populer</strong></td>
										<td>
										<ul>
										<?php 
										foreach ($hasil_search5->result_array()  as $row){?>
										<li>
										<?php echo  $row['title']; ?>
										</li>
										<?php }?>
										</ul>
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