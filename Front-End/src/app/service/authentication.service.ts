import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {

  urlLogin:string = 'https//localhost/8000/api/login';

  constructor(private http:HttpClient) { }

  login(user:any){
    return this.http.post( this.urlLogin,{
        email:user.email,
        password:user.password,

    }).pipe(map(res=>res));
  }

}
