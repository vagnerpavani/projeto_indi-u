import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-detalhes-projeto',
  templateUrl: './detalhes-projeto.component.html',
  styleUrls: ['./detalhes-projeto.component.css']
})
export class DetalhesProjetoComponent implements OnInit {

  imagemUsuarioDefault:string = "https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.SqTcfufj92gVRBT45d045wAAAA%26pid%3D15.1&f=1";
  userName:string = "defaultName"

  constructor() { }

  ngOnInit() {
  }

}
