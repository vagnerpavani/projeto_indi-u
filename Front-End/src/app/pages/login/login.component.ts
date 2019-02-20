import { Component, OnInit } from '@angular/core';
import { LoginService } from '../../service/login.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  curerentRoute:string;

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


  enterUser(login){

   this.user = login.value;
   console.log(this.user);

   this.loginService.getUsuario(this.user).subscribe(

     (res) => {
       console.log(res);
       this.user.push({
         email:this.user.email,
         password:this.user.password,
       })
     }
   );
  }

}
