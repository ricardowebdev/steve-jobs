
if($('#barChart').html() !== undefined) {
    $.ajax({
        type : "POST",    
        url  : 'index.php?r=produtos/countProdutos', 
        dataType: 'json'	        
    }).done(function(data) {

    	console.log(data);

		var ctx = document.getElementById("barChart");
		var barChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ["Produtos"],
		        datasets: [{
		            label: 'Dados Cadastrados',
		            data: [data.id],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)'
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
    });	    
}
