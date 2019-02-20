import { Injectable } from '@angular/core';
import { Router,CanActivate,ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {

   constructor(private router:Router ){}

   canActivate( route: ActivatedRouteSnapshot,state: RouterStateSnapshot){
     console.log('entrei no guarda');
     if(localStorage.getItem('token')){
       return true;
     }
    this.router.navigate(['login']);
    return false;
  


   }
}
