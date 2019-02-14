import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PerfilComponent } from './pages/perfil/perfil.component';

import { HttpClientModule } from '@angular/common/http';
import { PerfilService } from './service/perfil.service';

@NgModule({
  declarations: [
    AppComponent,
    PerfilComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
  ],
  providers: [
    HttpClientModule,
    PerfilService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
