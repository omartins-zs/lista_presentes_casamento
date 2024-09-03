    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.1/dist/js/bootstrap-select.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Alertify.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    	$(document).ready(function() {
    		// Inicializar Bootstrap Select
    		$('.selectpicker').selectpicker();

    		$('#dataTable').DataTable({
    			"ordering": true,
    			// "paging": true,
    			"paging": false,
    			"scrollCollapse": true,
    			"scrollY": '50vh',
    			"searching": true,
    			"oLanguage": {
    				"sEmptyTable": "Nenhum registro encontrado na tabela",
    				"sInfo": "Mostrar _START_ até _END_ de _TOTAL_ registros",
    				"sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
    				"sInfoFiltered": "(Filtrar de _MAX_ total registros)",
    				"sInfoPostFix": "",
    				"sInfoThousands": ".",
    				"sLengthMenu": "Mostrar _MENU_ registros por pagina",
    				"sLoadingRecords": "Carregando...",
    				"sProcessing": "Processando...",
    				"sZeroRecords": "Nenhum registro encontrado",
    				"sSearch": "",
    				"oPaginate": {
    					"sNext": "Proximo",
    					"sPrevious": "Anterior",
    					"sFirst": "Primeiro",
    					"sLast": "Ultimo"
    				},

    				"oAria": {
    					"sSortAscending": ": Ordenar colunas de forma ascendente",
    					"sSortDescending": ": Ordenar colunas de forma descendente"
    				}
    			}
    		});
    		// Style Search de Pesquisa da Table Visita
    		$('[type=search]').each(function() {
    			$(this).attr("placeholder", "Pesquisar...");
    			// $(this).css('height', '2rem');
    		});

    	});
    </script>

    <script type="text/javascript">
    	$(document).ready(function() {
    		<?php if ($this->session->flashdata("success")) { ?>
    			alertify.set('notifier', 'position', 'top-center');
    			alertify.success("<?= $this->session->flashdata("success") ?>");
    		<?php } ?>
    		<?php if ($this->session->flashdata("danger")) { ?>
    			alertify.set('notifier', 'position', 'top-center');
    			alertify.error("<?= $this->session->flashdata("danger") ?>");
    		<?php } ?>
    		<?php if ($this->session->flashdata("message")) { ?>
    			alertify.set('notifier', 'position', 'top-center');
    			alertify.message("<?= $this->session->flashdata("message") ?>");
    		<?php } ?>
    	})
    </script>
