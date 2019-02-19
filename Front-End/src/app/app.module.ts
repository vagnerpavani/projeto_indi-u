import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './pages/login/login.component';
import { FormsModule } from '@angular/forms';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { HttpClientModule} from '@angular/common/http';
import { LoginService } from './service/login.service';
import { PerfilComponent } from './pages/perfil/perfil.component';

import { SetingsPerfilComponent } from './pages/setings-perfil/setings-perfil.component';
import { AvaliarComponent } from './pages/avaliar/avaliar.component';
import { PerfilService } from './service/perfil.service';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    CadastroComponent,
    PerfilComponent,
    SetingsPerfilComponent,
    AvaliarComponent
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
