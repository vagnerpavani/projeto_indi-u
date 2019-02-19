import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { PagamentoComponent } from './pages/pagamento/pagamento.component';

import { FormsModule } from '@angular/forms';

import { HomeComponent } from './pages/home/home.component';


@NgModule({
  declarations: [
    AppComponent,
    PagamentoComponent,
    HomeComponent

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
