import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.component.html',
  styleUrls: ['./cadastro.component.css']
})
export class CadastroComponent implements OnInit {

  passwordError:boolean = false;
  emailError:boolean = false;
  confirm_passwordError:boolean = false;
  textEmail: string = "email";
  textoSenha: string = 'senha';
  confirmar_senha:string = "confirmar senha";

  constructor() { }

  ngOnInit() {

  }

  onSubmit(cadastro){
    console.log(cadastro);
  }

  checkPassword(senha){
     if(senha.value.lenght < 6)
        this.passwordError=true;
      else
        this.passwordError=false;

  }

  checkConfirmPassword(password,confirm_password){
    if(confirm_password.value != password.value){
       this.confirm_passwordError = true;
       password.value = "senhas nao sao iguais";
    }
    else
       this.confirm_passwordError = false;
  }

  checkEmail(email){
    if(email.invalid = true)
       this.emailError = true;
    else
        this.emailError=false;
  }


}
