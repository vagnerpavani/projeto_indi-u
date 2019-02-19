import { Injectable } from '@angular/core';

import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PerfilService {

  apiUrl: string = 'https://localhost/8000/';

  constructor(private http: HttpClient) { }

  getMenbers():Observable<any>{
    return this.http.get( this.apiUrl ).pipe( map(res=>res) );
  }

}
