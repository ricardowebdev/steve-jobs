function tour(page) {


    if (page == 'vendas') {
        data = [
            { 
                element: "#filter-card", 
                title:   "Filtros",  
                content: "Filtros personalizados para mostrar as informações mais precisas",
            },
            { 
                element: "#search-button", 
                title:   "Buscar",  
                content: "Confirma a busca dos valores informados",
            },
            { 
                element: "#blankOs", 
                title:   "Pagina em branco",  
                content: "Imprime uma folha em branco para ser preenchida a mão",
            },
            { 
                element: "#newVenda", 
                title:   "Adicionar nova venda",  
                content: "Aqui você pode adicionar novas vendas e ou orçamentos no sistema",
            }, 
            { 
                element: "#actions", 
                title:   "Ações com a venda",  
                content: "Edite as informações das vendas, adicione mais itens, imprima, envie por e-mail ao cliente, ou remova vendas do sistema",
            },                       
        ];
    } else if (page == 'novaVenda') {
        data = [
            { 
                element: "#buscar", 
                title:   "Buscar cliente",  
                content: "Busca um cliente previamente cadastrado no sistema",
            },
            {
                element: "#novoCliente",
                title:   "Cadastrar novo",  
                content: "Cadastre um novo cliente no sistema e utilize na sua nova venda",
            },
            {
                element: "#infoVendas",
                title:   "Informações da venda",  
                content: "Informações chaves para a venda, tais como se é venda ou orçamento, condição de pagamento, prazo para a entrega, data",
            }
        ];
    } else if (page == 'editVenda') {
        data = [
            { 
                element: "#totalVenda", 
                title:   "Total",  
                content: "Valor total da venda até o momento",
            },
            { 
                element: "#addItem", 
                title:   "Adicionar Item",  
                content: "Adicione um novo produto ou serviço a venda",
            },
            { 
                element: "#acoes", 
                title:   "Ações com os item",  
                content: "Altera as informações sobre os items ou remova um item da venda",
            },            
        ];
    } else if (page == 'dashboard') {
        data = [
            { 
                element: "#dashboard-menu", 
                title:   "Dashboard",  
                content: "Mostra um overview geral de seu negocio com graficos e relatórios",
            },        
            { 
                element: "#cadastros", 
                title:   "Cadastros",  
                content: "Cadastros bases para gerenciar informações do sistema, tais como clientes, fornecedores, produtos e etc...",
            },        
            { 
                element: "#financeiro", 
                title:   "Financeiro",  
                content: "Aqui a parte de gerenciamento financeiro da empresa, como lançamento de vendas e controle de fluxo de caixas",
            },
            { 
                element: "#gerencia", 
                title:   "Gerencia do site",  
                content: "Aqui você pode gerenciar o conteudo do site como textos e fotos que nele aparecem, informações sobre a empresa como nomes, telefoens, endereços e etc...",
            },                                 
        ]
    }

    var tour = new Tour({
        steps: mountSteps(data)
    });
    // Initialize the tour
    tour.init();

    // Start the tour
    tour.restart();    
}


function mountTemplate(title, content) {
    var template =  "<div class='popover tour'>" +
                    "<div class='arrow'></div>" +
                    "<h5 class='popover-title text-center'><b>" + title + "</b></h5>" +
                    "<div class='popover-content'>" + content + "</div>" +
                    "<div class='popover-navigation'>" +
                    "<button class='btn btn-default btn-sm' data-role='prev'>« Anterior</button>" +
                    "<button class='btn btn-default btn-sm' data-role='next'>Proximo »</button>" +
                    "<button class='btn btn-default btn-sm' data-role='end'>Encerrar</button>" +
                    "</div>" +
                    "</div>";
    return template;                             
}


function mountSteps(data) {
    var steps = [];

    for (var x in data) {
        steps.push({
            element:  data[x].element,
            title:    data[x].title,
            content:  data[x].content,
            template: mountTemplate(data[x].title, data[x].content)
        });
    }

    return steps;
}

