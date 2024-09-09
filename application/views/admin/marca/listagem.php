 <div class="content">
 	<div class="card shadow mb-4">
 		<div class="card-header d-flex align-items-center justify-content-between py-3">
 			<h6 class="m-0 font-weight-bold text-primary">Lista de marcas</h6>
 			<a class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?= base_url('admin/marca/novo') ?>"><i class="fas fa-plus-circle fa-sm"></i> Nova marca</a>
 		</div>
 		<div class="card-body">
 			<?php if ($this->session->flashdata('msg')) : ?>
 				<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
 					<?= $this->session->flashdata('msg') ?>
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 			<?php endif ?>
 			<div class="table-responsive">
 				<!-- DataTales Example -->
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th>Marca</th>
 							<th>Ações</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php if (count($marcas)) : foreach ($marcas as $marca) : ?>
 								<tr>
 									<td><?= $marca->nome ?></td>
 									<td>
 										<a href="<?= base_url('admin/marca/edit/' . $marca->id); ?>" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm"></i> Editar</a>
 									</td>
 								</tr>
 							<?php endforeach; ?>
 						<?php else : ?>
 							<tr>
 								<td colspan="3" class="text-center">Não existem marcas.</td>
 							</tr>
 						<?php endif; ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>
 </div>
