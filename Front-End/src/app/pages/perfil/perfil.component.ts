import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css']
})
export class PerfilComponent implements OnInit {

  userName: String = 'Default Name';
  imagemDefault:String = '../../assets/userDefault.png';
  imagemMain: String ='https://i.pinimg.com/originals/59/5f/e2/595fe2fd04aa8f73ba0ad94e298bd656.png';
  icons:string[] = [this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false)];
  mainImageDefault = "../../assets/imagemDefundoDefault.jpeg";

  constructor() { }

  ngOnInit() {
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

}
