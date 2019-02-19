import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { HomeComponent } from './pages/home/home.component';

import { PagamentoComponent } from './pages/pagamento/pagamento.component';

import { FormsModule } from '@angular/forms';

import { RelacoesComponent } from './pages/relacoes/relacoes.component';


@NgModule({
  declarations: [
    AppComponent,
    PagamentoComponent,
    HomeComponent,
    NavbarComponent,
    FooterComponent,
    HomeComponent,
    RelacoesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
