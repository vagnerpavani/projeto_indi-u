import { Component, OnInit } from '@angular/core';
import { PerfilService } from '../../service/perfil.service'
import { Router } from '@angular/router';

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css']
})
export class PerfilComponent implements OnInit {

  curerentRoute: String;

  userName: String = 'Default Name';
  imagemDefault:String = '../../assets/userDefault.png';
  icons:string[] = [this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false)];
  mainImageDefault = "url(assets/imagemDefundoDefault.jpeg)";
  certo:boolean = true;
  text:string;


  members:any[] = [];
  numeroAvaliacao:number = 0;

  constructor( public perfilService:PerfilService, ) { }

  ngOnInit() {

    this.informacaoUser();

//muda numero muda avaliacoa
     this.iconController(this.getRating(5));

  }

   iconsTipes(type:boolean){
     if(type==true){
        return 'star';
     }
     else{
        return 'star_border';
     }

   }

  iconController(rating:number){

     if(rating==5){
        return this.icons = [this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(true)];
     }
     if(rating==4){
        return this.icons = [this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(false)];
     }
     if(rating==3){
        return this.icons = [this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(false),this.iconsTipes(false)];
     }
     if(rating==2){
        return this.icons = [this.iconsTipes(true),this.iconsTipes(true),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false)];
     }
     if(rating==1){
        return this.icons = [this.iconsTipes(true),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false)];
     }

  }

  getRating(numero:number){

     return numero;
  }

  userImageDisplay(user){
    //caso o pegado do banco de dados nao funcione pegar a imagem default
    //pegar a imagem
  }

  informacaoUser(){
    this.perfilService.getUser();
  }



}
