<div class="card shadow mb-4">
	<div class="card-header py-3"><?= empty($produto->nome) ? 'Novo Produto' : 'Editar Produto'; ?></div>
	<div class="card-body">
		<?php if (isset($produto->id)) : ?>
			<form class="form" action="<?= base_url() ?>admin/produto/update/<?= $produto->id ?>" method="post" enctype="multipart/form-data">
			<?php else : ?>
				<form class="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>admin/Produto/create">
				<?php endif; ?>

				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label for="inputNome">Nome do Produto</label>
							<input class="form-control" type="text" value="<?= $produto->nome; ?>" name="nome" required>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="inputDetalhes">Detalhes do Produto</label>
							<input class="form-control" type="text" value="<?= $produto->detalhes; ?>" name="detalhes" required>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="marca">Marcas</label>
							<select class="form-control selectpicker" name="marcas[]" id="marcas" multiple>
								<?php foreach ($marcas as $marca) : ?>
									<option value="<?= $marca->id; ?>" <?php if (in_array($marca->id, array_column($marcas_selecionadas, 'id'))) echo 'selected'; ?>>
										<?= $marca->nome; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="inputLink1">Link 1</label>
							<input class="form-control" type="url" value="<?= $produto->link_1; ?>" name="link_1">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="inputLink2">Link 2</label>
							<input class="form-control" type="url" value="<?= $produto->link_2; ?>" name="link_2">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="inputPreco">Preço (Intervalo)</label>
							<input class="form-control" type="text" value="<?= $produto->preco_intervalo; ?>" name="preco_intervalo" required>
							<small>*Até R$ 150,00 ou R$250,00 - R$ 350,00</small>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="inputImagem">Upload da Imagem</label>
							<?php if (empty($produto->imagem)) : ?>
								<img src="<?= base_url('assets/admin/images/default_upload.jpg'); ?>" id="img_url" alt="Sua imagem" class="img-thumbnail">
							<?php else : ?>
								<img src="<?= base_url('assets/admin/upload/' . $produto->imagem); ?>" id="img_url" alt="Sua imagem" class="img-thumbnail">
							<?php endif; ?>
							<input type="hidden" name="imagem_nome" value="<?= $produto->imagem ?>">
							<input class="form-control-file mt-2" id="inputImagem" type="file" name="imagem" onChange="img_pathUrl(this);">
						</div>
					</div>
				</div>

				<?php if (isset($produto->id)) { ?>
					<button class="btn btn-primary" type="submit">Atualizar Produto</button>
				<?php } else { ?>
					<button class="btn btn-primary" type="submit">Adicionar Produto</button>
				<?php } ?>
				</form>
	</div>
</div>

<?php $this->load->view('templates/admin/js'); ?>
