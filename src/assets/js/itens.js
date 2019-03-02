$(document).ready(function(){
	$('#confirmItem').click(function(){
		var result = validate();

		if (result) {
			registerItem();
		} 
	});

	$('#addItem').click(function(){
		$('#produtoNome').val("");
		$('#id_fornecedor').val("");
		$('#produtoId').val("");
		$('#produtoPreco').val("");
		$('#produtoPrecoCusto').val(0);
		$('#produtoQtde').val("");
		$('#idItem').val("0");
	});

	$('#addItem').click(function(){
		$('.selectpicker').selectpicker('refresh');	
	});

	$('#confirmClient').click(function(){
		if (validateClient()) {
			var form_data = {
				nome:        $('#nome').val(),
				cpf_cnpj:    $('#cpf_cnpj').val(),
				telefone:    $('#telefone').val(),
				celular:     $('#celular').val(),
				cep:         $('#cep').val(),
				endereco:    $('#endereco').val(),
				numero:      $('#numero').val(),
				complemento: $('#complemento').val(),
				estado:      $('#estado').val(),
				cidade:      $('#cidade').val(),
				bairro:      $('#bairro').val(),
				email:       $('#email').val(),
				aditional:   $('#aditional').val(),
				json:        "true",
			};

		    $.ajax({
		        type     : "POST",    
		        url      : 'index.php?r=cliente/insert', 
		        dataType : 'json',
		        data     : form_data	        
		    }).done(function(data) {
				window.location.reload();
		    }).fail(function(error) {
				console.log(error);
				window.location.reload();
		    });			
		}		
	})

});

function validate() {
	if ($('#produtoNome').val() == "") {
		alert('Nome do produto não pode ficar em branco');
		return false;
	}

	if ($('#id_fornecedor').val() == "") {
		alert('Fornecedor do produto não pode ficar em branco');
		return false;
	}	

	if ($('#produtoPreco').val() == "") {
		alert('Preço do produto não pode ficar em branco');
		return false;
	}

	if ($('#produtoQtde').val() == "") {
		alert('Quantidade do produto não pode ficar em branco');
		return false;
	}	

	return true;
}

function registerItem() {	
	
	if($('#idItem').val() != "0") {
	    acao = 'updateItem';
	} else {
		acao = 'insertItem';
	}

	var form_data = {
		descricao     : $('#produtoNome').val(),
		nome          : $('#produtoNome').val(),
		id_fornecedor : $('#id_fornecedor').val(),
		exibe         : 'N',
		preco         : $('#produtoPreco').val(),
		preco_custo   : $('#produtoPrecoCusto').val(),
		qtde          : $('#produtoQtde').val(),
		id_venda      : $('#id_venda').val(),
		id_produto    : $('#produtoId').val(),
		id_categoria  : 1,
		id            : $('#idItem').val()
	};

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=venda/' + acao, 
        dataType : 'json',
        data     : form_data	        
    }).done(function(data) {
		if(data) {
    		alert('solicitação realizada com sucesso');
			window.location.reload();
    	} else {
    		alert('Ocorreram erros durante a solicitação')
    	}
    }).fail(function(error) {
    	console.log(error);    	
    });
}

function reloadTable() {
	$('.selectpicker').selectpicker('refresh');	

	var form_data = {
		id  : $('#id_venda').val()
	};

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=venda/updateItem', 
        dataType : 'json',
        data     : form_data 
    }).done(function(data) {
    	if(data) {
    		var table = '';

    		for(x in data) {
				preco = data[x]['preco'];
				preco = parseFloat(preco);
				preco = preco.toFixed(2);
				preco = preco.replace('.', ',');


				total = data[x]['total'];
				total = parseFloat(total);
				total = total.toFixed(2);
				total = total.replace('.', ',');

    			table += '<tr>';
    			table += '<td>' + data[x]['descricao'] + '</td>';
    			table += '<td>' + preco 			   + '</td>';
    			table += '<td>' + data[x]['qtde']      + '</td>';
    			table += '<td>' + total                + '</td>';
    			
    			table += '<td>';      
    				table += '<a onclick="editItem(' + data[x]['id'] + ')" class="btn btn-yellow btn-sm" data-toggle="modal" data-target="#itemModal" title="Editar este item"><i class="fa fa-pencil"></i> Editar</a>';
    				table += '<a onclick="deleteItem(' + data[x]['id'] + ')" class="btn btn-danger btn-sm" title="Remover este item"><i class="fa fa-trash"></i> Deletar</a>';
				table += '</td>';

    			table += '</tr>';
    		}

    		$('#itensTable').html("");
    		$('#itensTable').html(table);
    		calculaTotal();
    	}
    });	
}

function deleteItem(id)
{
	if(confirm('Tem certeza de que deseja remover este item?')) {
		var form_data = {
			id: id			
		}

	    $.ajax({
	        type     : "POST",    
	        url      : 'index.php?r=venda/deleteItem', 
	        dataType : 'json',
	        data     : form_data	        
	    }).done(function(data) {
			window.location.reload();
	    });
	}
}

function editItem(id) {	
	$('.selectpicker').selectpicker('refresh');	

	var form_data = {
		id : id
	}

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=venda/selectItem', 
        dataType : 'json',
        data     : form_data	        
    }).done(function(data) {
		if(data) {	
			preco = data.preco;
			preco = parseFloat(preco);
			preco = preco.toFixed(2);
			preco = preco.replace('.', ',');

			preco_custo = data.preco_custo;
			preco_custo = parseFloat(preco_custo);
			preco_custo = preco_custo.toFixed(2);
			preco_custo = preco_custo.replace('.', ',');

			$('#produtoNome').val(data.descricao);
			$('#id_fornecedor').val(data.id_fornecedor);		
			$('#produtoPreco').val(preco);
			$('#produtoPrecoCusto').val(preco_custo);
			$('#produtoQtde').val(data.qtde);
			$('#idItem').val(id);
			
		    $('.selectpicker').selectpicker('refresh');
			$('.form-control').focus();
		    $('.form-control').focusout();
		}
    });	
}

function calculaTotal() {
	var form_data = {
		id   : $('#id_venda').val(),
	}

    $.ajax({
        type     : "POST",    
        url      : 'index.php?r=venda/getTotalItens', 
        dataType : 'json',
        data     : form_data	        
    }).done(function(data) {
		if(data != "0,00") {	
			$('#totalVenda').html("Total: " + data);
		} else {
			$('#totalVenda').html("Total: " + data);
		}
    });		
}

function validateClient() {
	if ($('#nome').val() == "") {
		alert('nome do cliente não pode ficar em branco');
		$('#nome').focus();
		return false;
	}

	return true;		
}
