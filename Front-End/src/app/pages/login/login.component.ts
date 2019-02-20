import { Component, OnInit,EventEmitter } from '@angular/core';
import { LoginService } from '../../service/login.service';
import { AuthenticationService } from '../../service/authentication.service';
import { Router } from '@angular/router';



@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {


  curerentRoute:string;

  users:any[]=[];

  constructor(public loginService:LoginService,private router:Router ) { }

  ngOnInit() {
    this.router.events.subscribe(
      () => this.curerentRoute = this.router.url
    );
  }

  navigateToUser(){
    this.router.navigate(['perfil'])
  }

  onSubmit(login){
    console.log(login);
  }

  enterUser(varForm){
    this.users = varForm.value;
    console.log(this.users);

    this.loginService.getUsuario(this.users).subscribe(
      (res)=>{
        console.log(res);
        localStorage.setItem('token',res.success.token);
        console.log(localStorage.getItem('token'));
        this.router.navigate(['perfil']);
      });
  }

  sairUser(){
    localStorage.removeItem('tpokens');
  }

  }
