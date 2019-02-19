import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class CriarProjetoService {

  apiUrl:string = "localhost::8000/";

  constructor( public http: HttpClient ) { }

  getUser(nomeOuId: string | number):Observable<any>{

    return this.http.get( this.apiUrl + nomeOuId ).pipe( map( res=>res ) );
  }

  addMember(member:any): Observable<any>{
    return this.http.post(this.apiUrl,{
      nome: member.nome,
      email:member.email,
      repositorioProjeto:member.repositorio,
      descricaoProjeto:member.descricao,
      galeria:member.galeria

    }).pipe(map(res=>res));
  }

}
