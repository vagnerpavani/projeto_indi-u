import { Injectable } from '@angular/core';

import{ HttpClient } from '@angular/common/http';
import{ map } from "rxjs/operators";
import{ Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

//mecher na string caso nao consiga achor a string

   apiUrl: string = 'https://localhost/8000/';

  constructor( public http:HttpClient) { }

//deve se saber como funciona  para se requisitar um usuario

  getUsuario(nomeOuId: string | number):Observable<any>{

//nome do url
    return this.http.get( this.apiUrl + nomeOuId ).pipe( map(res=>res) );
  }

}
