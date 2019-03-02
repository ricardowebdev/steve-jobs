$(document).ready(function(){	
	$('.table').DataTable({
	    "language": {
	        "url": "src/assets/js/datatable_pt.json"
	    },
	    "pageLength": 50
	});		  

	$('.cpf').mask('000.000.000-00', {reverse: true});      
	$('.cnpj').mask('00.000.000/0000-00', {reverse: true});  
    $('.cep').mask('00000-000');
    $('.phone').mask('(00) 0 0000-0000');
    $('.phoneFix').mask('(00) 0000-0000');
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.money2').mask("#.##0,00", {reverse: true});
    $('.horario').mask('00:00 - 00:00');


    $('#cep').focusout(function(){
    	var cep = $('#cep').val();

	    $.ajax({
	        type : "GET",    
	        url  : 'https://viacep.com.br/ws/' + cep + '/json/', 
	        dataType: 'json'	        
	    }).done(function(data) {
	    	$('#cidade').val(data.localidade);
	    	$('#bairro').val(data.bairro);
	    	$('#endereco').val(data.logradouro);
	    	$('#estado').val(data.uf);
	    	$('#numero').focus();
	    });
    });

    $('.email').focusout(function() {

    	if($('#email').val() != "") {
			var form_data = {
				email: $('#email').val()
			}

		    $.ajax({
		        type : "POST",    
		        url  : 'index.php?r=usuario/verifyMail', 
		        dataType: 'json',
		        data: form_data
		    }).done(function(data) {
		    	if(data > 0) {
		    		if($('#selectedId').val() != data) {
			    		alert('Este e-mail já está cadastrado');
			    		$('#email').val("");
			    		$('#email').focus();		    			
		    		} 
		    	}
		    });
    	}
    });

    if($('#descricao').length) {
    	CKEDITOR.replace('descricao');	
    }
	
	if($('#textoBanner').length) {
		CKEDITOR.replace('textoBanner');
	}

	if($('#bemVindo').length) {
		CKEDITOR.replace('bemVindo');
	}

	if($('#textoIndex').length) {
		CKEDITOR.replace('textoIndex');
	}

	if($('#textoSobre').length) {
		CKEDITOR.replace('textoSobre');
	}

	if($('#textoContato').length) {
		CKEDITOR.replace('textoContato');
	}
	if($('#dashboard').length) {
		getInfoBoard();
		topSales();
		vendasTrimestral();
		leadsXVendas();
	}

    $('.selectpicker').selectpicker('refresh');
	$('.form-control').focus();
    $('.form-control').focusout();
});

function callDelete(page, id)
{
	$('#mTitle').html('Exclusão de ' + page);
	$('#mBody').html('Tem certeza de que deseja excluir esse ' + page + ' ?');
	$('#mConfirm').attr("href", "index.php?r=" + page + "/delete/"+id);	
}

function removeFoto(id_foto, url)
{
	if(confirm("Tem certeza de que deseja remover esta foto?")) {

		var form_data = {
			id: id_foto,
			url: url
		}

	    $.ajax({
	        type : "POST",    
	        url  : 'index.php?r=produto/removeFoto', 
	        dataType: 'json',
	        data: form_data
	    }).done(function(data) {
	    	if(data == 1) {
	    		location.reload();
	    	} else {
	    		window.location.href = 'index.php?r=produto/list';
	    	}
	    });
	} 
}

function uploadFoto(id)
{
    var inputFile = document.getElementById('foto');

    var form = new FormData();
    form.append('foto', inputFile.files[0]); 
    form.append('id', document.getElementById('id').value);

    $.ajax({
        url: 'index.php?r=produto/uploadFoto',
        data: form,
        processData: false,
        contentType: false,
        async: false,
        type: 'POST'
    }).done(function(data) {
		location.reload();
    });
}

function selectClient(id) 
{	
	var form_data = {
		id   : id,
		ajax : true
	}

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=cliente/select', 
        dataType : 'json',
        data     : form_data
    }).done(function(data) {
    	if(data) {
    		$('#id_cliente').val(data.id);
			$('#nome_cliente').val(data.nome);
			$('#show_aditional').val(data.aditional);
    	}
    });
}

function selectProd(id)
{
	var form_data = {
		id   : id,
		ajax : 1
	};

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=produto/selectAjax', 
        dataType : 'json',
        data     : form_data
    }).done(function(data) {
    	console.log(data);
    	if(data) {
    		$('#produtoNome').val(data.nome);
    		$('#produtoPreco').val(data.preco);
    		$('#id_fornecedor').val(data.id_fornecedor);
    		$('#produtoPrecoCusto').val(data.preco_custo);
    		$('#produtoId').val(data.id);
    	}
    });	
}

function excelVendas()
{
	var dtInicio   = $('#dtInicio').val();
	var dtFim      = $('#dtFim').val();
	var id_cliente = $('#id_cliente').val();

	url  = './View/Relatorios/excelVendas.php?';
	url += 'dtInicio='    + dtInicio;
	url += '&dtFim='      + dtFim;
	url += '&id_cliente=' + id_cliente;

	window.open(url, '_blank');
}

function excelFluxo()
{
	var dtInicio   = $('#dtInicio').val();
	var dtFim      = $('#dtFim').val();
	var tipo       = $('#tipo').val();

	url  = './View/Relatorios/excelFluxoCaixa.php?';
	url += 'dtInicio='    + dtInicio;
	url += '&dtFim='      + dtFim;
	url += '&tipo='       + tipo;

	window.open(url, '_blank');
}


function getInfoBoard()
{
	var form_data = {
	};

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=dashboard/getInfoBoard', 
        dataType : 'json',
        data     : form_data
    }).done(function(data) {
    	if (data) {
    		mountOverview(data);
    	}    	
    });	
}

function topSales()
{
	var form_data = {
	};

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=dashboard/topSales', 
        dataType : 'json',
        data     : form_data
    }).done(function(data) {
    	if (data) {
    		mountTopSales(data);
    	}    	
    });	
}

function vendasTrimestral()
{
	var form_data = {
	};

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=dashboard/vendasTrimestral', 
        dataType : 'json',
        data     : form_data
    }).done(function(data) {
    	if (data) {
    		mountVendasTrimestral(data);
    	}    	
    });	
}

function leadsXVendas()
{
	var form_data = {
	};

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=dashboard/leadsVendas', 
        dataType : 'json',
        data     : form_data
    }).done(function(data) {
    	if (data) {
    		mountLeadsVendas(data);
    	}    	
    });		
}

function mountOverview(dados)
{
	if (document.getElementById("overview")) {
		var ctx = document.getElementById("overview").getContext('2d');	
		var overview = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Vendas", "Produtos", "Orçamentos", "Clientes", "Fornecedores"],
				datasets: [{
					label: 'Overview do negócio',
					data: [dados.vendas, dados.produtos, dados.orcamentos, dados.clientes, dados.fornecedores],
					backgroundColor: [
						'rgba(255, 99, 132, 0.5)',
						'rgba(54, 162, 235, 0.5)',
						'rgba(255, 206, 86, 0.5)',
						'rgba(75, 192, 192, 0.5)',
						'rgba(255, 159, 64, 0.5)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(255, 159, 64, 1)'	                
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	}
}

function mountTopSales(dados)
{
	var div = '';

	for (x in dados) {
		var valor    = dados[x]['valor'];
		    valor    = 'R$ ' + valor.replace('.', ',');
		var telefone = dados[x]['telefone'] == '' ? dados[x]['celular'] : dados[x]['telefone'];
		div += '<tr>';
			div += '<td>' + dados[x]['nome'] + '</td>';		
			div += '<td>' + telefone  		 + '</td>';		
			div += '<td>' + valor    		 + '</td>';		   
		div += '</tr>';		
	}

	$('#topSales').html(div);
}

function mountVendasTrimestral(dados)
{
	if (document.getElementById("trimestral")) {
		var ctx = document.getElementById("trimestral").getContext('2d');	
		var trimestral = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [dados.mesNome3, dados.mesNome2, dados.mesNome1],
				datasets: [{
					label: 'Vendas trimestral',
					data: [dados.vendas3, dados.vendas2, dados.vendas1],
					backgroundColor: [
						'rgba(255, 99, 132, 0.5)',
						'rgba(54, 162, 235, 0.5)',
						'rgba(255, 206, 86, 0.5)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
	
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	}
}

function mountLeadsVendas(dados)
{

	var ctx = document.getElementById("leadsVendas");

	var pieChart = new Chart(ctx, {
	    type: 'pie',
		data: {
			labels: ['leads', 'vendas'],
    		datasets: [{
        		data: [dados.leads, 
	            	   dados.vendas],		    	
	            backgroundColor: [
					'rgba(153, 102, 255, 0.5)',
                	'rgba(255, 159, 64, 0.5)'
	            ],
	            borderColor: [
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],	            
	            label: 'Leads X Vendas'
    		}],            
		}		    
	});
}