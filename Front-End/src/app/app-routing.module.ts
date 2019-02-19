import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LoginComponent } from './pages/login/login.component';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { PerfilComponent } from './pages/perfil/perfil.component';
import { SetingsPerfilComponent } from './pages/setings-perfil/setings-perfil.component';
import { AvaliarComponent } from './pages/avaliar/avaliar.component';

const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'cadastro', component: CadastroComponent},
  { path: '', redirectTo:'/cadastro', pathMatch: 'full'},
  { path: 'perfil' , component: PerfilComponent },
  { path: 'setingsPerfil' , component:SetingsPerfilComponent },
  { path: '',redirectTo:'/setingsPerfil' , pathMatch:'full'},
  { path: 'avaliar' , component:AvaliarComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
