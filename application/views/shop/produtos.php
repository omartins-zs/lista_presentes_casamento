<!-- Section-->
<section class="py-5">
	<div class="container-fluid px-4 px-lg-5 mt-5">
		<div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
			<?php foreach ($produtos['produtos'] as  $produto  =>     $item) : ?>
				<div class="col mb-5">
					<div class="card h-100 <?= $item->comprado ? 'comprado' : ''; ?>">
						<!-- Product image -->
						<img class="card-img-top" src="<?= !empty($item->imagem) ? base_url('assets/admin/upload/' . $item->imagem) : base_url('assets/img/produto_default.jpg'); ?>" alt="<?= $item->nome; ?>" />

						<!-- Product details -->
						<div class="card-body p-4">
							<div class="text-center">
								<h3 class="fw-bolder"><?= $item->nome; ?></h3>
								<p><?= $item->detalhes; ?></p>
								<h5><?= $item->preco_intervalo; ?></h5>
							</div>
						</div>
						<!-- Product actions -->
						<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
							<?php if ($item->comprado) : ?>
								<div class="d-grid gap-2">
									<h4 class="text-center"><span class="badge badge-info">Produto Comprado</span></h4>
									<a class="btn btn-outline-dark mt-auto w-100" href="<?= base_url('shop/detalhes/' . $item->id); ?>">Ver detalhes</a>
								</div>
							<?php else :  ?>
								<div class="d-grid gap-2">
									<a class="btn btn-outline-dark mt-auto w-100" href="<?= base_url('shop/detalhes/' . $item->id); ?>">Ver detalhes</a>
									<button class="btn btn-success mt-auto w-100" onclick="comprarProduto(<?= $item->id; ?>)">Vou dar esse presente</button>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<script>
	alertify.defaults.transition = "flipx";
	alertify.defaults.theme.ok = "btn btn-success";
	alertify.defaults.theme.cancel = "btn btn-danger";
	alertify.defaults.theme.input = "form-control";

	alertify.set('notifier', 'position', 'top-center');

	function comprarProduto(produtoId) {
		alertify.prompt("Confirmação de Compra", "Por favor, insira o seu nome:",
			"",
			function(evt, value) {
				if (value.trim() === "") {
					alertify.error("Nome não pode estar vazio.");
					return;
				}

				// Log para verificar o ID do produto e o nome do comprador
				console.log("Produto ID:", produtoId);
				console.log("Nome do Comprador:", value);

				// Realiza a requisição para marcar o produto como comprado com o nome do comprador
				fetch('<?= base_url("shop/comprar"); ?>/' + produtoId, {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						nome_comprador: value
					})
				}).then(response => {
					// Log da resposta completa
					console.log("Resposta da Requisição:", response);

					if (response.ok) {
						// Exibe mensagem de sucesso e recarrega a página
						alertify.success("Obrigado, " + value + "! Produto marcado como comprado.");
						setTimeout(() => {
							location.reload();
						}, 1500);
					} else {
						alertify.error("Erro ao processar a compra. Tente novamente.");
					}
				}).catch(error => {
					console.error('Erro:', error);
					alertify.error("Erro ao processar a compra. Tente novamente.");
				});
			},
			function() {
				alertify.error('Operação cancelada.');
			});
	}
</script>
