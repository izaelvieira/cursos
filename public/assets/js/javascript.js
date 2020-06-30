/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function teste_de_conhecimento_6(){
    const valores = Array(11, 10, 16, 54, 20, 22, 8, 2);
    let total = 0;
    let element = 0;
        // tslint:disable-next-line:prefer-for-of
        for (let index = 0; index < valores.length; index++) {
            element = valores[index];
            if (index % 2 === 0) {
                total += element;
            }
        }
        console.log("Total: " + total);
}

$(function(){
    teste_de_conhecimento_6();
    $('.data-mask').mask('00/00/0000');
    $('.data-time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00.000-000');

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
        
    $('.cep').blur(function(){
        //Nova variavel "cep" somente com numeros.
        let cep = $(this).val().replace(/\D/g, '');
        let msgErro = "";
        //Expressao regular para validar o CEP.
        let validacep = /^[0-9]{8}$/;
        
        //Valida o formato do CEP.
        if(validacep.test(cep) && cep != "") {
            
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#endereco").val("...");
            $("#bairro").val("...");
            $("#cidade").val("...");
            $("#estado").val("...");
            
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro.toUpperCase());
                                $("#bairro").val(dados.bairro.toUpperCase());
                                $("#cidade").val(dados.localidade.toUpperCase());
                                $("#estado").val(dados.uf.toUpperCase());
                                //$("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado nÃ£o foi encontrado.
                                $("#endereco").val("...");
                                $("#bairro").val("...");
                                $("#cidade").val("...");
                                $("#estado").val("...");
                                msgErro="CEP não encontrado.";
                            }
                        });
        } else {
            msgErro="CEP invalido ou vazio.";
        }
        if(msgErro != ""){
            console.log(msgErro);
        }
    });
});

(function(win,doc){
  'use strict';

  function confirmDel(event){
  	event.preventDefault();
  	//console.log(event.target.parentNode.href);
  	let token = doc.getElementsByName("_token")[0].value;
  	let redir = doc.getElementsByName("redir")[0].value;
  	let _methodo = doc.getElementsByName("metodo")[0].value;
        console.log(redir);
        console.log(_methodo);
  	if(confirm("Deseja mesmo excluir ? ")){
  		let ajax = new XMLHttpRequest();
                if(_methodo == 'DELETE'){
                // methodo para deletar , porem foi preferido inativar o item*/
  		   ajax.open("DELETE", event.target.parentNode.href);
                }else{
  		   ajax.open("POST", event.target.parentNode.href);
                }
  		ajax.setRequestHeader('X-CSRF-TOKEN', token);
  		ajax.onreadystatechange=function(){
  			if(ajax.readyState === 4 && ajax.status === 200){
                           win.location.href=$(redir);
  			}
  		};
  		ajax.send();
  	} else {
  		return false;
  	}
  }

  if(doc.querySelector('.js-del')){
     let btn = doc.querySelectorAll('.js-del');
     for(let i=0; i<btn.length; i++){
     	btn[i].addEventListener('click',confirmDel,false);
     }
  }
})(window,document);

