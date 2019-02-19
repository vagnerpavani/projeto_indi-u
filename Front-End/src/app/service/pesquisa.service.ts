import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PesquisaService {

	userapiUrl: string = 'https://localhost/8000/api/list-users'
	projectsapiUrl: string = 'https://localhost/8000/api/list-projects'

  constructor() { }
}
