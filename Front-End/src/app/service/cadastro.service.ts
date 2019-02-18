import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class CadastroService {

  apiUrl: string = 'https://localhost/8000/';

  constructor() { }
}
