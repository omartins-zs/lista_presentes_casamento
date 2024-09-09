<div class="content">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Bem vindo ao Painel Administrativo, <?= $this->session->userdata('nome'); ?>!!</h6>
		</div>
		<div class="card-body">
			<p>Aqui voce pode Gerenciar, editar, excluir, e analisar as informaçoes de pedidos e produtos</p>
			<br>
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-2 col-md-6 mb-4">
					<!-- Reduzi o tamanho do col-xl-3 para col-xl-2 -->
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Produtos</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_produtos ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-air-freshener fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-2 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Marcas</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_marcas ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
