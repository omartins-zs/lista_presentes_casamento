<div class="card shadow mb-4">
	<div class="card-header py-3">
		<?= empty($marca->nome) ? 'Nova marca' : 'Editar marca'; ?>
	</div>
	<div class="card-body">
		<?php if (isset($marca->id)) : ?>
			<form class="form" action="<?= base_url() ?>admin/marca/update/<?= $marca->id ?>" method="post">
		<?php else : ?>
				<form class="form" method="POST" action="<?= base_url() ?>admin/marca/create">
		<?php endif; ?>
				<div class="form-group">
					<label class="small mb-1" for="inputUsername">Marcas</label>
					<input class="form-control" type="text" value="<?= $marca->nome ?>" name="nome"></input>
				</div>
				<br>

				<div class="form-group d-flex justify-content-between mt-4">
					<a href="<?= base_url('admin/marca'); ?>" class="btn btn-secondary">
						<i class="fas fa-arrow-left"></i> Voltar
					</a>

					<?php if (isset($marca->id)) { ?>
						<button type="submit" class="btn btn-success">
							<i class="fas fa-save"></i> Atualizar Marca
						</button>
					<?php } else { ?>
						<button type="submit" class="btn btn-success">
							<i class="fas fa-plus"></i> Adicionar Marca
						</button>
					<?php } ?>
				</div>
			</form>
	</div>
</div>
