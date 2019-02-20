import { Injectable } from '@angular/core';

import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PerfilService {

  apiUrl: string = 'https://localhost/8000/api';
  userUrl: string = 'https://localhost/8000/api/get-details';
  ratingUrls:string = 'https://localhost/8000/api/get-grade';
  imageUrl:string = 'https://localhost/8000/api/'



  constructor(private http: HttpClient) { }

  getUser():Observable<any>{
    let token = localStorage.getItem('token');
    token = 'Bearer '+ token;
    let header:HttpHeaders = new HttpHeaders({'Authorization':token})
    return this.http.get( this.userUrl, {headers: header} ).pipe( map(res=>res) );
  }

  getInformacao(member:any):Observable<any>{
     return this.http.get(this.userUrl).pipe(map(res=>res));
  }


}
