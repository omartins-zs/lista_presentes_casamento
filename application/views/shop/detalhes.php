<!-- Product section-->
<section class="py-2">
	<div class="container-fluid  px-4 px-lg-5 my-5">
		<div class="row gx-4 gx-lg-5 align-items-center">
			<!-- Botão de Voltar -->
			<div class="col-12 mb-3">
				<button class="btn btn-secondary btn-sm-auto d-none d-md-inline-block" onclick="history.back()">Voltar</button>
				<button class="btn btn-secondary btn-block d-md-none" onclick="history.back()">Voltar</button>
			</div>
			<div class="col-md-6">
				<img class="card-img-top mb-5 mb-md-0" src="<?= !empty($produto->imagem) ? base_url('assets/admin/upload/' . $produto->imagem) : base_url('assets/img/produto_default.jpg'); ?>" />
			</div>
			<div class="col-md-6">
				<div class="small mb-1">#<?= $produto->id; ?></div>

				<h1 class="display-5 fw-bolder"><?= $produto->nome; ?></h1>
				<p class="lead"><?= $produto->detalhes; ?></p>
				<div class="display-4 mb-5">
					<span><?= $produto->preco_intervalo; ?></span>
				</div>

				<!-- Características do Produto -->
				<h5 class="fw-bolder mt-4">Características:</h5>
				<div class="row">
					<!-- Exibindo Marcas -->
					<div class="col-md-12">
						<ul>
							<?php foreach ($marcas as $marca => $item) : ?>
								<li>Marca: <?= $item->nome; ?></li>
							<?php endforeach; ?>
						</ul>
						<p class="text-left">Cor: Preto ou Cinza</p>
					</div>
				</div>

				<div class="d-flex mb-4">
					<a class="btn btn-info mr-2 w-50" href="<?= $produto->link_1; ?>" target="_blank">Comprar na Loja 1</a>
					<a class="btn btn-warning w-50" href="<?= $produto->link_2; ?>" target="_blank">Comprar na Loja 2</a>
				</div>

				<?php if ($produto->comprado) : ?>

					<h4 class="text-center"><span class="badge badge-success">Produto Comprado</span></h4>

					<div class="accordion" id="accordionExample">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Informações do Pix
									</button>
								</h2>
							</div>

							<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body" style="background-color:#f48c06; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
									<h5 class="card-title">PIX da Bárbara</h5>
									<span><strong>Banco:</strong> Nubank</span><br>
									<span><strong>Chave PIX:</strong> gabrielmatheus209@gmail.com</span><br>
									<span><strong>Banco:</strong> Santander</span><br>
									<span><strong>Chave PIX:</strong> 538.638.858-48</span><br>
								</div>
							</div>
						</div>
					</div>

				<?php else :  ?>

					<button type="button" class="btn btn-primary btn-block w-100 mb-3" data-toggle="modal" data-target="#pixModal">
						Ajudar com PIX
					</button>

					<button class="btn btn-success mt-auto w-100" onclick="comprarProduto(<?= $produto->id; ?>)">Vou dar esse presente</button>

				<?php endif; ?>



			</div>
		</div>
	</div>
</section>

<!-- Modal PIX -->
<div class="portfolio-modal modal fade" id="pixModal" tabindex="-1" aria-labelledby="portfolioModalPix" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Enviar PIX</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h2 class="text-secondary text-uppercase mb-0 text-center">Ajudar com PIX</h2>

				<!-- Centralizar QR Code -->
				<div class="text-center">
					<img class="img-fluid rounded mb-5" src="<?= base_url('assets/img/qrcode.jpg'); ?>" alt="Imagem Genérica" style="max-width: 200px;" />
				</div>

				<p class="mb-4 text-center">Utilize o QR Code acima para fazer a contribuição via PIX.</p>

				<!-- Cartões com Informações de PIX -->
				<div class="d-flex justify-content-center flex-wrap">
					<div class="card mb-4 mr-3" style="background-color:#f48c06; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
						<div class="card-body">
							<h5 class="card-title">PIX do GABRIEL</h5>
							<span><strong>Banco:</strong> Nubank</span><br>
							<span><strong>Chave PIX:</strong> gabrielmatheus209@gmail.com</span><br>
							<span><strong>Banco:</strong> Santander</span><br>
							<span><strong>Chave PIX:</strong> 538.638.858-48</span><br>
						</div>
					</div>
					<div class="card mb-4" style="background-color:#f48c06; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
						<div class="card-body">
							<h5 class="card-title">PIX da Bárbara</h5>
							<span><strong>Banco:</strong> Nubank</span><br>
							<span><strong>Chave PIX:</strong> gabrielmatheus209@gmail.com</span><br>
							<span><strong>Banco:</strong> Santander</span><br>
							<span><strong>Chave PIX:</strong> 538.638.858-48</span><br>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

					<button data-dismiss="modal" class="btn btn-success" onclick="comprarProduto(<?= $produto->id; ?>)">Vou dar esse presente pelo PIX</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('templates/shop/js'); ?>
