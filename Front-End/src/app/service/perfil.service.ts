import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { map } from "rxjs/operators";
import { observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PerfilService {

  apiUrl: string = 'https://localhost/8000/';

  constructor() { }

  getUser()
}
