import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CriarProjetoComponent } from './pages/criar-projeto/criar-projeto.component';
import { DetalhesProjetoComponent } from './pages/detalhes-projeto/detalhes-projeto.component';

import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { AlterarProjetosComponent } from './pages/alterar-projetos/alterar-projetos.component';

import { AlterarProjetoService } from './service/alterar-projeto.service';
import { CriarProjetoService } from './service/criar-projeto.service';
import { DetalhesProjetoService } from './service/detalhes-projeto.service';



@NgModule({
  declarations: [
    AppComponent,
    CriarProjetoComponent,
    DetalhesProjetoComponent,
    AlterarProjetosComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,

  ],
  providers: [
     HttpClientModule,
      AlterarProjetoService,
      CriarProjetoService,
      DetalhesProjetoService,

  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
