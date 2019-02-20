import { Injectable } from '@angular/core';

import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PerfilService {

  apiUrl: string = 'https://localhost/8000/api';
  userUrl: string = 'https://localhost/8000/api/get-details'

  constructor(private http: HttpClient) { }

  getUser(identificadorDeUser:string | number):Observable<any>{

    return this.http.get( this.userUrl ).pipe( map(res=>res) );
  }

}
