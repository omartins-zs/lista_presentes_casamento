<!-- DataTables Example -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Lista de Produtos</h6>
		<a class="d-sm-inline-block btn btn-sm btn-success shadow-sm" href="<?= base_url('admin/produto/novo') ?>"><i class="fas fa-plus-circle fa-sm"></i> Novo Produto</a>
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
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="col-1">Imagem</th>
						<th>Nome</th>
						<th>Detalhes</th>
						<th>Preço Intervalo</th>
						<th>Link 1</th>
						<th>Link 2</th>
						<th>Comprado</th>
						<th class="col-1">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($produtos)) : foreach ($produtos['produtos'] as $produto) : ?>
							<tr>
								<td><img style="width: 4rem; height: 4rem; object-fit: contain;" src="<?= !empty($produto->imagem) ? base_url('assets/admin/upload/' . $produto->imagem) : base_url('assets/img/produto_default.jpg'); ?>" alt="<?= $produto->nome; ?>"></td>
								<td><?= $produto->nome ?></td>
								<td><?= $produto->detalhes ?></td>
								<td><?= $produto->preco_intervalo ?></td>
								<td><a href="<?= $produto->link_1 ?>" target="_blank">Ver Link</a></td>
								<td><a href="<?= $produto->link_2 ?>" target="_blank">Ver Link</a></td>
								<td><?= $produto->comprado ? 'Sim' : 'Não' ?></td>
								<td>
									<a href="<?= base_url('admin/produto/edit/' . $produto->id); ?>" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm"></i> Editar</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="8" class="text-center">Não existem produtos.</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('templates/admin/js'); ?>
