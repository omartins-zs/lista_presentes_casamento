<section class="py-5">
	<div class="container-fluid px-4 px-lg-5 mt-5">
		<div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
			<?php foreach ($produtos['produtos'] as  $produto  =>     $item) : ?>
				<div class="col mb-5">
					<div class="card h-100">
						<!-- Product image -->
						<img class="card-img-top" src="<?= !empty($item->imagem) ? base_url($item->imagem) : base_url('assets/img/produto_default.jpg'); ?>" alt="<?= $item->nome; ?>" />

						<!-- Product details -->
						<div class="card-body p-4">
							<div class="text-center">
								<!-- Product name -->
								<h3 class="fw-bolder"><?= $item->nome; ?></h3>
								<p><?= $item->detalhes; ?></p>
								<!-- Product price -->
								<h5><?= $item->preco_intervalo; ?></h5>
							</div>
						</div>

						<!-- Product actions -->
						<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
							<div class="text-center">
								<a class="btn btn-outline-dark mt-auto" href="<?= base_url('shop/detalhes/' . $item->id); ?>">Ver detalhes</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
