import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class CadastroService {

  apiUrl: string = 'https://localhost/8000/';
  registerUrl: string = 'https//localhost/8000/register';

  constructor() { }
/*
  getCadastro(member:any):Observable<any>{
    return this.http.post(this.apiUrl,{
       name:member.name,
       username:member.username,
       password:member.password,
       email:meber.email,
       repository:member.  repository,
       birthday:member.birthday,
       phone_number:member.phone_number,
       description:member.
       picture:member.picture
    });
  }
}
*/
}
