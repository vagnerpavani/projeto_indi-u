import { Injectable } from '@angular/core';

import{ HttpClient } from '@angular/common/http';
import{ map } from "rxjs/operators";
import{ Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

//mecher na string caso nao consiga achor a string

  apiUrl: string = 'http://localhost:8000/api/login';

  constructor( public http:HttpClient) { }

//deve se saber como funciona  para se requisitar um usuario

  getUsuario(user:any):Observable<any>{

    return this.http.post(this.apiUrl,{
      email:user.email,
      password:user.password
    }).pipe(map(res=>res));

  }
}
