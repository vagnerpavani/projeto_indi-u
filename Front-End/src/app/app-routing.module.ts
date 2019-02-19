import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { NavbarComponent } from './navbar/navbar.component';

import { LoginComponent } from './pages/login/login.component';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { PerfilComponent } from './pages/perfil/perfil.component';
import { SetingsPerfilComponent } from './pages/setings-perfil/setings-perfil.component';
import { AvaliarComponent } from './pages/avaliar/avaliar.component';
import { CriarProjetoComponent } from './pages/criar-projeto/criar-projeto.component';
import { DetalhesProjetoComponent } from './pages/detalhes-projeto/detalhes-projeto.component';
import { AlterarProjetosComponent } from './pages/alterar-projetos/alterar-projetos.component';
import { HomeComponent } from './pages/home/home.component';
import { RelacoesComponent } from './pages/relacoes/relacoes.component';
import { PesquisaComponent } from './pages/pesquisa/pesquisa.component';
import { PagamentoComponent } from './pages/pagamento/pagamento.component';

const routes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'login', component: LoginComponent },
  { path: 'cadastro', component: CadastroComponent},
  { path: '', redirectTo:'/home', pathMatch: 'full'},
  { path: 'perfil' , component: PerfilComponent },
  { path: 'setingsPerfil' , component:SetingsPerfilComponent },
  { path: 'avaliar' , component:AvaliarComponent },
  { path: 'criarProjetos' , component:CriarProjetoComponent },
  { path: 'detalhesProjeto' , component:DetalhesProjetoComponent },
  { path: 'alterarProjetos' , component:AlterarProjetosComponent },
  { path: 'relacoes', component: RelacoesComponent },
  { path: 'pesquisa', component: PesquisaComponent },
  { path: 'pagamento', component: PagamentoComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
