import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-criar-projeto',
  templateUrl: './criar-projeto.component.html',
  styleUrls: ['./criar-projeto.component.css']
})
export class CriarProjetoComponent implements OnInit {

   nomeProjeto:string = "Nome";
   emailProjeto:string = "Email dos participantes";
   mudarCorNome:boolean = false;
   mudarCorEmail:boolean = false;

  constructor() {}

  ngOnInit() {


  }

  onSubmit(variavel){
    console.log(variavel);
  }

 mudarNome(nome){
    if(nome.invalid == true){

      this.nomeProjeto = "Campo necessario";
      this.mudarCorNome = true;
    }
    else{

    this.nomeProjeto = "Nome";
    this.mudarCorNome = false;

    }
  }

 mudarEmail(email){
  if(email.invalid == true){

    this.emailProjeto = "Campo necessario";
    this.mudarCorEmail = true;

  }else{

    this.emailProjeto = "Email";
    this.mudarCorEmail = false;
  }
 }

 }
