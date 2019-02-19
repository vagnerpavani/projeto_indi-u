import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';


import { FormsModule } from '@angular/forms';

import { HttpClientModule} from '@angular/common/http';
import { PesquisaService } from './service/pesquisa.service';
import { LoginService } from './service/login.service';
import { PagamentoService } from './service/pagamento.service';

import { LoginComponent } from './pages/login/login.component';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { HomeComponent } from './pages/home/home.component';
import { PagamentoComponent } from './pages/pagamento/pagamento.component';
import { RelacoesComponent } from './pages/relacoes/relacoes.component';
import { PesquisaComponent } from './pages/pesquisa/pesquisa.component';
import { PerfilComponent } from './pages/perfil/perfil.component';
import { SetingsPerfilComponent } from './pages/setings-perfil/setings-perfil.component';
import { AvaliarComponent } from './pages/avaliar/avaliar.component';
import { PerfilService } from './service/perfil.service';
import { CriarProjetoComponent } from './pages/criar-projeto/criar-projeto.component';
import { DetalhesProjetoComponent } from './pages/detalhes-projeto/detalhes-projeto.component';
import { AlterarProjetosComponent } from './pages/alterar-projetos/alterar-projetos.component';



@NgModule({
  declarations: [
    AppComponent,
    PagamentoComponent,
    HomeComponent,
    NavbarComponent,
    FooterComponent,
    HomeComponent,
    RelacoesComponent,
    PesquisaComponent,
    LoginComponent,
    CadastroComponent,
    PerfilComponent,
    SetingsPerfilComponent,
    AvaliarComponent,
    AlterarProjetosComponent,
    DetalhesProjetoComponent,
    CriarProjetoComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
  ],
  providers: [
    HttpClientModule,
    LoginService,
    PerfilService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
