import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.component.html',
  styleUrls: ['./cadastro.component.css']
})
export class CadastroComponent implements OnInit {

   nomeProjeto:string = "Nome";
   userNameProjeto:string = "Nome de usuario";
   emailProjeto:string = "Email";
   passwordProjeto:string = "Senha";
   passwordConfirmProjeto:string = "Comfirmar Senha";

   mudarCorNome:boolean = false;
   mudarCorUserName:boolean = false;
   mudarCorEmail:boolean = false;
   mudarCorPassworld:boolean = false;
   mudarCorPasswordConfirm:boolean = false;

  constructor() { }

  ngOnInit() {

  }

  onSubmit(cadastro){
    console.log(cadastro);
  }

  mudarNome(name){
    if(name.invalid==true){
      this.nomeProjeto = "Campo necessario";
      this.mudarCorNome = true;
    }else{
      this.nomeProjeto = "Nome";
      this.mudarCorNome = false;
    }

  }

  mudarUserName(userName){
      if(userName.invalid==true){
        this.userNameProjeto = "Campo necessario";
        this.mudarCorUserName = true;
      }else{
        this.userNameProjeto = "Nome de usuario";
        this.mudarCorUserName = false;
    }
  }

  mudarPassworld(senha){
    if(senha.invalid==true || senha.value.lenght > 6 ){
     this.passwordProjeto = "campo necessario";
     this.mudarCorPassworld = true;
   }else{
     this.passwordProjeto = "Senha";
     this.mudarCorPassworld = false;
   }
  }

  mudarPasswordConfirm(senhaConfirm){
    if(senhaConfirm.invalid || senhaConfirm.value.lebght > 6){
      this.passwordConfirmProjeto = "Campo necessario";
      this.mudarCorPasswordConfirm = true;
    }else{
      this.passwordConfirmProjeto = "Confirmar Senha";
      this.mudarCorPasswordConfirm = false;
    }

  }

  mudarEmail(email){
    if(email.invalid == true){
      this.emailProjeto = "Campo Necessario";
      this.mudarCorEmail = true;
    }else {
      this.emailProjeto = "Email";
      this.mudarCorEmail = false;
    }
  }


}
