import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { CriarProjetoComponent } from './pages/criar-projeto/criar-projeto.component';
import { DetalhesProjetoComponent } from './pages/detalhes-projeto/detalhes-projeto.component';
import { AlterarProjetosComponent } from './pages/alterar-projetos/alterar-projetos.component';



const routes: Routes = [
  { path:'criarProjeto' ,component:CriarProjetoComponent },
  { path:'detalhesProjeto' , component:DetalhesProjetoComponent},
  { path:'alterarProjetos', component:AlterarProjetosComponent},
  { path: '',redirectTo:'/alterarProjetos',pathMatch:'full'},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
