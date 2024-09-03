    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.1/dist/js/bootstrap-select.min.js"></script>

    <!-- Alertify.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
