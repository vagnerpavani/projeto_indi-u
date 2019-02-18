import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class AlterarProjetoService {

  apiUrl:string = "localhost::8000/";

  constructor( public http: HttpClient ) { }

  getUser(nomeOuId: string | number):Observable<any>{

    return this.http.get( this.apiUrl + nomeOuId ).pipe( map( res=>res ) );
  }
}
