import { Injectable } from '@angular/core';

import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PerfilService {

  apiUrl: string = 'https://localhost/8000/api';

  constructor(private http: HttpClient) { }

  navigateToUser(member:any):Observable<any>{
    return this.http.post( this.apiUrl,{



    }
     ).pipe( map(res=>res) );
  }

}
