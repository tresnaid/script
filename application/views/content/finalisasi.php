<style type="text/css">
	.activesub{
		background-color: yellow;
	}
</style>     	
<?php 
$datauser = $_SESSION['list'];
  	foreach ($datauser as $row) {
        $id = $row['id_user'];
  	}
?>
<section class="section-gray">
	<div class="container clearfix">
		<div class="row services">
		  <div class="col-md-12">
		    <h2 class="heading">Daftar Kebutuhan Sistem Informasi</h2>
		    <div id="navigation" class="collapse navbar-collapse">
		      	<ul class="nav navbar-nav navbar-right">
			        <li class="
			          <?php if($kategori == 'FNC'): ?>
			            activesub
			          <?php endif ?>
			         "
			        >
			        	<a href="<?php echo base_url(); ?>home/finalisasi/1">Financial</a>
			    	</li>
			        <li class="
			          <?php if($kategori == 'CST'): ?>
			            activesub
			          <?php endif ?>
			         ">
				        <a href="<?php echo base_url(); ?>home/finalisasi/2">Customer</a>
				    </li>
			        <li class="
			          <?php if($kategori == 'INT'): ?>
			            activesub
			          <?php endif ?>
			         ">
				        <a href="<?php echo base_url(); ?>home/finalisasi/3">Internal Process</a>
				    </li>
			        <li class="
			          <?php if($kategori == 'LEA'): ?>
			            activesub
			          <?php endif ?>
			         ">
				        <a href="<?php echo base_url(); ?>home/finalisasi/4">Inovation and Growth</a>
				    </li>
		      	</ul>
		    </div>
   		 <div class="row">
      		<div class="container">
        		
       			<div class="panel panel-default">
         			<div class="panel-body">
           				<table class="table table-striped table-bordered" style="margin:0px;">
			              <thead>
			                <tr>
								<th>Objective</th>
				                <th>Measure</th>
				                <th>Action (CSF)</th>
				                <th>IS Need</th>
				                <th>diusulkan Oleh</th>
				                <th>Option</th>
			                </tr>
			              </thead>
			              <tbody>
			              	<?php foreach ($table as $table): ?>
			              		<?php $id = $table->id_user; ?>
			              		<?php $data_objective = $this->User_model->getDataWhere2('t_objective', 'id_user', $id, 'id_kategori_analisis', $kategori); ?>
								<?php foreach($data_objective as $row): ?>
				                	<?php $counter=1; ?>
					                <?php 
					                  $data_measure = $this->User_model->getDataWhere('t_measure', 'id_objective', $row['id_objective']);
					                  $count_measure = $this->User_model->countwhere('t_measure', 'id_objective', $row['id_objective']);

					                  $count_action = $this->User_model->countwhere('t_action', 'id_objective', $row['id_objective']);
					                  $data_action = $this->User_model->getDataWhere('t_action', 'id_objective', $row['id_objective']);

					                  $count_isneed = $this->User_model->countwhere('t_isneed', 'id_objective', $row['id_objective']);
					                  $data_isneed = $this->User_model->getDataWhere('t_isneed', 'id_objective', $row['id_objective']);
					                  $komentar = $this->User_model->getDataWhere('t_finalisasi', 'id_objective', $row['id_objective']);
					                  $biggest = $this->User_model->countmax($count_measure, $count_action, $count_isneed);
					                  $jumlah_max = $biggest['jumlah'];
					                  $nama_max = $biggest['nama'];
			  		                 ?>

			  		                  <?php if ($nama_max == 'measure'): ?>
			                      		<?php foreach ($data_measure as $key => $value): ?>
					                        <tr>
					                          <?php if ($counter == 1): ?>
					                            <td rowspan="<?php echo $jumlah_max ?>"><?php echo $row['objective']?></td>
					                          <?php endif ?>

					                          <td ><?php echo $value['measure']?></td> 

					                          <?php if (!empty($data_action[$key]['action'])): ?>
					                            <td ><?php echo $data_action[$key]['action']?></td>
					                          <?php else: ?>
					                            <td> </td>
					                          <?php endif ?>
					                          
					                          <?php if (!empty($data_isneed[$key]['isneed'])): ?>
					                            <td ><?php echo $data_isneed[$key]['isneed']?></td>
					                          <?php else: ?>
					                            <td> </td>
					                          <?php endif ?>
					                         
					                          <?php if ($counter == 1): ?>
					                          <td rowspan="<?php echo $jumlah_max; ?>">
					                          	<?php echo $table->nama_user; ?>
					                          </td>
					                          <td rowspan="<?php echo $jumlah_max; ?>">
					                            <a href="" data-toggle="modal" data-target="#komentar<?php echo $row['id_objective']?>"><i class="fa fa-comment-o"></i></a> 
					                          </td>
					                          <?php endif ?>
					                        </tr>

					                      <?php $counter++; ?>
					                    <?php endforeach ?>
					                <?php elseif ($nama_max == 'action'): ?>
			                      		<?php foreach ($data_action as $key => $value): ?>
					                       <tr>
					                        <?php if ($counter == 1): ?>
					                          <td rowspan="<?php echo $jumlah_max ?>"><?php echo $row['objective']?></td>
					                        <?php endif ?>
					                        
					                        <?php if (!empty($data_measure[$key]['measure'])): ?>
					                          <td ><?php echo $data_measure[$key]['measure']?></td>
					                        <?php else: ?>
					                          <td> </td>
					                        <?php endif ?>
					                        
					                        <td ><?php echo $value['action']?></td>

					                        <?php if (!empty($data_isneed[$key]['isneed'])): ?>
					                          <td ><?php echo $data_isneed[$key]['isneed']?></td>
					                        <?php else: ?>
					                          <td> </td>

					                        <?php endif ?>
					                        
					                        <?php if ($counter == 1): ?>
					                        <td rowspan="<?php echo $jumlah_max; ?>">
					                          	<?php echo $table->nama_user; ?>
					                          </td>
					                          <td rowspan="<?php echo $jumlah_max; ?>">
					                          <a href="" data-toggle="modal" data-target="#komentar<?php echo $row['id_objective']?>"><i class="fa fa-comment-o"></i></a> 
					                        </td>
					                        <?php endif ?>
					                      </tr>

					                      <?php $counter++; ?>
					                    <?php endforeach ?>
					                <?php elseif ($nama_max == 'isneed'): ?>
			                      		<?php foreach ($data_isneed as $key => $value): ?>
					                        <tr>
						                      <?php if ($counter == 1): ?>
						                        <td rowspan="<?php echo $jumlah_max ?>"><?php echo $row['objective']?></td>
						                      <?php endif ?>
						                      
						                      <?php if (!empty($data_measure[$key]['measure'])): ?>
						                        <td ><?php echo $data_measure[$key]['measure']?></td>
						                      <?php else: ?>
						                        <td> </td>
						                      <?php endif ?>
						                      
						                      <?php if (!empty($data_action[$key]['action'])): ?>
						                          <td ><?php echo $data_action[$key]['action']?></td>
						                        <?php else: ?>
						                          <td> </td>
						                        <?php endif ?>

						                        <td ><?php echo $value['isneed']?></td>
						                        
						                        <?php if ($counter == 1): ?>
						                      <td rowspan="<?php echo $jumlah_max; ?>">
					                          	<?php echo $table->nama_user; ?>
					                          </td>
						                      <td rowspan="<?php echo $jumlah_max; ?>">
						                        <a href="" data-toggle="modal" data-target="#komentar<?php echo $row['id_objective']?>"><i class="fa fa-comment-o"></i></a>
						                      </td>
						                      <?php endif ?>
						                    </tr>

					                      <?php $counter++; ?>
					                    <?php endforeach ?>
					                <?php elseif ($nama_max == 'kosong'): ?>
			                      		<?php foreach ($data_isneed as $key => $value): ?>
					                        <tr>
							                    <td><?php echo $row['objective']; ?></td>
							                    <td> </td>
							                    <td> </td>
							                    <td> </td>
							                    <td>
							                      <td>
					                          	<?php echo $table->nama_user; ?>
					                          </td>
							                        <a href="" data-toggle="modal" data-target="#komentar<?php echo $row['id_objective']?>"><i class="fa fa-comment-o"></i></a> 
							                      </td>
							                  </tr>
					                    <?php endforeach ?>
					                <?php endif ?>
					                <div id="komentar<?php echo $row['id_objective']?>" class="modal fade" role="dialog" >
					                    <div class="modal-dialog">
					                        <div class="modal-content">
					                          	<div class="modal-header">
					                            	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                            	<h4 class="modal-title">Komentari analisis ini</h4>
					                          	</div>
					                          	<div class="modal-body">
						                            <h5>Objective: <?php echo $row['objective']; ?></h5>
						                            <h5>Measure:</h5>
						                            <?php foreach ($data_measure as $key): ?>
						                            	<?php echo $key['measure'] ?>
						                            	<?php echo "<br/>" ?>
						                            <?php endforeach ?>
						                            <h5>Action(CSF):</h5>
						                            <?php foreach ($data_action as $key): ?>
						                            	<?php echo $key['action'] ?>
						                            	<?php echo "<br/>" ?>
						                            <?php endforeach ?>
						                            <h5>Information System Need:</h5>
						                            <?php foreach ($data_isneed as $key): ?>
						                            	<?php echo $key['isneed'] ?>
						                            	<?php echo "<br/>" ?>
						                            <?php endforeach ?>
					                          	</div>
					                          	<form action="<?php echo base_url();?>analisis/alasanfinalisasi" method="POST">
						                          	<input type="hidden" name="kategori" value="<?php echo $kategori ?>">
						                          	<input type="hidden" name="id" value="<?php echo $id ?>">
						                          	<input type="hidden" name="id_objective" value="<?php echo $row['id_objective'] ?>">
					                        		<div class="modal-footer">
					                          			<input type="text" name="komentar" style="width: 95%;">
					                          			<button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Komentar</button>
					                          			<hr>
					                        		</div>
					                        		<div class="modal-body" >
							                        	<?php foreach ($komentar as $key): ?>
							                        		<?php echo $key['alasan']; ?>
							                        		<?php echo '<br/>' ?>
							                        	<?php endforeach ?>
							                        </div>
					                        	</form>
					                      	</div>
					                   	</div>
					                </div>
				                <?php endforeach ?>
			              	<?php endforeach ?>
			            		</tbody>
            				</table>
          				</div>	
        			</div>
	    		</div>
   			 </div>
		</div>
	</div>
</section>