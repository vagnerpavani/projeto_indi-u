import { Component, OnInit } from '@angular/core';
import { LoginService } from '../../service/login.service';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  user:any;

  constructor(public loginService:LoginService ) { }

  ngOnInit() {
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
